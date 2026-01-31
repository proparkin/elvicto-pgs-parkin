# =========================================================
# CUDA SAFETY (MUST BE AT TOP)
# =========================================================
import torch
torch.backends.cudnn.enabled = True
torch.backends.cudnn.benchmark = False
torch.backends.cudnn.deterministic = True

# =========================================================
# IMPORTS
# =========================================================
import os
import re
import cv2
import numpy as np
import requests
from flask import Flask, request, jsonify
from ultralytics import YOLO
from paddleocr import PaddleOCR

# =========================================================
# CONFIG
# =========================================================
MODEL_PATH = "best.pt"
IMG_SIZE = 640
CONF_THRES = 0.4

DEVICE = "cuda" if torch.cuda.is_available() else "cpu"

# =========================================================
# TARGET API CONFIG
# =========================================================
UPDATE_API_URL = "http://10.0.1.100/api/update-parking-vsk"
UPDATE_API_TIMEOUT = 5

# =========================================================
# SAFETY CHECKS
# =========================================================
if not os.path.isfile(MODEL_PATH):
    raise RuntimeError(f"YOLO model not found: {MODEL_PATH}")

print(f"🚀 YOLO device: {DEVICE}")
print("🧠 OCR device: CPU (stable mode)")
print("🎯 Enhanced OCR preprocessing v3.0")

# =========================================================
# LOAD YOLO MODEL (SAFE MODE)
# =========================================================
plate_detector = YOLO(MODEL_PATH)
plate_detector.to(DEVICE)

# =========================================================
# LOAD OCR (CPU ONLY - OPTIMIZED)
# =========================================================
ocr = PaddleOCR(
    use_angle_cls=True,
    lang="en",
    use_gpu=False,
    show_log=False,
    det_db_thresh=0.3,
    det_db_box_thresh=0.5,
    rec_batch_num=6
)

# =========================================================
# FLASK APP
# =========================================================
app = Flask(__name__)

# =========================================================
# CHARACTER CONFUSION CORRECTION
# =========================================================
def fix_common_ocr_mistakes(text, position=None):
    """Fix common OCR character confusions based on position"""
    if not text:
        return text
    
    text = list(text)
    
    # First 2 positions: Must be LETTERS (state code like KL, HR)
    if position == 'state' or (position is None and len(text) >= 2):
        for i in range(min(2, len(text))):
            if text[i].isdigit():
                replacements = {'0': 'O', '1': 'I', '5': 'S', '8': 'B', '6': 'G'}
                text[i] = replacements.get(text[i], text[i])
    
    # Positions 2-4: District code (digits, then optional letter)
    if position == 'district' or (position is None and len(text) >= 4):
        for i in range(2, min(4, len(text))):
            if text[i].isalpha() and i < 4:
                replacements = {'O': '0', 'I': '1', 'L': '1', 'S': '5', 'B': '8', 'G': '6', 'Z': '2'}
                text[i] = replacements.get(text[i], text[i])
    
    # Last 4 positions: Must be DIGITS
    if position == 'serial' or (position is None and len(text) >= 4):
        for i in range(max(0, len(text) - 4), len(text)):
            if text[i].isalpha():
                replacements = {'O': '0', 'I': '1', 'L': '1', 'S': '5', 'B': '8', 'G': '6', 'Z': '2'}
                text[i] = replacements.get(text[i], text[i])
    
    return ''.join(text)

# =========================================================
# PLATE VALIDATION & CLEANING
# =========================================================
PLATE_PATTERNS = [
    re.compile(r"^[A-Z]{2}\d{1,2}[A-Z]{1,2}\d{4}$"),  # Standard Indian plates
]

def clean_plate(text):
    """Enhanced plate cleaning with pattern matching"""
    if not text:
        return None
    
    # Remove all non-alphanumeric and convert to uppercase
    text = re.sub(r"[^A-Z0-9]", "", text.upper())
    
    # Must be between 8-11 characters
    if len(text) < 8 or len(text) > 11:
        return None
    
    # Apply OCR mistake corrections
    text = fix_common_ocr_mistakes(text)
    
    # Check against known patterns
    for pattern in PLATE_PATTERNS:
        if pattern.match(text):
            return text
    
    # Try to extract valid pattern from string
    for pattern in PLATE_PATTERNS:
        match = pattern.search(text)
        if match:
            return match.group(0)
    
    # Fallback: If structure looks right (2 letters, some digits), return it
    if len(text) >= 9 and text[:2].isalpha() and text[-4:].isdigit():
        return text
    
    return None

# =========================================================
# ENHANCED PREPROCESSING
# =========================================================
def preprocess_plate_crop(crop):
    """Apply advanced preprocessing to plate crop"""
    
    # Convert to grayscale
    gray = cv2.cvtColor(crop, cv2.COLOR_BGR2GRAY)
    
    # Resize to standard height for better OCR
    h, w = gray.shape
    if h < 60:
        scale = 80 / h
        new_w = int(w * scale)
        gray = cv2.resize(gray, (new_w, 80), interpolation=cv2.INTER_CUBIC)
    
    # Apply CLAHE for better contrast
    clahe = cv2.createCLAHE(clipLimit=3.0, tileGridSize=(8, 8))
    enhanced = clahe.apply(gray)
    
    # Bilateral filter to reduce noise while keeping edges
    denoised = cv2.bilateralFilter(enhanced, 9, 75, 75)
    
    # Sharpening
    kernel_sharpen = np.array([[-1, -1, -1],
                               [-1,  9, -1],
                               [-1, -1, -1]])
    sharpened = cv2.filter2D(denoised, -1, kernel_sharpen)
    
    # Convert back to BGR for PaddleOCR
    return cv2.cvtColor(sharpened, cv2.COLOR_GRAY2BGR)

# =========================================================
# MULTI-METHOD OCR EXTRACTION
# =========================================================
def extract_plate_number(crop):
    """Extract plate number using multiple preprocessing methods"""
    
    if crop is None or crop.size == 0:
        return None
    
    if crop.shape[0] < 20 or crop.shape[1] < 60:
        return None
    
    candidates = []
    
    # Method 1: Original crop
    try:
        result = ocr.ocr(crop, cls=True)
        if result and result[0]:
            text = "".join([line[1][0] for line in result[0]])
            conf = max([line[1][1] for line in result[0]])
            cleaned = clean_plate(text)
            if cleaned:
                candidates.append((cleaned, conf))
    except Exception as e:
        print(f"OCR Method 1 error: {e}")
    
    # Method 2: Enhanced preprocessing
    try:
        processed = preprocess_plate_crop(crop)
        result = ocr.ocr(processed, cls=True)
        if result and result[0]:
            text = "".join([line[1][0] for line in result[0]])
            conf = max([line[1][1] for line in result[0]])
            cleaned = clean_plate(text)
            if cleaned:
                candidates.append((cleaned, conf))
    except Exception as e:
        print(f"OCR Method 2 error: {e}")
    
    # Method 3: Adaptive thresholding
    try:
        gray = cv2.cvtColor(crop, cv2.COLOR_BGR2GRAY)
        
        # Resize if too small
        h, w = gray.shape
        if h < 60:
            scale = 80 / h
            gray = cv2.resize(gray, (int(w * scale), 80), interpolation=cv2.INTER_CUBIC)
        
        binary = cv2.adaptiveThreshold(
            gray, 255, cv2.ADAPTIVE_THRESH_GAUSSIAN_C, 
            cv2.THRESH_BINARY, 11, 2
        )
        binary_bgr = cv2.cvtColor(binary, cv2.COLOR_GRAY2BGR)
        
        result = ocr.ocr(binary_bgr, cls=True)
        if result and result[0]:
            text = "".join([line[1][0] for line in result[0]])
            conf = max([line[1][1] for line in result[0]])
            cleaned = clean_plate(text)
            if cleaned:
                candidates.append((cleaned, conf))
    except Exception as e:
        print(f"OCR Method 3 error: {e}")
    
    # Return highest confidence result
    if candidates:
        # Remove duplicates and sort by confidence
        unique_candidates = {}
        for plate, conf in candidates:
            if plate not in unique_candidates or conf > unique_candidates[plate]:
                unique_candidates[plate] = conf
        
        best = max(unique_candidates.items(), key=lambda x: x[1])
        print(f"✓ Detected: {best[0]} (confidence: {best[1]:.2f})")
        return best[0]
    
    print("✗ No valid plate detected")
    return None

# =========================================================
# SEND RESULT TO PARKING API
# =========================================================
def send_result_to_parking_api(payload):
    try:
        resp = requests.post(
            UPDATE_API_URL,
            json=payload,
            timeout=UPDATE_API_TIMEOUT
        )
        return resp.status_code, resp.text
    except Exception as e:
        return None, str(e)

# =========================================================
# API ENDPOINT
# =========================================================
@app.route("/process-images", methods=["POST"])
def process_images():
    try:
        files = request.files.getlist("vehicle_image")
        if not files:
            return jsonify({"status": False, "error": "No images"}), 400

        images, filenames = [], []

        for f in files:
            try:
                buf = np.frombuffer(f.read(), np.uint8)
                img = cv2.imdecode(buf, cv2.IMREAD_COLOR)
                if img is not None:
                    images.append(img)
                    filenames.append(f.filename)
            except Exception as e:
                print(f"Error reading {f.filename}: {e}")
                continue

        if not images:
            return jsonify({"status": False, "error": "Invalid images"}), 400

        # YOLO BATCH INFERENCE
        results = plate_detector.predict(
            images,
            imgsz=IMG_SIZE,
            conf=CONF_THRES,
            device=DEVICE,
            half=False,
            stream=False,
            verbose=False
        )

        response = []

        for idx, r in enumerate(results):
            plate_number = None
            img = images[idx]
            
            print(f"\n📷 Processing: {filenames[idx]}")

            if r.boxes is not None and len(r.boxes) > 0:
                boxes = r.boxes
                
                # Get best detection
                best_idx = boxes.conf.argmax()
                x1, y1, x2, y2 = boxes.xyxy[best_idx].int().tolist()
                
                h, w = img.shape[:2]

                # Add padding to capture full plate
                pad = 10
                x1 = max(0, x1 - pad)
                y1 = max(0, y1 - pad)
                x2 = min(w, x2 + pad)
                y2 = min(h, y2 + pad)

                crop = img[y1:y2, x1:x2]
                
                if crop is not None and crop.size > 0:
                    plate_number = extract_plate_number(crop)

            response.append({
                "filename": os.path.splitext(filenames[idx])[0],
                "number": plate_number
            })

        # Forward to parking API
        payload = {
            "status": True,
            "results": response
        }

        api_status, api_response = send_result_to_parking_api(payload)
        print(f"\n➡ Sent to parking API: {api_status}")

        return jsonify({
            "status": True,
            "results": response,
            "forwarded_to_parking_api": api_status == 200
        }), 200

    except Exception as e:
        print(f"Error in process_images: {str(e)}")
        return jsonify({
            "status": False,
            "error": str(e)
        }), 500

# =========================================================
# HEALTH CHECK
# =========================================================
@app.route("/health", methods=["GET"])
def health_check():
    return jsonify({"status": "ok", "device": DEVICE}), 200

# =========================================================
# RUN SERVER
# =========================================================
if __name__ == "__main__":
    app.run(
        host="0.0.0.0",
        port=8080,
        debug=False,
        threaded=True
    )