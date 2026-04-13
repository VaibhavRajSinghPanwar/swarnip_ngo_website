from fastapi import FastAPI, File, UploadFile
import shutil

app = FastAPI()

# ================= LOGIN =================
@app.post("/login")
def login(data: dict):
    if data["username"] == "admin" and data["password"] == "1234":
        return {"success": True}
    return {"success": False}

# ================= SLIDER UPLOAD =================
@app.post("/upload-slider")
def upload_slider(file: UploadFile = File(...)):
    with open(f"uploads/{file.filename}", "wb") as buffer:
        shutil.copyfileobj(file.file, buffer)

    return {"message": "Uploaded"}
