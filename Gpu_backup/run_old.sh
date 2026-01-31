#!/bin/bash
#pkill -f python
#python3 test2.py /root/slot_images/new_parkin_slot_images_1_400
#python3 test2.py /root/slot_images/new_parkin_slot_images_401_800
#python3 test2.py /root/slot_images/slot_images /root/best.pt

#!/bin/bash
# ===============================================
# 🚗 YOLO + PaddleOCR Vehicle Detection Runner
# ===============================================
# Author: Ajay Yadav (optimized by GPT-5)
# Date: 2025-10-13
# -----------------------------------------------

# 📁 Log directory
LOG_DIR="/root/logs"
mkdir -p "$LOG_DIR"

echo "🟢 Starting vehicle detection multi-batch process..."
date
echo "-----------------------------------------------"

# -----------------------------------------------
# 🔴 Kill any old running test2.py process safely
# -----------------------------------------------
echo "🧹 Cleaning old Python processes..."
pkill -f "python3 test2.py" || true
sleep 2

# -----------------------------------------------
# 🚗 Batch 1: 1–1000
# -----------------------------------------------
echo "🚀 Running Batch 1 (1–1000)..."
python3 /root/test2.py /root/slot_images/new_parkin_slot_images_1_1000 > "$LOG_DIR/batch_1_1000.log" 2>&1
echo "✅ Batch 1 completed."
sync; sleep 2; sudo nvidia-smi --gpu-reset -i 0 || true
pkill -f "python3 test2.py" || true
sleep 2

# -----------------------------------------------
# 🚗 Batch 2: 1–500
# -----------------------------------------------
echo "🚀 Running Batch 2 (1–500)..."
python3 /root/test2.py /root/slot_images/new_parkin_slot_images_1_500 > "$LOG_DIR/batch_1_500.log" 2>&1
echo "✅ Batch 2 completed."
sync; sleep 2; sudo nvidia-smi --gpu-reset -i 0 || true
pkill -f "python3 test2.py" || true
sleep 2

# -----------------------------------------------
# 🚗 Batch 3: 501–1000
# -----------------------------------------------
echo "🚀 Running Batch 3 (501–1000)..."
python3 /root/test2.py /root/slot_images/new_parkin_slot_images_501_1000 > "$LOG_DIR/batch_501_1000.log" 2>&1
echo "✅ Batch 3 completed."
sync; sleep 2; sudo nvidia-smi --gpu-reset -i 0 || true
pkill -f "python3 test2.py" || true

# -----------------------------------------------
# 🏁 Finish
# -----------------------------------------------
echo "-----------------------------------------------"
echo "🎯 All batches processed successfully!"
date
echo "Logs saved in: $LOG_DIR"

