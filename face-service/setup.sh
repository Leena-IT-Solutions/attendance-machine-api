#!/bin/bash
set -e

echo "========================================================"
echo " Setting up FastAPI Face Recognition Service (Production)"
echo "========================================================"

# 1. Ensure script is run with sudo or root
if [ "$EUID" -ne 0 ]; then
    echo "[-] Please run this script with sudo or as root: sudo bash setup.sh"
    exit 1
fi

# Detect current directory or fallback to configured path
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
SERVICE_DIR="${SERVICE_DIR:-/var/www/infoleena/attendance.infoleena.com/face-service}"

if [ -d "$SCRIPT_DIR" ] && [ -f "$SCRIPT_DIR/main.py" ]; then
    SERVICE_DIR="$SCRIPT_DIR"
fi

echo "[*] Target Service Directory: $SERVICE_DIR"
cd "$SERVICE_DIR" || { echo "[-] Failed to cd into $SERVICE_DIR"; exit 1; }

# 2. Install required system packages
echo "[+] Step 1: Installing system packages (python3, venv, libgl1, libglib)..."
apt-get update -y
apt-get install -y python3 python3-pip python3-venv libgl1 libglib2.0-0 curl

# 3. Create virtual environment
echo "[+] Step 2: Creating Python virtual environment..."
if [ ! -d "venv" ]; then
    python3 -m venv venv
    echo "[+] Virtual environment created at $SERVICE_DIR/venv"
else
    echo "[*] Virtual environment already exists."
fi

# 4. Install Python dependencies
echo "[+] Step 3: Installing Python packages from requirements.txt..."
./venv/bin/pip install --upgrade pip
./venv/bin/pip install -r requirements.txt

# 5. Pre-warm and download ArcFace model weights
echo "[+] Step 4: Pre-downloading and validating ArcFace weights..."
export DEEPFACE_HOME="$SERVICE_DIR"
./venv/bin/python -c "
import os
os.environ['DEEPFACE_HOME'] = '$SERVICE_DIR'
import numpy as np
from deepface import DeepFace
dummy = np.zeros((112, 112, 3), dtype=np.uint8)
DeepFace.represent(dummy, model_name='ArcFace', enforce_detection=False)
print('[✓] ArcFace model weights successfully downloaded and verified!')
"

# 6. Set proper permissions for www-data
echo "[+] Step 5: Setting directory permissions for www-data..."
chown -R www-data:www-data "$SERVICE_DIR"
chmod -R 775 "$SERVICE_DIR"

# 7. Configure and start systemd service
echo "[+] Step 6: Configuring systemd service..."
# Dynamically ensure working directory matches in the systemd service file
sed -i "s|WorkingDirectory=.*|WorkingDirectory=$SERVICE_DIR|g" "$SERVICE_DIR/face-service.service"
sed -i "s|Environment=\"PATH=.*|Environment=\"PATH=$SERVICE_DIR/venv/bin\"|g" "$SERVICE_DIR/face-service.service"
sed -i "s|Environment=\"DEEPFACE_HOME=.*|Environment=\"DEEPFACE_HOME=$SERVICE_DIR\"|g" "$SERVICE_DIR/face-service.service"
sed -i "s|ExecStart=.*|ExecStart=$SERVICE_DIR/venv/bin/gunicorn main:app -w 2 -k uvicorn.workers.UvicornWorker -b 127.0.0.1:8000 --timeout 120|g" "$SERVICE_DIR/face-service.service"

cp "$SERVICE_DIR/face-service.service" /etc/systemd/system/face-service.service
systemctl daemon-reload
systemctl enable face-service
systemctl restart face-service

# 8. Verify service health
echo "[+] Step 7: Checking service health..."
sleep 3
systemctl status face-service --no-pager

echo ""
echo "[+] Testing HTTP health endpoint (http://127.0.0.1:8000/health)..."
HEALTH_RESP=$(curl -s http://127.0.0.1:8000/health || true)

if echo "$HEALTH_RESP" | grep -q "healthy"; then
    echo "========================================================"
    echo " [SUCCESS] Face Recognition Service is running properly!"
    echo " Response: $HEALTH_RESP"
    echo "========================================================"
else
    echo "[-] Service did not respond with healthy status."
    echo "Response received: $HEALTH_RESP"
    echo "Check logs using: journalctl -u face-service -n 50 --no-pager"
fi
