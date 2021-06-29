import file_manager as fm
import schedule
import time
import logging

#This path is for linux distributions
files_path = "../uploads/"

while True:
    fm.delete_expired_files()
    fm.cleanup_db()
    time.sleep(1)
    print("Watching files!")