<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SetupIpAddressController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () 
{
    return view('welcome');
});

Route::get('camera-ip-update',[SetupIpAddressController::class,'setupCameraIp']);
Route::post('camera_ip_update',[SetupIpAddressController::class,'cameraIpUpdate']);

Route::get('lamp-ip-update',[SetupIpAddressController::class,'createLampIp']);
Route::post('lamp_ip_update',[SetupIpAddressController::class,'lampIpUpdate']);

Route::get('slot-update',[SetupIpAddressController::class,'createSlot']);
Route::get('/get-slots/{block_id}', [SetupIpAddressController::class, 'getSlots']);

Route::post('slot_update',[SetupIpAddressController::class,'slotUpdate']);

Route::get('lamp-status',[SetupIpAddressController::class,'checkLampStatus']);
Route::get('/get-lamp-slots/{lamp_id}', [SetupIpAddressController::class, 'getLampSlots']);
Route::post('lamp_check',[SetupIpAddressController::class,'lampControl']);


