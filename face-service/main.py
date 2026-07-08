import json
import logging
from typing import List
from fastapi import FastAPI, File, UploadFile, Form, HTTPException, status
import numpy as np
import cv2
from deepface import DeepFace

# Setup logging
logging.basicConfig(level=logging.INFO)
logger = logging.getLogger("face-service")

app = FastAPI(title="Precision Face Recognition Service", version="1.0.0")

MODEL_NAME = "ArcFace"

# Warm up the model on startup so that subsequent requests are fast
@app.on_event("startup")
def startup_event():
    logger.info("Initializing Face Recognition model: %s...", MODEL_NAME)
    try:
        # Create a dummy blank image to trigger model loading
        dummy_img = np.zeros((112, 112, 3), dtype=np.uint8)
        DeepFace.represent(img_path=dummy_img, model_name=MODEL_NAME, enforce_detection=False)
        logger.info("Model %s successfully loaded and warmed up!", MODEL_NAME)
    except Exception as e:
        logger.error("Failed to warm up model on startup: %s", str(e))

def read_image_from_upload(file: UploadFile) -> np.ndarray:
    try:
        # Read raw bytes
        file_bytes = file.file.read()
        # Convert to numpy array
        nparr = np.frombuffer(file_bytes, np.uint8)
        # Decode to CV2 image (BGR)
        img = cv2.imdecode(nparr, cv2.IMREAD_COLOR)
        if img is None:
            raise ValueError("Decoded image is None")
        return img
    except Exception as e:
        logger.error("Failed to read uploaded file as image: %s", str(e))
        raise HTTPException(
            status_code=status.HTTP_400_BAD_REQUEST,
            detail=f"Invalid image file: {str(e)}"
        )

@app.get("/health")
def health_check():
    return {"status": "healthy", "model": MODEL_NAME}

@app.post("/embeddings")
async def get_embeddings(file: UploadFile = File(...)):
    """
    Extracts a 512-dimension face embedding from the uploaded image.
    """
    img = read_image_from_upload(file)
    try:
        try:
            # Try with detection enabled first (e.g. for gallery/uncropped uploads)
            representations = DeepFace.represent(
                img_path=img,
                model_name=MODEL_NAME,
                enforce_detection=True,
                detector_backend="opencv"
            )
        except Exception as detect_err:
            logger.warning("Face detection failed, trying with enforce_detection=False: %s", str(detect_err))
            # Fallback for pre-cropped face inputs
            representations = DeepFace.represent(
                img_path=img,
                model_name=MODEL_NAME,
                enforce_detection=False
            )
        
        if not representations:
            raise HTTPException(
                status_code=status.HTTP_422_UNPROCESSABLE_ENTITY,
                detail="No face detected in the image"
            )
            
        embedding = representations[0]["embedding"]
        return {"embedding": embedding}
        
    except HTTPException:
        raise
    except Exception as e:
        logger.error("Face embedding extraction failed: %s", str(e))
        raise HTTPException(
            status_code=status.HTTP_500_INTERNAL_SERVER_ERROR,
            detail=f"Inference error: {str(e)}"
        )

@app.post("/search")
async def search_face(
    file: UploadFile = File(...),
    candidates_json: str = Form(...)
):
    """
    Takes a probe image and a list of candidates (employee codes and their stored face signatures).
    Extracts the probe embedding and finds the best matching candidate.
    """
    # 1. Parse candidates
    try:
        candidates = json.loads(candidates_json)
        # Expected format: [{"code": "EMP01", "signatures": [[0.1, 0.2, ...], ...]}]
    except Exception as e:
        raise HTTPException(
            status_code=status.HTTP_400_BAD_REQUEST,
            detail=f"Invalid candidates format: {str(e)}"
        )

    if not candidates:
        raise HTTPException(
            status_code=status.HTTP_400_BAD_REQUEST,
            detail="Candidates list is empty"
        )

    # 2. Read probe image and extract embedding
    img = read_image_from_upload(file)
    try:
        try:
            # Try with detection enabled first
            representations = DeepFace.represent(
                img_path=img,
                model_name=MODEL_NAME,
                enforce_detection=True,
                detector_backend="opencv"
            )
        except Exception as detect_err:
            logger.warning("Face detection failed on probe, trying with enforce_detection=False: %s", str(detect_err))
            # Fallback for pre-cropped face inputs
            representations = DeepFace.represent(
                img_path=img,
                model_name=MODEL_NAME,
                enforce_detection=False
            )
        
        if not representations:
            raise HTTPException(
                status_code=status.HTTP_422_UNPROCESSABLE_ENTITY,
                detail="No face detected in probe image"
            )
            
        probe_embedding = np.array(representations[0]["embedding"])
        # L2 normalization of probe embedding (ArcFace output might already be L2 normalized, but we ensure it)
        probe_norm = np.linalg.norm(probe_embedding)
        if probe_norm > 0:
            probe_embedding = probe_embedding / probe_norm
            
    except HTTPException:
        raise
    except Exception as e:
        logger.error("Probe embedding extraction failed: %s", str(e))
        raise HTTPException(
            status_code=status.HTTP_500_INTERNAL_SERVER_ERROR,
            detail=f"Inference error: {str(e)}"
        )

    # 3. Match against candidates
    best_candidate_code = None
    best_similarity = -1.0 # Cosine similarity range is [-1, 1]

    # Vectorized / loop calculation
    for cand in candidates:
        code = cand.get("code")
        # Support both 'signatures' (list of list of floats) or single 'signature' (list of floats)
        signatures = cand.get("signatures", [])
        if not signatures and "signature" in cand:
            signatures = [cand["signature"]]
            
        for sig in signatures:
            if not sig:
                continue
                
            sig_arr = np.array(sig)
            if sig_arr.shape != probe_embedding.shape:
                logger.warning(
                    "Dimension mismatch for candidate %s: expected %s, got %s. Skipping...",
                    code, probe_embedding.shape, sig_arr.shape
                )
                continue

            sig_norm = np.linalg.norm(sig_arr)
            if sig_norm > 0:
                sig_arr = sig_arr / sig_norm
                
            # Cosine similarity for normalized vectors is just the dot product
            similarity = np.dot(probe_embedding, sig_arr)
            
            if similarity > best_similarity:
                best_similarity = float(similarity)
                best_candidate_code = code

    # Map Cosine Similarity to a confidence metric or return raw similarity
    # Cosine threshold for ArcFace typically sits around 0.35 to 0.45 for matching,
    # where 1.0 is exact match, and anything above 0.35 is highly confident.
    return {
        "best_match_code": best_candidate_code,
        "similarity": best_similarity,
        "recognized": best_similarity > 0.35 # threshold configured as standard
    }
