from flask import Flask, request, jsonify
import os, json, cv2, torch, gc, socket
from concurrent.futures import ThreadPoolExecutor, as_completed
from ultralytics import YOLO
from paddleocr import PaddleOCR
from skimage.metrics import structural_similarity as ssim
import warnings, logging
import numpy as np

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
CAR_MODEL_PATH = "/root/yolo11n.pt"
PLATE_MODEL_PATH = "/root/best.pt"

CAR_MODEL = YOLO(CAR_MODEL_PATH)
PLATE_MODEL = YOLO(PLATE_MODEL_PATH)

# -----------------------
# Helper Functions
# -----------------------
def is_slot_changed(prev_path, curr_path, threshold=0.85):
    if not os.path.exists(prev_path):
        return True
    prev = cv2.imread(prev_path)
    curr = cv2.imread(curr_path)
    if prev is None or curr is None or prev.shape != curr.shape:
        return True
    gray_prev = cv2.cvtColor(prev, cv2.COLOR_BGR2GRAY)
    gray_curr = cv2.cvtColor(curr, cv2.COLOR_BGR2GRAY)
    score, _ = ssim(gray_prev, gray_curr, full=True)
    return score < threshold


# -----------------------
# Vehicle Number Detector
# -----------------------
class VehicleNumberDetector:
    def __init__(self, car_conf=0.25, plate_conf=0.35, use_gpu_ocr=False):
        self.device = torch.device("cuda" if torch.cuda.is_available() else "cpu")
        self.car_model = CAR_MODEL
        self.plate_model = PLATE_MODEL
        self.car_conf = car_conf
        self.plate_conf = plate_conf
        self.ocr = PaddleOCR(use_angle_cls=True, lang='en', use_gpu=use_gpu_ocr, show_log=False)
        self.allowed_classes = ["car", "bus", "truck", "tempo", "jeep", "van"]

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

    def detect_vehicles_batch(self, images, slot_numbers):
        results = []
        car_results = self.car_model(images, verbose=False, conf=self.car_conf)
        for i, car_result in enumerate(car_results):
            status = 1
            plate_text = "null"
            image = images[i]
            slot_number = slot_numbers[i]
            H, W, _ = image.shape
            slot_area = W * H

            if car_result and car_result.boxes is not None:
                for box in car_result.boxes:
                    conf = float(box.conf[0])
                    cls_id = int(box.cls[0])
                    cls_name = self.car_model.names[cls_id].lower()
                    if cls_name not in self.allowed_classes:
                        continue

                    x1, y1, x2, y2 = map(int, box.xyxy[0])
                    w, h = x2 - x1, y2 - y1
                    coverage = (w * h) / slot_area if slot_area > 0 else 0

                    if conf > self.car_conf and coverage > 0.20:
                        status = 2
                        plate_result = self.plate_model([image], verbose=False, conf=self.plate_conf)[0]
                        if plate_result.boxes is not None and len(plate_result.boxes.xyxy) > 0:
                            try:
                                best_idx = plate_result.boxes.conf.argmax().item()
                                px1, py1, px2, py2 = map(int, plate_result.boxes.xyxy[best_idx])
                                plate_crop = image[py1:py2, px1:px2]
                                plate_crop_resized = cv2.resize(plate_crop, (320, 75))
                                plate_text = self.perform_ocr(plate_crop_resized)
                            except:
                                plate_text = "null"
                        break

            results.append({
                "slot_number": slot_number,
                "status": status,
                "vehicle_number": plate_text
            })
        return results


# -----------------------
# WiFi Lamp Controller
# -----------------------
UDP_PORT = 38899

def send_wiz_command(lamp):
    ip = lamp.get("ip_address")
    status = lamp.get("status")

    if not ip:
        return {"error": "Missing IP address"}

    if status == 1:
        color = {"r": 0, "g": 255, "b": 0}  # Green
    elif status == 2:
        color = {"r": 255, "g": 0, "b": 0}  # Red
    else:
        color = {"r": 255, "g": 255, "b": 255}  # White

    payload = {
        "method": "setPilot",
        "params": {"state": True, "dimming": 100, **color}
    }

    message = json.dumps(payload).encode('utf-8')
    sock = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
    sock.settimeout(3)
    try:
        sock.sendto(message, (ip, UDP_PORT))
        data, _ = sock.recvfrom(1024)
        return {"ip": ip, "response": json.loads(data.decode('utf-8'))}
    except socket.timeout:
        return {"ip": ip, "error": "Timeout"}
    except Exception as e:
        return {"ip": ip, "error": str(e)}
    finally:
        sock.close()


# -----------------------
# /update-lamps API
# -----------------------
@app.route('/update-lamps', methods=['POST'])
def update_lamps():
    try:
        data = request.get_json(force=True)
        lamp_data = data.get("lamps", [])
        if not lamp_data:
            return jsonify({"status": False, "message": "No lamp data provided"}), 400

        results = []
        with ThreadPoolExecutor(max_workers=50) as executor:
            futures = [executor.submit(send_wiz_command, lamp) for lamp in lamp_data]
            for future in as_completed(futures):
                try:
                    result = future.result()
                    results.append(result)
                except Exception as e:
                    results.append({"error": str(e)})

        # ✅ Detailed structured response
        response = {
            "status": True,
            "message": "Lamps updated successfully",
            "total_lamps_received": len(lamp_data),
            "total_lamps_processed": len(results),
            "data": results
        }

        print(json.dumps(response, indent=2))  # helpful for debug logs
        return jsonify(response), 200

    except Exception as e:
        return jsonify({"status": False, "message": str(e)}), 500

# -----------------------
# /crop-slots API (new)
# -----------------------
@app.route('/crop-slots', methods=['POST'])
def crop_slots_api():
    try:
        data = request.get_json(force=True)
        camera_batches = data.get("batches", [])
        coordinates_path = data.get("coordinates_path", "/root/slot_coordinates.json")

        if not os.path.exists(coordinates_path):
            return jsonify({"status": False, "message": "Slot coordinate file missing"}), 400

        with open(coordinates_path, "r") as f:
            slot_coordinates = json.load(f)

        if not camera_batches:
            return jsonify({"status": False, "message": "No camera batch provided"}), 400

        def crop_camera_slots(camera_data):
            camera_id = camera_data["camera_id"]
            image_path = camera_data["image_path"]
            slot_ids = camera_data["slots"]
            output_folder = camera_data["output_folder"]

            if not os.path.exists(image_path):
                return {"camera_id": camera_id, "error": "Image not found"}

            img = cv2.imread(image_path)
            if img is None:
                return {"camera_id": camera_id, "error": "Failed to load image"}

            os.makedirs(output_folder, exist_ok=True)

            for slot_id in slot_ids:
                coords = slot_coordinates.get(str(slot_id)) or slot_coordinates.get(slot_id)
                if not coords:
                    continue

                x, y, w, h = coords["x"], coords["y"], coords["w"], coords["h"]
                crop = img[y:y+h, x:x+w]
                save_path = os.path.join(output_folder, f"{slot_id}.jpg")
                cv2.imwrite(save_path, crop, [int(cv2.IMWRITE_JPEG_QUALITY), 85])

            return {"camera_id": camera_id, "status": "done"}

        # Use ThreadPoolExecutor for parallel cropping
        results = []
        with ThreadPoolExecutor(max_workers=16) as executor:
            futures = [executor.submit(crop_camera_slots, cam) for cam in camera_batches]
            for f in as_completed(futures):
                results.append(f.result())

        return jsonify({
            "status": True,
            "message": "Cropping completed",
            "total_cameras": len(results),
            "results": results
        })

    except Exception as e:
        return jsonify({"status": False, "message": str(e)}), 500



# -----------------------
# /process API (existing)
# -----------------------
@app.route('/process', methods=['POST'])
def process_folder_api():
    try:
        data = request.get_json(force=True)
        current_folder = data.get("current_folder")
        previous_folder = data.get("previous_folder", "/root/previous_slot_images")

        if not current_folder or not os.path.exists(current_folder):
            return jsonify({"status": False, "message": "Invalid folder path"}), 400

        detector = VehicleNumberDetector(use_gpu_ocr=True)
        all_files = sorted(
            [f for f in os.listdir(current_folder) if f.lower().endswith(('.jpg', '.jpeg', '.png'))],
            key=lambda x: int(os.path.splitext(x)[0])
        )

        def load_and_filter(filename):
            curr_path = os.path.join(current_folder, filename)
            prev_path = os.path.join(previous_folder, filename)
            if not is_slot_changed(prev_path, curr_path):
                return None
            image = cv2.imread(curr_path)
            if image is None:
                return None
            resized = cv2.resize(image, (640, 600))
            return (resized, int(os.path.splitext(filename)[0]), curr_path, prev_path)

        with ThreadPoolExecutor(max_workers=12) as executor:
            image_tasks = list(executor.map(load_and_filter, all_files))

        image_data = [x for x in image_tasks if x is not None]
        if not image_data:
            return jsonify({
                "status": True,
                "message": "No slot changes detected",
                "total_slots_processed": 0,
                "data": []
            })

        results = []
        batch_size = 16
        for i in range(0, len(image_data), batch_size):
            batch = image_data[i:i + batch_size]
            images = [x[0] for x in batch]
            slots = [x[1] for x in batch]
            batch_results = detector.detect_vehicles_batch(images, slots)
            results.extend(batch_results)

            for _, _, curr_path, prev_path in batch:
                os.makedirs(previous_folder, exist_ok=True)
                cv2.imwrite(prev_path, cv2.imread(curr_path))

            gc.collect()
            if torch.cuda.is_available():
                torch.cuda.empty_cache()

        return jsonify({
            "status": True,
            "message": "Processed successfully",
            "total_slots_processed": len(results),
            "data": results
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
