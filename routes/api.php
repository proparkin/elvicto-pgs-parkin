<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\API\FtpMotion\{CameraUploadFtpController};
use App\Http\Controllers\API\{DisplayCountController,WifiLampController,CountAvaliableSlotController,CameraController,CameraQueueController,ParkingController,ProcessCameraImageQueueController,NewParkinCameraQueueController,NewParkinLampController,CameraQueueController200}; 

/*  
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These  
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('get-live-stream',[CameraController::class,'analyzeParkingSlots']); 
Route::get('get-crop-image',[CameraController::class,'getSlotImages']);
Route::get('get-number-plate',[CameraController::class,'runNumberPlateDetection']); 

Route::get('get-job-live-stream',[CameraQueueController::class,'getLiveStream']);
Route::get('get-process-camera-image',[ProcessCameraImageQueueController::class,'getLiveStream']);  

Route::get('get-job-new-parkin',[NewParkinCameraQueueController::class,'getLiveStream']);

// new parkin lamp api
Route::get('new-parkin-lamp-api',[NewParkinLampController::class,'checkMultipleAccountParkingLightStatus']);

// Vehicle search api.
Route::get('search-vehicle-location/{license_plate}',[ParkingController::class,'searchVehicleLocation']);

// Display count route
Route::get('parking-block-slots-count',[ParkingController::class,'displayCountDtc1Dtc2']);
Route::get('parking-block-slots-count-DTC3DTC4',[ParkingController::class,'displayCountDtc3Dtc4']);
Route::get('parking-block-slots-count-INT1',[ParkingController::class,'displayCountINT1']);
Route::get('parking-block-slots-count-INT2',[ParkingController::class,'displayCountINT2']);
Route::get('parking-block-slots-count-INT3INT4',[ParkingController::class,'displayCountINT3INT4']);

Route::get('new-parking-block-slots-count',[ParkingController::class,'newParkingSlotsCount']);

Route::get('all-parking-block-slots-count',[ParkingController::class,'getvehicleCount']);

// Total Display count route
Route::get('total-parking-block-slots-count',[ParkingController::class,'totalDisplayCountDtc1Dtc2']);
Route::get('total-parking-block-slots-count-DTC3DTC4',[ParkingController::class,'totalDisplayCountDtc3Dtc4']);
Route::get('total-parking-block-slots-count-INT1',[ParkingController::class,'totalDisplayCountINT1']);
Route::get('total-parking-block-slots-count-INT2',[ParkingController::class,'totalDisplayCountINT2']);
Route::get('total-parking-block-slots-count-INT3INT4',[ParkingController::class,'totalDisplayCountINT3INT4']);

Route::get('real-time-display-count',[DisplayCountController::class, 'updateDisplayWithImageAndText']);
Route::get('push-count-program-add',[DisplayCountController::class, 'pushCountToDisplay']);
Route::get('real-time-display-control',[DisplayCountController::class, 'displayVideoOn']);
Route::get('push-count/{count}',[DisplayCountController::class, 'pushDisplayCount']);


Route::get('get-avaliable-slots',[CountAvaliableSlotController::class, 'getAvaliableSlots']);
Route::get('slots-booking',[CountAvaliableSlotController::class, 'bookingSlots']);
Route::get('book-slots-remove',[CountAvaliableSlotController::class, 'bookingRemove']);

Route::get('lamp-control-api',[WifiLampController::class, 'lampControl']);
Route::get('test-lamp-control-api',[WifiLampController::class, 'testLampControl']);

// Setup for 200 cameras

Route::get('get-live-stream-200',[CameraQueueController200::class,'getLiveStream']); 
Route::get('get-crop-images-200',[CameraQueueController200::class,'ProcessParkingSlotsCoordinate']); 
Route::get('get-detect-plate-200',[CameraQueueController200::class,'DetectNumberPlateSJob']); 
Route::get('get-lamp-200',[CameraQueueController200::class,'WifiLampJob']); 

// setup for FTP upload camera images

Route::get('get-ftp-images',[CameraUploadFtpController::class,'getLiveStream']); 

Route::get('get-motion-images',[CameraUploadFtpController::class,'getLiveStream']);
Route::get('get-crop-motion-images',[CameraUploadFtpController::class,'ProcessParkingSlotsCoordinate']);
Route::get('get-detect-motion-images',[CameraUploadFtpController::class,'DetectNumberPlateSJob']);





