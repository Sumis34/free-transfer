import os 
import time
import db

def delete_expired_files(path = 'uploads/'):

    files = os.listdir(path)

    for file in files:
        file_age = round((time.time() - os.stat(path + file).st_mtime) /60 /60 /24)
        if file_age >= 0:
            try:
                os.remove(path + file)
                db.delete_file(file)
                print(file + " Removed")
            except:
                print("Error while deleting file: " + file)
        else:
            print("File not expired!")

if __name__ == "__main__":
    delete_expired_files()