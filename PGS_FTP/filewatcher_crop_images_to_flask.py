import os
import time
import asyncio
import aiohttp
from asyncio import Queue
from concurrent.futures import ThreadPoolExecutor

WATCH_DIR = "/var/www/html/storage/app/public/Filewatcher_img/crop_img_pgs"
API_URL = "http://10.0.1.123:6000/process-image"

BATCH_SIZE = 25
MAX_WORKERS = 6
QUEUE_LIMIT = 500
POLL = 0.1

executor = ThreadPoolExecutor(max_workers=4)


def is_file_stable_sync(path, wait=0.15):
    try:
        s1 = os.path.getsize(path)
        time.sleep(wait)
        s2 = os.path.getsize(path)
        return s1 == s2
    except FileNotFoundError:
        return False


async def file_watcher(queue: Queue, in_progress: set):
    loop = asyncio.get_running_loop()

    while True:
        for fname in os.listdir(WATCH_DIR):
            if not fname.lower().endswith((".jpg", ".jpeg", ".png")):
                continue

            path = os.path.join(WATCH_DIR, fname)

            if fname in in_progress:
                continue

            stable = await loop.run_in_executor(
                executor, is_file_stable_sync, path
            )

            if stable:
                await queue.put(fname)
                in_progress.add(fname)

        await asyncio.sleep(POLL)


async def upload_worker(name: int, queue: Queue, session: aiohttp.ClientSession, in_progress: set):
    while True:
        batch = []

        while len(batch) < BATCH_SIZE:
            try:
                fname = await asyncio.wait_for(queue.get(), timeout=0.4)
                batch.append(fname)
            except asyncio.TimeoutError:
                break

        if not batch:
            continue

        data = aiohttp.FormData()
        files = []

        try:
            for fname in batch:
                path = os.path.join(WATCH_DIR, fname)
                f = open(path, "rb")
                files.append(f)
                data.add_field(
                    "images",
                    f,
                    filename=fname,
                    content_type="image/jpeg"
                )

            async with session.post(API_URL, data=data, timeout=20) as resp:
                if resp.status == 200:
                    res = await resp.json()
                    if res.get("status"):
                        for fname in batch:
                            os.remove(os.path.join(WATCH_DIR, fname))
                            in_progress.discard(fname)
                        print(f"Worker {name}: processed {len(batch)}")
                    else:
                        for fname in batch:
                            in_progress.discard(fname)
                else:
                    for fname in batch:
                        in_progress.discard(fname)

        except Exception as e:
            print(f"Worker {name} error:", e)
            for fname in batch:
                in_progress.discard(fname)

        finally:
            for f in files:
                f.close()


async def main():
    queue = Queue(maxsize=QUEUE_LIMIT)
    in_progress = set()

    async with aiohttp.ClientSession(
        connector=aiohttp.TCPConnector(limit=MAX_WORKERS * 2)
    ) as session:

        tasks = [
            asyncio.create_task(file_watcher(queue, in_progress))
        ]

        for i in range(MAX_WORKERS):
            tasks.append(
                asyncio.create_task(upload_worker(i, queue, session, in_progress))
            )

        await asyncio.gather(*tasks)


if __name__ == "__main__":
    print("🚀 High-throughput file watcher started (startup backlog supported)")
    asyncio.run(main())
