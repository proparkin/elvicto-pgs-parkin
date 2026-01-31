import socket
import json

UDP_PORT = 38899

def send_wiz_command(ip, payload):
    sock = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
    sock.settimeout(5)  # timeout 5 seconds
    message = json.dumps(payload).encode('utf-8')
    sock.sendto(message, (ip, UDP_PORT))
    try:
        data, _ = sock.recvfrom(1024)
        print(f"[INFO] Received from {ip}: {data}")
        return json.loads(data.decode('utf-8'))
    except socket.timeout:
        print(f"[WARN] No response from {ip}")
        return None

# List of lamp IPs
lamp_ips = [
    "10.6.155.14",
    "10.8.33.170",
    "10.6.155.7",
    "10.9.167.74",
    "10.0.40.14",
    "10.2.7.24",
    "10.0.40.67",
    "10.0.40.67",
    "10.0.40.62",
    "10.0.40.69"  # Make sure all are valid
]

# Payload (set color)
payload = {
    "method": "setPilot",
    "params": {
        "state": True,
        "dimming": 100,
        "r": 0,
        "g": 255,
        "b": 0  # Green color
    }
}

# Loop over each IP and send command
for ip in lamp_ips:
    response = send_wiz_command(ip, payload)
    print(f"Lamp {ip} Response:", response)
