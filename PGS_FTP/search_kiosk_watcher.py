import time
import os
import aiohttp
import asyncio

WATCH_DIR = "/var/www/html/storage/app/public/Filewatcher_img/search_kiosk_image"
# WATCH_DIR=r"C:\Users\priya\Desktop\wacther and object detection\img"
API_URL = r"http://10.0.1.123:8080/process-images"


BATCH_SIZE = 50      # max images per batch
MAX_WAIT = 0.5         # seconds (max wait before forcing batch)
POLL = 0.05            # directory poll interval


def is_file_stable(path, wait=0.2):
    """Ensure file is fully written"""
    try:
        size1 = os.path.getsize(path)
        time.sleep(wait)
        size2 = os.path.getsize(path)
        return size1 == size2
    except FileNotFoundError:
        return False


async def dynamic_batch_sender():
    async with aiohttp.ClientSession() as session:
        batch = []
        batch_start = None

        while True:
            try:
                files = sorted([
                    f for f in os.listdir(WATCH_DIR)
                    if f.lower().endswith(('.jpg', '.jpeg', '.png'))
                ])

                for f in files:
                    if f in batch:
                        continue

                    path = os.path.join(WATCH_DIR, f)
                    if not is_file_stable(path):
                        continue

                    batch.append(f)

                    if batch_start is None:
                        batch_start = time.time()

                    if len(batch) >= BATCH_SIZE:
                        break

                if batch and (
                    len(batch) >= BATCH_SIZE or
                    (time.time() - batch_start) >= MAX_WAIT
                ):
                    data = aiohttp.FormData()
                    file_handles = []

                    try:
                        for filename in batch:
                            path = os.path.join(WATCH_DIR, filename)
                            f = open(path, "rb")
                            file_handles.append(f)
                            data.add_field(
                                "vehicle_image",
                                f,
                                filename=filename,
                                content_type="image/jpeg"
                            )

                        async with session.post(API_URL, data=data) as resp:
                            if resp.status == 200:
                                result = await resp.json()
                                if result.get("status"):
                                    for filename in batch:
                                        os.remove(os.path.join(WATCH_DIR, filename))
                                    print(f" Processed batch of kiosk image {len(batch)}")
                                else:
                                    print(" API returned failure")
                            else:
                                print(f" HTTP error: {resp.status}")

                    finally:
                        for f in file_handles:
                            f.close()

                    batch.clear()
                    batch_start = None

                await asyncio.sleep(POLL)

            except Exception as e:
                print(f" Worker error: {e}")
                await asyncio.sleep(1)


if __name__ == "__main__":
    print(" Dynamic batch sender started")
    asyncio.run(dynamic_batch_sender())






