import os
import cv2
import torch
import json
import gc
from ultralytics import YOLO
from paddleocr import PaddleOCR
import sys
import time

class NumberPlateDetector:
    def __init__(self, model_path="best.pt"):
        self.device = 'cuda' if torch.cuda.is_available() else 'cpu'
        self.model = YOLO(model_path)
        self.model.to(self.device)
        self.ocr = PaddleOCR(use_angle_cls=True, lang='en', use_gpu=torch.cuda.is_available(), show_log=False)

    def perform_ocr(self, image_array):
        try:
            if image_array is None or image_array.size == 0:
                return ""

            result = self.ocr.ocr(image_array, cls=True)

            if not result or not isinstance(result, list):
                return ""

            texts = []
            for line in result:
                if line is None:
                    continue
                for word in line:
                    if word is None or len(word) < 2:
                        continue
                    texts.append(word[1][0])

            return ' '.join(texts).strip()

        except Exception as e:
            sys.stderr.write(f"[OCR Error] {e}\n")
            return ""

    def detect_number_plates_batch(self, images):
        results = self.model(images, verbose=False)
        plates_text = []

        for img, result in zip(images, results):
            plate_text = "null"

            if not result or result.boxes is None or len(result.boxes.xyxy) == 0:
                plates_text.append(plate_text)
                continue

            try:
                x1, y1, x2, y2 = map(int, result.boxes.xyxy[0])
                cropped = img[y1:y2, x1:x2]
                resized = cv2.resize(cropped, (320, 75))
                text = self.perform_ocr(resized)
                plate_text = text.upper() if text else plate_text
            except Exception as e:
                sys.stderr.write(f"[Crop Error] {e}\n")

            plates_text.append(plate_text)

        return plates_text


def process_all_images(folder_path, model_path, batch_size=50):
    detector = NumberPlateDetector(model_path)
    results_list = []

    all_files = sorted(
        [f for f in os.listdir(folder_path) if f.lower().endswith(('.jpg', '.jpeg', '.png'))],
        key=lambda x: int(os.path.splitext(x)[0])
    )

    images = []
    filenames = []

    for filename in all_files:
        image_path = os.path.join(folder_path, filename)
        image = cv2.imread(image_path)

        if image is None:
            sys.stderr.write(f"[Read Error] {filename}\n")
            results_list.append({
                "vehicle_number": "Image not loaded",
                "slot_number": os.path.splitext(filename)[0]
            })
            continue

        resized = cv2.resize(image, (640, 600))
        images.append(resized)
        filenames.append(os.path.splitext(filename)[0])

    for i in range(0, len(images), batch_size):
        batch_imgs = images[i:i+batch_size]
        batch_names = filenames[i:i+batch_size]

        plates = detector.detect_number_plates_batch(batch_imgs)

        results_list += [
            {"vehicle_number": plate, "slot_number": name}
            for name, plate in zip(batch_names, plates)
        ]

        # ✅ Memory cleanup after each batch
        del batch_imgs
        del batch_names
        del plates
        gc.collect()

        # Optional: clear GPU cache
        if torch.cuda.is_available():
            torch.cuda.empty_cache()

    print(json.dumps(results_list, indent=4))


if __name__ == '__main__':
    if len(sys.argv) < 3:
        print("Usage: python bulk_plate_detector.py <folder_path> <model_path> [batch_size]")
        sys.exit(1)

    folder = sys.argv[1]
    model = sys.argv[2]
    batch = int(sys.argv[3]) if len(sys.argv) > 3 else 40

    process_all_images(folder, model, batch)
