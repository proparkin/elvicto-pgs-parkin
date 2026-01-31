import os
import sys
import cv2
import json
import math
import torch
import logging
import gc
from ultralytics import YOLO
from paddleocr import PaddleOCR

# -----------------------
# Logging Setup
# -----------------------
logging.basicConfig(level=logging.INFO, format='[%(levelname)s] %(message)s')

# -----------------------
# ✅ Static YOLO Models (load once globally)
# -----------------------
CAR_MODEL_PATH = "/root/yolo11n.pt"
PLATE_MODEL_PATH = "/root/best.pt"

CAR_MODEL = YOLO(CAR_MODEL_PATH)
PLATE_MODEL = YOLO(PLATE_MODEL_PATH)


class VehicleNumberDetector:
    def __init__(self, car_conf=0.20, plate_conf=0.3, use_gpu_ocr=False):
        self.device = torch.device("cuda" if torch.cuda.is_available() else "cpu")

        # Use global preloaded models
        self.car_model = CAR_MODEL
        self.plate_model = PLATE_MODEL

        self.car_conf = car_conf
        self.plate_conf = plate_conf

        # PaddleOCR init
        self.ocr = PaddleOCR(
            use_angle_cls=True,
            lang='en',
            use_gpu=use_gpu_ocr,
            show_log=False
        )

        # Allowed vehicle types
        self.allowed_classes = ["car", "bus", "truck", "tempo", "jeep", "van"]

    def perform_ocr(self, image_array):
        """Run OCR on cropped plate image"""
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
        except Exception as e:
            logging.error(f"OCR Error: {e}")
            return ""

    def process_image(self, image, slot_number):
        """Detect vehicle + number plate in a single image"""
        status = 1
        plate_text = "null"

        H, W, _ = image.shape
        slot_area = W * H

        # Vehicle Detection
        car_result = self.car_model([image], verbose=False, conf=self.car_conf)[0]

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

                    # Plate Detection
                    plate_result = self.plate_model([image], verbose=False, conf=self.plate_conf)[0]
                    if plate_result.boxes is not None and len(plate_result.boxes.xyxy) > 0:
                        try:
                            best_idx = plate_result.boxes.conf.argmax().item()
                            px1, py1, px2, py2 = map(int, plate_result.boxes.xyxy[best_idx])
                            plate_crop = image[py1:py2, px1:px2]
                            plate_crop_resized = cv2.resize(plate_crop, (320, 75))
                            plate_text = self.perform_ocr(plate_crop_resized)
                        except Exception as e:
                            logging.error(f"Plate Crop Error: {e}")
                    break

        return {
            "slot_number": slot_number,
            "status": status,
            "vehicle_number": plate_text
        }


def process_folder(folder_path, output_path="output.json", batch_size=40):
    """Process all images in a folder"""
    detector = VehicleNumberDetector(use_gpu_ocr=True)

    results = []

    all_files = sorted(
        [f for f in os.listdir(folder_path) if f.lower().endswith(('.jpg', '.jpeg', '.png'))],
        key=lambda x: int(os.path.splitext(x)[0])
    )

    total_files = len(all_files)
    logging.info(f"Total Images Found: {total_files}")

    num_batches = math.ceil(total_files / batch_size)

    for b in range(num_batches):
        batch_files = all_files[b*batch_size:(b+1)*batch_size]

        for filename in batch_files:
            image_path = os.path.join(folder_path, filename)
            image = cv2.imread(image_path)
            if image is None:
                logging.warning(f"Image Not Readable: {filename}")
                continue

            resized = cv2.resize(image, (640, 600))
            slot_number = int(os.path.splitext(filename)[0])

            result = detector.process_image(resized, slot_number)
            results.append(result)

        gc.collect()
        if torch.cuda.is_available():
            torch.cuda.empty_cache()

    with open(output_path, "w") as f:
        json.dump(results, f, indent=4)

    logging.info(f"Detection complete. Output saved to {output_path}")

    del detector.ocr 
    gc.collect()


if __name__ == '__main__':
    if len(sys.argv) < 2:
        print("Usage: python better_vehicle_ocr.py <folder_path> [output_path]")
        sys.exit(1)

    folder_path = sys.argv[1]
    output_path = sys.argv[2] if len(sys.argv) >= 3 else "output.json"

    process_folder(folder_path, output_path)

    gc.collect()
    if torch.cuda.is_available():
        torch.cuda.empty_cache()
        torch.cuda.ipc_collect()
    os._exit(0)
