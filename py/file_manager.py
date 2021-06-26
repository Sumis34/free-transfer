import os 
import time 
file = os.stat('c:/xampp/htdocs/transfer/uploads/0f17c88d07269bf427d91c93794db07c_1624305919.jpg')
result = (time.time() - file.st_mtime) 
print(result)