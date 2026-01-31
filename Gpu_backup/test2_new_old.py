from ultralytics import YOLO

car_model = YOLO("/root/new_trained_model.pt")
print("Classes:", car_model.names)