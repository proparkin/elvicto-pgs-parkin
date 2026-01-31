import os
import sys
import cv2
import json
import math
import torch
import logging
import gc
import numpy as np
from ultralytics import YOLO
from skimage.metrics import structural_similarity as ssim 

# -----------------------
# Logging Setup
# -----------------------
logging.basicConfig(level=logging.INFO, format='[%(levelname)s] %(message)s')

# -----------------------
# ✅ Static YOLO Models (load once globally)
# -----------------------
CAR_MODEL_PATH = "/root/yolo11n.pt"

CAR_MODEL = YOLO(CAR_MODEL_PATH)


# -----------------------
# 🔹 Helper: Check Slot Image Changed or Not
# -----------------------
def is_slot_changed(prev_path, curr_path, threshold=0.78):
    """Compare two images and return True if changed."""
    if not os.path.exists(prev_path):
        return True  

    prev = cv2.imread(prev_path)
    curr = cv2.imread(curr_path)

    if prev is None or curr is None:
        return True

    if prev.shape != curr.shape:
        return True

    gray_prev = cv2.cvtColor(prev, cv2.COLOR_BGR2GRAY)
    gray_curr = cv2.cvtColor(curr, cv2.COLOR_BGR2GRAY)

    score, _ = ssim(gray_prev, gray_curr, full=True)
    return score < threshold  


# -----------------------
# 🚗 Vehicle Detector Class (OCR Removed)
# -----------------------
class VehicleNumberDetector:
    def __init__(self, car_conf=0.20):
        self.device = torch.device("cuda" if torch.cuda.is_available() else "cpu")
        self.car_model = CAR_MODEL
        self.car_conf = car_conf
        self.allowed_classes = ["car", "bus", "truck", "tempo", "jeep", "van"]

    def process_image(self, image, slot_number):
        """Detect vehicle presence only (no plate detection/OCR)"""
        status = 1

        H, W, _ = image.shape
        slot_area = W * H

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
                    break

        return {
            "slot_number": slot_number,
            "status": status,
            "vehicle_number": None,
        }


# -----------------------
# 📁 Process Folder with Change Detection
# -----------------------
def process_folder(current_folder, output_path="output.json", previous_folder="/root/previous_slot_images", batch_size=20):
    detector = VehicleNumberDetector()
    results = []

    all_files = sorted(
        [f for f in os.listdir(current_folder) if f.lower().endswith(('.jpg', '.jpeg', '.png'))],
        key=lambda x: int(os.path.splitext(x)[0])
    )

    total_files = len(all_files)
    logging.info(f"Total Images Found: {total_files}")

    num_batches = math.ceil(total_files / batch_size)

    for b in range(num_batches):
        batch_files = all_files[b * batch_size:(b + 1) * batch_size]

        for filename in batch_files:
            curr_path = os.path.join(current_folder, filename)
            prev_path = os.path.join(previous_folder, filename)

            # ✅ Check if slot image changed
            if not is_slot_changed(prev_path, curr_path, threshold=0.85):
                logging.info(f"Slot {filename} unchanged — skipping detection.")
                continue

            image = cv2.imread(curr_path)
            if image is None:
                logging.warning(f"Image Not Readable: {filename}")
                continue

            resized = cv2.resize(image, (640, 600))
            slot_number = int(os.path.splitext(filename)[0])

            result = detector.process_image(resized, slot_number)
            results.append(result)

            # ✅ Save current image as previous for next run
            os.makedirs(previous_folder, exist_ok=True)
            cv2.imwrite(prev_path, image)

        gc.collect()
        if torch.cuda.is_available():
            torch.cuda.empty_cache()

    with open(output_path, "w") as f:
        json.dump(results, f, indent=4)

    logging.info(f"Detection complete. Output saved to {output_path}")

    gc.collect()


# -----------------------
# 🚀 Script Entry
# -----------------------
if __name__ == '__main__':
    if len(sys.argv) < 2:
        print("Usage: python better_vehicle_ocr.py <current_folder> [output_path]")
        sys.exit(1)

    current_folder = sys.argv[1]
    output_path = sys.argv[2] if len(sys.argv) >= 3 else "output.json"

    process_folder(current_folder, output_path)

    gc.collect()
    if torch.cuda.is_available():
        torch.cuda.empty_cache()
        torch.cuda.ipc_collect()

    os._exit(0)