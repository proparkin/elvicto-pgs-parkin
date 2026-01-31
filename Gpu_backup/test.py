from numba import cuda
import numpy as np
from timeit import default_timer as timer

# Define a GPU kernel function
@cuda.jit
def increment_by_one_gpu(an_array):
    pos = cuda.grid(1)
    if pos < an_array.size:
        an_array[pos] += 1

# Create numpy array
n = 10_000_000
arr = np.ones(n)

# Copy to GPU
d_arr = cuda.to_device(arr)

threadsperblock = 256
blockspergrid = (arr.size + (threadsperblock - 1)) // threadsperblock

start = timer()
increment_by_one_gpu[blockspergrid, threadsperblock](d_arr)
dt = timer() - start

result = d_arr.copy_to_host()
print("Result:", result[:5])
print(f"Time With GPU: {dt:.4f} seconds")

