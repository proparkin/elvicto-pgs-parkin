import subprocess
import concurrent.futures
import os
import sys
import json
from datetime import datetime
from PIL import Image
import imagehash
import shutil

# -------------------------------
# Compare old & new image
# -------------------------------
def is_image_different(old_path, new_path, threshold=6):
    """दो images compare करता है और बताता है कि different हैं या नहीं"""
    if not os.path.exists(old_path) or not os.path.exists(new_path):
        return True
    try:
        old_hash = imagehash.average_hash(Image.open(old_path))
        new_hash = imagehash.average_hash(Image.open(new_path))
        diff = abs(old_hash - new_hash)
        return diff > threshold
    except Exception as e:
        print(f"Compare error: {e}")
        return True

# -------------------------------
# Get credentials
# -------------------------------
def get_credentials(camera):
    if camera["id"] <= 803:
        return "admin", "Elvicto@123"
    else:
        return "admin", "Parkin@321"

# -------------------------------
# Capture single camera
# -------------------------------
def capture_image(camera):
    """एक कैमरा की image capture और process करता है"""
    username, password = get_credentials(camera)

    base_dir = "/var/www/html/storage/app/public"
    output_path = f"{base_dir}/camera_images/camera_{camera['id']}.jpg"
    temp_path = f"{base_dir}/camera_images_temp/temp_camera_{camera['id']}.jpg"
    current_path = f"{current_dir}/camera_{camera['id']}.jpg"

    url = f"rtsp://{username}:{password}@{camera['ip']}/cam/realmonitor?channel=1&subtype=0"

    command = [
        "/usr/bin/ffmpeg",
        "-rtsp_transport", "tcp",
        "-i", url,
        "-vf", "scale=1280:720",
        "-q:v", "2",
        "-frames:v", "1",
        temp_path,
        "-y"
    ]

    try:
        subprocess.run(command, stdout=subprocess.DEVNULL, stderr=subprocess.DEVNULL, timeout=10)

        if os.path.exists(temp_path) and os.path.getsize(temp_path) > 1000:
            # पुरानी image है तो compare करो
            if os.path.exists(output_path):
                if is_image_different(output_path, temp_path):
                    os.replace(temp_path, output_path)
                    shutil.copy(output_path, current_path)
                    print(f"✅ Updated image for Camera {camera['id']} ({camera['ip']})")
                else:
                    os.remove(temp_path)
                    shutil.copy(output_path, current_path)
                    print(f"⏩ Same image copied for Camera {camera['id']}")
            else:
                # पहली बार image save हो रही है
                os.rename(temp_path, output_path)
                shutil.copy(output_path, current_path)
                print(f"🆕 Saved new image for Camera {camera['id']} ({camera['ip']})")
        else:
            print(f"⚠️ Incomplete image for Camera {camera['id']} ({camera['ip']})")
            if os.path.exists(temp_path):
                os.remove(temp_path)

    except Exception as e:
        print(f"❌ Failed Camera {camera['id']} ({camera['ip']}): {e}")
        if os.path.exists(temp_path):
            os.remove(temp_path)


# -------------------------------
# Main Program
# -------------------------------
if __name__ == "__main__":
    if len(sys.argv) < 2:
        print("❌ JSON path not provided.")
        sys.exit(1)

    json_path = sys.argv[1]
    try:
        with open(json_path, "r") as file:
            camera_list = json.load(file)
    except Exception as e:
        print(f"❌ Failed to read JSON: {e}")
        sys.exit(1)

    base_dir = "/var/www/html/storage/app/public"
    current_dir = os.path.join(base_dir, "current_images")

    # ✅ Step 2: Parallel processing start karo
    max_threads = 40
    print(f"🚀 Starting capture with {max_threads} threads...")

    with concurrent.futures.ThreadPoolExecutor(max_workers=max_threads) as executor:
        executor.map(capture_image, camera_list)

    # ✅ Step 3: Sab batch ke baad bhi current_images folder me saari latest images hongi
    print(f"✅ Capture completed. Fresh images stored in: {current_dir}")
