import socket
import json
import sys
import concurrent.futures

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

def main():
    if len(sys.argv) < 2:
        print(json.dumps({"error": "No lamp data provided"}))
        return

    try:
        lamp_data = json.loads(sys.argv[1])
    except json.JSONDecodeError:
        print(json.dumps({"error": "Invalid JSON input"}))
        return

    MAX_THREADS = 100  
    results = []

    with concurrent.futures.ThreadPoolExecutor(max_workers=MAX_THREADS) as executor:
        futures = [executor.submit(send_wiz_command, lamp) for lamp in lamp_data]
        for future in concurrent.futures.as_completed(futures):
            results.append(future.result())

    print(json.dumps(results))

if __name__ == "__main__":
    main()
