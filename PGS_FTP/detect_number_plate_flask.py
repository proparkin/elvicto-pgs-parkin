import asyncio
import threading
import aiohttp
from flask import Flask, request, jsonify
import paddle
import os, json, cv2, torch, gc, socket
from concurrent.futures import ThreadPoolExecutor, as_completed
from ultralytics import YOLO
from paddleocr import PaddleOCR
from skimage.metrics import structural_similarity as ssim
import warnings, logging
import numpy as np
from threading import Semaphore

GPU_LOCK = Semaphore(1)
MAX_BATCH = 20
# -----------------------
# Silent Setup
# -----------------------
warnings.filterwarnings("ignore")
os.environ["YOLO_VERBOSE"] = "False"
os.environ["PPOCR_DEBUG"] = "False"
os.environ["FLASK_ENV"] = "production"

logging.getLogger('paddleocr').setLevel(logging.ERROR)
logging.getLogger('ultralytics').setLevel(logging.ERROR)
logging.getLogger('PIL').setLevel(logging.ERROR)
logging.getLogger().setLevel(logging.CRITICAL)

app = Flask(__name__)

# -----------------------
# YOLO Models (Load Once)
# -----------------------
# CAR_MODEL_PATH = r"C:\Users\priya\Desktop\pgs_pro\yolo11n.pt"
# PLATE_MODEL_PATH = r"C:\Users\priya\Desktop\pgs_pro\best.pt"
CAR_MODEL_PATH = "/root/yolo11n.pt"
PLATE_MODEL_PATH = "/root/best.pt"
API_URL = "http://10.0.1.100/api/update-parking-slots"
GET_API_URL = "http://10.0.1.100/api/lamp-control-api"
print("Model path:", CAR_MODEL_PATH)
print("Exists:", os.path.exists(CAR_MODEL_PATH))
CAR_MODEL = YOLO(CAR_MODEL_PATH)
PLATE_MODEL = YOLO(PLATE_MODEL_PATH)


# async def send_results_to_api(results):
#         print("🚀 Sending results to API:", results)
    
#         try:
#             async with aiohttp.ClientSession() as session:
#                 async with session.post(
#                     API_URL,
#                     json=results,
#                     headers={"Content-Type": "application/json"},
#                     timeout=aiohttp.ClientTimeout(total=10)
#                 ) as response:
#                     print("✅ API Status:", response.status)
#                     print("✅ API Response:", await response.text())
    
#         except Exception as e:
#             print("❌ API Error:", str(e))

async def send_results_to_api(results):
    print("🚀 Sending results to API:", results)

    async with aiohttp.ClientSession(
        timeout=aiohttp.ClientTimeout(total=10)
    ) as session:
        try:
            # 1️⃣ POST request
            async with session.post(
                API_URL,
                json=results,
                headers={"Content-Type": "application/json"}
            ) as response:
                status = response.status
                body = await response.text()

                print("✅ POST Status:", status)
                print("✅ POST Response:", body)

                # Only continue if POST succeeded
                if status not in (200, 201, 202):
                    print("⛔ POST failed, skipping GET")
                    return

            # 2️⃣ GET request (runs after POST success)
            async with session.get(GET_API_URL) as response:
                print("➡️ GET Status:", response.status)
                print("➡️ GET Response:", await response.text())

        except aiohttp.ClientError as e:
            print("❌ Network Error:", e)

        except Exception as e:
            print("❌ Unexpected Error:", e)

# -----------------------
# Vehicle Number Detector (OPTIMIZED)
# -----------------------
class VehicleNumberDetector:
    def __init__(self, car_conf=0.25, plate_conf=0.35, use_gpu_ocr=False):
         self.device = torch.device("cuda" if torch.cuda.is_available() else "cpu")
         self.car_model = CAR_MODEL
         self.plate_model = PLATE_MODEL
         self.car_conf = car_conf
         self.plate_conf = plate_conf
         self.ocr = PaddleOCR(lang='en', use_angle_cls=True, use_gpu=use_gpu_ocr)
         # self.ocr = PaddleOCR(lang='en', use_angle_cls=True)
         self.allowed_classes = ["car", "bus", "truck", "tempo", "jeep", "van"]
        
         # ROI Configuration - adjustable margins
         self.roi_margin_ratio = 0.25  # 25% margin from each edge (50% center area)
    
    def enhance_image_for_dark_vehicles(self, image):
        """
        Multi-stage image enhancement for better dark vehicle detection
        """
        # Stage 1: CLAHE on L channel in LAB color space
        lab = cv2.cvtColor(image, cv2.COLOR_BGR2LAB)
        l, a, b = cv2.split(lab)
        
        clahe = cv2.createCLAHE(clipLimit=3.0, tileGridSize=(8, 8))
        l_enhanced = clahe.apply(l)
        
        lab_enhanced = cv2.merge([l_enhanced, a, b])
        enhanced = cv2.cvtColor(lab_enhanced, cv2.COLOR_LAB2BGR)
        
        # Stage 2: Gamma correction for dark regions
        gamma = 1.3
        inv_gamma = 1.0 / gamma
        table = np.array([((i / 255.0) ** inv_gamma) * 255 
                          for i in np.arange(0, 256)]).astype("uint8")
        enhanced = cv2.LUT(enhanced, table)
        
        # Stage 3: Adaptive brightness adjustment
        hsv = cv2.cvtColor(enhanced, cv2.COLOR_BGR2HSV)
        h, s, v = cv2.split(hsv)
        
        # Increase brightness for dark areas
        v_mean = np.mean(v)
        if v_mean < 100:  # Dark image
            v = cv2.add(v, int((100 - v_mean) * 0.5))
        
        hsv_enhanced = cv2.merge([h, s, v])
        final_enhanced = cv2.cvtColor(hsv_enhanced, cv2.COLOR_HSV2BGR)
        
        return final_enhanced

    def get_roi_bounds(self, image_width, image_height):
        """
        Calculate center ROI boundaries
        """
        margin_x = int(image_width * self.roi_margin_ratio)
        margin_y = int(image_height * self.roi_margin_ratio)
        
        roi_x1 = margin_x
        roi_y1 = margin_y
        roi_x2 = image_width - margin_x
        roi_y2 = image_height - margin_y
        
        return roi_x1, roi_y1, roi_x2, roi_y2

    def is_detection_in_roi(self, box_coords, roi_bounds):
        """
        Check if vehicle detection center is within ROI
        """
        x1, y1, x2, y2 = box_coords
        roi_x1, roi_y1, roi_x2, roi_y2 = roi_bounds
        
        # Calculate detection center
        center_x = (x1 + x2) / 2
        center_y = (y1 + y2) / 2
        
        # Check if center is within ROI
        in_roi = (roi_x1 <= center_x <= roi_x2 and roi_y1 <= center_y <= roi_y2)
        
        # Additional check: significant overlap with ROI (at least 40% of detection area)
        det_area = (x2 - x1) * (y2 - y1)
        
        # Calculate intersection with ROI
        intersect_x1 = max(x1, roi_x1)
        intersect_y1 = max(y1, roi_y1)
        intersect_x2 = min(x2, roi_x2)
        intersect_y2 = min(y2, roi_y2)
        
        if intersect_x2 > intersect_x1 and intersect_y2 > intersect_y1:
            intersect_area = (intersect_x2 - intersect_x1) * (intersect_y2 - intersect_y1)
            overlap_ratio = intersect_area / det_area if det_area > 0 else 0
            
            return in_roi or overlap_ratio > 0.4
        
        return in_roi

    def perform_ocr(self, image_array):
        try:
            if image_array is None or image_array.size == 0:
                return ""
            result = self.ocr.ocr(image_array)
            texts = []
            for line in result:
                if line:
                    for word in line:
                        if word and len(word) >= 2:
                            texts.append(word[1][0])
            return ' '.join(texts).strip().upper()
        except:
            return ""
        
        

            
            
    def detect_vehicles_batch(self, images, slot_numbers, save_debug=False):
        """
        Optimized batch vehicle detection with center ROI and dark vehicle enhancement
        """
        results = []
        
        # Process each image individually for better ROI control
        for i, image in enumerate(images):
            slot_number = slot_numbers[i]
            H, W, _ = image.shape
            
            # Calculate ROI bounds
            roi_bounds = self.get_roi_bounds(W, H)
            roi_x1, roi_y1, roi_x2, roi_y2 = roi_bounds
            roi_area = (roi_x2 - roi_x1) * (roi_y2 - roi_y1)
            
            status = 1  # Empty by default
            plate_text = "null"
            vehicle_detected = False
            best_detection = None
            best_conf = 0
            detection_source = "none"
            
            # Strategy 1: Detect on original image
            car_results_original = self.car_model([image], verbose=False, conf=self.car_conf)[0]
            
            if car_results_original and car_results_original.boxes is not None:
                for box in car_results_original.boxes:
                    conf = float(box.conf[0])
                    cls_id = int(box.cls[0])
                    cls_name = self.car_model.names[cls_id].lower()
                    
                    if cls_name not in self.allowed_classes:
                        continue
                    
                    x1, y1, x2, y2 = map(int, box.xyxy[0])
                    
                    # Check if detection is in ROI
                    if self.is_detection_in_roi((x1, y1, x2, y2), roi_bounds):
                        detection_area = (x2 - x1) * (y2 - y1)
                        coverage = detection_area / roi_area if roi_area > 0 else 0
                        
                        # More lenient coverage for ROI-based detection
                        if coverage > 0.12:  # Reduced from 0.20
                            if conf > best_conf:
                                best_conf = conf
                                best_detection = (x1, y1, x2, y2)
                                vehicle_detected = True
                                detection_source = "original"
            
            # Strategy 2: If no vehicle found, try enhanced image with lower confidence
            if not vehicle_detected:
                enhanced_image = self.enhance_image_for_dark_vehicles(image)
                car_results_enhanced = self.car_model(
                    [enhanced_image], 
                    verbose=False, 
                    conf=self.car_conf * 0.75  # 25% lower confidence for enhanced
                )[0]
                
                if car_results_enhanced and car_results_enhanced.boxes is not None:
                    for box in car_results_enhanced.boxes:
                        conf = float(box.conf[0])
                        cls_id = int(box.cls[0])
                        cls_name = self.car_model.names[cls_id].lower()
                        
                        if cls_name not in self.allowed_classes:
                            continue
                        
                        x1, y1, x2, y2 = map(int, box.xyxy[0])
                        
                        # Check if detection is in ROI
                        if self.is_detection_in_roi((x1, y1, x2, y2), roi_bounds):
                            detection_area = (x2 - x1) * (y2 - y1)
                            coverage = detection_area / roi_area if roi_area > 0 else 0
                            
                            if coverage > 0.12:
                                if conf > best_conf:
                                    best_conf = conf
                                    best_detection = (x1, y1, x2, y2)
                                    vehicle_detected = True
                                    detection_source = "enhanced"
            
            # If vehicle detected, update status and try to find plate
            if vehicle_detected:
                status = 2
                
                # Try plate detection on original image first
                plate_result = self.plate_model([image], verbose=False, conf=self.plate_conf)[0]
                
                if plate_result.boxes is not None and len(plate_result.boxes.xyxy) > 0:
                    # Find best plate within or near ROI
                    best_plate = None
                    best_plate_conf = 0
                    
                    for plate_box in plate_result.boxes:
                        plate_conf = float(plate_box.conf[0])
                        px1, py1, px2, py2 = map(int, plate_box.xyxy[0])
                        
                        plate_center_x = (px1 + px2) / 2
                        plate_center_y = (py1 + py2) / 2
                        
                        # Check if plate is within expanded ROI (allow some margin)
                        expanded_margin = 0.15  # 15% extra margin for plates
                        exp_x1 = int(W * expanded_margin)
                        exp_y1 = int(H * expanded_margin)
                        exp_x2 = W - exp_x1
                        exp_y2 = H - exp_y1
                        
                        if (exp_x1 <= plate_center_x <= exp_x2 and 
                            exp_y1 <= plate_center_y <= exp_y2):
                            if plate_conf > best_plate_conf:
                                best_plate_conf = plate_conf
                                best_plate = (px1, py1, px2, py2)
                    
                    # Perform OCR on best plate found
                    if best_plate:
                        try:
                            px1, py1, px2, py2 = best_plate
                            plate_crop = image[py1:py2, px1:px2]
                            
                            if plate_crop.size > 0:
                                plate_crop_resized = cv2.resize(plate_crop, (320, 75))
                                plate_text = self.perform_ocr(plate_crop_resized)
                        except Exception as e:
                            plate_text = "null"
            
            # Optional: Save debug images showing ROI
            if save_debug and vehicle_detected:
                debug_image = image.copy()
                cv2.rectangle(debug_image, (roi_x1, roi_y1), (roi_x2, roi_y2), (0, 255, 0), 2)
                if best_detection:
                    x1, y1, x2, y2 = best_detection
                    cv2.rectangle(debug_image, (x1, y1), (x2, y2), (0, 0, 255), 2)
                cv2.imwrite(f"debug_slot_{slot_number}.jpg", debug_image)
            
            results.append({
                "slot_number": slot_number,
                "status": status,
                "vehicle_number": plate_text,
               
                
            })
        # Fire async API call
        threading.Thread(
            target=lambda: asyncio.run(send_results_to_api(results)),
            daemon=True
         ).start()
        
        return results
    
detector = VehicleNumberDetector()


# -----------------------
# /process API (optimized)
# -----------------------
@app.route('/process-image', methods=['POST'])
def process_images_api():
    try:
        images = request.files.getlist('images')[:MAX_BATCH]

        if not images:
            return jsonify({"status": False, "message": "No images provided"}), 400

        batch_images = []
        batch_slots = []

        for img in images:
            filename = img.filename
            slot_id = os.path.splitext(filename)[0]

            if not slot_id.isdigit():
                continue

            file_bytes = np.frombuffer(img.read(), np.uint8)
            image = cv2.imdecode(file_bytes, cv2.IMREAD_COLOR)

            if image is None:
                continue

            resized = cv2.resize(image, (640, 600))
            batch_images.append(resized)
            batch_slots.append(int(slot_id))

        if not batch_images:
            return jsonify({"status": False, "message": "No valid images"}), 400

        # 🔒 GPU-safe inference
        if not GPU_LOCK.acquire(blocking=False):
            return jsonify({
                "status": False,
                "message": "GPU busy, retry later"
            }), 429

        try:
            result = detector.detect_vehicles_batch(
                batch_images,
                batch_slots,
                save_debug=False
            )
        finally:
            GPU_LOCK.release()

        return jsonify({
            "status": True,
            "processed": len(result),
            "data": result
        })

    except Exception as e:
        return jsonify({"status": False, "message": str(e)}), 500




# -----------------------
# Run Flask
# -----------------------
if __name__ == '__main__':
    log = logging.getLogger('werkzeug')
    log.disabled = True
    app.logger.disabled = True
    app.run(host='0.0.0.0', port=6000, debug=False)
