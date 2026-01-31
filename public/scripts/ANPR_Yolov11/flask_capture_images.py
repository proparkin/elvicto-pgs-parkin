from flask import Flask, request, jsonify
import os, json, subprocess, concurrent.futures, multiprocessing, time

app = Flask(__name__)

def capture_image(camera):
    try:
        # कैमरा लॉगिन details
        if camera["id"] <= 803:
            username = "admin"
            password = "Elvicto@123"
        else:
            username = "admin"
            password = "Parkin@321"

        # output path और RTSP URL
        output_path = f"/var/www/html/storage/app/public/camera_images/camera_{camera['id']}.jpg"
        url = f"rtsp://{username}:{password}@{camera['ip']}/cam/realmonitor?channel=1&subtype=0"

        # ✅ Optimized FFmpeg command
        command = [
            "/usr/bin/ffmpeg",
            "-rtsp_transport", "tcp",
            "-stimeout", "3000000",           # 3 sec connection timeout
            "-rtsp_flags", "prefer_tcp",
            "-i", url,
            "-vframes", "1",                  # only 1 frame capture
            "-q:v", "5",                      # fast & decent quality
            "-vf", "scale=1280:720",           # smaller resolution = faster
            "-loglevel", "error",             # suppress FFmpeg logs
            "-y", output_path
        ]

        # Run FFmpeg with timeout
        subprocess.run(command, stdout=subprocess.DEVNULL, stderr=subprocess.DEVNULL, timeout=6)

        if os.path.exists(output_path) and os.path.getsize(output_path) > 1000:
            return {"id": camera["id"], "ip": camera["ip"], "status": "success", "path": output_path}
        else:
            return {"id": camera["id"], "ip": camera["ip"], "status": "warning", "message": "Empty image"}

    except subprocess.TimeoutExpired:
        return {"id": camera["id"], "ip": camera["ip"], "status": "timeout", "message": "RTSP timeout"}
    except Exception as e:
        return {"id": camera["id"], "ip": camera["ip"], "status": "error", "message": str(e)}


@app.route('/flask_capture_images', methods=['POST'])
def capture_images_api():
    try:
        start_time = time.time()

        # JSON input पढ़ना
        data = request.get_json(force=True)
        camera_list = data.get("cameras") or json.load(open(data["json_path"]))

        if not camera_list:
            return jsonify({"status": False, "message": "Empty camera list"}), 400

        # ✅ Auto calculate max workers = CPU cores * 2
        cpu_count = multiprocessing.cpu_count()
        max_workers = min(40, cpu_count * 2)

        results = []
        print(f"🚀 Starting capture for {len(camera_list)} cameras with {max_workers} workers...")

        # ✅ ThreadPoolExecutor for I/O bound subprocess calls
        with concurrent.futures.ThreadPoolExecutor(max_workers=max_workers) as executor:
            futures = {executor.submit(capture_image, cam): cam for cam in camera_list}
            for future in concurrent.futures.as_completed(futures):
                cam = futures[future]
                try:
                    results.append(future.result())
                except Exception as e:
                    results.append({"id": cam["id"], "ip": cam["ip"], "status": "error", "message": str(e)})

        success_count = sum(1 for r in results if r["status"] == "success")
        elapsed = round(time.time() - start_time, 2)

        return jsonify({
            "status": True,
            "message": f"Captured {success_count}/{len(results)} successfully in {elapsed} sec",
            "time_taken": elapsed,
            "data": results
        }), 200

    except Exception as e:
        return jsonify({"status": False, "message": str(e)}), 500


if __name__ == '__main__':
    import logging
    log = logging.getLogger('werkzeug')
    log.disabled = True
    app.logger.disabled = True

    print("🚀 Fast Flask Camera Capture API running on port 5000")
    app.run(host='0.0.0.0', port=5000, debug=False)
