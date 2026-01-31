import subprocess
import concurrent.futures
import os
import sys
import json

# -------------------------------
# Capture function
# -------------------------------
def capture_image(camera):
    # ✅ Select credentials based on camera ID
    if camera["id"] <= 803:
        username = "admin"
        password = "Elvicto@123"
    else:
        username = "admin"
        password = "Parkin@321"

    output_path = f"/var/www/html/storage/app/public/camera_images_baywise/camera_{camera['id']}.jpg"
    #output_path = f"/var/nfs/general/storage/app/public/camera_images/camera_{camera['id']}.jpg"
    url = f"rtsp://{username}:{password}@{camera['ip']}/cam/realmonitor?channel=1&subtype=0"

    command = [
        "/usr/bin/ffmpeg",
        "-rtsp_transport", "tcp",
        "-i", url,
        "-vf", "scale=1280:720",
        "-q:v", "2",
        "-frames:v", "1",
        output_path,
        "-y"
    ]

    try:
        subprocess.run(command, stdout=subprocess.DEVNULL, stderr=subprocess.DEVNULL, timeout=10)
        if os.path.exists(output_path) and os.path.getsize(output_path) > 1000:
            print(f"✅ Captured image from Camera {camera['id']} ({camera['ip']})")
        else:
            print(f"⚠️ Incomplete or missing image for Camera {camera['id']} ({camera['ip']})")
    except Exception as e:
        print(f"❌ Failed Camera {camera['id']}: {e}")

# -------------------------------
# Main program
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

    max_threads = 25
    print(f"🚀 Starting capture with {max_threads} threads...")

    with concurrent.futures.ThreadPoolExecutor(max_workers=max_threads) as executor:
        executor.map(capture_image, camera_list)

    print("✅ Image capture completed.")
