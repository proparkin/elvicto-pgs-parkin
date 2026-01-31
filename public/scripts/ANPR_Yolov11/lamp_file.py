

import socket
import json
import sys
import asyncio
from concurrent.futures import ThreadPoolExecutor

UDP_PORT = 38899
SOCKET_TIMEOUT = 2  # Reduced from 3 seconds
MAX_WORKERS = 200   # Increased parallelism

def send_wiz_command(lamp):
    """Send UDP command to a single lamp"""
    ip = lamp.get("ip_address")
    status = lamp.get("status")

    if not ip:
        return {"lamp_id": lamp.get("id"), "error": "Missing IP address"}

    # Determine color based on status
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
    sock.settimeout(SOCKET_TIMEOUT)
    
    try:
        sock.sendto(message, (ip, UDP_PORT))
        data, _ = sock.recvfrom(1024)
        return {
            "lamp_id": lamp.get("id"),
            "ip": ip,
            "status": "success",
            "response": json.loads(data.decode('utf-8'))
        }
    except socket.timeout:
        return {"lamp_id": lamp.get("id"), "ip": ip, "status": "timeout"}
    except Exception as e:
        return {"lamp_id": lamp.get("id"), "ip": ip, "status": "error", "error": str(e)}
    finally:
        sock.close()

def main():
    # Read from stdin instead of command line args (more reliable for large data)
    try:
        lamp_data = json.loads(sys.stdin.read())
    except json.JSONDecodeError as e:
        print(json.dumps({"error": f"Invalid JSON input: {str(e)}"}))
        sys.exit(1)

    if not lamp_data:
        print(json.dumps({"message": "No lamps to update"}))
        return

    # Process all lamps in parallel
    results = []
    success_count = 0
    error_count = 0

    with ThreadPoolExecutor(max_workers=MAX_WORKERS) as executor:
        futures = [executor.submit(send_wiz_command, lamp) for lamp in lamp_data]
        
        for future in futures:
            try:
                result = future.result(timeout=5)
                results.append(result)
                if result.get("status") == "success":
                    success_count += 1
                else:
                    error_count += 1
            except Exception as e:
                error_count += 1
                results.append({"error": f"Future failed: {str(e)}"})

    # Output summary
    summary = {
        "total": len(lamp_data),
        "success": success_count,
        "errors": error_count,
        "results": results
    }
    
    print(json.dumps(summary))

if __name__ == "__main__":
    main()