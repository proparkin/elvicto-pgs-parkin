import sys, json, time

try:
    raw_data = sys.stdin.read()
    data = json.loads(raw_data)

    lamp_ip = data.get("ip_address")
    status = data.get("status")
    color = data.get("color")

    time.sleep(0.5)

    result = {
        "lamp_ip": lamp_ip,
        "status": status,
        "color": color,
        "message": f"Lamp at {lamp_ip} set to {color.upper()}"
    }

    print(json.dumps(result))

except Exception as e:
    print(json.dumps({"error": str(e)}))