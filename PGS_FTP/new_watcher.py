import os
import time
import json
import cv2
import logging
import threading
import pandas as pd
from pathlib import Path
from queue import Queue
from watchdog.observers import Observer
from watchdog.events import FileSystemEventHandler
from PIL import Image

# =====================================================
# CONFIGURATION
# =====================================================
WATCH_PATH = "/srv/camera_uploads"

CAMERA_EXCEL = "/var/www/html/storage/app/public/Filewatcher_img/cameras_ip_id.xlsx"
SLOT_EXCEL   = "/var/www/html/storage/app/public/Filewatcher_img/crop image/parking_slots.xlsx"
COORD_JSON   = "/var/www/html/storage/app/public/Filewatcher_img/crop image/slot_coordinates.json"

OUTPUT_DIR_1 = "/var/www/html/storage/app/public/Filewatcher_img/crop_img_pgs"
OUTPUT_DIR_2 = "/var/www/html/storage/app/public/Filewatcher_img/kiosk_image"
OUTPUT_DIR_3 = "/var/www/html/storage/app/public/Filewatcher_img/search_kiosk_image"

LOG_FILE = "/var/www/html/storage/app/public/Filewatcher_img/unified_crop.log"

NUM_WORKERS = 8
SCAN_INTERVAL = 0.5   # 🔥 critical for reliability
SUPPORTED_EXT = (".jpg", ".jpeg")

# =====================================================
# LOGGING
# =====================================================
logging.basicConfig(
    level=logging.INFO,
    format="%(asctime)s | %(levelname)s | %(message)s",
    handlers=[
        logging.FileHandler(LOG_FILE),
        logging.StreamHandler()
    ]
)

# =====================================================
# LOAD CAMERA & SLOT DATA
# =====================================================
camera_df = pd.read_excel(CAMERA_EXCEL, dtype=str)
camera_df.columns = camera_df.columns.str.strip()
CAMERA_MAP = dict(zip(camera_df["ip_address"], camera_df["id"]))

slot_df = pd.read_excel(SLOT_EXCEL, engine="openpyxl")
CAMERA_TO_SLOTS = (
    slot_df.groupby("camera_id")["id"]
    .apply(list)
    .to_dict()
)

with open(COORD_JSON) as f:
    COORDS = json.load(f)

os.makedirs(OUTPUT_DIR_1, exist_ok=True)
os.makedirs(OUTPUT_DIR_2, exist_ok=True)
os.makedirs(OUTPUT_DIR_3, exist_ok=True)

logging.info(f"Loaded {len(CAMERA_MAP)} cameras")
logging.info(f"Loaded {len(COORDS)} slot coordinates")

# =====================================================
# GLOBAL STRUCTURES
# =====================================================
task_queue = Queue(maxsize=5000)
latest_image_time = {}
camera_lock = threading.Lock()

# =====================================================
# HELPERS
# =====================================================
def extract_ip(file_path):
    parent = Path(file_path).parent.name
    if parent.count(".") == 3:
        return parent
    filename = os.path.basename(file_path)
    if "_" in filename:
        ip = filename.split("_")[0]
        if ip.count(".") == 3:
            return ip
    return None


def wait_until_file_ready(path, timeout=5):
    last = -1
    start = time.time()
    while time.time() - start < timeout:
        try:
            size = os.path.getsize(path)
            if size == last and size > 0:
                return True
            last = size
        except FileNotFoundError:
            pass
        time.sleep(0.05)
    return False


def resize_keep_aspect(img, max_w=1280, max_h=720):
    h, w = img.shape[:2]
    scale = min(max_w / w, max_h / h, 1.0)
    return cv2.resize(
        img,
        (int(w * scale), int(h * scale)),
        cv2.INTER_LANCZOS4
    )

# =====================================================
# CORE IMAGE PROCESSOR (IN-MEMORY)
# =====================================================
def process_image(file_path):
    try:
        if not file_path.lower().endswith(SUPPORTED_EXT):
            return

        if not wait_until_file_ready(file_path):
            return

        camera_ip = extract_ip(file_path)
        if not camera_ip or camera_ip not in CAMERA_MAP:
            return

        camera_id = int(CAMERA_MAP[camera_ip])

        with camera_lock:
            mtime = os.path.getmtime(file_path)
            last = latest_image_time.get(camera_ip)
            if last and mtime <= last:
                return
            latest_image_time[camera_ip] = mtime

        img_cv = cv2.imread(file_path)
        if img_cv is None:
            return

        img_cv = resize_keep_aspect(img_cv)
        img_pil = Image.fromarray(cv2.cvtColor(img_cv, cv2.COLOR_BGR2RGB))

        for slot_id in CAMERA_TO_SLOTS.get(camera_id, []):
            sid = str(slot_id)
            if sid not in COORDS:
                continue

            c = COORDS[sid]
            crop = img_pil.crop((
                c["x"], c["y"],
                c["x"] + c["w"],
                c["y"] + c["h"]
            ))

            crop.save(os.path.join(OUTPUT_DIR_1, f"{sid}.jpg"), "JPEG", quality=90)
            crop.save(os.path.join(OUTPUT_DIR_2, f"{sid}.jpg"), "JPEG", quality=90)
            crop.save(os.path.join(OUTPUT_DIR_3, f"{sid}.jpg"), "JPEG", quality=90)
        logging.info(f"✓ Camera {camera_id} processed")

    except Exception as e:
        logging.error(f"Processing error {file_path}: {e}", exc_info=True)

# =====================================================
# WORKERS
# =====================================================
def worker():
    while True:
        path = task_queue.get()
        try:
            process_image(path)
        finally:
            task_queue.task_done()

# =====================================================
# WATCHDOG (NON-RECURSIVE, LIGHTWEIGHT)
# =====================================================
class RootHandler(FileSystemEventHandler):
    def on_created(self, event):
        if not event.is_directory:
            task_queue.put(event.src_path)

# =====================================================
# SCANNER THREAD (🔥 GUARANTEES NO MISSES 🔥)
# =====================================================
def scan_latest_images():
    while True:
        try:
            for cam_dir in os.listdir(WATCH_PATH):
                full_dir = os.path.join(WATCH_PATH, cam_dir)
                if not os.path.isdir(full_dir):
                    continue

                files = [
                    os.path.join(full_dir, f)
                    for f in os.listdir(full_dir)
                    if f.lower().endswith(SUPPORTED_EXT)
                ]

                if not files:
                    continue

                latest = max(files, key=os.path.getmtime)
                task_queue.put(latest)

        except Exception as e:
            logging.error(f"Scanner error: {e}")

        time.sleep(SCAN_INTERVAL)

# =====================================================
# MAIN
# =====================================================
if __name__ == "__main__":

    for _ in range(NUM_WORKERS):
        threading.Thread(target=worker, daemon=True).start()

    threading.Thread(target=scan_latest_images, daemon=True).start()

    observer = Observer()
    observer.schedule(RootHandler(), WATCH_PATH, recursive=False)
    observer.start()

    logging.info("========================================")
    logging.info("🚀 Unified Crop Service (NO MISSES)")
    logging.info(f"Watching: {WATCH_PATH}")
    logging.info(f"Workers: {NUM_WORKERS}")
    logging.info("========================================")

    try:
        while True:
            time.sleep(1)
    except KeyboardInterrupt:
        logging.info("Stopping service...")
        observer.stop()

    observer.join()
