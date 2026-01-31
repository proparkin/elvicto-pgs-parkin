#!/usr/bin/env python3
import subprocess
import re
import socket
import sys
import os
from ipaddress import IPv4Network, IPv4Address

# --------- Configuration ----------
MAC_TO_FIND = "A8BB50B838CD"   # use your MAC (any format)
# ---------------------------------

def normalize_mac(mac):
    mac = re.sub(r'[^0-9A-Fa-f]', '', mac)
    if len(mac) != 12:
        raise ValueError("MAC length not 12 hex digits after cleaning")
    return ':'.join(mac[i:i+2] for i in range(0,12,2)).lower()

def get_outgoing_ip():
    """Get the local IP address used for outgoing connections (no network traffic actually sent)."""
    try:
        s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
        s.connect(("8.8.8.8", 80))
        ip = s.getsockname()[0]
        s.close()
        return ip
    except Exception:
        return None

def get_prefix_for_ip_linux(target_ip):
    """Use `ip -o -f inet addr show` to find prefix length for an IP (Linux)."""
    try:
        out = subprocess.check_output(["ip", "-o", "-f", "inet", "addr", "show"], stderr=subprocess.DEVNULL).decode()
        for line in out.splitlines():
            # sample line: "2: eno8303    inet 10.0.1.100/16 brd 10.0.255.255 scope global eno8303"
            if target_ip in line:
                m = re.search(r'inet\s+(\d+\.\d+\.\d+\.\d+)/(\d+)', line)
                if m:
                    return int(m.group(2))
    except Exception:
        pass
    return None

def get_prefix_for_ip_windows(target_ip):
    """Parse ipconfig output on Windows to find prefix (approx via netmask)."""
    try:
        out = subprocess.check_output(["ipconfig"], stderr=subprocess.DEVNULL).decode(errors='ignore')
        # Find block which contains target_ip
        blocks = out.split("\n\n")
        for block in blocks:
            if target_ip in block:
                # look for "Subnet Mask . . . . . . . . . . : 255.255.255.0"
                m = re.search(r"Subnet Mask[^\d]*(\d+\.\d+\.\d+\.\d+)", block)
                if m:
                    mask = m.group(1)
                    # convert mask to prefix
                    parts = [int(x) for x in mask.split('.')]
                    binstr = ''.join(format(p, '08b') for p in parts)
                    return binstr.count('1')
    except Exception:
        pass
    return None

def get_local_prefix(target_ip):
    # Try Linux method first
    prefix = get_prefix_for_ip_linux(target_ip)
    if prefix:
        return prefix
    # Try Windows method
    prefix = get_prefix_for_ip_windows(target_ip)
    if prefix:
        return prefix
    # fallback: assume /24
    return 24

def ping_ip(ip):
    """Ping single IP once. Cross-platform minimal."""
    if sys.platform.startswith("win"):
        cmd = ["ping", "-n", "1", "-w", "100", ip]
    else:
        # -c 1: 1 packet, -W 0.1 or -w 1 depending on platform; using -c1 -W1
        cmd = ["ping", "-c", "1", "-W", "1", ip]
    # run without output
    return subprocess.call(cmd, stdout=subprocess.DEVNULL, stderr=subprocess.DEVNULL) == 0

def populate_arp_by_ping(network, try_entire=False):
    """Ping addresses in a network to populate ARP table.
       For large networks, we ping only the /24 containing the host unless try_entire True."""
    hosts = list(network.hosts())
    # If network is large and try_entire False, reduce to the /24 chunk that contains our host.
    if network.prefixlen < 24 and not try_entire:
        # take the /24 that contains the first usable host (i.e., the local ip)
        # calculate containing /24
        # find local ip in same network; assume it's in this network
        # pick the /24 that contains the first host in the network for a quick attempt
        # Better: choose the /24 that contains the local IP if available.
        # For simplicity, we'll pick the /24 that contains network.network_address + offset
        sub_net = IPv4Network((str(network.network_address), 24))
        hosts = list(sub_net.hosts())
    print(f"Pinging {len(hosts)} hosts to populate ARP table (this may take a while)...")
    for ip in hosts:
        # ping in background-ish — but to keep simple we do sequential
        ping_ip(str(ip))

def get_ip_from_arp(mac):
    mac = normalize_mac(mac)
    try:
        out = subprocess.check_output("arp -a", shell=True).decode(errors='ignore')
    except Exception as e:
        print("Failed to run arp -a:", e)
        return None
    for line in out.splitlines():
        if mac in line.lower():
            m = re.search(r'(\d+\.\d+\.\d+\.\d+)', line)
            if m:
                return m.group(1)
    return None

def main():
    print("Determining outgoing IP...")
    out_ip = get_outgoing_ip()
    if not out_ip:
        print("Could not determine outgoing IP. Please ensure you're connected to the LAN.")
        return
    print("Outgoing IP:", out_ip)

    prefix = get_local_prefix(out_ip)
    print(f"Detected prefix length: /{prefix}")

    # build network object
    net = IPv4Network(f"{out_ip}/{prefix}", strict=False)
    print("Local network detected:", net.with_prefixlen)

    # First try: ping /24 containing outgoing IP (faster and usually sufficient)
    if prefix <= 24:
        net_to_try = net
    else:
        # prefix is /16 or larger network -> choose /24 that contains the outgoing IP
        net_to_try = IPv4Network(f"{out_ip}/24", strict=False)

    print("First scanning network:", net_to_try.with_prefixlen)
    populate_arp_by_ping(net_to_try, try_entire=False)

    ip_found = get_ip_from_arp(MAC_TO_FIND)
    if ip_found:
        print("Found device IP:", ip_found)
        return

    # If not found and original prefix <=16 (i.e., large), optionally expand to entire big net
    if prefix <= 16:
        print("Not found in /24. Expanding scan to entire /16. This will take much longer.")
        net_wide = IPv4Network(f"{out_ip}/16", strict=False)
        populate_arp_by_ping(net_wide, try_entire=True)
        ip_found = get_ip_from_arp(MAC_TO_FIND)
        if ip_found:
            print("Found device IP in /16:", ip_found)
            return

    print("Device not found in scanned ranges. Suggestions:")
    print(" - Ensure the WiZ lamp is powered on and connected to the same LAN.")
    print(" - Check router's DHCP table (router UI) for the MAC -> IP mapping.")
    print(" - Consider setting a DHCP reservation (Static lease) in router for the lamp's MAC.")
    print(" - If you have scapy, an ARP scan (arping) will be faster and more reliable.")

if __name__ == "__main__":
    main()
