<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ParkinSlotSeeder extends Seeder
{
    /*** Run the database seeds.*/
    public function run(): void
    {
        DB::table('parking_slots')->insert([  

            // DTC1 and DTC2 Slots List.
            // DTC1-P1 Block set 15 slot with camera and Lamp.
            ['block_id' => 1, 'camera_id' => 10, 'slot_number' => '1', 'parking_lamp_id' => Null],
            ['block_id' => 1, 'camera_id' => 10, 'slot_number' => '2', 'parking_lamp_id' => Null],
            ['block_id' => 1, 'camera_id' => 10, 'slot_number' => '3', 'parking_lamp_id' => Null],

            ['block_id' => 1, 'camera_id' => 9, 'slot_number' => '4', 'parking_lamp_id' => Null],
            ['block_id' => 1, 'camera_id' => 9, 'slot_number' => '5', 'parking_lamp_id' => Null],
            ['block_id' => 1, 'camera_id' => 9, 'slot_number' => '6', 'parking_lamp_id' => Null],

            ['block_id' => 1, 'camera_id' => 8, 'slot_number' => '7', 'parking_lamp_id' => Null],
            ['block_id' => 1, 'camera_id' => 8, 'slot_number' => '8', 'parking_lamp_id' => Null],
            ['block_id' => 1, 'camera_id' => 8, 'slot_number' => '9', 'parking_lamp_id' => Null],

            ['block_id' => 1, 'camera_id' => 7, 'slot_number' => '10', 'parking_lamp_id' => Null],
            ['block_id' => 1, 'camera_id' => 7, 'slot_number' => '11', 'parking_lamp_id' => Null],
            ['block_id' => 1, 'camera_id' => 7, 'slot_number' => '12', 'parking_lamp_id' => Null],

            ['block_id' => 1, 'camera_id' => 6, 'slot_number' => '13', 'parking_lamp_id' => Null],
            ['block_id' => 1, 'camera_id' => 6, 'slot_number' => '14', 'parking_lamp_id' => Null],
            ['block_id' => 1, 'camera_id' => 6, 'slot_number' => '15', 'parking_lamp_id' => Null],

            // DTC1-P2 Block set 15 slot with camera and Lamp.
            ['block_id' => 2, 'camera_id' => 5, 'slot_number' => '16', 'parking_lamp_id' => Null],
            ['block_id' => 2, 'camera_id' => 5, 'slot_number' => '17', 'parking_lamp_id' => Null],
            ['block_id' => 2, 'camera_id' => 5, 'slot_number' => '18', 'parking_lamp_id' => Null],

            ['block_id' => 2, 'camera_id' => 4, 'slot_number' => '19', 'parking_lamp_id' => Null],
            ['block_id' => 2, 'camera_id' => 4, 'slot_number' => '20', 'parking_lamp_id' => Null],
            ['block_id' => 2, 'camera_id' => 4, 'slot_number' => '21', 'parking_lamp_id' => Null],

            ['block_id' => 2, 'camera_id' => 3, 'slot_number' => '22', 'parking_lamp_id' => Null],
            ['block_id' => 2, 'camera_id' => 3, 'slot_number' => '23', 'parking_lamp_id' => Null],
            ['block_id' => 2, 'camera_id' => 3, 'slot_number' => '24', 'parking_lamp_id' => Null],

            ['block_id' => 2, 'camera_id' => 2, 'slot_number' => '25', 'parking_lamp_id' => Null],
            ['block_id' => 2, 'camera_id' => 2, 'slot_number' => '26', 'parking_lamp_id' => Null],
            ['block_id' => 2, 'camera_id' => 2, 'slot_number' => '27', 'parking_lamp_id' => Null],

            ['block_id' => 2, 'camera_id' => 1, 'slot_number' => '28', 'parking_lamp_id' => Null],
            ['block_id' => 2, 'camera_id' => 1, 'slot_number' => '29', 'parking_lamp_id' => Null],
            ['block_id' => 2, 'camera_id' => 1, 'slot_number' => '30', 'parking_lamp_id' => Null],

            // DTC2-P3 Block set 24 slot with camera and Lamp.
            ['block_id' => 3, 'camera_id' => 26, 'slot_number' => '31', 'parking_lamp_id' => Null],
            ['block_id' => 3, 'camera_id' => 26, 'slot_number' => '32', 'parking_lamp_id' => Null],
            ['block_id' => 3, 'camera_id' => 26, 'slot_number' => '33', 'parking_lamp_id' => Null],

            ['block_id' => 3, 'camera_id' => 25, 'slot_number' => '34', 'parking_lamp_id' => Null],
            ['block_id' => 3, 'camera_id' => 25, 'slot_number' => '35', 'parking_lamp_id' => Null],
            ['block_id' => 3, 'camera_id' => 25, 'slot_number' => '36', 'parking_lamp_id' => Null],

            ['block_id' => 3, 'camera_id' => 24, 'slot_number' => '37', 'parking_lamp_id' => Null],
            ['block_id' => 3, 'camera_id' => 24, 'slot_number' => '38', 'parking_lamp_id' => Null],
            ['block_id' => 3, 'camera_id' => 24, 'slot_number' => '39', 'parking_lamp_id' => NULL],

            ['block_id' => 3, 'camera_id' => 23, 'slot_number' => '40', 'parking_lamp_id' => Null],
            ['block_id' => 3, 'camera_id' => 23, 'slot_number' => '41', 'parking_lamp_id' => Null],
            ['block_id' => 3, 'camera_id' => 23, 'slot_number' => '42', 'parking_lamp_id' => Null],

            ['block_id' => 3, 'camera_id' => 22, 'slot_number' => '43', 'parking_lamp_id' => Null],
            ['block_id' => 3, 'camera_id' => 22, 'slot_number' => '44', 'parking_lamp_id' => Null],
            ['block_id' => 3, 'camera_id' => 22, 'slot_number' => '45', 'parking_lamp_id' => Null],

            ['block_id' => 3, 'camera_id' => 21, 'slot_number' => '46', 'parking_lamp_id' => Null],
            ['block_id' => 3, 'camera_id' => 21, 'slot_number' => '47', 'parking_lamp_id' => Null],
            ['block_id' => 3, 'camera_id' => 21, 'slot_number' => '48', 'parking_lamp_id' => Null],

            ['block_id' => 3, 'camera_id' => 20, 'slot_number' => '49', 'parking_lamp_id' => NULL],
            ['block_id' => 3, 'camera_id' => 20, 'slot_number' => '50', 'parking_lamp_id' => NULL],
            ['block_id' => 3, 'camera_id' => 20, 'slot_number' => '51', 'parking_lamp_id' => NULL],
 
            ['block_id' => 3, 'camera_id' => 19, 'slot_number' => '52', 'parking_lamp_id' => NULL],
            ['block_id' => 3, 'camera_id' => 19, 'slot_number' => '53', 'parking_lamp_id' => NULL],
            ['block_id' => 3, 'camera_id' => 19, 'slot_number' => '54', 'parking_lamp_id' => NULL],
            
            // DTC2-P4 Block set 24 slot with camera and Lamp.
            ['block_id' => 4, 'camera_id' => 18, 'slot_number' => '55', 'parking_lamp_id' => NULL],
            ['block_id' => 4, 'camera_id' => 18, 'slot_number' => '56', 'parking_lamp_id' => NULL],
            ['block_id' => 4, 'camera_id' => 18, 'slot_number' => '57', 'parking_lamp_id' => NULL],
 
            ['block_id' => 4, 'camera_id' => 17, 'slot_number' => '58', 'parking_lamp_id' => NULL],
            ['block_id' => 4, 'camera_id' => 17, 'slot_number' => '59', 'parking_lamp_id' => NULL],
            ['block_id' => 4, 'camera_id' => 17, 'slot_number' => '60', 'parking_lamp_id' => NULL],
 
            ['block_id' => 4, 'camera_id' => 16, 'slot_number' => '61', 'parking_lamp_id' => NULL],
            ['block_id' => 4, 'camera_id' => 16, 'slot_number' => '62', 'parking_lamp_id' => NULL],
            ['block_id' => 4, 'camera_id' => 16, 'slot_number' => '63', 'parking_lamp_id' => NULL],
 
            ['block_id' => 4, 'camera_id' => 15, 'slot_number' => '64', 'parking_lamp_id' => NULL],
            ['block_id' => 4, 'camera_id' => 15, 'slot_number' => '65', 'parking_lamp_id' => NULL],
            ['block_id' => 4, 'camera_id' => 15, 'slot_number' => '66', 'parking_lamp_id' => NULL],
 
            ['block_id' => 4, 'camera_id' => 14, 'slot_number' => '67', 'parking_lamp_id' => NULL],
            ['block_id' => 4, 'camera_id' => 14, 'slot_number' => '68', 'parking_lamp_id' => NULL],
            ['block_id' => 4, 'camera_id' => 14, 'slot_number' => '69', 'parking_lamp_id' => NULL],

            ['block_id' => 4, 'camera_id' => 13, 'slot_number' => '70', 'parking_lamp_id' => NULL],
            ['block_id' => 4, 'camera_id' => 13, 'slot_number' => '71', 'parking_lamp_id' => NULL],
            ['block_id' => 4, 'camera_id' => 13, 'slot_number' => '72', 'parking_lamp_id' => NULL],

            ['block_id' => 4, 'camera_id' => 12, 'slot_number' => '73', 'parking_lamp_id' => NULL],
            ['block_id' => 4, 'camera_id' => 12, 'slot_number' => '74', 'parking_lamp_id' => NULL],
            ['block_id' => 4, 'camera_id' => 12, 'slot_number' => '75', 'parking_lamp_id' => NULL],

            ['block_id' => 4, 'camera_id' => 11, 'slot_number' => '76', 'parking_lamp_id' => NULL],
            ['block_id' => 4, 'camera_id' => 11, 'slot_number' => '77', 'parking_lamp_id' => NULL],
            ['block_id' => 4, 'camera_id' => 11, 'slot_number' => '78', 'parking_lamp_id' => NULL],
            
            // DTC1 Q1 Block set 18 slot with camera and Lamp.
            ['block_id' => 5, 'camera_id' => 38, 'slot_number' => '1', 'parking_lamp_id' => NULL],
            ['block_id' => 5, 'camera_id' => 38, 'slot_number' => '2', 'parking_lamp_id' => NULL],
            ['block_id' => 5, 'camera_id' => 38, 'slot_number' => '3', 'parking_lamp_id' => NULL], 
 
            ['block_id' => 5, 'camera_id' => 37, 'slot_number' => '4', 'parking_lamp_id' => NULL],
            ['block_id' => 5, 'camera_id' => 37, 'slot_number' => '5', 'parking_lamp_id' => NULL],
            ['block_id' => 5, 'camera_id' => 37, 'slot_number' => '6', 'parking_lamp_id' => NULL],

            ['block_id' => 5, 'camera_id' => 36, 'slot_number' => '7', 'parking_lamp_id' => NULL],
            ['block_id' => 5, 'camera_id' => 36, 'slot_number' => '8', 'parking_lamp_id' => NULL],
            ['block_id' => 5, 'camera_id' => 36, 'slot_number' => '9', 'parking_lamp_id' => NULL],
 
            ['block_id' => 5, 'camera_id' => 35, 'slot_number' => '10', 'parking_lamp_id' => NULL],
            ['block_id' => 5, 'camera_id' => 35, 'slot_number' => '11', 'parking_lamp_id' => NULL],
            ['block_id' => 5, 'camera_id' => 35, 'slot_number' => '12', 'parking_lamp_id' => NULL],
 
            ['block_id' => 5, 'camera_id' => 34, 'slot_number' => '13', 'parking_lamp_id' => NULL],
            ['block_id' => 5, 'camera_id' => 34, 'slot_number' => '14', 'parking_lamp_id' => NULL],
            ['block_id' => 5, 'camera_id' => 34, 'slot_number' => '15', 'parking_lamp_id' => NULL],
 
            ['block_id' => 5, 'camera_id' => 33, 'slot_number' => '16', 'parking_lamp_id' => NULL],
            ['block_id' => 5, 'camera_id' => 33, 'slot_number' => '17', 'parking_lamp_id' => NULL],
            ['block_id' => 5, 'camera_id' => 33, 'slot_number' => '18', 'parking_lamp_id' => NULL],

            // DTC1 Q2 Block set 18 slot with camera and Lamp.
            ['block_id' => 6, 'camera_id' => 32, 'slot_number' => '19', 'parking_lamp_id' => NULL],
            ['block_id' => 6, 'camera_id' => 32, 'slot_number' => '20', 'parking_lamp_id' => NULL],
            ['block_id' => 6, 'camera_id' => 32, 'slot_number' => '21', 'parking_lamp_id' => NULL],
            
            ['block_id' => 6, 'camera_id' => 31, 'slot_number' => '22', 'parking_lamp_id' => NULL],
            ['block_id' => 6, 'camera_id' => 31, 'slot_number' => '23', 'parking_lamp_id' => NULL],
            ['block_id' => 6, 'camera_id' => 31, 'slot_number' => '24', 'parking_lamp_id' => NULL],
 
            ['block_id' => 6, 'camera_id' => 30, 'slot_number' => '25', 'parking_lamp_id' => NULL],
            ['block_id' => 6, 'camera_id' => 30, 'slot_number' => '26', 'parking_lamp_id' => NULL],
            ['block_id' => 6, 'camera_id' => 30, 'slot_number' => '27', 'parking_lamp_id' => NULL],

            ['block_id' => 6, 'camera_id' => 29, 'slot_number' => '28', 'parking_lamp_id' => NULL],
            ['block_id' => 6, 'camera_id' => 29, 'slot_number' => '29', 'parking_lamp_id' => NULL],
            ['block_id' => 6, 'camera_id' => 29, 'slot_number' => '30', 'parking_lamp_id' => NULL],

            ['block_id' => 6, 'camera_id' => 28, 'slot_number' => '31', 'parking_lamp_id' => NULL],
            ['block_id' => 6, 'camera_id' => 28, 'slot_number' => '32', 'parking_lamp_id' => NULL],
            ['block_id' => 6, 'camera_id' => 28, 'slot_number' => '33', 'parking_lamp_id' => NULL],

            ['block_id' => 6, 'camera_id' => 27, 'slot_number' => '34', 'parking_lamp_id' => NULL],
            ['block_id' => 6, 'camera_id' => 27, 'slot_number' => '35', 'parking_lamp_id' => NULL],
            ['block_id' => 6, 'camera_id' => 27, 'slot_number' => '36', 'parking_lamp_id' => NULL],

            // DTC2 Q3 Block set 24 slot with camera and Lamp.
            ['block_id' => 7, 'camera_id' => 54, 'slot_number' => '37', 'parking_lamp_id' => NULL],
            ['block_id' => 7, 'camera_id' => 54, 'slot_number' => '38', 'parking_lamp_id' => NULL],
            ['block_id' => 7, 'camera_id' => 54, 'slot_number' => '39', 'parking_lamp_id' => NULL],

            ['block_id' => 7, 'camera_id' => 53, 'slot_number' => '40', 'parking_lamp_id' => NULL],
            ['block_id' => 7, 'camera_id' => 53, 'slot_number' => '41', 'parking_lamp_id' => NULL],
            ['block_id' => 7, 'camera_id' => 53, 'slot_number' => '42', 'parking_lamp_id' => NULL],

            ['block_id' => 7, 'camera_id' => 52, 'slot_number' => '43', 'parking_lamp_id' => NULL],
            ['block_id' => 7, 'camera_id' => 52, 'slot_number' => '44', 'parking_lamp_id' => NULL],
            ['block_id' => 7, 'camera_id' => 52, 'slot_number' => '45', 'parking_lamp_id' => NULL],

            ['block_id' => 7, 'camera_id' => 51, 'slot_number' => '46', 'parking_lamp_id' => NULL],
            ['block_id' => 7, 'camera_id' => 51, 'slot_number' => '47', 'parking_lamp_id' => NULL],
            ['block_id' => 7, 'camera_id' => 51, 'slot_number' => '48', 'parking_lamp_id' => NULL],

            ['block_id' => 7, 'camera_id' => 50, 'slot_number' => '49', 'parking_lamp_id' => NULL],
            ['block_id' => 7, 'camera_id' => 50, 'slot_number' => '50', 'parking_lamp_id' => NULL],
            ['block_id' => 7, 'camera_id' => 50, 'slot_number' => '51', 'parking_lamp_id' => NULL],

            ['block_id' => 7, 'camera_id' => 49, 'slot_number' => '52', 'parking_lamp_id' => NULL],
            ['block_id' => 7, 'camera_id' => 49, 'slot_number' => '53', 'parking_lamp_id' => NULL],
            ['block_id' => 7, 'camera_id' => 49, 'slot_number' => '54', 'parking_lamp_id' => NULL],

            ['block_id' => 7, 'camera_id' => 48, 'slot_number' => '55', 'parking_lamp_id' => NULL],
            ['block_id' => 7, 'camera_id' => 48, 'slot_number' => '56', 'parking_lamp_id' => NULL],
            ['block_id' => 7, 'camera_id' => 48, 'slot_number' => '57', 'parking_lamp_id' => NULL],

            ['block_id' => 7, 'camera_id' => 47, 'slot_number' => '58', 'parking_lamp_id' => NULL],
            ['block_id' => 7, 'camera_id' => 47, 'slot_number' => '59', 'parking_lamp_id' => NULL],
            ['block_id' => 7, 'camera_id' => 47, 'slot_number' => '60', 'parking_lamp_id' => NULL],

            // DTC2 Q4 Block set 24 slot with camera and Lamp.
            ['block_id' => 8, 'camera_id' => 46, 'slot_number' => '61', 'parking_lamp_id' => NULL],
            ['block_id' => 8, 'camera_id' => 46, 'slot_number' => '62', 'parking_lamp_id' => NULL],
            ['block_id' => 8, 'camera_id' => 46, 'slot_number' => '63', 'parking_lamp_id' => NULL],

            ['block_id' => 8, 'camera_id' => 45, 'slot_number' => '64', 'parking_lamp_id' => NULL],
            ['block_id' => 8, 'camera_id' => 45, 'slot_number' => '65', 'parking_lamp_id' => NULL],
            ['block_id' => 8, 'camera_id' => 45, 'slot_number' => '66', 'parking_lamp_id' => NULL],

            ['block_id' => 8, 'camera_id' => 44, 'slot_number' => '67', 'parking_lamp_id' => NULL],
            ['block_id' => 8, 'camera_id' => 44, 'slot_number' => '68', 'parking_lamp_id' => NULL],
            ['block_id' => 8, 'camera_id' => 44, 'slot_number' => '69', 'parking_lamp_id' => NULL],

            ['block_id' => 8, 'camera_id' => 43, 'slot_number' => '70', 'parking_lamp_id' => NULL],
            ['block_id' => 8, 'camera_id' => 43, 'slot_number' => '71', 'parking_lamp_id' => NULL],
            ['block_id' => 8, 'camera_id' => 43, 'slot_number' => '72', 'parking_lamp_id' => NULL],

            ['block_id' => 8, 'camera_id' => 42, 'slot_number' => '73', 'parking_lamp_id' => NULL],
            ['block_id' => 8, 'camera_id' => 42, 'slot_number' => '74', 'parking_lamp_id' => NULL],
            ['block_id' => 8, 'camera_id' => 42, 'slot_number' => '75', 'parking_lamp_id' => NULL],

            ['block_id' => 8, 'camera_id' => 41, 'slot_number' => '76', 'parking_lamp_id' => NULL],
            ['block_id' => 8, 'camera_id' => 41, 'slot_number' => '77', 'parking_lamp_id' => NULL],
            ['block_id' => 8, 'camera_id' => 41, 'slot_number' => '78', 'parking_lamp_id' => NULL],

            ['block_id' => 8, 'camera_id' => 40, 'slot_number' => '79', 'parking_lamp_id' => NULL],
            ['block_id' => 8, 'camera_id' => 40, 'slot_number' => '80', 'parking_lamp_id' => NULL],
            ['block_id' => 8, 'camera_id' => 40, 'slot_number' => '81', 'parking_lamp_id' => NULL],

            ['block_id' => 8, 'camera_id' => 39, 'slot_number' => '82', 'parking_lamp_id' => NULL],
            ['block_id' => 8, 'camera_id' => 39, 'slot_number' => '83', 'parking_lamp_id' => NULL],
            ['block_id' => 8, 'camera_id' => 39, 'slot_number' => '84', 'parking_lamp_id' => NULL],

            // DTC1 R1 Block set 18 slot with camera and Lamp.
            ['block_id' => 9, 'camera_id' => 66, 'slot_number' => '1', 'parking_lamp_id' => NULL],
            ['block_id' => 9, 'camera_id' => 66, 'slot_number' => '2', 'parking_lamp_id' => NULL],
            ['block_id' => 9, 'camera_id' => 66, 'slot_number' => '3', 'parking_lamp_id' => NULL],
  
            ['block_id' => 9, 'camera_id' => 65, 'slot_number' => '4', 'parking_lamp_id' => NULL],
            ['block_id' => 9, 'camera_id' => 65, 'slot_number' => '5', 'parking_lamp_id' => NULL],
            ['block_id' => 9, 'camera_id' => 65, 'slot_number' => '6', 'parking_lamp_id' => NULL],
  
            ['block_id' => 9, 'camera_id' => 64, 'slot_number' => '7', 'parking_lamp_id' => NULL],
            ['block_id' => 9, 'camera_id' => 64, 'slot_number' => '8', 'parking_lamp_id' => NULL],
            ['block_id' => 9, 'camera_id' => 64, 'slot_number' => '9', 'parking_lamp_id' => NULL],
  
            ['block_id' => 9, 'camera_id' => 63, 'slot_number' => '10', 'parking_lamp_id' => NULL],
            ['block_id' => 9, 'camera_id' => 63, 'slot_number' => '11', 'parking_lamp_id' => NULL],
            ['block_id' => 9, 'camera_id' => 63, 'slot_number' => '12', 'parking_lamp_id' => NULL],
  
            ['block_id' => 9, 'camera_id' => 62, 'slot_number' => '13', 'parking_lamp_id' => NULL],
            ['block_id' => 9, 'camera_id' => 62, 'slot_number' => '14', 'parking_lamp_id' => NULL],
            ['block_id' => 9, 'camera_id' => 62, 'slot_number' => '15', 'parking_lamp_id' => NULL],
  
            ['block_id' => 9, 'camera_id' => 61, 'slot_number' => '16', 'parking_lamp_id' => NULL],
            ['block_id' => 9, 'camera_id' => 61, 'slot_number' => '17', 'parking_lamp_id' => NULL],
            ['block_id' => 9, 'camera_id' => 61, 'slot_number' => '18', 'parking_lamp_id' => NULL],

            // DTC1 R2 Block set 18 slot with camera and Lamp.
            ['block_id' => 10, 'camera_id' => 60, 'slot_number' => '19', 'parking_lamp_id' => NULL],
            ['block_id' => 10, 'camera_id' => 60, 'slot_number' => '20', 'parking_lamp_id' => NULL],
            ['block_id' => 10, 'camera_id' => 60, 'slot_number' => '21', 'parking_lamp_id' => NULL],
            
            ['block_id' => 10, 'camera_id' => 59, 'slot_number' => '22', 'parking_lamp_id' => NULL],
            ['block_id' => 10, 'camera_id' => 59, 'slot_number' => '23', 'parking_lamp_id' => NULL],
            ['block_id' => 10, 'camera_id' => 59, 'slot_number' => '24', 'parking_lamp_id' => NULL],
  
            ['block_id' => 10, 'camera_id' => 58, 'slot_number' => '25', 'parking_lamp_id' => NULL],
            ['block_id' => 10, 'camera_id' => 58, 'slot_number' => '26', 'parking_lamp_id' => NULL],
            ['block_id' => 10, 'camera_id' => 58, 'slot_number' => '27', 'parking_lamp_id' => NULL],
 
            ['block_id' => 10, 'camera_id' => 57, 'slot_number' => '28', 'parking_lamp_id' => NULL],
            ['block_id' => 10, 'camera_id' => 57, 'slot_number' => '29', 'parking_lamp_id' => NULL],
            ['block_id' => 10, 'camera_id' => 57, 'slot_number' => '30', 'parking_lamp_id' => NULL],
  
            ['block_id' => 10, 'camera_id' => 56, 'slot_number' => '31', 'parking_lamp_id' => NULL],
            ['block_id' => 10, 'camera_id' => 56, 'slot_number' => '32', 'parking_lamp_id' => NULL],
            ['block_id' => 10, 'camera_id' => 56, 'slot_number' => '33', 'parking_lamp_id' => NULL],
  
            ['block_id' => 10, 'camera_id' => 55, 'slot_number' => '34', 'parking_lamp_id' => NULL],
            ['block_id' => 10, 'camera_id' => 55, 'slot_number' => '35', 'parking_lamp_id' => NULL],
            ['block_id' => 10, 'camera_id' => 55, 'slot_number' => '36', 'parking_lamp_id' => NULL],

            // DTC2 R3 Block set 24 slot with camera and Lamp.
            ['block_id' => 11, 'camera_id' => 82, 'slot_number' => '37', 'parking_lamp_id' => NULL],
            ['block_id' => 11, 'camera_id' => 82, 'slot_number' => '38', 'parking_lamp_id' => NULL],
            ['block_id' => 11, 'camera_id' => 82, 'slot_number' => '39', 'parking_lamp_id' => NULL],
  
            ['block_id' => 11, 'camera_id' => 81, 'slot_number' => '40', 'parking_lamp_id' => NULL],
            ['block_id' => 11, 'camera_id' => 81, 'slot_number' => '41', 'parking_lamp_id' => NULL],
            ['block_id' => 11, 'camera_id' => 81, 'slot_number' => '42', 'parking_lamp_id' => NULL],

            ['block_id' => 11, 'camera_id' => 80, 'slot_number' => '43', 'parking_lamp_id' => NULL],
            ['block_id' => 11, 'camera_id' => 80, 'slot_number' => '44', 'parking_lamp_id' => NULL],
            ['block_id' => 11, 'camera_id' => 80, 'slot_number' => '45', 'parking_lamp_id' => NULL],
  
            ['block_id' => 11, 'camera_id' => 79, 'slot_number' => '46', 'parking_lamp_id' => NULL],
            ['block_id' => 11, 'camera_id' => 79, 'slot_number' => '47', 'parking_lamp_id' => NULL],
            ['block_id' => 11, 'camera_id' => 79, 'slot_number' => '48', 'parking_lamp_id' => NULL],

            ['block_id' => 11, 'camera_id' => 78, 'slot_number' => '49', 'parking_lamp_id' => NULL],
            ['block_id' => 11, 'camera_id' => 78, 'slot_number' => '50', 'parking_lamp_id' => NULL],
            ['block_id' => 11, 'camera_id' => 78, 'slot_number' => '51', 'parking_lamp_id' => NULL],
 
            ['block_id' => 11, 'camera_id' => 77, 'slot_number' => '52', 'parking_lamp_id' => NULL],
            ['block_id' => 11, 'camera_id' => 77, 'slot_number' => '53', 'parking_lamp_id' => NULL],
            ['block_id' => 11, 'camera_id' => 77, 'slot_number' => '54', 'parking_lamp_id' => NULL],
 
            ['block_id' => 11, 'camera_id' => 76, 'slot_number' => '55', 'parking_lamp_id' => NULL],
            ['block_id' => 11, 'camera_id' => 76, 'slot_number' => '56', 'parking_lamp_id' => NULL],
            ['block_id' => 11, 'camera_id' => 76, 'slot_number' => '57', 'parking_lamp_id' => NULL],
 
            ['block_id' => 11, 'camera_id' => 75, 'slot_number' => '58', 'parking_lamp_id' => NULL],
            ['block_id' => 11, 'camera_id' => 75, 'slot_number' => '59', 'parking_lamp_id' => NULL],
            ['block_id' => 11, 'camera_id' => 75, 'slot_number' => '60', 'parking_lamp_id' => NULL],

            // DTC2 R4 Block set 24 slot with camera and Lamp.
            ['block_id' => 12, 'camera_id' => 74, 'slot_number' => '61', 'parking_lamp_id' => NULL],
            ['block_id' => 12, 'camera_id' => 74, 'slot_number' => '62', 'parking_lamp_id' => NULL],
            ['block_id' => 12, 'camera_id' => 74, 'slot_number' => '63', 'parking_lamp_id' => NULL],
 
            ['block_id' => 12, 'camera_id' => 73, 'slot_number' => '64', 'parking_lamp_id' => NULL],
            ['block_id' => 12, 'camera_id' => 73, 'slot_number' => '65', 'parking_lamp_id' => NULL],
            ['block_id' => 12, 'camera_id' => 73, 'slot_number' => '66', 'parking_lamp_id' => NULL],
            
            ['block_id' => 12, 'camera_id' => 72, 'slot_number' => '67', 'parking_lamp_id' => NULL],
            ['block_id' => 12, 'camera_id' => 72, 'slot_number' => '68', 'parking_lamp_id' => NULL],
            ['block_id' => 12, 'camera_id' => 72, 'slot_number' => '69', 'parking_lamp_id' => NULL],
 
            ['block_id' => 12, 'camera_id' => 71, 'slot_number' => '70', 'parking_lamp_id' => NULL],
            ['block_id' => 12, 'camera_id' => 71, 'slot_number' => '71', 'parking_lamp_id' => NULL],
            ['block_id' => 12, 'camera_id' => 71, 'slot_number' => '72', 'parking_lamp_id' => NULL],
 
            ['block_id' => 12, 'camera_id' => 70, 'slot_number' => '73', 'parking_lamp_id' => NULL],
            ['block_id' => 12, 'camera_id' => 70, 'slot_number' => '74', 'parking_lamp_id' => NULL],
            ['block_id' => 12, 'camera_id' => 70, 'slot_number' => '75', 'parking_lamp_id' => NULL],
 
            ['block_id' => 12, 'camera_id' => 69, 'slot_number' => '76', 'parking_lamp_id' => NULL],
            ['block_id' => 12, 'camera_id' => 69, 'slot_number' => '77', 'parking_lamp_id' => NULL],
            ['block_id' => 12, 'camera_id' => 69, 'slot_number' => '78', 'parking_lamp_id' => NULL],
 
            ['block_id' => 12, 'camera_id' => 68, 'slot_number' => '79', 'parking_lamp_id' => NULL],
            ['block_id' => 12, 'camera_id' => 68, 'slot_number' => '80', 'parking_lamp_id' => NULL],
            ['block_id' => 12, 'camera_id' => 68, 'slot_number' => '81', 'parking_lamp_id' => NULL],
 
            ['block_id' => 12, 'camera_id' => 67, 'slot_number' => '82', 'parking_lamp_id' => NULL],
            ['block_id' => 12, 'camera_id' => 67, 'slot_number' => '83', 'parking_lamp_id' => NULL],
            ['block_id' => 12, 'camera_id' => 67, 'slot_number' => '84', 'parking_lamp_id' => NULL],
 
            // DTC1 S1 Block set 18 slot number with camera and Lamp.
            ['block_id' => 13, 'camera_id' => 94, 'slot_number' => '1', 'parking_lamp_id' => NULL],
            ['block_id' => 13, 'camera_id' => 94, 'slot_number' => '2', 'parking_lamp_id' => NULL],
            ['block_id' => 13, 'camera_id' => 94, 'slot_number' => '3', 'parking_lamp_id' => NULL],
   
            ['block_id' => 13, 'camera_id' => 93, 'slot_number' => '4', 'parking_lamp_id' => NULL],
            ['block_id' => 13, 'camera_id' => 93, 'slot_number' => '5', 'parking_lamp_id' => NULL],
            ['block_id' => 13, 'camera_id' => 93, 'slot_number' => '6', 'parking_lamp_id' => NULL],
   
            ['block_id' => 13, 'camera_id' => 92, 'slot_number' => '7', 'parking_lamp_id' => NULL],
            ['block_id' => 13, 'camera_id' => 92, 'slot_number' => '8', 'parking_lamp_id' => NULL],
            ['block_id' => 13, 'camera_id' => 92, 'slot_number' => '9', 'parking_lamp_id' => NULL],
   
            ['block_id' => 13, 'camera_id' => 91, 'slot_number' => '10', 'parking_lamp_id' => NULL],
            ['block_id' => 13, 'camera_id' => 91, 'slot_number' => '11', 'parking_lamp_id' => NULL],
            ['block_id' => 13, 'camera_id' => 91, 'slot_number' => '12', 'parking_lamp_id' => NULL],
   
            ['block_id' => 13, 'camera_id' => 90, 'slot_number' => '13', 'parking_lamp_id' => NULL],
            ['block_id' => 13, 'camera_id' => 90, 'slot_number' => '14', 'parking_lamp_id' => NULL],
            ['block_id' => 13, 'camera_id' => 90, 'slot_number' => '15', 'parking_lamp_id' => NULL],
   
            ['block_id' => 13, 'camera_id' => 89, 'slot_number' => '16', 'parking_lamp_id' => NULL],
            ['block_id' => 13, 'camera_id' => 89, 'slot_number' => '17', 'parking_lamp_id' => NULL],
            ['block_id' => 13, 'camera_id' => 89, 'slot_number' => '18', 'parking_lamp_id' => NULL],
            
            // DTC1 S2 Block set 18 slot number with camera and Lamp.
            ['block_id' => 14, 'camera_id' => 88, 'slot_number' => '19', 'parking_lamp_id' => NULL],
            ['block_id' => 14, 'camera_id' => 88, 'slot_number' => '20', 'parking_lamp_id' => NULL],
            ['block_id' => 14, 'camera_id' => 88, 'slot_number' => '21', 'parking_lamp_id' => NULL],
   
            ['block_id' => 14, 'camera_id' => 87, 'slot_number' => '22', 'parking_lamp_id' => NULL],
            ['block_id' => 14, 'camera_id' => 87, 'slot_number' => '23', 'parking_lamp_id' => NULL],
            ['block_id' => 14, 'camera_id' => 87, 'slot_number' => '24', 'parking_lamp_id' => NULL],

            ['block_id' => 14, 'camera_id' => 86, 'slot_number' => '25', 'parking_lamp_id' => NULL],
            ['block_id' => 14, 'camera_id' => 86, 'slot_number' => '26', 'parking_lamp_id' => NULL],
            ['block_id' => 14, 'camera_id' => 86, 'slot_number' => '27', 'parking_lamp_id' => NULL],
  
            ['block_id' => 14, 'camera_id' => 85, 'slot_number' => '28', 'parking_lamp_id' => NULL],
            ['block_id' => 14, 'camera_id' => 85, 'slot_number' => '29', 'parking_lamp_id' => NULL],
            ['block_id' => 14, 'camera_id' => 85, 'slot_number' => '30', 'parking_lamp_id' => NULL],
   
            ['block_id' => 14, 'camera_id' => 84, 'slot_number' => '31', 'parking_lamp_id' => NULL],
            ['block_id' => 14, 'camera_id' => 84, 'slot_number' => '32', 'parking_lamp_id' => NULL],
            ['block_id' => 14, 'camera_id' => 84, 'slot_number' => '33', 'parking_lamp_id' => NULL],
   
            ['block_id' => 14, 'camera_id' => 83, 'slot_number' => '34', 'parking_lamp_id' => NULL],
            ['block_id' => 14, 'camera_id' => 83, 'slot_number' => '35', 'parking_lamp_id' => NULL],
            ['block_id' => 14, 'camera_id' => 83, 'slot_number' => '36', 'parking_lamp_id' => NULL],
            
            // DTC2 S3 Block set 24 slot number with camera and Lamp.
            ['block_id' => 15, 'camera_id' => 110, 'slot_number' => '37', 'parking_lamp_id' => NULL],
            ['block_id' => 15, 'camera_id' => 110, 'slot_number' => '38', 'parking_lamp_id' => NULL],
            ['block_id' => 15, 'camera_id' => 110, 'slot_number' => '39', 'parking_lamp_id' => NULL],
   
            ['block_id' => 15, 'camera_id' => 109, 'slot_number' => '40', 'parking_lamp_id' => NULL],
            ['block_id' => 15, 'camera_id' => 109, 'slot_number' => '41', 'parking_lamp_id' => NULL],
            ['block_id' => 15, 'camera_id' => 109, 'slot_number' => '42', 'parking_lamp_id' => NULL],
   
            ['block_id' => 15, 'camera_id' => 108, 'slot_number' => '43', 'parking_lamp_id' => NULL],
            ['block_id' => 15, 'camera_id' => 108, 'slot_number' => '44', 'parking_lamp_id' => NULL],
            ['block_id' => 15, 'camera_id' => 108, 'slot_number' => '45', 'parking_lamp_id' => NULL],

            ['block_id' => 15, 'camera_id' => 107, 'slot_number' => '46', 'parking_lamp_id' => NULL],
            ['block_id' => 15, 'camera_id' => 107, 'slot_number' => '47', 'parking_lamp_id' => NULL],
            ['block_id' => 15, 'camera_id' => 107, 'slot_number' => '48', 'parking_lamp_id' => NULL],
            
            ['block_id' => 15, 'camera_id' => 106, 'slot_number' => '49', 'parking_lamp_id' => NULL],
            ['block_id' => 15, 'camera_id' => 106, 'slot_number' => '50', 'parking_lamp_id' => NULL],
            ['block_id' => 15, 'camera_id' => 106, 'slot_number' => '51', 'parking_lamp_id' => NULL],

            ['block_id' => 15, 'camera_id' => 105, 'slot_number' => '52', 'parking_lamp_id' => NULL],
            ['block_id' => 15, 'camera_id' => 105, 'slot_number' => '53', 'parking_lamp_id' => NULL],
            ['block_id' => 15, 'camera_id' => 105, 'slot_number' => '54', 'parking_lamp_id' => NULL],
  
            ['block_id' => 15, 'camera_id' => 104, 'slot_number' => '55', 'parking_lamp_id' => NULL],
            ['block_id' => 15, 'camera_id' => 104, 'slot_number' => '56', 'parking_lamp_id' => NULL],
            ['block_id' => 15, 'camera_id' => 104, 'slot_number' => '57', 'parking_lamp_id' => NULL],

            ['block_id' => 15, 'camera_id' => 103, 'slot_number' => '58', 'parking_lamp_id' => NULL],
            ['block_id' => 15, 'camera_id' => 103, 'slot_number' => '59', 'parking_lamp_id' => NULL],
            ['block_id' => 15, 'camera_id' => 103, 'slot_number' => '60', 'parking_lamp_id' => NULL],
            
            // DTC2 S4 Block set 24 slot number with camera and Lamp.
            ['block_id' => 16, 'camera_id' => 102, 'slot_number' => '61', 'parking_lamp_id' => NULL],
            ['block_id' => 16, 'camera_id' => 102, 'slot_number' => '62', 'parking_lamp_id' => NULL],
            ['block_id' => 16, 'camera_id' => 102, 'slot_number' => '63', 'parking_lamp_id' => NULL],
  
            ['block_id' => 16, 'camera_id' => 101, 'slot_number' => '64', 'parking_lamp_id' => NULL],
            ['block_id' => 16, 'camera_id' => 101, 'slot_number' => '65', 'parking_lamp_id' => NULL],
            ['block_id' => 16, 'camera_id' => 101, 'slot_number' => '66', 'parking_lamp_id' => NULL],
  
            ['block_id' => 16, 'camera_id' => 100, 'slot_number' => '67', 'parking_lamp_id' => NULL],
            ['block_id' => 16, 'camera_id' => 100, 'slot_number' => '68', 'parking_lamp_id' => NULL],
            ['block_id' => 16, 'camera_id' => 100, 'slot_number' => '69', 'parking_lamp_id' => NULL],
  
            ['block_id' => 16, 'camera_id' => 99, 'slot_number' => '70', 'parking_lamp_id' => NULL],
            ['block_id' => 16, 'camera_id' => 99, 'slot_number' => '71', 'parking_lamp_id' => NULL],
            ['block_id' => 16, 'camera_id' => 99, 'slot_number' => '72', 'parking_lamp_id' => NULL],
            
            ['block_id' => 16, 'camera_id' => 98, 'slot_number' => '73', 'parking_lamp_id' => NULL],
            ['block_id' => 16, 'camera_id' => 98, 'slot_number' => '74', 'parking_lamp_id' => NULL],
            ['block_id' => 16, 'camera_id' => 98, 'slot_number' => '75', 'parking_lamp_id' => NULL],

            ['block_id' => 16, 'camera_id' => 97, 'slot_number' => '76', 'parking_lamp_id' => NULL],
            ['block_id' => 16, 'camera_id' => 97, 'slot_number' => '77', 'parking_lamp_id' => NULL],
            ['block_id' => 16, 'camera_id' => 97, 'slot_number' => '78', 'parking_lamp_id' => NULL],
  
            ['block_id' => 16, 'camera_id' => 96, 'slot_number' => '79', 'parking_lamp_id' => NULL],
            ['block_id' => 16, 'camera_id' => 96, 'slot_number' => '80', 'parking_lamp_id' => NULL],
            ['block_id' => 16, 'camera_id' => 96, 'slot_number' => '81', 'parking_lamp_id' => NULL],
  
            ['block_id' => 16, 'camera_id' => 95, 'slot_number' => '82', 'parking_lamp_id' => NULL],
            ['block_id' => 16, 'camera_id' => 95, 'slot_number' => '83', 'parking_lamp_id' => NULL],
            ['block_id' => 16, 'camera_id' => 95, 'slot_number' => '84', 'parking_lamp_id' => NULL],

            // DTC1 T1 Block set 18 slot with camera and Lamp.
            ['block_id' => 17, 'camera_id' => 122, 'slot_number' => '1', 'parking_lamp_id' => NULL],
            ['block_id' => 17, 'camera_id' => 122, 'slot_number' => '2', 'parking_lamp_id' => NULL],
            ['block_id' => 17, 'camera_id' => 122, 'slot_number' => '3', 'parking_lamp_id' => NULL],
    
            ['block_id' => 17, 'camera_id' => 121, 'slot_number' => '4', 'parking_lamp_id' => NULL],
            ['block_id' => 17, 'camera_id' => 121, 'slot_number' => '5', 'parking_lamp_id' => NULL],
            ['block_id' => 17, 'camera_id' => 121, 'slot_number' => '6', 'parking_lamp_id' => NULL],
    
            ['block_id' => 17, 'camera_id' => 120, 'slot_number' => '7', 'parking_lamp_id' => NULL],
            ['block_id' => 17, 'camera_id' => 120, 'slot_number' => '8', 'parking_lamp_id' => NULL],
            ['block_id' => 17, 'camera_id' => 120, 'slot_number' => '9', 'parking_lamp_id' => NULL],
    
            ['block_id' => 17, 'camera_id' => 119, 'slot_number' => '10', 'parking_lamp_id' => NULL],
            ['block_id' => 17, 'camera_id' => 119, 'slot_number' => '11', 'parking_lamp_id' => NULL],
            ['block_id' => 17, 'camera_id' => 119, 'slot_number' => '12', 'parking_lamp_id' => NULL],
    
            ['block_id' => 17, 'camera_id' => 118, 'slot_number' => '13', 'parking_lamp_id' => NULL],
            ['block_id' => 17, 'camera_id' => 118, 'slot_number' => '14', 'parking_lamp_id' => NULL],
            ['block_id' => 17, 'camera_id' => 118, 'slot_number' => '15', 'parking_lamp_id' => NULL],
    
            ['block_id' => 17, 'camera_id' => 117, 'slot_number' => '16', 'parking_lamp_id' => NULL],
            ['block_id' => 17, 'camera_id' => 117, 'slot_number' => '17', 'parking_lamp_id' => NULL],
            ['block_id' => 17, 'camera_id' => 117, 'slot_number' => '18', 'parking_lamp_id' => NULL],
            
            // DTC1 T2 Block set 18 slot with camera and Lamp.
            ['block_id' => 18, 'camera_id' => 116, 'slot_number' => '19', 'parking_lamp_id' => NULL],
            ['block_id' => 18, 'camera_id' => 116, 'slot_number' => '20', 'parking_lamp_id' => NULL],
            ['block_id' => 18, 'camera_id' => 116, 'slot_number' => '21', 'parking_lamp_id' => NULL],
    
            ['block_id' => 18, 'camera_id' => 115, 'slot_number' => '22', 'parking_lamp_id' => NULL],
            ['block_id' => 18, 'camera_id' => 115, 'slot_number' => '23', 'parking_lamp_id' => NULL],
            ['block_id' => 18, 'camera_id' => 115, 'slot_number' => '24', 'parking_lamp_id' => NULL],
            
            ['block_id' => 18, 'camera_id' => 114, 'slot_number' => '25', 'parking_lamp_id' => NULL],
            ['block_id' => 18, 'camera_id' => 114, 'slot_number' => '26', 'parking_lamp_id' => NULL],
            ['block_id' => 18, 'camera_id' => 114, 'slot_number' => '27', 'parking_lamp_id' => NULL],
   
            ['block_id' => 18, 'camera_id' => 113, 'slot_number' => '28', 'parking_lamp_id' => NULL],
            ['block_id' => 18, 'camera_id' => 113, 'slot_number' => '29', 'parking_lamp_id' => NULL],
            ['block_id' => 18, 'camera_id' => 113, 'slot_number' => '30', 'parking_lamp_id' => NULL],
    
            ['block_id' => 18, 'camera_id' => 112, 'slot_number' => '31', 'parking_lamp_id' => NULL],
            ['block_id' => 18, 'camera_id' => 112, 'slot_number' => '32', 'parking_lamp_id' => NULL],
            ['block_id' => 18, 'camera_id' => 112, 'slot_number' => '33', 'parking_lamp_id' => NULL],
    
            ['block_id' => 18, 'camera_id' => 111, 'slot_number' => '34', 'parking_lamp_id' => NULL],
            ['block_id' => 18, 'camera_id' => 111, 'slot_number' => '35', 'parking_lamp_id' => NULL],
            ['block_id' => 18, 'camera_id' => 111, 'slot_number' => '36', 'parking_lamp_id' => NULL],
            
            // DTC2 T3 Block set 24 slot with camera and Lamp.
            ['block_id' => 19, 'camera_id' => 138, 'slot_number' => '37', 'parking_lamp_id' => NULL],
            ['block_id' => 19, 'camera_id' => 138, 'slot_number' => '38', 'parking_lamp_id' => NULL],
            ['block_id' => 19, 'camera_id' => 138, 'slot_number' => '39', 'parking_lamp_id' => NULL],
    
            ['block_id' => 19, 'camera_id' => 137, 'slot_number' => '40', 'parking_lamp_id' => NULL],
            ['block_id' => 19, 'camera_id' => 137, 'slot_number' => '41', 'parking_lamp_id' => NULL],
            ['block_id' => 19, 'camera_id' => 137, 'slot_number' => '42', 'parking_lamp_id' => NULL],
    
            ['block_id' => 19, 'camera_id' => 136, 'slot_number' => '43', 'parking_lamp_id' => NULL],
            ['block_id' => 19, 'camera_id' => 136, 'slot_number' => '44', 'parking_lamp_id' => NULL],
            ['block_id' => 19, 'camera_id' => 136, 'slot_number' => '45', 'parking_lamp_id' => NULL],
 
            ['block_id' => 19, 'camera_id' => 135, 'slot_number' => '46', 'parking_lamp_id' => NULL],
            ['block_id' => 19, 'camera_id' => 135, 'slot_number' => '47', 'parking_lamp_id' => NULL],
            ['block_id' => 19, 'camera_id' => 135, 'slot_number' => '48', 'parking_lamp_id' => NULL],
            
            ['block_id' => 19, 'camera_id' => 134, 'slot_number' => '49', 'parking_lamp_id' => NULL],
            ['block_id' => 19, 'camera_id' => 134, 'slot_number' => '50', 'parking_lamp_id' => NULL],
            ['block_id' => 19, 'camera_id' => 134, 'slot_number' => '51', 'parking_lamp_id' => NULL],
 
            ['block_id' => 19, 'camera_id' => 133, 'slot_number' => '52', 'parking_lamp_id' => NULL],
            ['block_id' => 19, 'camera_id' => 133, 'slot_number' => '53', 'parking_lamp_id' => NULL],
            ['block_id' => 19, 'camera_id' => 133, 'slot_number' => '54', 'parking_lamp_id' => NULL],
   
            ['block_id' => 19, 'camera_id' => 132, 'slot_number' => '55', 'parking_lamp_id' => NULL],
            ['block_id' => 19, 'camera_id' => 132, 'slot_number' => '56', 'parking_lamp_id' => NULL],
            ['block_id' => 19, 'camera_id' => 132, 'slot_number' => '57', 'parking_lamp_id' => NULL],
   
            ['block_id' => 19, 'camera_id' => 131, 'slot_number' => '58', 'parking_lamp_id' => NULL],
            ['block_id' => 19, 'camera_id' => 131, 'slot_number' => '59', 'parking_lamp_id' => NULL],
            ['block_id' => 19, 'camera_id' => 131, 'slot_number' => '60', 'parking_lamp_id' => NULL],
            
            // DTC2 T4 Block set 24 slot with camera and Lamp.
            ['block_id' => 20, 'camera_id' => 130, 'slot_number' => '61', 'parking_lamp_id' => NULL],
            ['block_id' => 20, 'camera_id' => 130, 'slot_number' => '62', 'parking_lamp_id' => NULL],
            ['block_id' => 20, 'camera_id' => 130, 'slot_number' => '63', 'parking_lamp_id' => NULL],
   
            ['block_id' => 20, 'camera_id' => 129, 'slot_number' => '64', 'parking_lamp_id' => NULL],
            ['block_id' => 20, 'camera_id' => 129, 'slot_number' => '65', 'parking_lamp_id' => NULL],
            ['block_id' => 20, 'camera_id' => 129, 'slot_number' => '66', 'parking_lamp_id' => NULL],
   
            ['block_id' => 20, 'camera_id' => 128, 'slot_number' => '67', 'parking_lamp_id' => NULL],
            ['block_id' => 20, 'camera_id' => 128, 'slot_number' => '68', 'parking_lamp_id' => NULL],
            ['block_id' => 20, 'camera_id' => 128, 'slot_number' => '69', 'parking_lamp_id' => NULL],
   
            ['block_id' => 20, 'camera_id' => 127, 'slot_number' => '70', 'parking_lamp_id' => NULL],
            ['block_id' => 20, 'camera_id' => 127, 'slot_number' => '71', 'parking_lamp_id' => NULL],
            ['block_id' => 20, 'camera_id' => 127, 'slot_number' => '72', 'parking_lamp_id' => NULL],

            ['block_id' => 20, 'camera_id' => 126, 'slot_number' => '73', 'parking_lamp_id' => NULL],
            ['block_id' => 20, 'camera_id' => 126, 'slot_number' => '74', 'parking_lamp_id' => NULL],
            ['block_id' => 20, 'camera_id' => 126, 'slot_number' => '75', 'parking_lamp_id' => NULL],
   
            ['block_id' => 20, 'camera_id' => 125, 'slot_number' => '76', 'parking_lamp_id' => NULL],
            ['block_id' => 20, 'camera_id' => 125, 'slot_number' => '77', 'parking_lamp_id' => NULL],
            ['block_id' => 20, 'camera_id' => 125, 'slot_number' => '78', 'parking_lamp_id' => NULL],
   
            ['block_id' => 20, 'camera_id' => 124, 'slot_number' => '79', 'parking_lamp_id' => NULL],
            ['block_id' => 20, 'camera_id' => 124, 'slot_number' => '80', 'parking_lamp_id' => NULL],
            ['block_id' => 20, 'camera_id' => 124, 'slot_number' => '81', 'parking_lamp_id' => NULL],
   
            ['block_id' => 20, 'camera_id' => 123, 'slot_number' => '82', 'parking_lamp_id' => NULL],
            ['block_id' => 20, 'camera_id' => 123, 'slot_number' => '83', 'parking_lamp_id' => NULL],
            ['block_id' => 20, 'camera_id' => 123, 'slot_number' => '84', 'parking_lamp_id' => NULL],
            
            // DTC1 U1 Block set 18 slot with camera and Lamp.
            ['block_id' => 21, 'camera_id' => 150, 'slot_number' => '1', 'parking_lamp_id' => NULL],
            ['block_id' => 21, 'camera_id' => 150, 'slot_number' => '2', 'parking_lamp_id' => NULL],
            ['block_id' => 21, 'camera_id' => 150, 'slot_number' => '3', 'parking_lamp_id' => NULL],
   
            ['block_id' => 21, 'camera_id' => 149, 'slot_number' => '4', 'parking_lamp_id' => NULL],
            ['block_id' => 21, 'camera_id' => 149, 'slot_number' => '5', 'parking_lamp_id' => NULL],
            ['block_id' => 21, 'camera_id' => 149, 'slot_number' => '6', 'parking_lamp_id' => NULL],
 
            ['block_id' => 21, 'camera_id' => 148, 'slot_number' => '7', 'parking_lamp_id' => NULL],
            ['block_id' => 21, 'camera_id' => 148, 'slot_number' => '8', 'parking_lamp_id' => NULL],
            ['block_id' => 21, 'camera_id' => 148, 'slot_number' => '9', 'parking_lamp_id' => NULL],
   
            ['block_id' => 21, 'camera_id' => 147, 'slot_number' => '10', 'parking_lamp_id' => NULL],
            ['block_id' => 21, 'camera_id' => 147, 'slot_number' => '11', 'parking_lamp_id' => NULL],
            ['block_id' => 21, 'camera_id' => 147, 'slot_number' => '12', 'parking_lamp_id' => NULL],

            ['block_id' => 21, 'camera_id' => 146, 'slot_number' => '13', 'parking_lamp_id' => NULL],
            ['block_id' => 21, 'camera_id' => 146, 'slot_number' => '14', 'parking_lamp_id' => NULL],
            ['block_id' => 21, 'camera_id' => 146, 'slot_number' => '15', 'parking_lamp_id' => NULL],
     
            ['block_id' => 21, 'camera_id' => 145, 'slot_number' => '16', 'parking_lamp_id' => NULL],
            ['block_id' => 21, 'camera_id' => 145, 'slot_number' => '17', 'parking_lamp_id' => NULL],
            ['block_id' => 21, 'camera_id' => 145, 'slot_number' => '18', 'parking_lamp_id' => NULL],
            
            // DTC1 U2 Block set 18 slot with camera and Lamp.
            ['block_id' => 22, 'camera_id' => 144, 'slot_number' => '19', 'parking_lamp_id' => NULL],
            ['block_id' => 22, 'camera_id' => 144, 'slot_number' => '20', 'parking_lamp_id' => NULL],
            ['block_id' => 22, 'camera_id' => 144, 'slot_number' => '21', 'parking_lamp_id' => NULL],
     
            ['block_id' => 22, 'camera_id' => 143, 'slot_number' => '22', 'parking_lamp_id' => NULL],
            ['block_id' => 22, 'camera_id' => 143, 'slot_number' => '23', 'parking_lamp_id' => NULL],
            ['block_id' => 22, 'camera_id' => 143, 'slot_number' => '24', 'parking_lamp_id' => NULL],
     
            ['block_id' => 22, 'camera_id' => 142, 'slot_number' => '25', 'parking_lamp_id' => NULL],
            ['block_id' => 22, 'camera_id' => 142, 'slot_number' => '26', 'parking_lamp_id' => NULL],
            ['block_id' => 22, 'camera_id' => 142, 'slot_number' => '27', 'parking_lamp_id' => NULL],
     
            ['block_id' => 22, 'camera_id' => 141, 'slot_number' => '28', 'parking_lamp_id' => NULL],
            ['block_id' => 22, 'camera_id' => 141, 'slot_number' => '29', 'parking_lamp_id' => NULL],
            ['block_id' => 22, 'camera_id' => 141, 'slot_number' => '30', 'parking_lamp_id' => NULL],
     
            ['block_id' => 22, 'camera_id' => 140, 'slot_number' => '31', 'parking_lamp_id' => NULL],
            ['block_id' => 22, 'camera_id' => 140, 'slot_number' => '32', 'parking_lamp_id' => NULL],
            ['block_id' => 22, 'camera_id' => 140, 'slot_number' => '33', 'parking_lamp_id' => NULL],
     
            ['block_id' => 22, 'camera_id' => 139, 'slot_number' => '34', 'parking_lamp_id' => NULL],
            ['block_id' => 22, 'camera_id' => 139, 'slot_number' => '35', 'parking_lamp_id' => NULL],
            ['block_id' => 22, 'camera_id' => 139, 'slot_number' => '36', 'parking_lamp_id' => NULL],
            
            // DTC2 U3 Block set 24 slot with camera and Lamp.
            ['block_id' => 23, 'camera_id' => 166, 'slot_number' => '37', 'parking_lamp_id' => NULL],
            ['block_id' => 23, 'camera_id' => 166, 'slot_number' => '38', 'parking_lamp_id' => NULL],
            ['block_id' => 23, 'camera_id' => 166, 'slot_number' => '39', 'parking_lamp_id' => NULL],
    
            ['block_id' => 23, 'camera_id' => 165, 'slot_number' => '40', 'parking_lamp_id' => NULL],
            ['block_id' => 23, 'camera_id' => 165, 'slot_number' => '41', 'parking_lamp_id' => NULL],
            ['block_id' => 23, 'camera_id' => 165, 'slot_number' => '42', 'parking_lamp_id' => NULL],
     
            ['block_id' => 23, 'camera_id' => 164, 'slot_number' => '43', 'parking_lamp_id' => NULL],
            ['block_id' => 23, 'camera_id' => 164, 'slot_number' => '44', 'parking_lamp_id' => NULL],
            ['block_id' => 23, 'camera_id' => 164, 'slot_number' => '45', 'parking_lamp_id' => NULL],
     
            ['block_id' => 23, 'camera_id' => 163, 'slot_number' => '46', 'parking_lamp_id' => NULL],
            ['block_id' => 23, 'camera_id' => 163, 'slot_number' => '47', 'parking_lamp_id' => NULL],
            ['block_id' => 23, 'camera_id' => 163, 'slot_number' => '48', 'parking_lamp_id' => NULL],
     
            ['block_id' => 23, 'camera_id' => 162, 'slot_number' => '49', 'parking_lamp_id' => NULL],
            ['block_id' => 23, 'camera_id' => 162, 'slot_number' => '50', 'parking_lamp_id' => NULL],
            ['block_id' => 23, 'camera_id' => 162, 'slot_number' => '51', 'parking_lamp_id' => NULL],
     
            ['block_id' => 23, 'camera_id' => 161, 'slot_number' => '52', 'parking_lamp_id' => NULL],
            ['block_id' => 23, 'camera_id' => 161, 'slot_number' => '53', 'parking_lamp_id' => NULL],
            ['block_id' => 23, 'camera_id' => 161, 'slot_number' => '54', 'parking_lamp_id' => NULL],
    
            ['block_id' => 23, 'camera_id' => 160, 'slot_number' => '55', 'parking_lamp_id' => NULL],
            ['block_id' => 23, 'camera_id' => 160, 'slot_number' => '56', 'parking_lamp_id' => NULL],
            ['block_id' => 23, 'camera_id' => 160, 'slot_number' => '57', 'parking_lamp_id' => NULL],
  
            ['block_id' => 23, 'camera_id' => 159, 'slot_number' => '58', 'parking_lamp_id' => NULL],
            ['block_id' => 23, 'camera_id' => 159, 'slot_number' => '59', 'parking_lamp_id' => NULL],
            ['block_id' => 23, 'camera_id' => 159, 'slot_number' => '60', 'parking_lamp_id' => NULL],
            
            // DTC2 U4 Block set 24 slot with camera and Lamp.
            ['block_id' => 24, 'camera_id' => 158, 'slot_number' => '61', 'parking_lamp_id' => NULL],
            ['block_id' => 24, 'camera_id' => 158, 'slot_number' => '62', 'parking_lamp_id' => NULL],
            ['block_id' => 24, 'camera_id' => 158, 'slot_number' => '63', 'parking_lamp_id' => NULL],
  
            ['block_id' => 24, 'camera_id' => 157, 'slot_number' => '64', 'parking_lamp_id' => NULL],
            ['block_id' => 24, 'camera_id' => 157, 'slot_number' => '65', 'parking_lamp_id' => NULL],
            ['block_id' => 24, 'camera_id' => 157, 'slot_number' => '66', 'parking_lamp_id' => NULL],
    
            ['block_id' => 24, 'camera_id' => 156, 'slot_number' => '67', 'parking_lamp_id' => NULL],
            ['block_id' => 24, 'camera_id' => 156, 'slot_number' => '68', 'parking_lamp_id' => NULL],
            ['block_id' => 24, 'camera_id' => 156, 'slot_number' => '69', 'parking_lamp_id' => NULL],
    
            ['block_id' => 24, 'camera_id' => 155, 'slot_number' => '70', 'parking_lamp_id' => NULL],
            ['block_id' => 24, 'camera_id' => 155, 'slot_number' => '71', 'parking_lamp_id' => NULL],
            ['block_id' => 24, 'camera_id' => 155, 'slot_number' => '72', 'parking_lamp_id' => NULL],
    
            ['block_id' => 24, 'camera_id' => 154, 'slot_number' => '73', 'parking_lamp_id' => NULL],
            ['block_id' => 24, 'camera_id' => 154, 'slot_number' => '74', 'parking_lamp_id' => NULL],
            ['block_id' => 24, 'camera_id' => 154, 'slot_number' => '75', 'parking_lamp_id' => NULL],
    
            ['block_id' => 24, 'camera_id' => 153, 'slot_number' => '76', 'parking_lamp_id' => NULL],
            ['block_id' => 24, 'camera_id' => 153, 'slot_number' => '77', 'parking_lamp_id' => NULL],
            ['block_id' => 24, 'camera_id' => 153, 'slot_number' => '78', 'parking_lamp_id' => NULL],
    
            ['block_id' => 24, 'camera_id' => 152, 'slot_number' => '79', 'parking_lamp_id' => NULL],
            ['block_id' => 24, 'camera_id' => 152, 'slot_number' => '80', 'parking_lamp_id' => NULL],
            ['block_id' => 24, 'camera_id' => 152, 'slot_number' => '81', 'parking_lamp_id' => NULL],
    
            ['block_id' => 24, 'camera_id' => 151, 'slot_number' => '82', 'parking_lamp_id' => NULL],
            ['block_id' => 24, 'camera_id' => 151, 'slot_number' => '83', 'parking_lamp_id' => NULL],
            ['block_id' => 24, 'camera_id' => 151, 'slot_number' => '84', 'parking_lamp_id' => NULL],
            
            // DTC1 V1 Block set 18 slot with camera and Lamp.
            ['block_id' => 25, 'camera_id' => 178, 'slot_number' => '1', 'parking_lamp_id' => NULL],
            ['block_id' => 25, 'camera_id' => 178, 'slot_number' => '2', 'parking_lamp_id' => NULL],
            ['block_id' => 25, 'camera_id' => 178, 'slot_number' => '3', 'parking_lamp_id' => NULL],
    
            ['block_id' => 25, 'camera_id' => 177, 'slot_number' => '4', 'parking_lamp_id' => NULL],
            ['block_id' => 25, 'camera_id' => 177, 'slot_number' => '5', 'parking_lamp_id' => NULL],
            ['block_id' => 25, 'camera_id' => 177, 'slot_number' => '6', 'parking_lamp_id' => NULL],
    
            ['block_id' => 25, 'camera_id' => 176, 'slot_number' => '7', 'parking_lamp_id' => NULL],
            ['block_id' => 25, 'camera_id' => 176, 'slot_number' => '8', 'parking_lamp_id' => NULL],
            ['block_id' => 25, 'camera_id' => 176, 'slot_number' => '9', 'parking_lamp_id' => NULL],
    
            ['block_id' => 25, 'camera_id' => 175, 'slot_number' => '10', 'parking_lamp_id' => NULL],
            ['block_id' => 25, 'camera_id' => 175, 'slot_number' => '11', 'parking_lamp_id' => NULL],
            ['block_id' => 25, 'camera_id' => 175, 'slot_number' => '12', 'parking_lamp_id' => NULL],
    
            ['block_id' => 25, 'camera_id' => 174, 'slot_number' => '13', 'parking_lamp_id' => NULL],
            ['block_id' => 25, 'camera_id' => 174, 'slot_number' => '14', 'parking_lamp_id' => NULL],
            ['block_id' => 25, 'camera_id' => 174, 'slot_number' => '15', 'parking_lamp_id' => NULL],
    
            ['block_id' => 25, 'camera_id' => 173, 'slot_number' => '16', 'parking_lamp_id' => NULL],
            ['block_id' => 25, 'camera_id' => 173, 'slot_number' => '17', 'parking_lamp_id' => NULL],
            ['block_id' => 25, 'camera_id' => 173, 'slot_number' => '18', 'parking_lamp_id' => NULL],
            
            // DTC1 V2 Block set 18 slot with camera and Lamp.
            ['block_id' => 26, 'camera_id' => 172, 'slot_number' => '19', 'parking_lamp_id' => NULL],
            ['block_id' => 26, 'camera_id' => 172, 'slot_number' => '20', 'parking_lamp_id' => NULL],
            ['block_id' => 26, 'camera_id' => 172, 'slot_number' => '21', 'parking_lamp_id' => NULL],
    
            ['block_id' => 26, 'camera_id' => 171, 'slot_number' => '22', 'parking_lamp_id' => NULL],
            ['block_id' => 26, 'camera_id' => 171, 'slot_number' => '23', 'parking_lamp_id' => NULL],
            ['block_id' => 26, 'camera_id' => 171, 'slot_number' => '24', 'parking_lamp_id' => NULL],
 
            ['block_id' => 26, 'camera_id' => 170, 'slot_number' => '25', 'parking_lamp_id' => NULL],
            ['block_id' => 26, 'camera_id' => 170, 'slot_number' => '26', 'parking_lamp_id' => NULL],
            ['block_id' => 26, 'camera_id' => 170, 'slot_number' => '27', 'parking_lamp_id' => NULL],
      
            ['block_id' => 26, 'camera_id' => 169, 'slot_number' => '28', 'parking_lamp_id' => NULL],
            ['block_id' => 26, 'camera_id' => 169, 'slot_number' => '29', 'parking_lamp_id' => NULL],
            ['block_id' => 26, 'camera_id' => 169, 'slot_number' => '30', 'parking_lamp_id' => NULL],
      
            ['block_id' => 26, 'camera_id' => 168, 'slot_number' => '31', 'parking_lamp_id' => NULL],
            ['block_id' => 26, 'camera_id' => 168, 'slot_number' => '32', 'parking_lamp_id' => NULL],
            ['block_id' => 26, 'camera_id' => 168, 'slot_number' => '33', 'parking_lamp_id' => NULL],
      
            ['block_id' => 26, 'camera_id' => 167, 'slot_number' => '34', 'parking_lamp_id' => NULL],
            ['block_id' => 26, 'camera_id' => 167, 'slot_number' => '35', 'parking_lamp_id' => NULL],
            ['block_id' => 26, 'camera_id' => 167, 'slot_number' => '36', 'parking_lamp_id' => NULL],
            
            // DTC2 V3 Block set 24 slot with camera and Lamp.
            ['block_id' => 27, 'camera_id' => 194, 'slot_number' => '37', 'parking_lamp_id' => NULL],
            ['block_id' => 27, 'camera_id' => 194, 'slot_number' => '38', 'parking_lamp_id' => NULL],
            ['block_id' => 27, 'camera_id' => 194, 'slot_number' => '39', 'parking_lamp_id' => NULL],
      
            ['block_id' => 27, 'camera_id' => 193, 'slot_number' => '40', 'parking_lamp_id' => NULL],
            ['block_id' => 27, 'camera_id' => 193, 'slot_number' => '41', 'parking_lamp_id' => NULL],
            ['block_id' => 27, 'camera_id' => 193, 'slot_number' => '42', 'parking_lamp_id' => NULL],
      
            ['block_id' => 27, 'camera_id' => 192, 'slot_number' => '43', 'parking_lamp_id' => NULL],
            ['block_id' => 27, 'camera_id' => 192, 'slot_number' => '44', 'parking_lamp_id' => NULL],
            ['block_id' => 27, 'camera_id' => 192, 'slot_number' => '45', 'parking_lamp_id' => NULL],
      
            ['block_id' => 27, 'camera_id' => 191, 'slot_number' => '46', 'parking_lamp_id' => NULL],
            ['block_id' => 27, 'camera_id' => 191, 'slot_number' => '47', 'parking_lamp_id' => NULL],
            ['block_id' => 27, 'camera_id' => 191, 'slot_number' => '48', 'parking_lamp_id' => NULL],
            
            ['block_id' => 27, 'camera_id' => 190, 'slot_number' => '49', 'parking_lamp_id' => NULL],
            ['block_id' => 27, 'camera_id' => 190, 'slot_number' => '50', 'parking_lamp_id' => NULL],
            ['block_id' => 27, 'camera_id' => 190, 'slot_number' => '51', 'parking_lamp_id' => NULL],
     
            ['block_id' => 27, 'camera_id' => 189, 'slot_number' => '52', 'parking_lamp_id' => NULL],
            ['block_id' => 27, 'camera_id' => 189, 'slot_number' => '53', 'parking_lamp_id' => NULL],
            ['block_id' => 27, 'camera_id' => 189, 'slot_number' => '54', 'parking_lamp_id' => NULL],
      
            ['block_id' => 27, 'camera_id' => 188, 'slot_number' => '55', 'parking_lamp_id' => NULL],
            ['block_id' => 27, 'camera_id' => 188, 'slot_number' => '56', 'parking_lamp_id' => NULL],
            ['block_id' => 27, 'camera_id' => 188, 'slot_number' => '57', 'parking_lamp_id' => NULL],
      
            ['block_id' => 27, 'camera_id' => 187, 'slot_number' => '58', 'parking_lamp_id' => NULL],
            ['block_id' => 27, 'camera_id' => 187, 'slot_number' => '59', 'parking_lamp_id' => NULL],
            ['block_id' => 27, 'camera_id' => 187, 'slot_number' => '60', 'parking_lamp_id' => NULL],
            
            // DTC2 V4 Block set 24 slot with camera and Lamp.
            ['block_id' => 28, 'camera_id' => 186, 'slot_number' => '61', 'parking_lamp_id' => NULL],
            ['block_id' => 28, 'camera_id' => 186, 'slot_number' => '62', 'parking_lamp_id' => NULL],
            ['block_id' => 28, 'camera_id' => 186, 'slot_number' => '63', 'parking_lamp_id' => NULL],
      
            ['block_id' => 28, 'camera_id' => 185, 'slot_number' => '64', 'parking_lamp_id' => NULL],
            ['block_id' => 28, 'camera_id' => 185, 'slot_number' => '65', 'parking_lamp_id' => NULL],
            ['block_id' => 28, 'camera_id' => 185, 'slot_number' => '66', 'parking_lamp_id' => NULL],
     
            ['block_id' => 28, 'camera_id' => 184, 'slot_number' => '67', 'parking_lamp_id' => NULL],
            ['block_id' => 28, 'camera_id' => 184, 'slot_number' => '68', 'parking_lamp_id' => NULL],
            ['block_id' => 28, 'camera_id' => 184, 'slot_number' => '69', 'parking_lamp_id' => NULL],
   
            ['block_id' => 28, 'camera_id' => 183, 'slot_number' => '70', 'parking_lamp_id' => NULL],
            ['block_id' => 28, 'camera_id' => 183, 'slot_number' => '71', 'parking_lamp_id' => NULL],
            ['block_id' => 28, 'camera_id' => 183, 'slot_number' => '72', 'parking_lamp_id' => NULL],

            ['block_id' => 28, 'camera_id' => 182, 'slot_number' => '73', 'parking_lamp_id' => NULL],
            ['block_id' => 28, 'camera_id' => 182, 'slot_number' => '74', 'parking_lamp_id' => NULL],
            ['block_id' => 28, 'camera_id' => 182, 'slot_number' => '75', 'parking_lamp_id' => NULL],
   
            ['block_id' => 28, 'camera_id' => 181, 'slot_number' => '76', 'parking_lamp_id' => NULL],
            ['block_id' => 28, 'camera_id' => 181, 'slot_number' => '77', 'parking_lamp_id' => NULL],
            ['block_id' => 28, 'camera_id' => 181, 'slot_number' => '78', 'parking_lamp_id' => NULL],
     
            ['block_id' => 28, 'camera_id' => 180, 'slot_number' => '79', 'parking_lamp_id' => NULL],
            ['block_id' => 28, 'camera_id' => 180, 'slot_number' => '80', 'parking_lamp_id' => NULL],
            ['block_id' => 28, 'camera_id' => 180, 'slot_number' => '81', 'parking_lamp_id' => NULL],
     
            ['block_id' => 28, 'camera_id' => 179, 'slot_number' => '82', 'parking_lamp_id' => NULL],
            ['block_id' => 28, 'camera_id' => 179, 'slot_number' => '83', 'parking_lamp_id' => NULL],
            ['block_id' => 28, 'camera_id' => 179, 'slot_number' => '84', 'parking_lamp_id' => NULL],
            
            // DTC1 W1 Block set 15 slot with camera and Lamp.
            ['block_id' => 29, 'camera_id' => 204, 'slot_number' => '1', 'parking_lamp_id' => NULL],
            ['block_id' => 29, 'camera_id' => 204, 'slot_number' => '2', 'parking_lamp_id' => NULL],
            ['block_id' => 29, 'camera_id' => 204, 'slot_number' => '3', 'parking_lamp_id' => NULL],
     
            ['block_id' => 29, 'camera_id' => 203, 'slot_number' => '4', 'parking_lamp_id' => NULL],
            ['block_id' => 29, 'camera_id' => 203, 'slot_number' => '5', 'parking_lamp_id' => NULL],
            ['block_id' => 29, 'camera_id' => 203, 'slot_number' => '6', 'parking_lamp_id' => NULL],
     
            ['block_id' => 29, 'camera_id' => 202, 'slot_number' => '7', 'parking_lamp_id' => NULL],
            ['block_id' => 29, 'camera_id' => 202, 'slot_number' => '8', 'parking_lamp_id' => NULL],
            ['block_id' => 29, 'camera_id' => 202, 'slot_number' => '9', 'parking_lamp_id' => NULL],
     
            ['block_id' => 29, 'camera_id' => 201, 'slot_number' => '10', 'parking_lamp_id' => NULL],
            ['block_id' => 29, 'camera_id' => 201, 'slot_number' => '11', 'parking_lamp_id' => NULL],
            ['block_id' => 29, 'camera_id' => 201, 'slot_number' => '12', 'parking_lamp_id' => NULL],

            ['block_id' => 29, 'camera_id' => 200, 'slot_number' => '13', 'parking_lamp_id' => NULL],
            ['block_id' => 29, 'camera_id' => 200, 'slot_number' => '14', 'parking_lamp_id' => NULL],
            ['block_id' => 29, 'camera_id' => 200, 'slot_number' => '15', 'parking_lamp_id' => NULL],
     
            // DTC1 W2 Block set 15 slot with camera and Lamp.
            ['block_id' => 30, 'camera_id' => 199, 'slot_number' => '16', 'parking_lamp_id' => NULL],
            ['block_id' => 30, 'camera_id' => 199, 'slot_number' => '17', 'parking_lamp_id' => NULL],
            ['block_id' => 30, 'camera_id' => 199, 'slot_number' => '18', 'parking_lamp_id' => NULL],
     
            ['block_id' => 30, 'camera_id' => 198, 'slot_number' => '19', 'parking_lamp_id' => NULL],
            ['block_id' => 30, 'camera_id' => 198, 'slot_number' => '20', 'parking_lamp_id' => NULL],
            ['block_id' => 30, 'camera_id' => 198, 'slot_number' => '21', 'parking_lamp_id' => NULL],
     
            ['block_id' => 30, 'camera_id' => 197, 'slot_number' => '22', 'parking_lamp_id' => NULL],
            ['block_id' => 30, 'camera_id' => 197, 'slot_number' => '23', 'parking_lamp_id' => NULL],
            ['block_id' => 30, 'camera_id' => 197, 'slot_number' => '24', 'parking_lamp_id' => NULL],
    
            ['block_id' => 30, 'camera_id' => 196, 'slot_number' => '25', 'parking_lamp_id' => NULL],
            ['block_id' => 30, 'camera_id' => 196, 'slot_number' => '26', 'parking_lamp_id' => NULL],
            ['block_id' => 30, 'camera_id' => 196, 'slot_number' => '27', 'parking_lamp_id' => NULL],
     
            ['block_id' => 30, 'camera_id' => 195, 'slot_number' => '28', 'parking_lamp_id' => NULL],
            ['block_id' => 30, 'camera_id' => 195, 'slot_number' => '29', 'parking_lamp_id' => NULL],
            ['block_id' => 30, 'camera_id' => 195, 'slot_number' => '30', 'parking_lamp_id' => NULL],
            
            // DTC1 W3 Block set 24 slot with camera and Lamp.
            ['block_id' => 31, 'camera_id' => 212, 'slot_number' => '37', 'parking_lamp_id' => NULL],
            ['block_id' => 31, 'camera_id' => 212, 'slot_number' => '38', 'parking_lamp_id' => NULL],
            ['block_id' => 31, 'camera_id' => 212, 'slot_number' => '39', 'parking_lamp_id' => NULL],
   
            ['block_id' => 31, 'camera_id' => 211, 'slot_number' => '40', 'parking_lamp_id' => NULL],
            ['block_id' => 31, 'camera_id' => 211, 'slot_number' => '41', 'parking_lamp_id' => NULL],
            ['block_id' => 31, 'camera_id' => 211, 'slot_number' => '42', 'parking_lamp_id' => NULL],
     
            ['block_id' => 31, 'camera_id' => 210, 'slot_number' => '43', 'parking_lamp_id' => NULL],
            ['block_id' => 31, 'camera_id' => 210, 'slot_number' => '44', 'parking_lamp_id' => NULL],
            ['block_id' => 31, 'camera_id' => 210, 'slot_number' => '45', 'parking_lamp_id' => NULL],

            ['block_id' => 31, 'camera_id' => 209, 'slot_number' => '46', 'parking_lamp_id' => NULL],
            ['block_id' => 31, 'camera_id' => 209, 'slot_number' => '47', 'parking_lamp_id' => NULL],
            ['block_id' => 31, 'camera_id' => 209, 'slot_number' => '48', 'parking_lamp_id' => NULL],
   
            ['block_id' => 31, 'camera_id' => 208, 'slot_number' => '49', 'parking_lamp_id' => NULL],
            ['block_id' => 31, 'camera_id' => 208, 'slot_number' => '50', 'parking_lamp_id' => NULL],
            ['block_id' => 31, 'camera_id' => 208, 'slot_number' => '51', 'parking_lamp_id' => NULL],
     
            ['block_id' => 31, 'camera_id' => 207, 'slot_number' => '52', 'parking_lamp_id' => NULL],
            ['block_id' => 31, 'camera_id' => 207, 'slot_number' => '53', 'parking_lamp_id' => NULL],
            ['block_id' => 31, 'camera_id' => 207, 'slot_number' => '54', 'parking_lamp_id' => NULL],

            ['block_id' => 31, 'camera_id' => 206, 'slot_number' => '55', 'parking_lamp_id' => NULL],
            ['block_id' => 31, 'camera_id' => 206, 'slot_number' => '56', 'parking_lamp_id' => NULL],
            ['block_id' => 31, 'camera_id' => 206, 'slot_number' => '57', 'parking_lamp_id' => NULL],
     
            ['block_id' => 31, 'camera_id' => 205, 'slot_number' => '58', 'parking_lamp_id' => NULL],
            ['block_id' => 31, 'camera_id' => 205, 'slot_number' => '59', 'parking_lamp_id' => NULL],
            ['block_id' => 31, 'camera_id' => 205, 'slot_number' => '60', 'parking_lamp_id' => NULL],

            // DTC3 and DTC4 Slots List.
            // DTC3 P1 Block set 12 slot with camera and Lamp.
            ['block_id' => 33, 'camera_id' => 220, 'slot_number' => '79', 'parking_lamp_id' => NULL],
            ['block_id' => 33, 'camera_id' => 220, 'slot_number' => '80', 'parking_lamp_id' => NULL],
            ['block_id' => 33, 'camera_id' => 220, 'slot_number' => '81', 'parking_lamp_id' => NULL],
   
            ['block_id' => 33, 'camera_id' => 219, 'slot_number' => '82', 'parking_lamp_id' => NULL],
            ['block_id' => 33, 'camera_id' => 219, 'slot_number' => '83', 'parking_lamp_id' => NULL],
            ['block_id' => 33, 'camera_id' => 219, 'slot_number' => '84', 'parking_lamp_id' => NULL],
     
            ['block_id' => 33, 'camera_id' => 218, 'slot_number' => '85', 'parking_lamp_id' => NULL],
            ['block_id' => 33, 'camera_id' => 218, 'slot_number' => '86', 'parking_lamp_id' => NULL],
            ['block_id' => 33, 'camera_id' => 218, 'slot_number' => '87', 'parking_lamp_id' => NULL],

            ['block_id' => 33, 'camera_id' => 217, 'slot_number' => '88', 'parking_lamp_id' => NULL],
            ['block_id' => 33, 'camera_id' => 217, 'slot_number' => '89', 'parking_lamp_id' => NULL],
            ['block_id' => 33, 'camera_id' => 217, 'slot_number' => '90', 'parking_lamp_id' => NULL],
            
            // DTC3 P2 Block set 12 slot with camera and Lamp.
            ['block_id' => 34, 'camera_id' => 216, 'slot_number' => '91', 'parking_lamp_id' => NULL],
            ['block_id' => 34, 'camera_id' => 216, 'slot_number' => '92', 'parking_lamp_id' => NULL],
            ['block_id' => 34, 'camera_id' => 216, 'slot_number' => '93', 'parking_lamp_id' => NULL],

            ['block_id' => 34, 'camera_id' => 215, 'slot_number' => '94', 'parking_lamp_id' => NULL],
            ['block_id' => 34, 'camera_id' => 215, 'slot_number' => '95', 'parking_lamp_id' => NULL],
            ['block_id' => 34, 'camera_id' => 215, 'slot_number' => '96', 'parking_lamp_id' => NULL],

            ['block_id' => 34, 'camera_id' => 214, 'slot_number' => '97', 'parking_lamp_id' => NULL],
            ['block_id' => 34, 'camera_id' => 214, 'slot_number' => '98', 'parking_lamp_id' => NULL],
            ['block_id' => 34, 'camera_id' => 214, 'slot_number' => '99', 'parking_lamp_id' => NULL],

            ['block_id' => 34, 'camera_id' => 213, 'slot_number' => '100', 'parking_lamp_id' => NULL],
            ['block_id' => 34, 'camera_id' => 213, 'slot_number' => '101', 'parking_lamp_id' => NULL],
            ['block_id' => 34, 'camera_id' => 213, 'slot_number' => '102', 'parking_lamp_id' => NULL],

            // DTC4 P3 Block set 18 slot with camera and Lamp.
            ['block_id' => 35, 'camera_id' => 232, 'slot_number' => '103', 'parking_lamp_id' => NULL],
            ['block_id' => 35, 'camera_id' => 232, 'slot_number' => '104', 'parking_lamp_id' => NULL],
            ['block_id' => 35, 'camera_id' => 232, 'slot_number' => '105', 'parking_lamp_id' => NULL],

            ['block_id' => 35, 'camera_id' => 231, 'slot_number' => '106', 'parking_lamp_id' => NULL],
            ['block_id' => 35, 'camera_id' => 231, 'slot_number' => '107', 'parking_lamp_id' => NULL],
            ['block_id' => 35, 'camera_id' => 231, 'slot_number' => '108', 'parking_lamp_id' => NULL],

            ['block_id' => 35, 'camera_id' => 230, 'slot_number' => '109', 'parking_lamp_id' => NULL],
            ['block_id' => 35, 'camera_id' => 230, 'slot_number' => '110', 'parking_lamp_id' => NULL],
            ['block_id' => 35, 'camera_id' => 230, 'slot_number' => '111', 'parking_lamp_id' => NULL],

            ['block_id' => 35, 'camera_id' => 229, 'slot_number' => '112', 'parking_lamp_id' => NULL],
            ['block_id' => 35, 'camera_id' => 229, 'slot_number' => '113', 'parking_lamp_id' => NULL],
            ['block_id' => 35, 'camera_id' => 229, 'slot_number' => '114', 'parking_lamp_id' => NULL],

            ['block_id' => 35, 'camera_id' => 228, 'slot_number' => '115', 'parking_lamp_id' => NULL],
            ['block_id' => 35, 'camera_id' => 228, 'slot_number' => '116', 'parking_lamp_id' => NULL],
            ['block_id' => 35, 'camera_id' => 228, 'slot_number' => '117', 'parking_lamp_id' => NULL],

            ['block_id' => 35, 'camera_id' => 227, 'slot_number' => '118', 'parking_lamp_id' => NULL],
            ['block_id' => 35, 'camera_id' => 227, 'slot_number' => '119', 'parking_lamp_id' => NULL],
            ['block_id' => 35, 'camera_id' => 227, 'slot_number' => '120', 'parking_lamp_id' => NULL],

            // DTC4 P4 Block set 18 slot with camera and Lamp.
            ['block_id' => 36, 'camera_id' => 226, 'slot_number' => '121', 'parking_lamp_id' => NULL],
            ['block_id' => 36, 'camera_id' => 226, 'slot_number' => '122', 'parking_lamp_id' => NULL],
            ['block_id' => 36, 'camera_id' => 226, 'slot_number' => '123', 'parking_lamp_id' => NULL],

            ['block_id' => 36, 'camera_id' => 225, 'slot_number' => '124', 'parking_lamp_id' => NULL],
            ['block_id' => 36, 'camera_id' => 225, 'slot_number' => '125', 'parking_lamp_id' => NULL],
            ['block_id' => 36, 'camera_id' => 225, 'slot_number' => '126', 'parking_lamp_id' => NULL],

            ['block_id' => 36, 'camera_id' => 224, 'slot_number' => '127', 'parking_lamp_id' => NULL],
            ['block_id' => 36, 'camera_id' => 224, 'slot_number' => '128', 'parking_lamp_id' => NULL],
            ['block_id' => 36, 'camera_id' => 224, 'slot_number' => '129', 'parking_lamp_id' => NULL],

            ['block_id' => 36, 'camera_id' => 223, 'slot_number' => '130', 'parking_lamp_id' => NULL],
            ['block_id' => 36, 'camera_id' => 223, 'slot_number' => '131', 'parking_lamp_id' => NULL],
            ['block_id' => 36, 'camera_id' => 223, 'slot_number' => '132', 'parking_lamp_id' => NULL],

            ['block_id' => 36, 'camera_id' => 222, 'slot_number' => '133', 'parking_lamp_id' => NULL],
            ['block_id' => 36, 'camera_id' => 222, 'slot_number' => '134', 'parking_lamp_id' => NULL],
            ['block_id' => 36, 'camera_id' => 222, 'slot_number' => '135', 'parking_lamp_id' => NULL],

            ['block_id' => 36, 'camera_id' => 221, 'slot_number' => '136', 'parking_lamp_id' => NULL],
            ['block_id' => 36, 'camera_id' => 221, 'slot_number' => '137', 'parking_lamp_id' => NULL],
            ['block_id' => 36, 'camera_id' => 221, 'slot_number' => '138', 'parking_lamp_id' => NULL],

            // DTC3 Q1 Block set 12 slot with camera and Lamp.
            ['block_id' => 37, 'camera_id' => 240, 'slot_number' => '85', 'parking_lamp_id' => NULL],
            ['block_id' => 37, 'camera_id' => 240, 'slot_number' => '86', 'parking_lamp_id' => NULL],
            ['block_id' => 37, 'camera_id' => 240, 'slot_number' => '87', 'parking_lamp_id' => NULL],

            ['block_id' => 37, 'camera_id' => 239, 'slot_number' => '88', 'parking_lamp_id' => NULL],
            ['block_id' => 37, 'camera_id' => 239, 'slot_number' => '89', 'parking_lamp_id' => NULL],
            ['block_id' => 37, 'camera_id' => 239, 'slot_number' => '90', 'parking_lamp_id' => NULL],

            ['block_id' => 37, 'camera_id' => 238, 'slot_number' => '91', 'parking_lamp_id' => NULL],
            ['block_id' => 37, 'camera_id' => 238, 'slot_number' => '92', 'parking_lamp_id' => NULL],
            ['block_id' => 37, 'camera_id' => 238, 'slot_number' => '93', 'parking_lamp_id' => NULL],

            ['block_id' => 37, 'camera_id' => 237, 'slot_number' => '94', 'parking_lamp_id' => NULL],
            ['block_id' => 37, 'camera_id' => 237, 'slot_number' => '95', 'parking_lamp_id' => NULL],
            ['block_id' => 37, 'camera_id' => 237, 'slot_number' => '96', 'parking_lamp_id' => NULL],

            // DTC3 Q2 Block set 12 slot with camera and Lamp.
            ['block_id' => 38, 'camera_id' => 236, 'slot_number' => '97', 'parking_lamp_id' => NULL],
            ['block_id' => 38, 'camera_id' => 236, 'slot_number' => '98', 'parking_lamp_id' => NULL],
            ['block_id' => 38, 'camera_id' => 236, 'slot_number' => '99', 'parking_lamp_id' => NULL],

            ['block_id' => 38, 'camera_id' => 235, 'slot_number' => '100', 'parking_lamp_id' => NULL],
            ['block_id' => 38, 'camera_id' => 235, 'slot_number' => '101', 'parking_lamp_id' => NULL],
            ['block_id' => 38, 'camera_id' => 235, 'slot_number' => '102', 'parking_lamp_id' => NULL],

            ['block_id' => 38, 'camera_id' => 235, 'slot_number' => '103', 'parking_lamp_id' => NULL],
            ['block_id' => 38, 'camera_id' => 235, 'slot_number' => '104', 'parking_lamp_id' => NULL],
            ['block_id' => 38, 'camera_id' => 235, 'slot_number' => '105', 'parking_lamp_id' => NULL],

            ['block_id' => 38, 'camera_id' => 234, 'slot_number' => '106', 'parking_lamp_id' => NULL],
            ['block_id' => 38, 'camera_id' => 234, 'slot_number' => '107', 'parking_lamp_id' => NULL],
            ['block_id' => 38, 'camera_id' => 234, 'slot_number' => '108', 'parking_lamp_id' => NULL],

            // DTC4 Q3 Block set 18 slot with camera and Lamp.
            ['block_id' => 39, 'camera_id' => 251, 'slot_number' => '109', 'parking_lamp_id' => NULL],
            ['block_id' => 39, 'camera_id' => 251, 'slot_number' => '110', 'parking_lamp_id' => NULL],
            ['block_id' => 39, 'camera_id' => 251, 'slot_number' => '111', 'parking_lamp_id' => NULL],

            ['block_id' => 39, 'camera_id' => 250, 'slot_number' => '112', 'parking_lamp_id' => NULL],
            ['block_id' => 39, 'camera_id' => 250, 'slot_number' => '113', 'parking_lamp_id' => NULL],
            ['block_id' => 39, 'camera_id' => 250, 'slot_number' => '114', 'parking_lamp_id' => NULL],

            ['block_id' => 39, 'camera_id' => 249, 'slot_number' => '115', 'parking_lamp_id' => NULL],
            ['block_id' => 39, 'camera_id' => 249, 'slot_number' => '116', 'parking_lamp_id' => NULL],
            ['block_id' => 39, 'camera_id' => 249, 'slot_number' => '117', 'parking_lamp_id' => NULL],

            ['block_id' => 39, 'camera_id' => 248, 'slot_number' => '118', 'parking_lamp_id' => NULL],
            ['block_id' => 39, 'camera_id' => 248, 'slot_number' => '119', 'parking_lamp_id' => NULL],
            ['block_id' => 39, 'camera_id' => 248, 'slot_number' => '120', 'parking_lamp_id' => NULL],

            ['block_id' => 39, 'camera_id' => 247, 'slot_number' => '121', 'parking_lamp_id' => NULL],
            ['block_id' => 39, 'camera_id' => 247, 'slot_number' => '122', 'parking_lamp_id' => NULL],
            ['block_id' => 39, 'camera_id' => 247, 'slot_number' => '123', 'parking_lamp_id' => NULL],

            ['block_id' => 39, 'camera_id' => 246, 'slot_number' => '124', 'parking_lamp_id' => NULL],
            ['block_id' => 39, 'camera_id' => 246, 'slot_number' => '125', 'parking_lamp_id' => NULL],
            ['block_id' => 39, 'camera_id' => 246, 'slot_number' => '126', 'parking_lamp_id' => NULL],

            // DTC4 Q4 Block set 18 slot with camera and Lamp.
            ['block_id' => 40, 'camera_id' => 245, 'slot_number' => '127', 'parking_lamp_id' => NULL],
            ['block_id' => 40, 'camera_id' => 245, 'slot_number' => '128', 'parking_lamp_id' => NULL],
            ['block_id' => 40, 'camera_id' => 245, 'slot_number' => '129', 'parking_lamp_id' => NULL],

            ['block_id' => 40, 'camera_id' => 244, 'slot_number' => '130', 'parking_lamp_id' => NULL],
            ['block_id' => 40, 'camera_id' => 244, 'slot_number' => '131', 'parking_lamp_id' => NULL],
            ['block_id' => 40, 'camera_id' => 244, 'slot_number' => '132', 'parking_lamp_id' => NULL],

            ['block_id' => 40, 'camera_id' => 243, 'slot_number' => '133', 'parking_lamp_id' => NULL],
            ['block_id' => 40, 'camera_id' => 243, 'slot_number' => '134', 'parking_lamp_id' => NULL],
            ['block_id' => 40, 'camera_id' => 243, 'slot_number' => '135', 'parking_lamp_id' => NULL],

            ['block_id' => 40, 'camera_id' => 242, 'slot_number' => '136', 'parking_lamp_id' => NULL],
            ['block_id' => 40, 'camera_id' => 242, 'slot_number' => '137', 'parking_lamp_id' => NULL],
            ['block_id' => 40, 'camera_id' => 242, 'slot_number' => '138', 'parking_lamp_id' => NULL],

            ['block_id' => 40, 'camera_id' => NULL, 'slot_number' => '139', 'parking_lamp_id' => NULL],
            ['block_id' => 40, 'camera_id' => NULL, 'slot_number' => '140', 'parking_lamp_id' => NULL],
            ['block_id' => 40, 'camera_id' => NULL, 'slot_number' => '141', 'parking_lamp_id' => NULL],

            ['block_id' => 40, 'camera_id' => 241, 'slot_number' => '142', 'parking_lamp_id' => NULL],
            ['block_id' => 40, 'camera_id' => 241, 'slot_number' => '143', 'parking_lamp_id' => NULL],
            ['block_id' => 40, 'camera_id' => 241, 'slot_number' => '144', 'parking_lamp_id' => NULL],

            // DTC3 R1 Block set 15 slot with camera and Lamp.
            ['block_id' => 41, 'camera_id' => NULL, 'slot_number' => '85', 'parking_lamp_id' => NULL],
            ['block_id' => 41, 'camera_id' => NUll, 'slot_number' => '86', 'parking_lamp_id' => NULL],
            ['block_id' => 41, 'camera_id' => NULL, 'slot_number' => '87', 'parking_lamp_id' => NULL],

            ['block_id' => 41, 'camera_id' => 259, 'slot_number' => '88', 'parking_lamp_id' => NULL],
            ['block_id' => 41, 'camera_id' => 259, 'slot_number' => '89', 'parking_lamp_id' => NULL],
            ['block_id' => 41, 'camera_id' => 259, 'slot_number' => '90', 'parking_lamp_id' => NULL],

            ['block_id' => 41, 'camera_id' => 258, 'slot_number' => '91', 'parking_lamp_id' => NULL],
            ['block_id' => 41, 'camera_id' => 258, 'slot_number' => '92', 'parking_lamp_id' => NULL],
            ['block_id' => 41, 'camera_id' => 258, 'slot_number' => '93', 'parking_lamp_id' => NULL],

            ['block_id' => 41, 'camera_id' => 257, 'slot_number' => '94', 'parking_lamp_id' => NULL],
            ['block_id' => 41, 'camera_id' => 257, 'slot_number' => '95', 'parking_lamp_id' => NULL],
            ['block_id' => 41, 'camera_id' => 257, 'slot_number' => '96', 'parking_lamp_id' => NULL],

            ['block_id' => 41, 'camera_id' => 256, 'slot_number' => '97', 'parking_lamp_id' => NULL],
            ['block_id' => 41, 'camera_id' => 256, 'slot_number' => '98', 'parking_lamp_id' => NULL],
            ['block_id' => 41, 'camera_id' => 256, 'slot_number' => '99', 'parking_lamp_id' => NULL],

            // DTC3 R2 Block set 15 slot with camera and Lamp.
            ['block_id' => 42, 'camera_id' => 255, 'slot_number' => '100', 'parking_lamp_id' => NULL],
            ['block_id' => 42, 'camera_id' => 255, 'slot_number' => '101', 'parking_lamp_id' => NULL],
            ['block_id' => 42, 'camera_id' => 255, 'slot_number' => '102', 'parking_lamp_id' => NULL],

            ['block_id' => 42, 'camera_id' => 254, 'slot_number' => '103', 'parking_lamp_id' => NULL],
            ['block_id' => 42, 'camera_id' => 254, 'slot_number' => '104', 'parking_lamp_id' => NULL],
            ['block_id' => 42, 'camera_id' => 254, 'slot_number' => '105', 'parking_lamp_id' => NULL],

            ['block_id' => 42, 'camera_id' => 253, 'slot_number' => '106', 'parking_lamp_id' => NULL],
            ['block_id' => 42, 'camera_id' => 253, 'slot_number' => '107', 'parking_lamp_id' => NULL],
            ['block_id' => 42, 'camera_id' => 253, 'slot_number' => '108', 'parking_lamp_id' => NULL],

            ['block_id' => 42, 'camera_id' => 252, 'slot_number' => '109', 'parking_lamp_id' => NULL],
            ['block_id' => 42, 'camera_id' => 252, 'slot_number' => '110', 'parking_lamp_id' => NULL],
            ['block_id' => 42, 'camera_id' => 252, 'slot_number' => '111', 'parking_lamp_id' => NULL],

            ['block_id' => 42, 'camera_id' => NULL, 'slot_number' => '112', 'parking_lamp_id' => NULL],
            ['block_id' => 42, 'camera_id' => NULL, 'slot_number' => '113', 'parking_lamp_id' => NULL],
            ['block_id' => 42, 'camera_id' => NULL, 'slot_number' => '114', 'parking_lamp_id' => NULL],

            // DTC4 R3 Block set 18 slot with camera and Lamp.
            ['block_id' => 43, 'camera_id' => 271, 'slot_number' => '115', 'parking_lamp_id' => NULL],
            ['block_id' => 43, 'camera_id' => 271, 'slot_number' => '116', 'parking_lamp_id' => NULL],
            ['block_id' => 43, 'camera_id' => 271, 'slot_number' => '117', 'parking_lamp_id' => NULL],

            ['block_id' => 43, 'camera_id' => 270, 'slot_number' => '118', 'parking_lamp_id' => NULL],
            ['block_id' => 43, 'camera_id' => 270, 'slot_number' => '119', 'parking_lamp_id' => NULL],
            ['block_id' => 43, 'camera_id' => 270, 'slot_number' => '120', 'parking_lamp_id' => NULL],

            ['block_id' => 43, 'camera_id' => 269, 'slot_number' => '121', 'parking_lamp_id' => NULL],
            ['block_id' => 43, 'camera_id' => 269, 'slot_number' => '122', 'parking_lamp_id' => NULL],
            ['block_id' => 43, 'camera_id' => 269, 'slot_number' => '123', 'parking_lamp_id' => NULL],

            ['block_id' => 43, 'camera_id' => 268, 'slot_number' => '124', 'parking_lamp_id' => NULL],
            ['block_id' => 43, 'camera_id' => 268, 'slot_number' => '125', 'parking_lamp_id' => NULL],
            ['block_id' => 43, 'camera_id' => 268, 'slot_number' => '126', 'parking_lamp_id' => NULL],

            ['block_id' => 43, 'camera_id' => 267, 'slot_number' => '127', 'parking_lamp_id' => NULL],
            ['block_id' => 43, 'camera_id' => 267, 'slot_number' => '128', 'parking_lamp_id' => NULL],
            ['block_id' => 43, 'camera_id' => 267, 'slot_number' => '129', 'parking_lamp_id' => NULL],

            ['block_id' => 43, 'camera_id' => 266, 'slot_number' => '130', 'parking_lamp_id' => NULL],
            ['block_id' => 43, 'camera_id' => 266, 'slot_number' => '131', 'parking_lamp_id' => NULL],
            ['block_id' => 43, 'camera_id' => 266, 'slot_number' => '132', 'parking_lamp_id' => NULL],

            // DTC4 R4 Block set 18 slot with camera and Lamp.
            ['block_id' => 44, 'camera_id' => 265, 'slot_number' => '133', 'parking_lamp_id' => NULL],
            ['block_id' => 44, 'camera_id' => 265, 'slot_number' => '134', 'parking_lamp_id' => NULL],
            ['block_id' => 44, 'camera_id' => 265, 'slot_number' => '135', 'parking_lamp_id' => NULL],

            ['block_id' => 44, 'camera_id' => 264, 'slot_number' => '136', 'parking_lamp_id' => NULL],
            ['block_id' => 44, 'camera_id' => 264, 'slot_number' => '137', 'parking_lamp_id' => NULL],
            ['block_id' => 44, 'camera_id' => 264, 'slot_number' => '138', 'parking_lamp_id' => NULL],

            ['block_id' => 44, 'camera_id' => 263, 'slot_number' => '139', 'parking_lamp_id' => NULL],
            ['block_id' => 44, 'camera_id' => 263, 'slot_number' => '140', 'parking_lamp_id' => NULL],
            ['block_id' => 44, 'camera_id' => 263, 'slot_number' => '141', 'parking_lamp_id' => NULL],

            ['block_id' => 44, 'camera_id' => 262, 'slot_number' => '142', 'parking_lamp_id' => NULL],
            ['block_id' => 44, 'camera_id' => 262, 'slot_number' => '143', 'parking_lamp_id' => NULL],
            ['block_id' => 44, 'camera_id' => 262, 'slot_number' => '144', 'parking_lamp_id' => NULL],

            ['block_id' => 44, 'camera_id' => 261, 'slot_number' => '145', 'parking_lamp_id' => NULL],
            ['block_id' => 44, 'camera_id' => 261, 'slot_number' => '146', 'parking_lamp_id' => NULL],
            ['block_id' => 44, 'camera_id' => 261, 'slot_number' => '147', 'parking_lamp_id' => NULL],

            ['block_id' => 44, 'camera_id' => 260, 'slot_number' => '148', 'parking_lamp_id' => NULL],
            ['block_id' => 44, 'camera_id' => 260, 'slot_number' => '149', 'parking_lamp_id' => NULL],
            ['block_id' => 44, 'camera_id' => 260, 'slot_number' => '150', 'parking_lamp_id' => NULL],

            // DTC3 S1 Block set 18 slot with camera and Lamp.
            ['block_id' => 45, 'camera_id' => NULL, 'slot_number' => '85', 'parking_lamp_id' => NULL],
            ['block_id' => 45, 'camera_id' => NULL, 'slot_number' => '86', 'parking_lamp_id' => NULL],
            ['block_id' => 45, 'camera_id' => NULL, 'slot_number' => '87', 'parking_lamp_id' => NULL],

            ['block_id' => 45, 'camera_id' => 279, 'slot_number' => '88', 'parking_lamp_id' => NULL],
            ['block_id' => 45, 'camera_id' => 279, 'slot_number' => '89', 'parking_lamp_id' => NULL],
            ['block_id' => 45, 'camera_id' => 279, 'slot_number' => '90', 'parking_lamp_id' => NULL],

            ['block_id' => 45, 'camera_id' => 278, 'slot_number' => '91', 'parking_lamp_id' => NULL],
            ['block_id' => 45, 'camera_id' => 278, 'slot_number' => '92', 'parking_lamp_id' => NULL],
            ['block_id' => 45, 'camera_id' => 278, 'slot_number' => '93', 'parking_lamp_id' => NULL],

            ['block_id' => 45, 'camera_id' => 277, 'slot_number' => '94', 'parking_lamp_id' => NULL],
            ['block_id' => 45, 'camera_id' => 277, 'slot_number' => '95', 'parking_lamp_id' => NULL],
            ['block_id' => 45, 'camera_id' => 277, 'slot_number' => '96', 'parking_lamp_id' => NULL],

            ['block_id' => 45, 'camera_id' => 276, 'slot_number' => '97', 'parking_lamp_id' => NULL],
            ['block_id' => 45, 'camera_id' => 276, 'slot_number' => '98', 'parking_lamp_id' => NULL],
            ['block_id' => 45, 'camera_id' => 276, 'slot_number' => '99', 'parking_lamp_id' => NULL],

            // DTC3 S2 Block set 18 slot with camera and Lamp.
            ['block_id' => 46, 'camera_id' => 275, 'slot_number' => '100', 'parking_lamp_id' => NULL],
            ['block_id' => 46, 'camera_id' => 275, 'slot_number' => '101', 'parking_lamp_id' => NULL],
            ['block_id' => 46, 'camera_id' => 275, 'slot_number' => '102', 'parking_lamp_id' => NULL],

            ['block_id' => 46, 'camera_id' => 274, 'slot_number' => '103', 'parking_lamp_id' => NULL],
            ['block_id' => 46, 'camera_id' => 274, 'slot_number' => '104', 'parking_lamp_id' => NULL],
            ['block_id' => 46, 'camera_id' => 274, 'slot_number' => '105', 'parking_lamp_id' => NULL],

            ['block_id' => 46, 'camera_id' => 273, 'slot_number' => '106', 'parking_lamp_id' => NULL],
            ['block_id' => 46, 'camera_id' => 273, 'slot_number' => '107', 'parking_lamp_id' => NULL],
            ['block_id' => 46, 'camera_id' => 273, 'slot_number' => '108', 'parking_lamp_id' => NULL],

            ['block_id' => 46, 'camera_id' => 272, 'slot_number' => '109', 'parking_lamp_id' => NULL],
            ['block_id' => 46, 'camera_id' => 272, 'slot_number' => '110', 'parking_lamp_id' => NULL],
            ['block_id' => 46, 'camera_id' => 272, 'slot_number' => '111', 'parking_lamp_id' => NULL],

            ['block_id' => 46, 'camera_id' => NULL, 'slot_number' => '112', 'parking_lamp_id' => NULL],
            ['block_id' => 46, 'camera_id' => NULL, 'slot_number' => '113', 'parking_lamp_id' => NULL],
            ['block_id' => 46, 'camera_id' => NULL, 'slot_number' => '114', 'parking_lamp_id' => NULL],

            // DTC4 S3 Block set 18 slot with camera and Lamp.
            ['block_id' => 47, 'camera_id' => 291, 'slot_number' => '115', 'parking_lamp_id' => NULL],
            ['block_id' => 47, 'camera_id' => 291, 'slot_number' => '116', 'parking_lamp_id' => NULL],
            ['block_id' => 47, 'camera_id' => 291, 'slot_number' => '117', 'parking_lamp_id' => NULL],

            ['block_id' => 47, 'camera_id' => 290, 'slot_number' => '118', 'parking_lamp_id' => NULL],
            ['block_id' => 47, 'camera_id' => 290, 'slot_number' => '119', 'parking_lamp_id' => NULL],
            ['block_id' => 47, 'camera_id' => 290, 'slot_number' => '120', 'parking_lamp_id' => NULL],

            ['block_id' => 47, 'camera_id' => 289, 'slot_number' => '121', 'parking_lamp_id' => NULL],
            ['block_id' => 47, 'camera_id' => 289, 'slot_number' => '122', 'parking_lamp_id' => NULL],
            ['block_id' => 47, 'camera_id' => 289, 'slot_number' => '123', 'parking_lamp_id' => NULL],

            ['block_id' => 47, 'camera_id' => 288, 'slot_number' => '124', 'parking_lamp_id' => NULL],
            ['block_id' => 47, 'camera_id' => 288, 'slot_number' => '125', 'parking_lamp_id' => NULL],
            ['block_id' => 47, 'camera_id' => 288, 'slot_number' => '126', 'parking_lamp_id' => NULL],

            ['block_id' => 47, 'camera_id' => 287, 'slot_number' => '127', 'parking_lamp_id' => NULL],
            ['block_id' => 47, 'camera_id' => 287, 'slot_number' => '128', 'parking_lamp_id' => NULL],
            ['block_id' => 47, 'camera_id' => 287, 'slot_number' => '129', 'parking_lamp_id' => NULL],

            ['block_id' => 47, 'camera_id' => 286, 'slot_number' => '130', 'parking_lamp_id' => NULL],
            ['block_id' => 47, 'camera_id' => 286, 'slot_number' => '131', 'parking_lamp_id' => NULL],
            ['block_id' => 47, 'camera_id' => 286, 'slot_number' => '132', 'parking_lamp_id' => NULL],

            // DTC4 S4 Block set 18 slot with camera and Lamp.
            ['block_id' => 48, 'camera_id' => 285, 'slot_number' => '133', 'parking_lamp_id' => NULL],
            ['block_id' => 48, 'camera_id' => 285, 'slot_number' => '134', 'parking_lamp_id' => NULL],
            ['block_id' => 48, 'camera_id' => 285, 'slot_number' => '135', 'parking_lamp_id' => NULL],

            ['block_id' => 48, 'camera_id' => 284, 'slot_number' => '136', 'parking_lamp_id' => NULL],
            ['block_id' => 48, 'camera_id' => 284, 'slot_number' => '137', 'parking_lamp_id' => NULL],
            ['block_id' => 48, 'camera_id' => 284, 'slot_number' => '138', 'parking_lamp_id' => NULL],

            ['block_id' => 48, 'camera_id' => 283, 'slot_number' => '139', 'parking_lamp_id' => NULL],
            ['block_id' => 48, 'camera_id' => 283, 'slot_number' => '140', 'parking_lamp_id' => NULL],
            ['block_id' => 48, 'camera_id' => 283, 'slot_number' => '141', 'parking_lamp_id' => NULL],

            ['block_id' => 48, 'camera_id' => 282, 'slot_number' => '142', 'parking_lamp_id' => NULL],
            ['block_id' => 48, 'camera_id' => 282, 'slot_number' => '143', 'parking_lamp_id' => NULL],
            ['block_id' => 48, 'camera_id' => 282, 'slot_number' => '144', 'parking_lamp_id' => NULL],

            ['block_id' => 48, 'camera_id' => 281, 'slot_number' => '145', 'parking_lamp_id' => NULL],
            ['block_id' => 48, 'camera_id' => 281, 'slot_number' => '146', 'parking_lamp_id' => NULL],
            ['block_id' => 48, 'camera_id' => 281, 'slot_number' => '147', 'parking_lamp_id' => NULL],

            ['block_id' => 48, 'camera_id' => 280, 'slot_number' => '148', 'parking_lamp_id' => NULL],
            ['block_id' => 48, 'camera_id' => 280, 'slot_number' => '149', 'parking_lamp_id' => NULL],
            ['block_id' => 48, 'camera_id' => 280, 'slot_number' => '150', 'parking_lamp_id' => NULL],

            // DTC3 T1 Block set 15 slot with camera and Lamp.
            ['block_id' => 49, 'camera_id' => NULL, 'slot_number' => '85', 'parking_lamp_id' => NULL],
            ['block_id' => 49, 'camera_id' => NULL, 'slot_number' => '86', 'parking_lamp_id' => NULL],
            ['block_id' => 49, 'camera_id' => NULL, 'slot_number' => '87', 'parking_lamp_id' => NULL],

            ['block_id' => 49, 'camera_id' => 299, 'slot_number' => '88', 'parking_lamp_id' => NULL],
            ['block_id' => 49, 'camera_id' => 299, 'slot_number' => '89', 'parking_lamp_id' => NULL],
            ['block_id' => 49, 'camera_id' => 299, 'slot_number' => '90', 'parking_lamp_id' => NULL],

            ['block_id' => 49, 'camera_id' => 298, 'slot_number' => '91', 'parking_lamp_id' => NULL],
            ['block_id' => 49, 'camera_id' => 298, 'slot_number' => '92', 'parking_lamp_id' => NULL],
            ['block_id' => 49, 'camera_id' => 298, 'slot_number' => '93', 'parking_lamp_id' => NULL],

            ['block_id' => 49, 'camera_id' => 297, 'slot_number' => '94', 'parking_lamp_id' => NULL],
            ['block_id' => 49, 'camera_id' => 297, 'slot_number' => '95', 'parking_lamp_id' => NULL],
            ['block_id' => 49, 'camera_id' => 297, 'slot_number' => '96', 'parking_lamp_id' => NULL],

            ['block_id' => 49, 'camera_id' => 296, 'slot_number' => '97', 'parking_lamp_id' => NULL],
            ['block_id' => 49, 'camera_id' => 296, 'slot_number' => '98', 'parking_lamp_id' => NULL],
            ['block_id' => 49, 'camera_id' => 296, 'slot_number' => '99', 'parking_lamp_id' => NULL],

            // DTC3 T2 Block set 15 slot with camera and Lamp.
            ['block_id' => 50, 'camera_id' => 295, 'slot_number' => '100', 'parking_lamp_id' => NULL],
            ['block_id' => 50, 'camera_id' => 295, 'slot_number' => '101', 'parking_lamp_id' => NULL],
            ['block_id' => 50, 'camera_id' => 295, 'slot_number' => '102', 'parking_lamp_id' => NULL],

            ['block_id' => 50, 'camera_id' => 294, 'slot_number' => '103', 'parking_lamp_id' => NULL],
            ['block_id' => 50, 'camera_id' => 294, 'slot_number' => '104', 'parking_lamp_id' => NULL],
            ['block_id' => 50, 'camera_id' => 294, 'slot_number' => '105', 'parking_lamp_id' => NULL],

            ['block_id' => 50, 'camera_id' => 293, 'slot_number' => '106', 'parking_lamp_id' => NULL],
            ['block_id' => 50, 'camera_id' => 293, 'slot_number' => '107', 'parking_lamp_id' => NULL],
            ['block_id' => 50, 'camera_id' => 293, 'slot_number' => '108', 'parking_lamp_id' => NULL],

            ['block_id' => 50, 'camera_id' => 292, 'slot_number' => '109', 'parking_lamp_id' => NULL],
            ['block_id' => 50, 'camera_id' => 292, 'slot_number' => '110', 'parking_lamp_id' => NULL],
            ['block_id' => 50, 'camera_id' => 292, 'slot_number' => '111', 'parking_lamp_id' => NULL],

            ['block_id' => 50, 'camera_id' => NULL, 'slot_number' => '112', 'parking_lamp_id' => NULL],
            ['block_id' => 50, 'camera_id' => NULL, 'slot_number' => '113', 'parking_lamp_id' => NULL],
            ['block_id' => 50, 'camera_id' => NULL, 'slot_number' => '114', 'parking_lamp_id' => NULL],

            // DTC4 T3 Block set 18 slot with camera and Lamp.
            ['block_id' => 51, 'camera_id' => 311, 'slot_number' => '115', 'parking_lamp_id' => NULL],
            ['block_id' => 51, 'camera_id' => 311, 'slot_number' => '116', 'parking_lamp_id' => NULL],
            ['block_id' => 51, 'camera_id' => 311, 'slot_number' => '117', 'parking_lamp_id' => NULL],

            ['block_id' => 51, 'camera_id' => 310, 'slot_number' => '118', 'parking_lamp_id' => NULL],
            ['block_id' => 51, 'camera_id' => 310, 'slot_number' => '119', 'parking_lamp_id' => NULL],
            ['block_id' => 51, 'camera_id' => 310, 'slot_number' => '120', 'parking_lamp_id' => NULL],

            ['block_id' => 51, 'camera_id' => 309, 'slot_number' => '121', 'parking_lamp_id' => NULL],
            ['block_id' => 51, 'camera_id' => 309, 'slot_number' => '122', 'parking_lamp_id' => NULL],
            ['block_id' => 51, 'camera_id' => 309, 'slot_number' => '123', 'parking_lamp_id' => NULL],

            ['block_id' => 51, 'camera_id' => 308, 'slot_number' => '124', 'parking_lamp_id' => NULL],
            ['block_id' => 51, 'camera_id' => 308, 'slot_number' => '125', 'parking_lamp_id' => NULL],
            ['block_id' => 51, 'camera_id' => 308, 'slot_number' => '126', 'parking_lamp_id' => NULL],

            ['block_id' => 51, 'camera_id' => 307, 'slot_number' => '127', 'parking_lamp_id' => NULL],
            ['block_id' => 51, 'camera_id' => 307, 'slot_number' => '128', 'parking_lamp_id' => NULL],
            ['block_id' => 51, 'camera_id' => 307, 'slot_number' => '129', 'parking_lamp_id' => NULL],

            ['block_id' => 51, 'camera_id' => 306, 'slot_number' => '130', 'parking_lamp_id' => NULL],
            ['block_id' => 51, 'camera_id' => 306, 'slot_number' => '131', 'parking_lamp_id' => NULL],
            ['block_id' => 51, 'camera_id' => 306, 'slot_number' => '132', 'parking_lamp_id' => NULL],

            // DTC4 T4 Block set 18 slot with camera and Lamp.
            ['block_id' => 52, 'camera_id' => 305, 'slot_number' => '133', 'parking_lamp_id' => NULL],
            ['block_id' => 52, 'camera_id' => 305, 'slot_number' => '134', 'parking_lamp_id' => NULL],
            ['block_id' => 52, 'camera_id' => 305, 'slot_number' => '135', 'parking_lamp_id' => NULL],

            ['block_id' => 52, 'camera_id' => 304, 'slot_number' => '136', 'parking_lamp_id' => NULL],
            ['block_id' => 52, 'camera_id' => 304, 'slot_number' => '137', 'parking_lamp_id' => NULL],
            ['block_id' => 52, 'camera_id' => 304, 'slot_number' => '138', 'parking_lamp_id' => NULL],

            ['block_id' => 52, 'camera_id' => 303, 'slot_number' => '139', 'parking_lamp_id' => NULL],
            ['block_id' => 52, 'camera_id' => 303, 'slot_number' => '140', 'parking_lamp_id' => NULL],
            ['block_id' => 52, 'camera_id' => 303, 'slot_number' => '141', 'parking_lamp_id' => NULL],

            ['block_id' => 52, 'camera_id' => 302, 'slot_number' => '142', 'parking_lamp_id' => NULL],
            ['block_id' => 52, 'camera_id' => 302, 'slot_number' => '143', 'parking_lamp_id' => NULL],
            ['block_id' => 52, 'camera_id' => 302, 'slot_number' => '144', 'parking_lamp_id' => NULL],

            ['block_id' => 52, 'camera_id' => 301, 'slot_number' => '145', 'parking_lamp_id' => NULL],
            ['block_id' => 52, 'camera_id' => 301, 'slot_number' => '146', 'parking_lamp_id' => NULL],
            ['block_id' => 52, 'camera_id' => 301, 'slot_number' => '147', 'parking_lamp_id' => NULL],

            ['block_id' => 52, 'camera_id' => 300, 'slot_number' => '148', 'parking_lamp_id' => NULL],
            ['block_id' => 52, 'camera_id' => 300, 'slot_number' => '149', 'parking_lamp_id' => NULL],
            ['block_id' => 52, 'camera_id' => 300, 'slot_number' => '150', 'parking_lamp_id' => NULL],

            // DTC3 U1 Block set 15 slot with camera and Lamp.
            ['block_id' => 53, 'camera_id' => NULL, 'slot_number' => '85', 'parking_lamp_id' => NULL],
            ['block_id' => 53, 'camera_id' => NULL, 'slot_number' => '86', 'parking_lamp_id' => NULL],
            ['block_id' => 53, 'camera_id' => NULL, 'slot_number' => '87', 'parking_lamp_id' => NULL],

            ['block_id' => 53, 'camera_id' => 319, 'slot_number' => '88', 'parking_lamp_id' => NULL],
            ['block_id' => 53, 'camera_id' => 319, 'slot_number' => '89', 'parking_lamp_id' => NULL],
            ['block_id' => 53, 'camera_id' => 319, 'slot_number' => '90', 'parking_lamp_id' => NULL],

            ['block_id' => 53, 'camera_id' => 318, 'slot_number' => '91', 'parking_lamp_id' => NULL],
            ['block_id' => 53, 'camera_id' => 318, 'slot_number' => '92', 'parking_lamp_id' => NULL],
            ['block_id' => 53, 'camera_id' => 318, 'slot_number' => '93', 'parking_lamp_id' => NULL],

            ['block_id' => 53, 'camera_id' => 317, 'slot_number' => '94', 'parking_lamp_id' => NULL],
            ['block_id' => 53, 'camera_id' => 317, 'slot_number' => '95', 'parking_lamp_id' => NULL],
            ['block_id' => 53, 'camera_id' => 317, 'slot_number' => '96', 'parking_lamp_id' => NULL],

            ['block_id' => 53, 'camera_id' => 316, 'slot_number' => '97', 'parking_lamp_id' => NULL],
            ['block_id' => 53, 'camera_id' => 316, 'slot_number' => '98', 'parking_lamp_id' => NULL],
            ['block_id' => 53, 'camera_id' => 316, 'slot_number' => '99', 'parking_lamp_id' => NULL],

            // DTC3 U2 Block set 15 slot with camera and Lamp.
            ['block_id' => 54, 'camera_id' => 315, 'slot_number' => '100', 'parking_lamp_id' => NULL],
            ['block_id' => 54, 'camera_id' => 315, 'slot_number' => '101', 'parking_lamp_id' => NULL],
            ['block_id' => 54, 'camera_id' => 315, 'slot_number' => '102', 'parking_lamp_id' => NULL],

            ['block_id' => 54, 'camera_id' => 314, 'slot_number' => '103', 'parking_lamp_id' => NULL],
            ['block_id' => 54, 'camera_id' => 314, 'slot_number' => '104', 'parking_lamp_id' => NULL],
            ['block_id' => 54, 'camera_id' => 314, 'slot_number' => '105', 'parking_lamp_id' => NULL],

            ['block_id' => 54, 'camera_id' => 313, 'slot_number' => '106', 'parking_lamp_id' => NULL],
            ['block_id' => 54, 'camera_id' => 313, 'slot_number' => '107', 'parking_lamp_id' => NULL],
            ['block_id' => 54, 'camera_id' => 313, 'slot_number' => '108', 'parking_lamp_id' => NULL],

            ['block_id' => 54, 'camera_id' => 312, 'slot_number' => '109', 'parking_lamp_id' => NULL],
            ['block_id' => 54, 'camera_id' => 312, 'slot_number' => '110', 'parking_lamp_id' => NULL],
            ['block_id' => 54, 'camera_id' => 312, 'slot_number' => '111', 'parking_lamp_id' => NULL],

            ['block_id' => 54, 'camera_id' => NULL, 'slot_number' => '112', 'parking_lamp_id' => NULL],
            ['block_id' => 54, 'camera_id' => NULL, 'slot_number' => '113', 'parking_lamp_id' => NULL],
            ['block_id' => 54, 'camera_id' => NULL, 'slot_number' => '114', 'parking_lamp_id' => NULL],

            // DTC4 U3 Block set 18 slot with camera and Lamp.
            ['block_id' => 55, 'camera_id' => 331, 'slot_number' => '115', 'parking_lamp_id' => NULL],
            ['block_id' => 55, 'camera_id' => 331, 'slot_number' => '116', 'parking_lamp_id' => NULL],
            ['block_id' => 55, 'camera_id' => 331, 'slot_number' => '117', 'parking_lamp_id' => NULL],

            ['block_id' => 55, 'camera_id' => 330, 'slot_number' => '118', 'parking_lamp_id' => NULL],
            ['block_id' => 55, 'camera_id' => 330, 'slot_number' => '119', 'parking_lamp_id' => NULL],
            ['block_id' => 55, 'camera_id' => 330, 'slot_number' => '120', 'parking_lamp_id' => NULL],

            ['block_id' => 55, 'camera_id' => 329, 'slot_number' => '121', 'parking_lamp_id' => NULL],
            ['block_id' => 55, 'camera_id' => 329, 'slot_number' => '122', 'parking_lamp_id' => NULL],
            ['block_id' => 55, 'camera_id' => 329, 'slot_number' => '123', 'parking_lamp_id' => NULL],

            ['block_id' => 55, 'camera_id' => 328, 'slot_number' => '124', 'parking_lamp_id' => NULL],
            ['block_id' => 55, 'camera_id' => 328, 'slot_number' => '125', 'parking_lamp_id' => NULL],
            ['block_id' => 55, 'camera_id' => 328, 'slot_number' => '126', 'parking_lamp_id' => NULL],

            ['block_id' => 55, 'camera_id' => 327, 'slot_number' => '127', 'parking_lamp_id' => NULL],
            ['block_id' => 55, 'camera_id' => 327, 'slot_number' => '128', 'parking_lamp_id' => NULL],
            ['block_id' => 55, 'camera_id' => 327, 'slot_number' => '129', 'parking_lamp_id' => NULL],

            ['block_id' => 55, 'camera_id' => 326, 'slot_number' => '130', 'parking_lamp_id' => NULL],
            ['block_id' => 55, 'camera_id' => 326, 'slot_number' => '131', 'parking_lamp_id' => NULL],
            ['block_id' => 55, 'camera_id' => 326, 'slot_number' => '132', 'parking_lamp_id' => NULL],

            // DTC4 U4 Block set 18 slot with camera and Lamp.
            ['block_id' => 56, 'camera_id' => 325, 'slot_number' => '133', 'parking_lamp_id' => NULL],
            ['block_id' => 56, 'camera_id' => 325, 'slot_number' => '134', 'parking_lamp_id' => NULL],
            ['block_id' => 56, 'camera_id' => 325, 'slot_number' => '135', 'parking_lamp_id' => NULL],

            ['block_id' => 56, 'camera_id' => 324, 'slot_number' => '136', 'parking_lamp_id' => NULL],
            ['block_id' => 56, 'camera_id' => 324, 'slot_number' => '137', 'parking_lamp_id' => NULL],
            ['block_id' => 56, 'camera_id' => 324, 'slot_number' => '138', 'parking_lamp_id' => NULL],

            ['block_id' => 56, 'camera_id' => 323, 'slot_number' => '139', 'parking_lamp_id' => NULL],
            ['block_id' => 56, 'camera_id' => 323, 'slot_number' => '140', 'parking_lamp_id' => NULL],
            ['block_id' => 56, 'camera_id' => 323, 'slot_number' => '141', 'parking_lamp_id' => NULL],

            ['block_id' => 56, 'camera_id' => 322, 'slot_number' => '142', 'parking_lamp_id' => NULL],
            ['block_id' => 56, 'camera_id' => 322, 'slot_number' => '143', 'parking_lamp_id' => NULL],
            ['block_id' => 56, 'camera_id' => 322, 'slot_number' => '144', 'parking_lamp_id' => NULL],

            ['block_id' => 56, 'camera_id' => 321, 'slot_number' => '145', 'parking_lamp_id' => NULL],
            ['block_id' => 56, 'camera_id' => 321, 'slot_number' => '146', 'parking_lamp_id' => NULL],
            ['block_id' => 56, 'camera_id' => 321, 'slot_number' => '147', 'parking_lamp_id' => NULL],

            ['block_id' => 56, 'camera_id' => 320, 'slot_number' => '148', 'parking_lamp_id' => NULL],
            ['block_id' => 56, 'camera_id' => 320, 'slot_number' => '149', 'parking_lamp_id' => NULL],
            ['block_id' => 56, 'camera_id' => 320, 'slot_number' => '150', 'parking_lamp_id' => NULL],

            // DTC3 V1 Block set 15 slot with camera and Lamp.
            ['block_id' => 57, 'camera_id' => 341, 'slot_number' => '85', 'parking_lamp_id' => NULL],
            ['block_id' => 57, 'camera_id' => 341, 'slot_number' => '86', 'parking_lamp_id' => NULL],
            ['block_id' => 57, 'camera_id' => 341, 'slot_number' => '87', 'parking_lamp_id' => NULL],

            ['block_id' => 57, 'camera_id' => 340, 'slot_number' => '88', 'parking_lamp_id' => NULL],
            ['block_id' => 57, 'camera_id' => 340, 'slot_number' => '89', 'parking_lamp_id' => NULL],
            ['block_id' => 57, 'camera_id' => 340, 'slot_number' => '90', 'parking_lamp_id' => NULL],

            ['block_id' => 57, 'camera_id' => 339, 'slot_number' => '91', 'parking_lamp_id' => NULL],
            ['block_id' => 57, 'camera_id' => 339, 'slot_number' => '92', 'parking_lamp_id' => NULL],
            ['block_id' => 57, 'camera_id' => 339, 'slot_number' => '93', 'parking_lamp_id' => NULL],

            ['block_id' => 57, 'camera_id' => 338, 'slot_number' => '94', 'parking_lamp_id' => NULL],
            ['block_id' => 57, 'camera_id' => 338, 'slot_number' => '95', 'parking_lamp_id' => NULL],
            ['block_id' => 57, 'camera_id' => 338, 'slot_number' => '96', 'parking_lamp_id' => NULL],

            ['block_id' => 57, 'camera_id' => 337, 'slot_number' => '97', 'parking_lamp_id' => NULL],
            ['block_id' => 57, 'camera_id' => 337, 'slot_number' => '98', 'parking_lamp_id' => NULL],
            ['block_id' => 57, 'camera_id' => 337, 'slot_number' => '99', 'parking_lamp_id' => NULL],

            // DTC3 V2 Block set 15 slot with camera and Lamp.
            ['block_id' => 58, 'camera_id' => 336, 'slot_number' => '100', 'parking_lamp_id' => NULL],
            ['block_id' => 58, 'camera_id' => 336, 'slot_number' => '101', 'parking_lamp_id' => NULL],
            ['block_id' => 58, 'camera_id' => 336, 'slot_number' => '102', 'parking_lamp_id' => NULL],

            ['block_id' => 58, 'camera_id' => 335, 'slot_number' => '103', 'parking_lamp_id' => NULL],
            ['block_id' => 58, 'camera_id' => 335, 'slot_number' => '104', 'parking_lamp_id' => NULL],
            ['block_id' => 58, 'camera_id' => 335, 'slot_number' => '105', 'parking_lamp_id' => NULL],

            ['block_id' => 58, 'camera_id' => 334, 'slot_number' => '106', 'parking_lamp_id' => NULL],
            ['block_id' => 58, 'camera_id' => 334, 'slot_number' => '107', 'parking_lamp_id' => NULL],
            ['block_id' => 58, 'camera_id' => 334, 'slot_number' => '108', 'parking_lamp_id' => NULL],

            ['block_id' => 58, 'camera_id' => 333, 'slot_number' => '109', 'parking_lamp_id' => NULL],
            ['block_id' => 58, 'camera_id' => 333, 'slot_number' => '110', 'parking_lamp_id' => NULL],
            ['block_id' => 58, 'camera_id' => 333, 'slot_number' => '111', 'parking_lamp_id' => NULL],

            ['block_id' => 58, 'camera_id' => 332, 'slot_number' => '112', 'parking_lamp_id' => NULL],
            ['block_id' => 58, 'camera_id' => 332, 'slot_number' => '113', 'parking_lamp_id' => NULL],
            ['block_id' => 58, 'camera_id' => 332, 'slot_number' => '114', 'parking_lamp_id' => NULL],

            // DTC4 V3 Block set 18 slot with camera and Lamp.
            ['block_id' => 59, 'camera_id' => 353, 'slot_number' => '115', 'parking_lamp_id' => NULL],
            ['block_id' => 59, 'camera_id' => 353, 'slot_number' => '116', 'parking_lamp_id' => NULL],
            ['block_id' => 59, 'camera_id' => 353, 'slot_number' => '117', 'parking_lamp_id' => NULL],

            ['block_id' => 59, 'camera_id' => 352, 'slot_number' => '118', 'parking_lamp_id' => NULL],
            ['block_id' => 59, 'camera_id' => 352, 'slot_number' => '119', 'parking_lamp_id' => NULL],
            ['block_id' => 59, 'camera_id' => 352, 'slot_number' => '120', 'parking_lamp_id' => NULL],

            ['block_id' => 59, 'camera_id' => 351, 'slot_number' => '121', 'parking_lamp_id' => NULL],
            ['block_id' => 59, 'camera_id' => 351, 'slot_number' => '122', 'parking_lamp_id' => NULL],
            ['block_id' => 59, 'camera_id' => 351, 'slot_number' => '123', 'parking_lamp_id' => NULL],

            ['block_id' => 59, 'camera_id' => 350, 'slot_number' => '124', 'parking_lamp_id' => NULL],
            ['block_id' => 59, 'camera_id' => 350, 'slot_number' => '125', 'parking_lamp_id' => NULL],
            ['block_id' => 59, 'camera_id' => 350, 'slot_number' => '126', 'parking_lamp_id' => NULL],

            ['block_id' => 59, 'camera_id' => 349, 'slot_number' => '127', 'parking_lamp_id' => NULL],
            ['block_id' => 59, 'camera_id' => 349, 'slot_number' => '128', 'parking_lamp_id' => NULL],
            ['block_id' => 59, 'camera_id' => 349, 'slot_number' => '129', 'parking_lamp_id' => NULL],

            ['block_id' => 59, 'camera_id' => 348, 'slot_number' => '130', 'parking_lamp_id' => NULL],
            ['block_id' => 59, 'camera_id' => 348, 'slot_number' => '131', 'parking_lamp_id' => NULL],
            ['block_id' => 59, 'camera_id' => 348, 'slot_number' => '132', 'parking_lamp_id' => NULL],

            // DTC4 V4 Block set 18 slot with camera and Lamp.
            ['block_id' => 60, 'camera_id' => 347, 'slot_number' => '133', 'parking_lamp_id' => NULL],
            ['block_id' => 60, 'camera_id' => 347, 'slot_number' => '134', 'parking_lamp_id' => NULL],
            ['block_id' => 60, 'camera_id' => 347, 'slot_number' => '135', 'parking_lamp_id' => NULL],

            ['block_id' => 60, 'camera_id' => 346, 'slot_number' => '136', 'parking_lamp_id' => NULL],
            ['block_id' => 60, 'camera_id' => 346, 'slot_number' => '137', 'parking_lamp_id' => NULL],
            ['block_id' => 60, 'camera_id' => 346, 'slot_number' => '138', 'parking_lamp_id' => NULL],

            ['block_id' => 60, 'camera_id' => 345, 'slot_number' => '139', 'parking_lamp_id' => NULL],
            ['block_id' => 60, 'camera_id' => 345, 'slot_number' => '140', 'parking_lamp_id' => NULL],
            ['block_id' => 60, 'camera_id' => 345, 'slot_number' => '141', 'parking_lamp_id' => NULL],

            ['block_id' => 60, 'camera_id' => 344, 'slot_number' => '142', 'parking_lamp_id' => NULL],
            ['block_id' => 60, 'camera_id' => 344, 'slot_number' => '143', 'parking_lamp_id' => NULL],
            ['block_id' => 60, 'camera_id' => 344, 'slot_number' => '144', 'parking_lamp_id' => NULL],

            ['block_id' => 60, 'camera_id' => 343, 'slot_number' => '145', 'parking_lamp_id' => NULL],
            ['block_id' => 60, 'camera_id' => 343, 'slot_number' => '146', 'parking_lamp_id' => NULL],
            ['block_id' => 60, 'camera_id' => 343, 'slot_number' => '147', 'parking_lamp_id' => NULL],

            ['block_id' => 60, 'camera_id' => 342, 'slot_number' => '148', 'parking_lamp_id' => NULL],
            ['block_id' => 60, 'camera_id' => 342, 'slot_number' => '149', 'parking_lamp_id' => NULL],
            ['block_id' => 60, 'camera_id' => 342, 'slot_number' => '150', 'parking_lamp_id' => NULL],

            // DTC3 W1 Block set 15 slot with camera and Lamp.
            ['block_id' => 61, 'camera_id' => 357, 'slot_number' => '79', 'parking_lamp_id' => NULL],
            ['block_id' => 61, 'camera_id' => 357, 'slot_number' => '80', 'parking_lamp_id' => NULL],
            ['block_id' => 61, 'camera_id' => 357, 'slot_number' => '81', 'parking_lamp_id' => NULL],

            ['block_id' => 61, 'camera_id' => 356, 'slot_number' => '82', 'parking_lamp_id' => NULL],
            ['block_id' => 61, 'camera_id' => 356, 'slot_number' => '83', 'parking_lamp_id' => NULL],
            ['block_id' => 61, 'camera_id' => 356, 'slot_number' => '84', 'parking_lamp_id' => NULL],

            ['block_id' => 61, 'camera_id' => 355, 'slot_number' => '85', 'parking_lamp_id' => NULL],
            ['block_id' => 61, 'camera_id' => 355, 'slot_number' => '86', 'parking_lamp_id' => NULL],
            ['block_id' => 61, 'camera_id' => 355, 'slot_number' => '87', 'parking_lamp_id' => NULL],

            ['block_id' => 61, 'camera_id' => 354, 'slot_number' => '88', 'parking_lamp_id' => NULL],
            ['block_id' => 61, 'camera_id' => 354, 'slot_number' => '89', 'parking_lamp_id' => NULL],
            ['block_id' => 61, 'camera_id' => 354, 'slot_number' => '90', 'parking_lamp_id' => NULL],

            ['block_id' => 61, 'camera_id' => 353, 'slot_number' => '91', 'parking_lamp_id' => NULL],
            ['block_id' => 61, 'camera_id' => 353, 'slot_number' => '92', 'parking_lamp_id' => NULL],
            ['block_id' => 61, 'camera_id' => 353, 'slot_number' => '93', 'parking_lamp_id' => NULL],

            // DTC3 W3 Block set 18 slot with camera and Lamp.
            ['block_id' => 63, 'camera_id' => 369, 'slot_number' => '109', 'parking_lamp_id' => NULL],
            ['block_id' => 63, 'camera_id' => 369, 'slot_number' => '110', 'parking_lamp_id' => NULL],
            ['block_id' => 63, 'camera_id' => 369, 'slot_number' => '111', 'parking_lamp_id' => NULL],

            ['block_id' => 63, 'camera_id' => 368, 'slot_number' => '112', 'parking_lamp_id' => NULL],
            ['block_id' => 63, 'camera_id' => 368, 'slot_number' => '113', 'parking_lamp_id' => NULL],
            ['block_id' => 63, 'camera_id' => 368, 'slot_number' => '114', 'parking_lamp_id' => NULL],

            ['block_id' => 63, 'camera_id' => 367, 'slot_number' => '115', 'parking_lamp_id' => NULL],
            ['block_id' => 63, 'camera_id' => 367, 'slot_number' => '116', 'parking_lamp_id' => NULL],
            ['block_id' => 63, 'camera_id' => 367, 'slot_number' => '117', 'parking_lamp_id' => NULL],

            ['block_id' => 63, 'camera_id' => 366, 'slot_number' => '118', 'parking_lamp_id' => NULL],
            ['block_id' => 63, 'camera_id' => 366, 'slot_number' => '119', 'parking_lamp_id' => NULL],
            ['block_id' => 63, 'camera_id' => 366, 'slot_number' => '120', 'parking_lamp_id' => NULL],

            ['block_id' => 63, 'camera_id' => 365, 'slot_number' => '121', 'parking_lamp_id' => NULL],
            ['block_id' => 63, 'camera_id' => 365, 'slot_number' => '122', 'parking_lamp_id' => NULL],
            ['block_id' => 63, 'camera_id' => 365, 'slot_number' => '123', 'parking_lamp_id' => NULL],

            ['block_id' => 63, 'camera_id' => 364, 'slot_number' => '124', 'parking_lamp_id' => NULL],
            ['block_id' => 63, 'camera_id' => 364, 'slot_number' => '125', 'parking_lamp_id' => NULL],
            ['block_id' => 63, 'camera_id' => 364, 'slot_number' => '126', 'parking_lamp_id' => NULL],

            // DTC4 W4 Block set 18 slot with camera and Lamp.
            ['block_id' => 64, 'camera_id' => 363, 'slot_number' => '127', 'parking_lamp_id' => NULL],
            ['block_id' => 64, 'camera_id' => 363, 'slot_number' => '128', 'parking_lamp_id' => NULL],
            ['block_id' => 64, 'camera_id' => 363, 'slot_number' => '129', 'parking_lamp_id' => NULL],

            ['block_id' => 64, 'camera_id' => 362, 'slot_number' => '130', 'parking_lamp_id' => NULL],
            ['block_id' => 64, 'camera_id' => 362, 'slot_number' => '131', 'parking_lamp_id' => NULL],
            ['block_id' => 64, 'camera_id' => 362, 'slot_number' => '132', 'parking_lamp_id' => NULL],

            ['block_id' => 64, 'camera_id' => 361, 'slot_number' => '133', 'parking_lamp_id' => NULL],
            ['block_id' => 64, 'camera_id' => 361, 'slot_number' => '134', 'parking_lamp_id' => NULL],
            ['block_id' => 64, 'camera_id' => 361, 'slot_number' => '135', 'parking_lamp_id' => NULL],

            ['block_id' => 64, 'camera_id' => 360, 'slot_number' => '136', 'parking_lamp_id' => NULL],
            ['block_id' => 64, 'camera_id' => 360, 'slot_number' => '137', 'parking_lamp_id' => NULL],
            ['block_id' => 64, 'camera_id' => 360, 'slot_number' => '138', 'parking_lamp_id' => NULL],

            ['block_id' => 64, 'camera_id' => 359, 'slot_number' => '139', 'parking_lamp_id' => NULL],
            ['block_id' => 64, 'camera_id' => 359, 'slot_number' => '140', 'parking_lamp_id' => NULL],
            ['block_id' => 64, 'camera_id' => 359, 'slot_number' => '141', 'parking_lamp_id' => NULL],

            ['block_id' => 64, 'camera_id' => 358, 'slot_number' => '142', 'parking_lamp_id' => NULL],
            ['block_id' => 64, 'camera_id' => 358, 'slot_number' => '143', 'parking_lamp_id' => NULL],
            ['block_id' => 64, 'camera_id' => 358, 'slot_number' => '144', 'parking_lamp_id' => NULL],

            // Solar1 A1 Block set 19 slot with camera and Lamp.

            ['block_id' => 65, 'camera_id' => 383, 'slot_number' => '45', 'parking_lamp_id' => NULL],
            ['block_id' => 65, 'camera_id' => 383, 'slot_number' => '46', 'parking_lamp_id' => NULL],
            ['block_id' => 65, 'camera_id' => 383, 'slot_number' => '47', 'parking_lamp_id' => NULL],

            ['block_id' => 65, 'camera_id' => 382, 'slot_number' => '48', 'parking_lamp_id' => NULL],
            ['block_id' => 65, 'camera_id' => 382, 'slot_number' => '49', 'parking_lamp_id' => NULL],
            ['block_id' => 65, 'camera_id' => 382, 'slot_number' => '50', 'parking_lamp_id' => NULL],

            ['block_id' => 65, 'camera_id' => 381, 'slot_number' => '51', 'parking_lamp_id' => NULL],
            ['block_id' => 65, 'camera_id' => 381, 'slot_number' => '52', 'parking_lamp_id' => NULL],
            ['block_id' => 65, 'camera_id' => 381, 'slot_number' => '53', 'parking_lamp_id' => NULL],

            ['block_id' => 65, 'camera_id' => 380, 'slot_number' => '54', 'parking_lamp_id' => NULL],
            ['block_id' => 65, 'camera_id' => 380, 'slot_number' => '55', 'parking_lamp_id' => NULL],
            ['block_id' => 65, 'camera_id' => 380, 'slot_number' => '56', 'parking_lamp_id' => NULL],

            ['block_id' => 65, 'camera_id' => 379, 'slot_number' => '57', 'parking_lamp_id' => NULL],
            ['block_id' => 65, 'camera_id' => 379, 'slot_number' => '58', 'parking_lamp_id' => NULL],
            ['block_id' => 65, 'camera_id' => 379, 'slot_number' => '59', 'parking_lamp_id' => NULL],

            ['block_id' => 65, 'camera_id' => 378, 'slot_number' => '60', 'parking_lamp_id' => NULL],
            ['block_id' => 65, 'camera_id' => 378, 'slot_number' => '61', 'parking_lamp_id' => NULL],
            ['block_id' => 65, 'camera_id' => 378, 'slot_number' => '62', 'parking_lamp_id' => NULL],
            ['block_id' => 65, 'camera_id' => 377, 'slot_number' => '63', 'parking_lamp_id' => NULL],

            // Solar1 A2 Block set 19 slot with camera and Lamp.

            ['block_id' => 66, 'camera_id' => 376, 'slot_number' => '64', 'parking_lamp_id' => NULL],
            ['block_id' => 66, 'camera_id' => 375, 'slot_number' => '65', 'parking_lamp_id' => NULL],
            ['block_id' => 66, 'camera_id' => 375, 'slot_number' => '66', 'parking_lamp_id' => NULL],
            ['block_id' => 66, 'camera_id' => 375, 'slot_number' => '67', 'parking_lamp_id' => NULL],

            ['block_id' => 66, 'camera_id' => 374, 'slot_number' => '68', 'parking_lamp_id' => NULL],
            ['block_id' => 66, 'camera_id' => 374, 'slot_number' => '69', 'parking_lamp_id' => NULL],
            ['block_id' => 66, 'camera_id' => 374, 'slot_number' => '70', 'parking_lamp_id' => NULL],

            ['block_id' => 66, 'camera_id' => 373, 'slot_number' => '71', 'parking_lamp_id' => NULL],
            ['block_id' => 66, 'camera_id' => 373, 'slot_number' => '72', 'parking_lamp_id' => NULL],
            ['block_id' => 66, 'camera_id' => 373, 'slot_number' => '73', 'parking_lamp_id' => NULL],

            ['block_id' => 66, 'camera_id' => 372, 'slot_number' => '74', 'parking_lamp_id' => NULL],
            ['block_id' => 66, 'camera_id' => 372, 'slot_number' => '75', 'parking_lamp_id' => NULL],
            ['block_id' => 66, 'camera_id' => 372, 'slot_number' => '76', 'parking_lamp_id' => NULL],

            ['block_id' => 66, 'camera_id' => 371, 'slot_number' => '77', 'parking_lamp_id' => NULL],
            ['block_id' => 66, 'camera_id' => 371, 'slot_number' => '78', 'parking_lamp_id' => NULL],
            ['block_id' => 66, 'camera_id' => 371, 'slot_number' => '79', 'parking_lamp_id' => NULL],

            ['block_id' => 66, 'camera_id' => 370, 'slot_number' => '80', 'parking_lamp_id' => NULL],
            ['block_id' => 66, 'camera_id' => 370, 'slot_number' => '81', 'parking_lamp_id' => NULL],
            ['block_id' => 66, 'camera_id' => 370, 'slot_number' => '82', 'parking_lamp_id' => NULL],

            // Solar1 B1 Block set 19 slot with camera and Lamp.

            ['block_id' => 67, 'camera_id' => 397, 'slot_number' => '45', 'parking_lamp_id' => NULL],
            ['block_id' => 67, 'camera_id' => 397, 'slot_number' => '46', 'parking_lamp_id' => NULL],
            ['block_id' => 67, 'camera_id' => 397, 'slot_number' => '47', 'parking_lamp_id' => NULL],

            ['block_id' => 67, 'camera_id' => 396, 'slot_number' => '48', 'parking_lamp_id' => NULL],
            ['block_id' => 67, 'camera_id' => 396, 'slot_number' => '49', 'parking_lamp_id' => NULL],
            ['block_id' => 67, 'camera_id' => 396, 'slot_number' => '50', 'parking_lamp_id' => NULL],

            ['block_id' => 67, 'camera_id' => 395, 'slot_number' => '51', 'parking_lamp_id' => NULL],
            ['block_id' => 67, 'camera_id' => 395, 'slot_number' => '52', 'parking_lamp_id' => NULL],
            ['block_id' => 67, 'camera_id' => 395, 'slot_number' => '53', 'parking_lamp_id' => NULL],

            ['block_id' => 67, 'camera_id' => 394, 'slot_number' => '54', 'parking_lamp_id' => NULL],
            ['block_id' => 67, 'camera_id' => 394, 'slot_number' => '55', 'parking_lamp_id' => NULL],
            ['block_id' => 67, 'camera_id' => 394, 'slot_number' => '56', 'parking_lamp_id' => NULL],

            ['block_id' => 67, 'camera_id' => 393, 'slot_number' => '57', 'parking_lamp_id' => NULL],
            ['block_id' => 67, 'camera_id' => 393, 'slot_number' => '58', 'parking_lamp_id' => NULL],
            ['block_id' => 67, 'camera_id' => 393, 'slot_number' => '59', 'parking_lamp_id' => NULL],

            ['block_id' => 67, 'camera_id' => 392, 'slot_number' => '60', 'parking_lamp_id' => NULL],
            ['block_id' => 67, 'camera_id' => 392, 'slot_number' => '61', 'parking_lamp_id' => NULL],
            ['block_id' => 67, 'camera_id' => 392, 'slot_number' => '62', 'parking_lamp_id' => NULL],
            ['block_id' => 67, 'camera_id' => 391, 'slot_number' => '63', 'parking_lamp_id' => NULL],

            // Solar1 B2 Block set 19 slot with camera and Lamp.

            ['block_id' => 68, 'camera_id' => 390, 'slot_number' => '64', 'parking_lamp_id' => NULL],
            ['block_id' => 68, 'camera_id' => 389, 'slot_number' => '65', 'parking_lamp_id' => NULL],
            ['block_id' => 68, 'camera_id' => 389, 'slot_number' => '66', 'parking_lamp_id' => NULL],
            ['block_id' => 68, 'camera_id' => 389, 'slot_number' => '67', 'parking_lamp_id' => NULL],

            ['block_id' => 68, 'camera_id' => 388, 'slot_number' => '68', 'parking_lamp_id' => NULL],
            ['block_id' => 68, 'camera_id' => 388, 'slot_number' => '69', 'parking_lamp_id' => NULL],
            ['block_id' => 68, 'camera_id' => 388, 'slot_number' => '70', 'parking_lamp_id' => NULL],

            ['block_id' => 68, 'camera_id' => 387, 'slot_number' => '71', 'parking_lamp_id' => NULL],
            ['block_id' => 68, 'camera_id' => 387, 'slot_number' => '72', 'parking_lamp_id' => NULL],
            ['block_id' => 68, 'camera_id' => 387, 'slot_number' => '73', 'parking_lamp_id' => NULL],

            ['block_id' => 68, 'camera_id' => 386, 'slot_number' => '74', 'parking_lamp_id' => NULL],
            ['block_id' => 68, 'camera_id' => 386, 'slot_number' => '75', 'parking_lamp_id' => NULL],
            ['block_id' => 68, 'camera_id' => 386, 'slot_number' => '76', 'parking_lamp_id' => NULL],

            ['block_id' => 68, 'camera_id' => 385, 'slot_number' => '77', 'parking_lamp_id' => NULL],
            ['block_id' => 68, 'camera_id' => 385, 'slot_number' => '78', 'parking_lamp_id' => NULL],
            ['block_id' => 68, 'camera_id' => 385, 'slot_number' => '79', 'parking_lamp_id' => NULL],
            
            ['block_id' => 68, 'camera_id' => 384, 'slot_number' => '80', 'parking_lamp_id' => NULL],
            ['block_id' => 68, 'camera_id' => 384, 'slot_number' => '81', 'parking_lamp_id' => NULL],
            ['block_id' => 68, 'camera_id' => 384, 'slot_number' => '82', 'parking_lamp_id' => NULL],

            // Solar1 C1 Block set 19 slot with camera and Lamp.

            ['block_id' => 69, 'camera_id' => 411, 'slot_number' => '45', 'parking_lamp_id' => NULL],
            ['block_id' => 69, 'camera_id' => 411, 'slot_number' => '46', 'parking_lamp_id' => NULL],
            ['block_id' => 69, 'camera_id' => 411, 'slot_number' => '47', 'parking_lamp_id' => NULL],

            ['block_id' => 69, 'camera_id' => 410, 'slot_number' => '48', 'parking_lamp_id' => NULL],
            ['block_id' => 69, 'camera_id' => 410, 'slot_number' => '49', 'parking_lamp_id' => NULL],
            ['block_id' => 69, 'camera_id' => 410, 'slot_number' => '50', 'parking_lamp_id' => NULL],

            ['block_id' => 69, 'camera_id' => 409, 'slot_number' => '51', 'parking_lamp_id' => NULL],
            ['block_id' => 69, 'camera_id' => 409, 'slot_number' => '52', 'parking_lamp_id' => NULL],
            ['block_id' => 69, 'camera_id' => 409, 'slot_number' => '53', 'parking_lamp_id' => NULL],

            ['block_id' => 69, 'camera_id' => 408, 'slot_number' => '54', 'parking_lamp_id' => NULL],
            ['block_id' => 69, 'camera_id' => 408, 'slot_number' => '55', 'parking_lamp_id' => NULL],
            ['block_id' => 69, 'camera_id' => 408, 'slot_number' => '56', 'parking_lamp_id' => NULL],

            ['block_id' => 69, 'camera_id' => 407, 'slot_number' => '57', 'parking_lamp_id' => NULL],
            ['block_id' => 69, 'camera_id' => 407, 'slot_number' => '58', 'parking_lamp_id' => NULL],
            ['block_id' => 69, 'camera_id' => 407, 'slot_number' => '59', 'parking_lamp_id' => NULL],

            ['block_id' => 69, 'camera_id' => 406, 'slot_number' => '60', 'parking_lamp_id' => NULL],
            ['block_id' => 69, 'camera_id' => 406, 'slot_number' => '61', 'parking_lamp_id' => NULL],
            ['block_id' => 69, 'camera_id' => 406, 'slot_number' => '62', 'parking_lamp_id' => NULL],
            ['block_id' => 69, 'camera_id' => 405, 'slot_number' => '63', 'parking_lamp_id' => NULL],

            // Solar1 C2 Block set 19 slot with camera and Lamp.

            ['block_id' => 70, 'camera_id' => 404, 'slot_number' => '64', 'parking_lamp_id' => NULL],
            ['block_id' => 70, 'camera_id' => 403, 'slot_number' => '65', 'parking_lamp_id' => NULL],
            ['block_id' => 70, 'camera_id' => 403, 'slot_number' => '66', 'parking_lamp_id' => NULL],
            ['block_id' => 70, 'camera_id' => 403, 'slot_number' => '67', 'parking_lamp_id' => NULL],

            ['block_id' => 70, 'camera_id' => 402, 'slot_number' => '68', 'parking_lamp_id' => NULL],
            ['block_id' => 70, 'camera_id' => 402, 'slot_number' => '69', 'parking_lamp_id' => NULL],
            ['block_id' => 70, 'camera_id' => 402, 'slot_number' => '70', 'parking_lamp_id' => NULL],

            ['block_id' => 70, 'camera_id' => 401, 'slot_number' => '71', 'parking_lamp_id' => NULL],
            ['block_id' => 70, 'camera_id' => 401, 'slot_number' => '72', 'parking_lamp_id' => NULL],
            ['block_id' => 70, 'camera_id' => 401, 'slot_number' => '73', 'parking_lamp_id' => NULL],

            ['block_id' => 70, 'camera_id' => 400, 'slot_number' => '74', 'parking_lamp_id' => NULL],
            ['block_id' => 70, 'camera_id' => 400, 'slot_number' => '75', 'parking_lamp_id' => NULL],
            ['block_id' => 70, 'camera_id' => 400, 'slot_number' => '76', 'parking_lamp_id' => NULL],

            ['block_id' => 70, 'camera_id' => 399, 'slot_number' => '77', 'parking_lamp_id' => NULL],
            ['block_id' => 70, 'camera_id' => 399, 'slot_number' => '78', 'parking_lamp_id' => NULL],
            ['block_id' => 70, 'camera_id' => 399, 'slot_number' => '79', 'parking_lamp_id' => NULL],
            
            ['block_id' => 70, 'camera_id' => 398, 'slot_number' => '80', 'parking_lamp_id' => NULL],
            ['block_id' => 70, 'camera_id' => 398, 'slot_number' => '81', 'parking_lamp_id' => NULL],
            ['block_id' => 70, 'camera_id' => 398, 'slot_number' => '82', 'parking_lamp_id' => NULL],

            // Solar1 D2 Block set 19 slot with camera and Lamp.

            ['block_id' => 72, 'camera_id' => NULL, 'slot_number' => '64', 'parking_lamp_id' => NULL],
            ['block_id' => 72, 'camera_id' => 417, 'slot_number' => '65', 'parking_lamp_id' => NULL],
            ['block_id' => 72, 'camera_id' => 417, 'slot_number' => '66', 'parking_lamp_id' => NULL],
            ['block_id' => 72, 'camera_id' => 417, 'slot_number' => '67', 'parking_lamp_id' => NULL],

            ['block_id' => 72, 'camera_id' => 416, 'slot_number' => '68', 'parking_lamp_id' => NULL],
            ['block_id' => 72, 'camera_id' => 416, 'slot_number' => '69', 'parking_lamp_id' => NULL],
            ['block_id' => 72, 'camera_id' => 416, 'slot_number' => '70', 'parking_lamp_id' => NULL],

            ['block_id' => 72, 'camera_id' => 415, 'slot_number' => '71', 'parking_lamp_id' => NULL],
            ['block_id' => 72, 'camera_id' => 415, 'slot_number' => '72', 'parking_lamp_id' => NULL],
            ['block_id' => 72, 'camera_id' => 415, 'slot_number' => '73', 'parking_lamp_id' => NULL],

            ['block_id' => 72, 'camera_id' => 414, 'slot_number' => '74', 'parking_lamp_id' => NULL],
            ['block_id' => 72, 'camera_id' => 414, 'slot_number' => '75', 'parking_lamp_id' => NULL],
            ['block_id' => 72, 'camera_id' => 414, 'slot_number' => '76', 'parking_lamp_id' => NULL],

            ['block_id' => 72, 'camera_id' => 413, 'slot_number' => '77', 'parking_lamp_id' => NULL],
            ['block_id' => 72, 'camera_id' => 413, 'slot_number' => '78', 'parking_lamp_id' => NULL],
            ['block_id' => 72, 'camera_id' => 413, 'slot_number' => '79', 'parking_lamp_id' => NULL],
            
            ['block_id' => 72, 'camera_id' => 412, 'slot_number' => '80', 'parking_lamp_id' => NULL],
            ['block_id' => 72, 'camera_id' => 412, 'slot_number' => '81', 'parking_lamp_id' => NULL],
            ['block_id' => 72, 'camera_id' => 412, 'slot_number' => '82', 'parking_lamp_id' => NULL],

            // Solar2 A1 Block set 22 slot with camera and Lamp.
            ['block_id' => 73, 'camera_id' => 433, 'slot_number' => '1', 'parking_lamp_id' => NULL],
            ['block_id' => 73, 'camera_id' => 433, 'slot_number' => '2', 'parking_lamp_id' => NULL],
            ['block_id' => 73, 'camera_id' => 433, 'slot_number' => '3', 'parking_lamp_id' => NULL],

            ['block_id' => 73, 'camera_id' => 432, 'slot_number' => '4', 'parking_lamp_id' => NULL],
            ['block_id' => 73, 'camera_id' => 432, 'slot_number' => '5', 'parking_lamp_id' => NULL],
            ['block_id' => 73, 'camera_id' => 432, 'slot_number' => '6', 'parking_lamp_id' => NULL],

            ['block_id' => 73, 'camera_id' => 431, 'slot_number' => '7', 'parking_lamp_id' => NULL],
            ['block_id' => 73, 'camera_id' => 431, 'slot_number' => '8', 'parking_lamp_id' => NULL],
            ['block_id' => 73, 'camera_id' => 431, 'slot_number' => '9', 'parking_lamp_id' => NULL],

            ['block_id' => 73, 'camera_id' => 430, 'slot_number' => '10', 'parking_lamp_id' => NULL],
            ['block_id' => 73, 'camera_id' => 430, 'slot_number' => '11', 'parking_lamp_id' => NULL],
            ['block_id' => 73, 'camera_id' => 430, 'slot_number' => '12', 'parking_lamp_id' => NULL],

            ['block_id' => 73, 'camera_id' => 429, 'slot_number' => '13', 'parking_lamp_id' => NULL],
            ['block_id' => 73, 'camera_id' => 429, 'slot_number' => '14', 'parking_lamp_id' => NULL],
            ['block_id' => 73, 'camera_id' => 429, 'slot_number' => '15', 'parking_lamp_id' => NULL],

            ['block_id' => 73, 'camera_id' => 428, 'slot_number' => '16', 'parking_lamp_id' => NULL],
            ['block_id' => 73, 'camera_id' => 428, 'slot_number' => '17', 'parking_lamp_id' => NULL],
            ['block_id' => 73, 'camera_id' => 428, 'slot_number' => '18', 'parking_lamp_id' => NULL],

            ['block_id' => 73, 'camera_id' => 427, 'slot_number' => '19', 'parking_lamp_id' => NULL],
            ['block_id' => 73, 'camera_id' => 427, 'slot_number' => '20', 'parking_lamp_id' => NULL],
            ['block_id' => 73, 'camera_id' => 427, 'slot_number' => '21', 'parking_lamp_id' => NULL],
            ['block_id' => 73, 'camera_id' => 426, 'slot_number' => '22', 'parking_lamp_id' => NULL],

            // Solar2 A2 Block set 22 slot with camera and Lamp.
            ['block_id' => 74, 'camera_id' => 425, 'slot_number' => '23', 'parking_lamp_id' => NULL],
            ['block_id' => 74, 'camera_id' => 424, 'slot_number' => '24', 'parking_lamp_id' => NULL],
            ['block_id' => 74, 'camera_id' => 424, 'slot_number' => '25', 'parking_lamp_id' => NULL],
            ['block_id' => 74, 'camera_id' => 424, 'slot_number' => '26', 'parking_lamp_id' => NULL],

            ['block_id' => 74, 'camera_id' => 423, 'slot_number' => '27', 'parking_lamp_id' => NULL],
            ['block_id' => 74, 'camera_id' => 423, 'slot_number' => '28', 'parking_lamp_id' => NULL],
            ['block_id' => 74, 'camera_id' => 423, 'slot_number' => '29', 'parking_lamp_id' => NULL],

            ['block_id' => 74, 'camera_id' => 422, 'slot_number' => '30', 'parking_lamp_id' => NULL],
            ['block_id' => 74, 'camera_id' => 422, 'slot_number' => '31', 'parking_lamp_id' => NULL],
            ['block_id' => 74, 'camera_id' => 422, 'slot_number' => '32', 'parking_lamp_id' => NULL],

            ['block_id' => 74, 'camera_id' => 421, 'slot_number' => '33', 'parking_lamp_id' => NULL],
            ['block_id' => 74, 'camera_id' => 421, 'slot_number' => '34', 'parking_lamp_id' => NULL],
            ['block_id' => 74, 'camera_id' => 421, 'slot_number' => '35', 'parking_lamp_id' => NULL],

            ['block_id' => 74, 'camera_id' => 420, 'slot_number' => '36', 'parking_lamp_id' => NULL],
            ['block_id' => 74, 'camera_id' => 420, 'slot_number' => '37', 'parking_lamp_id' => NULL],
            ['block_id' => 74, 'camera_id' => 420, 'slot_number' => '38', 'parking_lamp_id' => NULL],

            ['block_id' => 74, 'camera_id' => 419, 'slot_number' => '39', 'parking_lamp_id' => NULL],
            ['block_id' => 74, 'camera_id' => 419, 'slot_number' => '40', 'parking_lamp_id' => NULL],
            ['block_id' => 74, 'camera_id' => 419, 'slot_number' => '41', 'parking_lamp_id' => NULL],

            ['block_id' => 74, 'camera_id' => 418, 'slot_number' => '42', 'parking_lamp_id' => NULL],
            ['block_id' => 74, 'camera_id' => 418, 'slot_number' => '43', 'parking_lamp_id' => NULL],
            ['block_id' => 74, 'camera_id' => 418, 'slot_number' => '44', 'parking_lamp_id' => NULL],

            // Solar2 B1 Block set 22 slot with camera and Lamp.
            ['block_id' => 75, 'camera_id' => 449, 'slot_number' => '1', 'parking_lamp_id' => NULL],
            ['block_id' => 75, 'camera_id' => 449, 'slot_number' => '2', 'parking_lamp_id' => NULL],
            ['block_id' => 75, 'camera_id' => 449, 'slot_number' => '3', 'parking_lamp_id' => NULL],

            ['block_id' => 75, 'camera_id' => 448, 'slot_number' => '4', 'parking_lamp_id' => NULL],
            ['block_id' => 75, 'camera_id' => 448, 'slot_number' => '5', 'parking_lamp_id' => NULL],
            ['block_id' => 75, 'camera_id' => 448, 'slot_number' => '6', 'parking_lamp_id' => NULL],

            ['block_id' => 75, 'camera_id' => 447, 'slot_number' => '7', 'parking_lamp_id' => NULL],
            ['block_id' => 75, 'camera_id' => 447, 'slot_number' => '8', 'parking_lamp_id' => NULL],
            ['block_id' => 75, 'camera_id' => 447, 'slot_number' => '9', 'parking_lamp_id' => NULL],

            ['block_id' => 75, 'camera_id' => 446, 'slot_number' => '10', 'parking_lamp_id' => NULL],
            ['block_id' => 75, 'camera_id' => 446, 'slot_number' => '11', 'parking_lamp_id' => NULL],
            ['block_id' => 75, 'camera_id' => 446, 'slot_number' => '12', 'parking_lamp_id' => NULL],

            ['block_id' => 75, 'camera_id' => 445, 'slot_number' => '13', 'parking_lamp_id' => NULL],
            ['block_id' => 75, 'camera_id' => 445, 'slot_number' => '14', 'parking_lamp_id' => NULL],
            ['block_id' => 75, 'camera_id' => 445, 'slot_number' => '15', 'parking_lamp_id' => NULL],

            ['block_id' => 75, 'camera_id' => 444, 'slot_number' => '16', 'parking_lamp_id' => NULL],
            ['block_id' => 75, 'camera_id' => 444, 'slot_number' => '17', 'parking_lamp_id' => NULL],
            ['block_id' => 75, 'camera_id' => 444, 'slot_number' => '18', 'parking_lamp_id' => NULL],

            ['block_id' => 75, 'camera_id' => 443, 'slot_number' => '19', 'parking_lamp_id' => NULL],
            ['block_id' => 75, 'camera_id' => 443, 'slot_number' => '20', 'parking_lamp_id' => NULL],
            ['block_id' => 75, 'camera_id' => 443, 'slot_number' => '21', 'parking_lamp_id' => NULL],
            ['block_id' => 75, 'camera_id' => 442, 'slot_number' => '22', 'parking_lamp_id' => NULL],

            // Solar2 B2 Block set 22 slot with camera and Lamp.
            ['block_id' => 76, 'camera_id' => 441, 'slot_number' => '23', 'parking_lamp_id' => NULL],
            ['block_id' => 76, 'camera_id' => 440, 'slot_number' => '24', 'parking_lamp_id' => NULL],
            ['block_id' => 76, 'camera_id' => 440, 'slot_number' => '25', 'parking_lamp_id' => NULL],
            ['block_id' => 76, 'camera_id' => 440, 'slot_number' => '26', 'parking_lamp_id' => NULL],

            ['block_id' => 76, 'camera_id' => 439, 'slot_number' => '27', 'parking_lamp_id' => NULL],
            ['block_id' => 76, 'camera_id' => 439, 'slot_number' => '28', 'parking_lamp_id' => NULL],
            ['block_id' => 76, 'camera_id' => 439, 'slot_number' => '29', 'parking_lamp_id' => NULL],

            ['block_id' => 76, 'camera_id' => 438, 'slot_number' => '30', 'parking_lamp_id' => NULL],
            ['block_id' => 76, 'camera_id' => 438, 'slot_number' => '31', 'parking_lamp_id' => NULL],
            ['block_id' => 76, 'camera_id' => 438, 'slot_number' => '32', 'parking_lamp_id' => NULL],

            ['block_id' => 76, 'camera_id' => 437, 'slot_number' => '33', 'parking_lamp_id' => NULL],
            ['block_id' => 76, 'camera_id' => 437, 'slot_number' => '34', 'parking_lamp_id' => NULL],
            ['block_id' => 76, 'camera_id' => 437, 'slot_number' => '35', 'parking_lamp_id' => NULL],

            ['block_id' => 76, 'camera_id' => 436, 'slot_number' => '36', 'parking_lamp_id' => NULL],
            ['block_id' => 76, 'camera_id' => 436, 'slot_number' => '37', 'parking_lamp_id' => NULL],
            ['block_id' => 76, 'camera_id' => 436, 'slot_number' => '38', 'parking_lamp_id' => NULL],

            ['block_id' => 76, 'camera_id' => 435, 'slot_number' => '39', 'parking_lamp_id' => NULL],
            ['block_id' => 76, 'camera_id' => 435, 'slot_number' => '40', 'parking_lamp_id' => NULL],
            ['block_id' => 76, 'camera_id' => 435, 'slot_number' => '41', 'parking_lamp_id' => NULL],

            ['block_id' => 76, 'camera_id' => 434, 'slot_number' => '42', 'parking_lamp_id' => NULL],
            ['block_id' => 76, 'camera_id' => 434, 'slot_number' => '43', 'parking_lamp_id' => NULL],
            ['block_id' => 76, 'camera_id' => 434, 'slot_number' => '44', 'parking_lamp_id' => NULL],

            // Solar2 C1 Block set 22 slot with camera and Lamp.
            ['block_id' => 77, 'camera_id' => 465, 'slot_number' => '1', 'parking_lamp_id' => NULL],
            ['block_id' => 77, 'camera_id' => 465, 'slot_number' => '2', 'parking_lamp_id' => NULL],
            ['block_id' => 77, 'camera_id' => 465, 'slot_number' => '3', 'parking_lamp_id' => NULL],

            ['block_id' => 77, 'camera_id' => 464, 'slot_number' => '4', 'parking_lamp_id' => NULL],
            ['block_id' => 77, 'camera_id' => 464, 'slot_number' => '5', 'parking_lamp_id' => NULL],
            ['block_id' => 77, 'camera_id' => 464, 'slot_number' => '6', 'parking_lamp_id' => NULL],

            ['block_id' => 77, 'camera_id' => 463, 'slot_number' => '7', 'parking_lamp_id' => NULL],
            ['block_id' => 77, 'camera_id' => 463, 'slot_number' => '8', 'parking_lamp_id' => NULL],
            ['block_id' => 77, 'camera_id' => 463, 'slot_number' => '9', 'parking_lamp_id' => NULL],

            ['block_id' => 77, 'camera_id' => 462, 'slot_number' => '10', 'parking_lamp_id' => NULL],
            ['block_id' => 77, 'camera_id' => 462, 'slot_number' => '11', 'parking_lamp_id' => NULL],
            ['block_id' => 77, 'camera_id' => 462, 'slot_number' => '12', 'parking_lamp_id' => NULL],

            ['block_id' => 77, 'camera_id' => 461, 'slot_number' => '13', 'parking_lamp_id' => NULL],
            ['block_id' => 77, 'camera_id' => 461, 'slot_number' => '14', 'parking_lamp_id' => NULL],
            ['block_id' => 77, 'camera_id' => 461, 'slot_number' => '15', 'parking_lamp_id' => NULL],

            ['block_id' => 77, 'camera_id' => 460, 'slot_number' => '16', 'parking_lamp_id' => NULL],
            ['block_id' => 77, 'camera_id' => 460, 'slot_number' => '17', 'parking_lamp_id' => NULL],
            ['block_id' => 77, 'camera_id' => 460, 'slot_number' => '18', 'parking_lamp_id' => NULL],

            ['block_id' => 77, 'camera_id' => 459, 'slot_number' => '19', 'parking_lamp_id' => NULL],
            ['block_id' => 77, 'camera_id' => 459, 'slot_number' => '20', 'parking_lamp_id' => NULL],
            ['block_id' => 77, 'camera_id' => 459, 'slot_number' => '21', 'parking_lamp_id' => NULL],
            ['block_id' => 77, 'camera_id' => 458, 'slot_number' => '22', 'parking_lamp_id' => NULL],

            // Solar2 C2 Block set 22 slot with camera and Lamp.
            ['block_id' => 78, 'camera_id' => 457, 'slot_number' => '23', 'parking_lamp_id' => NULL],
            ['block_id' => 78, 'camera_id' => 456, 'slot_number' => '24', 'parking_lamp_id' => NULL],
            ['block_id' => 78, 'camera_id' => 456, 'slot_number' => '25', 'parking_lamp_id' => NULL],
            ['block_id' => 78, 'camera_id' => 456, 'slot_number' => '26', 'parking_lamp_id' => NULL],

            ['block_id' => 78, 'camera_id' => 455, 'slot_number' => '27', 'parking_lamp_id' => NULL],
            ['block_id' => 78, 'camera_id' => 455, 'slot_number' => '28', 'parking_lamp_id' => NULL],
            ['block_id' => 78, 'camera_id' => 455, 'slot_number' => '29', 'parking_lamp_id' => NULL],

            ['block_id' => 78, 'camera_id' => 454, 'slot_number' => '30', 'parking_lamp_id' => NULL],
            ['block_id' => 78, 'camera_id' => 454, 'slot_number' => '31', 'parking_lamp_id' => NULL],
            ['block_id' => 78, 'camera_id' => 454, 'slot_number' => '32', 'parking_lamp_id' => NULL],

            ['block_id' => 78, 'camera_id' => 453, 'slot_number' => '33', 'parking_lamp_id' => NULL],
            ['block_id' => 78, 'camera_id' => 453, 'slot_number' => '34', 'parking_lamp_id' => NULL],
            ['block_id' => 78, 'camera_id' => 453, 'slot_number' => '35', 'parking_lamp_id' => NULL],

            ['block_id' => 78, 'camera_id' => 452, 'slot_number' => '36', 'parking_lamp_id' => NULL],
            ['block_id' => 78, 'camera_id' => 452, 'slot_number' => '37', 'parking_lamp_id' => NULL],
            ['block_id' => 78, 'camera_id' => 452, 'slot_number' => '38', 'parking_lamp_id' => NULL],

            ['block_id' => 78, 'camera_id' => 451, 'slot_number' => '39', 'parking_lamp_id' => NULL],
            ['block_id' => 78, 'camera_id' => 451, 'slot_number' => '40', 'parking_lamp_id' => NULL],
            ['block_id' => 78, 'camera_id' => 451, 'slot_number' => '41', 'parking_lamp_id' => NULL],

            ['block_id' => 78, 'camera_id' => 450, 'slot_number' => '42', 'parking_lamp_id' => NULL],
            ['block_id' => 78, 'camera_id' => 450, 'slot_number' => '43', 'parking_lamp_id' => NULL],
            ['block_id' => 78, 'camera_id' => 450, 'slot_number' => '44', 'parking_lamp_id' => NULL],
  
            // Solar2 D1 Block set 22 slot with camera and Lamp.
            ['block_id' => 79, 'camera_id' => 481, 'slot_number' => '1', 'parking_lamp_id' => NULL],
            ['block_id' => 79, 'camera_id' => 481, 'slot_number' => '2', 'parking_lamp_id' => NULL],
            ['block_id' => 79, 'camera_id' => 481, 'slot_number' => '3', 'parking_lamp_id' => NULL],

            ['block_id' => 79, 'camera_id' => 480, 'slot_number' => '4', 'parking_lamp_id' => NULL],
            ['block_id' => 79, 'camera_id' => 480, 'slot_number' => '5', 'parking_lamp_id' => NULL],
            ['block_id' => 79, 'camera_id' => 480, 'slot_number' => '6', 'parking_lamp_id' => NULL],

            ['block_id' => 79, 'camera_id' => 479, 'slot_number' => '7', 'parking_lamp_id' => NULL],
            ['block_id' => 79, 'camera_id' => 479, 'slot_number' => '8', 'parking_lamp_id' => NULL],
            ['block_id' => 79, 'camera_id' => 479, 'slot_number' => '9', 'parking_lamp_id' => NULL],

            ['block_id' => 79, 'camera_id' => 478, 'slot_number' => '10', 'parking_lamp_id' => NULL],
            ['block_id' => 79, 'camera_id' => 478, 'slot_number' => '11', 'parking_lamp_id' => NULL],
            ['block_id' => 79, 'camera_id' => 478, 'slot_number' => '12', 'parking_lamp_id' => NULL],

            ['block_id' => 79, 'camera_id' => 477, 'slot_number' => '13', 'parking_lamp_id' => NULL],
            ['block_id' => 79, 'camera_id' => 477, 'slot_number' => '14', 'parking_lamp_id' => NULL],
            ['block_id' => 79, 'camera_id' => 477, 'slot_number' => '15', 'parking_lamp_id' => NULL],

            ['block_id' => 79, 'camera_id' => 476, 'slot_number' => '16', 'parking_lamp_id' => NULL],
            ['block_id' => 79, 'camera_id' => 476, 'slot_number' => '17', 'parking_lamp_id' => NULL],
            ['block_id' => 79, 'camera_id' => 476, 'slot_number' => '18', 'parking_lamp_id' => NULL],

            ['block_id' => 79, 'camera_id' => 475, 'slot_number' => '19', 'parking_lamp_id' => NULL],
            ['block_id' => 79, 'camera_id' => 475, 'slot_number' => '20', 'parking_lamp_id' => NULL],
            ['block_id' => 79, 'camera_id' => 475, 'slot_number' => '21', 'parking_lamp_id' => NULL],
            ['block_id' => 79, 'camera_id' => 474, 'slot_number' => '22', 'parking_lamp_id' => NULL],

            // Solar2 D2 Block set 22 slot with camera and Lamp.
            ['block_id' => 80, 'camera_id' => 473, 'slot_number' => '23', 'parking_lamp_id' => NULL],
            ['block_id' => 80, 'camera_id' => 472, 'slot_number' => '24', 'parking_lamp_id' => NULL],
            ['block_id' => 80, 'camera_id' => 472, 'slot_number' => '25', 'parking_lamp_id' => NULL],
            ['block_id' => 80, 'camera_id' => 472, 'slot_number' => '26', 'parking_lamp_id' => NULL],

            ['block_id' => 80, 'camera_id' => 471, 'slot_number' => '27', 'parking_lamp_id' => NULL],
            ['block_id' => 80, 'camera_id' => 471, 'slot_number' => '28', 'parking_lamp_id' => NULL],
            ['block_id' => 80, 'camera_id' => 471, 'slot_number' => '29', 'parking_lamp_id' => NULL],

            ['block_id' => 80, 'camera_id' => 470, 'slot_number' => '30', 'parking_lamp_id' => NULL],
            ['block_id' => 80, 'camera_id' => 470, 'slot_number' => '31', 'parking_lamp_id' => NULL],
            ['block_id' => 80, 'camera_id' => 470, 'slot_number' => '32', 'parking_lamp_id' => NULL],

            ['block_id' => 80, 'camera_id' => 469, 'slot_number' => '33', 'parking_lamp_id' => NULL],
            ['block_id' => 80, 'camera_id' => 469, 'slot_number' => '34', 'parking_lamp_id' => NULL],
            ['block_id' => 80, 'camera_id' => 469, 'slot_number' => '35', 'parking_lamp_id' => NULL],

            ['block_id' => 80, 'camera_id' => 468, 'slot_number' => '36', 'parking_lamp_id' => NULL],
            ['block_id' => 80, 'camera_id' => 468, 'slot_number' => '37', 'parking_lamp_id' => NULL],
            ['block_id' => 80, 'camera_id' => 468, 'slot_number' => '38', 'parking_lamp_id' => NULL],

            ['block_id' => 80, 'camera_id' => 467, 'slot_number' => '39', 'parking_lamp_id' => NULL],
            ['block_id' => 80, 'camera_id' => 467, 'slot_number' => '40', 'parking_lamp_id' => NULL],
            ['block_id' => 80, 'camera_id' => 467, 'slot_number' => '41', 'parking_lamp_id' => NULL],

            ['block_id' => 80, 'camera_id' => 466, 'slot_number' => '42', 'parking_lamp_id' => NULL],
            ['block_id' => 80, 'camera_id' => 466, 'slot_number' => '43', 'parking_lamp_id' => NULL],
            ['block_id' => 80, 'camera_id' => 466, 'slot_number' => '44', 'parking_lamp_id' => NULL],

            // Solar2 E1 Block set 22 slot with camera and Lamp.
            ['block_id' => 81, 'camera_id' => 497, 'slot_number' => '1', 'parking_lamp_id' => NULL],
            ['block_id' => 81, 'camera_id' => 497, 'slot_number' => '2', 'parking_lamp_id' => NULL],
            ['block_id' => 81, 'camera_id' => 497, 'slot_number' => '3', 'parking_lamp_id' => NULL],

            ['block_id' => 81, 'camera_id' => 496, 'slot_number' => '4', 'parking_lamp_id' => NULL],
            ['block_id' => 81, 'camera_id' => 496, 'slot_number' => '5', 'parking_lamp_id' => NULL],
            ['block_id' => 81, 'camera_id' => 496, 'slot_number' => '6', 'parking_lamp_id' => NULL],

            ['block_id' => 81, 'camera_id' => 495, 'slot_number' => '7', 'parking_lamp_id' => NULL],
            ['block_id' => 81, 'camera_id' => 495, 'slot_number' => '8', 'parking_lamp_id' => NULL],
            ['block_id' => 81, 'camera_id' => 495, 'slot_number' => '9', 'parking_lamp_id' => NULL],

            ['block_id' => 81, 'camera_id' => 494, 'slot_number' => '10', 'parking_lamp_id' => NULL],
            ['block_id' => 81, 'camera_id' => 494, 'slot_number' => '11', 'parking_lamp_id' => NULL],
            ['block_id' => 81, 'camera_id' => 494, 'slot_number' => '12', 'parking_lamp_id' => NULL],

            ['block_id' => 81, 'camera_id' => 493, 'slot_number' => '13', 'parking_lamp_id' => NULL],
            ['block_id' => 81, 'camera_id' => 493, 'slot_number' => '14', 'parking_lamp_id' => NULL],
            ['block_id' => 81, 'camera_id' => 493, 'slot_number' => '15', 'parking_lamp_id' => NULL],

            ['block_id' => 81, 'camera_id' => 492, 'slot_number' => '16', 'parking_lamp_id' => NULL],
            ['block_id' => 81, 'camera_id' => 492, 'slot_number' => '17', 'parking_lamp_id' => NULL],
            ['block_id' => 81, 'camera_id' => 492, 'slot_number' => '18', 'parking_lamp_id' => NULL],

            ['block_id' => 81, 'camera_id' => 491, 'slot_number' => '19', 'parking_lamp_id' => NULL],
            ['block_id' => 81, 'camera_id' => 491, 'slot_number' => '20', 'parking_lamp_id' => NULL],
            ['block_id' => 81, 'camera_id' => 491, 'slot_number' => '21', 'parking_lamp_id' => NULL],
            ['block_id' => 81, 'camera_id' => 490, 'slot_number' => '22', 'parking_lamp_id' => NULL],

            // Solar2 E2 Block set 22 slot with camera and Lamp.
            ['block_id' => 82, 'camera_id' => 489, 'slot_number' => '23', 'parking_lamp_id' => NULL],
            ['block_id' => 82, 'camera_id' => 488, 'slot_number' => '24', 'parking_lamp_id' => NULL],
            ['block_id' => 82, 'camera_id' => 488, 'slot_number' => '25', 'parking_lamp_id' => NULL],
            ['block_id' => 82, 'camera_id' => 488, 'slot_number' => '26', 'parking_lamp_id' => NULL],

            ['block_id' => 82, 'camera_id' => 487, 'slot_number' => '27', 'parking_lamp_id' => NULL],
            ['block_id' => 82, 'camera_id' => 487, 'slot_number' => '28', 'parking_lamp_id' => NULL],
            ['block_id' => 82, 'camera_id' => 487, 'slot_number' => '29', 'parking_lamp_id' => NULL],

            ['block_id' => 82, 'camera_id' => 486, 'slot_number' => '30', 'parking_lamp_id' => NULL],
            ['block_id' => 82, 'camera_id' => 486, 'slot_number' => '31', 'parking_lamp_id' => NULL],
            ['block_id' => 82, 'camera_id' => 486, 'slot_number' => '32', 'parking_lamp_id' => NULL],

            ['block_id' => 82, 'camera_id' => 485, 'slot_number' => '33', 'parking_lamp_id' => NULL],
            ['block_id' => 82, 'camera_id' => 485, 'slot_number' => '34', 'parking_lamp_id' => NULL],
            ['block_id' => 82, 'camera_id' => 485, 'slot_number' => '35', 'parking_lamp_id' => NULL],

            ['block_id' => 82, 'camera_id' => 484, 'slot_number' => '36', 'parking_lamp_id' => NULL],
            ['block_id' => 82, 'camera_id' => 484, 'slot_number' => '37', 'parking_lamp_id' => NULL],
            ['block_id' => 82, 'camera_id' => 484, 'slot_number' => '38', 'parking_lamp_id' => NULL],

            ['block_id' => 82, 'camera_id' => 483, 'slot_number' => '39', 'parking_lamp_id' => NULL],
            ['block_id' => 82, 'camera_id' => 483, 'slot_number' => '40', 'parking_lamp_id' => NULL],
            ['block_id' => 82, 'camera_id' => 483, 'slot_number' => '41', 'parking_lamp_id' => NULL],

            ['block_id' => 82, 'camera_id' => 482, 'slot_number' => '42', 'parking_lamp_id' => NULL],
            ['block_id' => 82, 'camera_id' => 482, 'slot_number' => '43', 'parking_lamp_id' => NULL],
            ['block_id' => 82, 'camera_id' => 482, 'slot_number' => '44', 'parking_lamp_id' => NULL],

            // Solar2 F1 Block set 22 slot with camera and Lamp.
            ['block_id' => 83, 'camera_id' => 513, 'slot_number' => '1', 'parking_lamp_id' => NULL],
            ['block_id' => 83, 'camera_id' => 513, 'slot_number' => '2', 'parking_lamp_id' => NULL],
            ['block_id' => 83, 'camera_id' => 513, 'slot_number' => '3', 'parking_lamp_id' => NULL],

            ['block_id' => 83, 'camera_id' => 512, 'slot_number' => '4', 'parking_lamp_id' => NULL],
            ['block_id' => 83, 'camera_id' => 512, 'slot_number' => '5', 'parking_lamp_id' => NULL],
            ['block_id' => 83, 'camera_id' => 512, 'slot_number' => '6', 'parking_lamp_id' => NULL],

            ['block_id' => 83, 'camera_id' => 511, 'slot_number' => '7', 'parking_lamp_id' => NULL],
            ['block_id' => 83, 'camera_id' => 511, 'slot_number' => '8', 'parking_lamp_id' => NULL],
            ['block_id' => 83, 'camera_id' => 511, 'slot_number' => '9', 'parking_lamp_id' => NULL],

            ['block_id' => 83, 'camera_id' => 510, 'slot_number' => '10', 'parking_lamp_id' => NULL],
            ['block_id' => 83, 'camera_id' => 510, 'slot_number' => '11', 'parking_lamp_id' => NULL],
            ['block_id' => 83, 'camera_id' => 510, 'slot_number' => '12', 'parking_lamp_id' => NULL],

            ['block_id' => 83, 'camera_id' => 509, 'slot_number' => '13', 'parking_lamp_id' => NULL],
            ['block_id' => 83, 'camera_id' => 509, 'slot_number' => '14', 'parking_lamp_id' => NULL],
            ['block_id' => 83, 'camera_id' => 509, 'slot_number' => '15', 'parking_lamp_id' => NULL],

            ['block_id' => 83, 'camera_id' => 508, 'slot_number' => '16', 'parking_lamp_id' => NULL],
            ['block_id' => 83, 'camera_id' => 508, 'slot_number' => '17', 'parking_lamp_id' => NULL],
            ['block_id' => 83, 'camera_id' => 508, 'slot_number' => '18', 'parking_lamp_id' => NULL],

            ['block_id' => 83, 'camera_id' => 507, 'slot_number' => '19', 'parking_lamp_id' => NULL],
            ['block_id' => 83, 'camera_id' => 507, 'slot_number' => '20', 'parking_lamp_id' => NULL],
            ['block_id' => 83, 'camera_id' => 507, 'slot_number' => '21', 'parking_lamp_id' => NULL],
            ['block_id' => 83, 'camera_id' => 506, 'slot_number' => '22', 'parking_lamp_id' => NULL],

            // Solar2 F2 Block set 22 slot with camera and Lamp.
            ['block_id' => 84, 'camera_id' => 505, 'slot_number' => '23', 'parking_lamp_id' => NULL],
            ['block_id' => 84, 'camera_id' => 504, 'slot_number' => '24', 'parking_lamp_id' => NULL],
            ['block_id' => 84, 'camera_id' => 504, 'slot_number' => '25', 'parking_lamp_id' => NULL],
            ['block_id' => 84, 'camera_id' => 504, 'slot_number' => '26', 'parking_lamp_id' => NULL],

            ['block_id' => 84, 'camera_id' => 503, 'slot_number' => '27', 'parking_lamp_id' => NULL],
            ['block_id' => 84, 'camera_id' => 503, 'slot_number' => '28', 'parking_lamp_id' => NULL],
            ['block_id' => 84, 'camera_id' => 503, 'slot_number' => '29', 'parking_lamp_id' => NULL],

            ['block_id' => 84, 'camera_id' => 502, 'slot_number' => '30', 'parking_lamp_id' => NULL],
            ['block_id' => 84, 'camera_id' => 502, 'slot_number' => '31', 'parking_lamp_id' => NULL],
            ['block_id' => 84, 'camera_id' => 502, 'slot_number' => '32', 'parking_lamp_id' => NULL],

            ['block_id' => 84, 'camera_id' => 501, 'slot_number' => '33', 'parking_lamp_id' => NULL],
            ['block_id' => 84, 'camera_id' => 501, 'slot_number' => '34', 'parking_lamp_id' => NULL],
            ['block_id' => 84, 'camera_id' => 501, 'slot_number' => '35', 'parking_lamp_id' => NULL],

            ['block_id' => 84, 'camera_id' => 500, 'slot_number' => '36', 'parking_lamp_id' => NULL],
            ['block_id' => 84, 'camera_id' => 500, 'slot_number' => '37', 'parking_lamp_id' => NULL],
            ['block_id' => 84, 'camera_id' => 500, 'slot_number' => '38', 'parking_lamp_id' => NULL],

            ['block_id' => 84, 'camera_id' => 499, 'slot_number' => '39', 'parking_lamp_id' => NULL],
            ['block_id' => 84, 'camera_id' => 499, 'slot_number' => '40', 'parking_lamp_id' => NULL],
            ['block_id' => 84, 'camera_id' => 499, 'slot_number' => '41', 'parking_lamp_id' => NULL],

            ['block_id' => 84, 'camera_id' => 498, 'slot_number' => '42', 'parking_lamp_id' => NULL],
            ['block_id' => 84, 'camera_id' => 498, 'slot_number' => '43', 'parking_lamp_id' => NULL],
            ['block_id' => 84, 'camera_id' => 498, 'slot_number' => '44', 'parking_lamp_id' => NULL],
  
            // Solar2 G1 Block set 22 slot with camera and Lamp.
            ['block_id' => 85, 'camera_id' => 529, 'slot_number' => '1', 'parking_lamp_id' => NULL],
            ['block_id' => 85, 'camera_id' => 529, 'slot_number' => '2', 'parking_lamp_id' => NULL],
            ['block_id' => 85, 'camera_id' => 529, 'slot_number' => '3', 'parking_lamp_id' => NULL],

            ['block_id' => 85, 'camera_id' => 528, 'slot_number' => '4', 'parking_lamp_id' => NULL],
            ['block_id' => 85, 'camera_id' => 528, 'slot_number' => '5', 'parking_lamp_id' => NULL],
            ['block_id' => 85, 'camera_id' => 528, 'slot_number' => '6', 'parking_lamp_id' => NULL],

            ['block_id' => 85, 'camera_id' => 527, 'slot_number' => '7', 'parking_lamp_id' => NULL],
            ['block_id' => 85, 'camera_id' => 527, 'slot_number' => '8', 'parking_lamp_id' => NULL],
            ['block_id' => 85, 'camera_id' => 527, 'slot_number' => '9', 'parking_lamp_id' => NULL],

            ['block_id' => 85, 'camera_id' => 526, 'slot_number' => '10', 'parking_lamp_id' => NULL],
            ['block_id' => 85, 'camera_id' => 526, 'slot_number' => '11', 'parking_lamp_id' => NULL],
            ['block_id' => 85, 'camera_id' => 526, 'slot_number' => '12', 'parking_lamp_id' => NULL],

            ['block_id' => 85, 'camera_id' => 525, 'slot_number' => '13', 'parking_lamp_id' => NULL],
            ['block_id' => 85, 'camera_id' => 525, 'slot_number' => '14', 'parking_lamp_id' => NULL],
            ['block_id' => 85, 'camera_id' => 525, 'slot_number' => '15', 'parking_lamp_id' => NULL],

            ['block_id' => 85, 'camera_id' => 524, 'slot_number' => '16', 'parking_lamp_id' => NULL],
            ['block_id' => 85, 'camera_id' => 524, 'slot_number' => '17', 'parking_lamp_id' => NULL],
            ['block_id' => 85, 'camera_id' => 524, 'slot_number' => '18', 'parking_lamp_id' => NULL],

            ['block_id' => 85, 'camera_id' => 523, 'slot_number' => '19', 'parking_lamp_id' => NULL],
            ['block_id' => 85, 'camera_id' => 523, 'slot_number' => '20', 'parking_lamp_id' => NULL],
            ['block_id' => 85, 'camera_id' => 523, 'slot_number' => '21', 'parking_lamp_id' => NULL],
            ['block_id' => 85, 'camera_id' => 522, 'slot_number' => '22', 'parking_lamp_id' => NULL],

            // Solar2 G2 Block set 22 slot with camera and Lamp.
            ['block_id' => 86, 'camera_id' => 521, 'slot_number' => '23', 'parking_lamp_id' => NULL],
            ['block_id' => 86, 'camera_id' => 520, 'slot_number' => '24', 'parking_lamp_id' => NULL],
            ['block_id' => 86, 'camera_id' => 520, 'slot_number' => '25', 'parking_lamp_id' => NULL],
            ['block_id' => 86, 'camera_id' => 520, 'slot_number' => '26', 'parking_lamp_id' => NULL],

            ['block_id' => 86, 'camera_id' => 519, 'slot_number' => '27', 'parking_lamp_id' => NULL],
            ['block_id' => 86, 'camera_id' => 519, 'slot_number' => '28', 'parking_lamp_id' => NULL],
            ['block_id' => 86, 'camera_id' => 519, 'slot_number' => '29', 'parking_lamp_id' => NULL],

            ['block_id' => 86, 'camera_id' => 518, 'slot_number' => '30', 'parking_lamp_id' => NULL],
            ['block_id' => 86, 'camera_id' => 518, 'slot_number' => '31', 'parking_lamp_id' => NULL],
            ['block_id' => 86, 'camera_id' => 518, 'slot_number' => '32', 'parking_lamp_id' => NULL],

            ['block_id' => 86, 'camera_id' => 517, 'slot_number' => '33', 'parking_lamp_id' => NULL],
            ['block_id' => 86, 'camera_id' => 517, 'slot_number' => '34', 'parking_lamp_id' => NULL],
            ['block_id' => 86, 'camera_id' => 517, 'slot_number' => '35', 'parking_lamp_id' => NULL],

            ['block_id' => 86, 'camera_id' => 516, 'slot_number' => '36', 'parking_lamp_id' => NULL],
            ['block_id' => 86, 'camera_id' => 516, 'slot_number' => '37', 'parking_lamp_id' => NULL],
            ['block_id' => 86, 'camera_id' => 516, 'slot_number' => '38', 'parking_lamp_id' => NULL],

            ['block_id' => 86, 'camera_id' => 515, 'slot_number' => '39', 'parking_lamp_id' => NULL],
            ['block_id' => 86, 'camera_id' => 515, 'slot_number' => '40', 'parking_lamp_id' => NULL],
            ['block_id' => 86, 'camera_id' => 515, 'slot_number' => '41', 'parking_lamp_id' => NULL],

            ['block_id' => 86, 'camera_id' => 514, 'slot_number' => '42', 'parking_lamp_id' => NULL],
            ['block_id' => 86, 'camera_id' => 514, 'slot_number' => '43', 'parking_lamp_id' => NULL],
            ['block_id' => 86, 'camera_id' => 514, 'slot_number' => '44', 'parking_lamp_id' => NULL],

            // Solar2 H1 Block set 22 slot with camera and Lamp.
            ['block_id' => 87, 'camera_id' => 545, 'slot_number' => '1', 'parking_lamp_id' => NULL],
            ['block_id' => 87, 'camera_id' => 545, 'slot_number' => '2', 'parking_lamp_id' => NULL],
            ['block_id' => 87, 'camera_id' => 545, 'slot_number' => '3', 'parking_lamp_id' => NULL],

            ['block_id' => 87, 'camera_id' => 544, 'slot_number' => '4', 'parking_lamp_id' => NULL],
            ['block_id' => 87, 'camera_id' => 544, 'slot_number' => '5', 'parking_lamp_id' => NULL],
            ['block_id' => 87, 'camera_id' => 544, 'slot_number' => '6', 'parking_lamp_id' => NULL],

            ['block_id' => 87, 'camera_id' => 543, 'slot_number' => '7', 'parking_lamp_id' => NULL],
            ['block_id' => 87, 'camera_id' => 543, 'slot_number' => '8', 'parking_lamp_id' => NULL],
            ['block_id' => 87, 'camera_id' => 543, 'slot_number' => '9', 'parking_lamp_id' => NULL],

            ['block_id' => 87, 'camera_id' => 542, 'slot_number' => '10', 'parking_lamp_id' => NULL],
            ['block_id' => 87, 'camera_id' => 542, 'slot_number' => '11', 'parking_lamp_id' => NULL],
            ['block_id' => 87, 'camera_id' => 542, 'slot_number' => '12', 'parking_lamp_id' => NULL],

            ['block_id' => 87, 'camera_id' => 541, 'slot_number' => '13', 'parking_lamp_id' => NULL],
            ['block_id' => 87, 'camera_id' => 541, 'slot_number' => '14', 'parking_lamp_id' => NULL],
            ['block_id' => 87, 'camera_id' => 541, 'slot_number' => '15', 'parking_lamp_id' => NULL],

            ['block_id' => 87, 'camera_id' => 540, 'slot_number' => '16', 'parking_lamp_id' => NULL],
            ['block_id' => 87, 'camera_id' => 540, 'slot_number' => '17', 'parking_lamp_id' => NULL],
            ['block_id' => 87, 'camera_id' => 540, 'slot_number' => '18', 'parking_lamp_id' => NULL],

            ['block_id' => 87, 'camera_id' => 539, 'slot_number' => '19', 'parking_lamp_id' => NULL],
            ['block_id' => 87, 'camera_id' => 539, 'slot_number' => '20', 'parking_lamp_id' => NULL],
            ['block_id' => 87, 'camera_id' => 539, 'slot_number' => '21', 'parking_lamp_id' => NULL],
            ['block_id' => 87, 'camera_id' => 538, 'slot_number' => '22', 'parking_lamp_id' => NULL],

            // Solar2 H2 Block set 22 slot with camera and Lamp.
            ['block_id' => 88, 'camera_id' => 537, 'slot_number' => '23', 'parking_lamp_id' => NULL],
            ['block_id' => 88, 'camera_id' => 536, 'slot_number' => '24', 'parking_lamp_id' => NULL],
            ['block_id' => 88, 'camera_id' => 536, 'slot_number' => '25', 'parking_lamp_id' => NULL],
            ['block_id' => 88, 'camera_id' => 536, 'slot_number' => '26', 'parking_lamp_id' => NULL],

            ['block_id' => 88, 'camera_id' => 535, 'slot_number' => '27', 'parking_lamp_id' => NULL],
            ['block_id' => 88, 'camera_id' => 535, 'slot_number' => '28', 'parking_lamp_id' => NULL],
            ['block_id' => 88, 'camera_id' => 535, 'slot_number' => '29', 'parking_lamp_id' => NULL],

            ['block_id' => 88, 'camera_id' => 534, 'slot_number' => '30', 'parking_lamp_id' => NULL],
            ['block_id' => 88, 'camera_id' => 534, 'slot_number' => '31', 'parking_lamp_id' => NULL],
            ['block_id' => 88, 'camera_id' => 534, 'slot_number' => '32', 'parking_lamp_id' => NULL],

            ['block_id' => 88, 'camera_id' => 533, 'slot_number' => '33', 'parking_lamp_id' => NULL],
            ['block_id' => 88, 'camera_id' => 533, 'slot_number' => '34', 'parking_lamp_id' => NULL],
            ['block_id' => 88, 'camera_id' => 533, 'slot_number' => '35', 'parking_lamp_id' => NULL],

            ['block_id' => 88, 'camera_id' => 532, 'slot_number' => '36', 'parking_lamp_id' => NULL],
            ['block_id' => 88, 'camera_id' => 532, 'slot_number' => '37', 'parking_lamp_id' => NULL],
            ['block_id' => 88, 'camera_id' => 532, 'slot_number' => '38', 'parking_lamp_id' => NULL],

            ['block_id' => 88, 'camera_id' => 531, 'slot_number' => '39', 'parking_lamp_id' => NULL],
            ['block_id' => 88, 'camera_id' => 531, 'slot_number' => '40', 'parking_lamp_id' => NULL],
            ['block_id' => 88, 'camera_id' => 531, 'slot_number' => '41', 'parking_lamp_id' => NULL],

            ['block_id' => 88, 'camera_id' => 530, 'slot_number' => '42', 'parking_lamp_id' => NULL],
            ['block_id' => 88, 'camera_id' => 530, 'slot_number' => '43', 'parking_lamp_id' => NULL],
            ['block_id' => 88, 'camera_id' => 530, 'slot_number' => '44', 'parking_lamp_id' => NULL],
            
            // Solar3 and Solar4 Slots List.
            // Solar3-I1 Block set 30 slot with camera and Lamp.

            ['block_id' => 89, 'camera_id' => 565, 'slot_number' => '1', 'parking_lamp_id' => NULL],
            ['block_id' => 89, 'camera_id' => 565, 'slot_number' => '2', 'parking_lamp_id' => NULL],
            ['block_id' => 89, 'camera_id' => 565, 'slot_number' => '3', 'parking_lamp_id' => NULL],

            ['block_id' => 89, 'camera_id' => 564, 'slot_number' => '4', 'parking_lamp_id' => NULL],
            ['block_id' => 89, 'camera_id' => 564, 'slot_number' => '5', 'parking_lamp_id' => NULL],
            ['block_id' => 89, 'camera_id' => 564, 'slot_number' => '6', 'parking_lamp_id' => NULL],

            ['block_id' => 89, 'camera_id' => 563, 'slot_number' => '7', 'parking_lamp_id' => NULL],
            ['block_id' => 89, 'camera_id' => 563, 'slot_number' => '8', 'parking_lamp_id' => NULL],
            ['block_id' => 89, 'camera_id' => 563, 'slot_number' => '9', 'parking_lamp_id' => NULL],

            ['block_id' => 89, 'camera_id' => 562, 'slot_number' => '10', 'parking_lamp_id' => NULL],
            ['block_id' => 89, 'camera_id' => 562, 'slot_number' => '11', 'parking_lamp_id' => NULL],
            ['block_id' => 89, 'camera_id' => 562, 'slot_number' => '12', 'parking_lamp_id' => NULL],

            ['block_id' => 89, 'camera_id' => 561, 'slot_number' => '13', 'parking_lamp_id' => NULL],
            ['block_id' => 89, 'camera_id' => 561, 'slot_number' => '14', 'parking_lamp_id' => NULL],
            ['block_id' => 89, 'camera_id' => 561, 'slot_number' => '15', 'parking_lamp_id' => NULL],

            ['block_id' => 89, 'camera_id' => 560, 'slot_number' => '16', 'parking_lamp_id' => NULL],
            ['block_id' => 89, 'camera_id' => 560, 'slot_number' => '17', 'parking_lamp_id' => NULL],
            ['block_id' => 89, 'camera_id' => 560, 'slot_number' => '18', 'parking_lamp_id' => NULL],

            ['block_id' => 89, 'camera_id' => 559, 'slot_number' => '19', 'parking_lamp_id' => NULL],
            ['block_id' => 89, 'camera_id' => 559, 'slot_number' => '20', 'parking_lamp_id' => NULL],
            ['block_id' => 89, 'camera_id' => 559, 'slot_number' => '21', 'parking_lamp_id' => NULL],

            ['block_id' => 89, 'camera_id' => 558, 'slot_number' => '22', 'parking_lamp_id' => NULL],
            ['block_id' => 89, 'camera_id' => 558, 'slot_number' => '23', 'parking_lamp_id' => NULL],
            ['block_id' => 89, 'camera_id' => 558, 'slot_number' => '24', 'parking_lamp_id' => NULL],

            ['block_id' => 89, 'camera_id' => 557, 'slot_number' => '25', 'parking_lamp_id' => NULL],
            ['block_id' => 89, 'camera_id' => 557, 'slot_number' => '26', 'parking_lamp_id' => NULL],
            ['block_id' => 89, 'camera_id' => 557, 'slot_number' => '27', 'parking_lamp_id' => NULL],

            ['block_id' => 89, 'camera_id' => 556, 'slot_number' => '28', 'parking_lamp_id' => NULL],
            ['block_id' => 89, 'camera_id' => 556, 'slot_number' => '29', 'parking_lamp_id' => NULL],
            ['block_id' => 89, 'camera_id' => 556, 'slot_number' => '30', 'parking_lamp_id' => NULL],

            // Solar3-I2 Block set 30 slot with camera and Lamp.

            ['block_id' => 90, 'camera_id' => 555, 'slot_number' => '31', 'parking_lamp_id' => NULL],
            ['block_id' => 90, 'camera_id' => 555, 'slot_number' => '32', 'parking_lamp_id' => NULL],
            ['block_id' => 90, 'camera_id' => 555, 'slot_number' => '33', 'parking_lamp_id' => NULL],

            ['block_id' => 90, 'camera_id' => 554, 'slot_number' => '34', 'parking_lamp_id' => NULL],
            ['block_id' => 90, 'camera_id' => 554, 'slot_number' => '35', 'parking_lamp_id' => NULL],
            ['block_id' => 90, 'camera_id' => 554, 'slot_number' => '36', 'parking_lamp_id' => NULL],

            ['block_id' => 90, 'camera_id' => 553, 'slot_number' => '37', 'parking_lamp_id' => NULL],
            ['block_id' => 90, 'camera_id' => 553, 'slot_number' => '38', 'parking_lamp_id' => NULL],
            ['block_id' => 90, 'camera_id' => 553, 'slot_number' => '39', 'parking_lamp_id' => NULL],

            ['block_id' => 90, 'camera_id' => 552, 'slot_number' => '40', 'parking_lamp_id' => NULL],
            ['block_id' => 90, 'camera_id' => 552, 'slot_number' => '41', 'parking_lamp_id' => NULL],
            ['block_id' => 90, 'camera_id' => 552, 'slot_number' => '42', 'parking_lamp_id' => NULL],

            ['block_id' => 90, 'camera_id' => 551, 'slot_number' => '43', 'parking_lamp_id' => NULL],
            ['block_id' => 90, 'camera_id' => 551, 'slot_number' => '44', 'parking_lamp_id' => NULL],
            ['block_id' => 90, 'camera_id' => 551, 'slot_number' => '45', 'parking_lamp_id' => NULL],

            ['block_id' => 90, 'camera_id' => 550, 'slot_number' => '46', 'parking_lamp_id' => NULL],
            ['block_id' => 90, 'camera_id' => 550, 'slot_number' => '47', 'parking_lamp_id' => NULL],
            ['block_id' => 90, 'camera_id' => 550, 'slot_number' => '48', 'parking_lamp_id' => NULL],

            ['block_id' => 90, 'camera_id' => 549, 'slot_number' => '49', 'parking_lamp_id' => NULL],
            ['block_id' => 90, 'camera_id' => 549, 'slot_number' => '50', 'parking_lamp_id' => NULL],
            ['block_id' => 90, 'camera_id' => 549, 'slot_number' => '51', 'parking_lamp_id' => NULL],

            ['block_id' => 90, 'camera_id' => 548, 'slot_number' => '52', 'parking_lamp_id' => NULL],
            ['block_id' => 90, 'camera_id' => 548, 'slot_number' => '53', 'parking_lamp_id' => NULL],
            ['block_id' => 90, 'camera_id' => 548, 'slot_number' => '54', 'parking_lamp_id' => NULL],

            ['block_id' => 90, 'camera_id' => 547, 'slot_number' => '55', 'parking_lamp_id' => NULL],
            ['block_id' => 90, 'camera_id' => 547, 'slot_number' => '56', 'parking_lamp_id' => NULL],
            ['block_id' => 90, 'camera_id' => 547, 'slot_number' => '57', 'parking_lamp_id' => NULL],

            ['block_id' => 90, 'camera_id' => 546, 'slot_number' => '58', 'parking_lamp_id' => NULL],
            ['block_id' => 90, 'camera_id' => 546, 'slot_number' => '59', 'parking_lamp_id' => NULL],
            ['block_id' => 90, 'camera_id' => 546, 'slot_number' => '60', 'parking_lamp_id' => NULL],

            // Solar4-I3 Block set 31 slot with camera and Lamp.

            ['block_id' => 91, 'camera_id' => 587, 'slot_number' => '61', 'parking_lamp_id' => NULL],
            ['block_id' => 91, 'camera_id' => 587, 'slot_number' => '62', 'parking_lamp_id' => NULL],
            ['block_id' => 91, 'camera_id' => 587, 'slot_number' => '63', 'parking_lamp_id' => NULL],

            ['block_id' => 91, 'camera_id' => 586, 'slot_number' => '64', 'parking_lamp_id' => NULL],
            ['block_id' => 91, 'camera_id' => 586, 'slot_number' => '65', 'parking_lamp_id' => NULL],
            ['block_id' => 91, 'camera_id' => 586, 'slot_number' => '66', 'parking_lamp_id' => NULL],

            ['block_id' => 91, 'camera_id' => 585, 'slot_number' => '67', 'parking_lamp_id' => NULL],
            ['block_id' => 91, 'camera_id' => 585, 'slot_number' => '68', 'parking_lamp_id' => NULL],
            ['block_id' => 91, 'camera_id' => 585, 'slot_number' => '69', 'parking_lamp_id' => NULL],

            ['block_id' => 91, 'camera_id' => 584, 'slot_number' => '70', 'parking_lamp_id' => NULL],
            ['block_id' => 91, 'camera_id' => 584, 'slot_number' => '71', 'parking_lamp_id' => NULL],
            ['block_id' => 91, 'camera_id' => 584, 'slot_number' => '72', 'parking_lamp_id' => NULL],

            ['block_id' => 91, 'camera_id' => 583, 'slot_number' => '73', 'parking_lamp_id' => NULL],
            ['block_id' => 91, 'camera_id' => 583, 'slot_number' => '74', 'parking_lamp_id' => NULL],
            ['block_id' => 91, 'camera_id' => 583, 'slot_number' => '75', 'parking_lamp_id' => NULL],

            ['block_id' => 91, 'camera_id' => 582, 'slot_number' => '76', 'parking_lamp_id' => NULL],
            ['block_id' => 91, 'camera_id' => 582, 'slot_number' => '77', 'parking_lamp_id' => NULL],
            ['block_id' => 91, 'camera_id' => 582, 'slot_number' => '78', 'parking_lamp_id' => NULL],

            ['block_id' => 91, 'camera_id' => 581, 'slot_number' => '79', 'parking_lamp_id' => NULL],
            ['block_id' => 91, 'camera_id' => 581, 'slot_number' => '80', 'parking_lamp_id' => NULL],
            ['block_id' => 91, 'camera_id' => 581, 'slot_number' => '81', 'parking_lamp_id' => NULL],

            ['block_id' => 91, 'camera_id' => 580, 'slot_number' => '82', 'parking_lamp_id' => NULL],
            ['block_id' => 91, 'camera_id' => 580, 'slot_number' => '83', 'parking_lamp_id' => NULL],
            ['block_id' => 91, 'camera_id' => 580, 'slot_number' => '84', 'parking_lamp_id' => NULL],

            ['block_id' => 91, 'camera_id' => 579, 'slot_number' => '85', 'parking_lamp_id' => NULL],
            ['block_id' => 91, 'camera_id' => 579, 'slot_number' => '86', 'parking_lamp_id' => NULL],
            ['block_id' => 91, 'camera_id' => 579, 'slot_number' => '87', 'parking_lamp_id' => NULL],

            ['block_id' => 91, 'camera_id' => 578, 'slot_number' => '88', 'parking_lamp_id' => NULL],
            ['block_id' => 91, 'camera_id' => 578, 'slot_number' => '89', 'parking_lamp_id' => NULL],
            ['block_id' => 91, 'camera_id' => 578, 'slot_number' => '90', 'parking_lamp_id' => NULL],
            ['block_id' => 91, 'camera_id' => 577, 'slot_number' => '91', 'parking_lamp_id' => NULL],

            // Solar4-I4 Block set 31 slot with camera and Lamp.

            ['block_id' => 92, 'camera_id' => 576, 'slot_number' => '92', 'parking_lamp_id' => NULL],
            ['block_id' => 92, 'camera_id' => 575, 'slot_number' => '93', 'parking_lamp_id' => NULL],
            ['block_id' => 92, 'camera_id' => 575, 'slot_number' => '94', 'parking_lamp_id' => NULL],
            ['block_id' => 92, 'camera_id' => 575, 'slot_number' => '95', 'parking_lamp_id' => NULL],

            ['block_id' => 92, 'camera_id' => 574, 'slot_number' => '96', 'parking_lamp_id' => NULL],
            ['block_id' => 92, 'camera_id' => 574, 'slot_number' => '97', 'parking_lamp_id' => NULL],
            ['block_id' => 92, 'camera_id' => 574, 'slot_number' => '98', 'parking_lamp_id' => NULL],

            ['block_id' => 92, 'camera_id' => 573, 'slot_number' => '99', 'parking_lamp_id' => NULL],
            ['block_id' => 92, 'camera_id' => 573, 'slot_number' => '100', 'parking_lamp_id' => NULL],
            ['block_id' => 92, 'camera_id' => 573, 'slot_number' => '101', 'parking_lamp_id' => NULL],

            ['block_id' => 92, 'camera_id' => 572, 'slot_number' => '102', 'parking_lamp_id' => NULL],
            ['block_id' => 92, 'camera_id' => 572, 'slot_number' => '103', 'parking_lamp_id' => NULL],
            ['block_id' => 92, 'camera_id' => 572, 'slot_number' => '104', 'parking_lamp_id' => NULL],

            ['block_id' => 92, 'camera_id' => 571, 'slot_number' => '105', 'parking_lamp_id' => NULL],
            ['block_id' => 92, 'camera_id' => 571, 'slot_number' => '106', 'parking_lamp_id' => NULL],
            ['block_id' => 92, 'camera_id' => 571, 'slot_number' => '107', 'parking_lamp_id' => NULL],

            ['block_id' => 92, 'camera_id' => 570, 'slot_number' => '108', 'parking_lamp_id' => NULL],
            ['block_id' => 92, 'camera_id' => 570, 'slot_number' => '109', 'parking_lamp_id' => NULL],
            ['block_id' => 92, 'camera_id' => 570, 'slot_number' => '110', 'parking_lamp_id' => NULL],

            ['block_id' => 92, 'camera_id' => 569, 'slot_number' => '111', 'parking_lamp_id' => NULL],
            ['block_id' => 92, 'camera_id' => 569, 'slot_number' => '112', 'parking_lamp_id' => NULL],
            ['block_id' => 92, 'camera_id' => 569, 'slot_number' => '113', 'parking_lamp_id' => NULL],

            ['block_id' => 92, 'camera_id' => 568, 'slot_number' => '114', 'parking_lamp_id' => NULL],
            ['block_id' => 92, 'camera_id' => 568, 'slot_number' => '115', 'parking_lamp_id' => NULL],
            ['block_id' => 92, 'camera_id' => 568, 'slot_number' => '116', 'parking_lamp_id' => NULL],

            ['block_id' => 92, 'camera_id' => 567, 'slot_number' => '117', 'parking_lamp_id' => NULL],
            ['block_id' => 92, 'camera_id' => 567, 'slot_number' => '118', 'parking_lamp_id' => NULL],
            ['block_id' => 92, 'camera_id' => 567, 'slot_number' => '119', 'parking_lamp_id' => NULL],

            ['block_id' => 92, 'camera_id' => 566, 'slot_number' => '120', 'parking_lamp_id' => NULL],
            ['block_id' => 92, 'camera_id' => 566, 'slot_number' => '121', 'parking_lamp_id' => NULL],
            ['block_id' => 92, 'camera_id' => 566, 'slot_number' => '122', 'parking_lamp_id' => NULL],

            // Solar3-J1 Block set 30 slot with camera and Lamp.

            ['block_id' => 93, 'camera_id' => 607, 'slot_number' => '1', 'parking_lamp_id' => NULL],
            ['block_id' => 93, 'camera_id' => 607, 'slot_number' => '2', 'parking_lamp_id' => NULL],
            ['block_id' => 93, 'camera_id' => 607, 'slot_number' => '3', 'parking_lamp_id' => NULL],

            ['block_id' => 93, 'camera_id' => 606, 'slot_number' => '4', 'parking_lamp_id' => NULL],
            ['block_id' => 93, 'camera_id' => 606, 'slot_number' => '5', 'parking_lamp_id' => NULL],
            ['block_id' => 93, 'camera_id' => 606, 'slot_number' => '6', 'parking_lamp_id' => NULL],

            ['block_id' => 93, 'camera_id' => 605, 'slot_number' => '7', 'parking_lamp_id' => NULL],
            ['block_id' => 93, 'camera_id' => 605, 'slot_number' => '8', 'parking_lamp_id' => NULL],
            ['block_id' => 93, 'camera_id' => 605, 'slot_number' => '9', 'parking_lamp_id' => NULL],

            ['block_id' => 93, 'camera_id' => 604, 'slot_number' => '10', 'parking_lamp_id' => NULL],
            ['block_id' => 93, 'camera_id' => 604, 'slot_number' => '11', 'parking_lamp_id' => NULL],
            ['block_id' => 93, 'camera_id' => 604, 'slot_number' => '12', 'parking_lamp_id' => NULL],

            ['block_id' => 93, 'camera_id' => 603, 'slot_number' => '13', 'parking_lamp_id' => NULL],
            ['block_id' => 93, 'camera_id' => 603, 'slot_number' => '14', 'parking_lamp_id' => NULL],
            ['block_id' => 93, 'camera_id' => 603, 'slot_number' => '15', 'parking_lamp_id' => NULL],

            ['block_id' => 93, 'camera_id' => 602, 'slot_number' => '16', 'parking_lamp_id' => NULL],
            ['block_id' => 93, 'camera_id' => 602, 'slot_number' => '17', 'parking_lamp_id' => NULL],
            ['block_id' => 93, 'camera_id' => 602, 'slot_number' => '18', 'parking_lamp_id' => NULL],

            ['block_id' => 93, 'camera_id' => 601, 'slot_number' => '19', 'parking_lamp_id' => NULL],
            ['block_id' => 93, 'camera_id' => 601, 'slot_number' => '20', 'parking_lamp_id' => NULL],
            ['block_id' => 93, 'camera_id' => 601, 'slot_number' => '21', 'parking_lamp_id' => NULL],

            ['block_id' => 93, 'camera_id' => 600, 'slot_number' => '22', 'parking_lamp_id' => NULL],
            ['block_id' => 93, 'camera_id' => 600, 'slot_number' => '23', 'parking_lamp_id' => NULL],
            ['block_id' => 93, 'camera_id' => 600, 'slot_number' => '24', 'parking_lamp_id' => NULL],

            ['block_id' => 93, 'camera_id' => 599, 'slot_number' => '25', 'parking_lamp_id' => NULL],
            ['block_id' => 93, 'camera_id' => 599, 'slot_number' => '26', 'parking_lamp_id' => NULL],
            ['block_id' => 93, 'camera_id' => 599, 'slot_number' => '27', 'parking_lamp_id' => NULL],

            ['block_id' => 93, 'camera_id' => 598, 'slot_number' => '28', 'parking_lamp_id' => NULL],
            ['block_id' => 93, 'camera_id' => 598, 'slot_number' => '29', 'parking_lamp_id' => NULL],
            ['block_id' => 93, 'camera_id' => 598, 'slot_number' => '30', 'parking_lamp_id' => NULL],

            // Solar3-J2 Block set 30 slot with camera and Lamp.

            ['block_id' => 94, 'camera_id' => 597, 'slot_number' => '31', 'parking_lamp_id' => NULL],
            ['block_id' => 94, 'camera_id' => 597, 'slot_number' => '32', 'parking_lamp_id' => NULL],
            ['block_id' => 94, 'camera_id' => 597, 'slot_number' => '33', 'parking_lamp_id' => NULL],

            ['block_id' => 94, 'camera_id' => 596, 'slot_number' => '34', 'parking_lamp_id' => NULL],
            ['block_id' => 94, 'camera_id' => 596, 'slot_number' => '35', 'parking_lamp_id' => NULL],
            ['block_id' => 94, 'camera_id' => 596, 'slot_number' => '36', 'parking_lamp_id' => NULL],

            ['block_id' => 94, 'camera_id' => 595, 'slot_number' => '37', 'parking_lamp_id' => NULL],
            ['block_id' => 94, 'camera_id' => 595, 'slot_number' => '38', 'parking_lamp_id' => NULL],
            ['block_id' => 94, 'camera_id' => 595, 'slot_number' => '39', 'parking_lamp_id' => NULL],

            ['block_id' => 94, 'camera_id' => 594, 'slot_number' => '40', 'parking_lamp_id' => NULL],
            ['block_id' => 94, 'camera_id' => 594, 'slot_number' => '41', 'parking_lamp_id' => NULL],
            ['block_id' => 94, 'camera_id' => 594, 'slot_number' => '42', 'parking_lamp_id' => NULL],

            ['block_id' => 94, 'camera_id' => 593, 'slot_number' => '43', 'parking_lamp_id' => NULL],
            ['block_id' => 94, 'camera_id' => 593, 'slot_number' => '44', 'parking_lamp_id' => NULL],
            ['block_id' => 94, 'camera_id' => 593, 'slot_number' => '45', 'parking_lamp_id' => NULL],

            ['block_id' => 94, 'camera_id' => 592, 'slot_number' => '46', 'parking_lamp_id' => NULL],
            ['block_id' => 94, 'camera_id' => 592, 'slot_number' => '47', 'parking_lamp_id' => NULL],
            ['block_id' => 94, 'camera_id' => 592, 'slot_number' => '48', 'parking_lamp_id' => NULL],

            ['block_id' => 94, 'camera_id' => 591, 'slot_number' => '49', 'parking_lamp_id' => NULL],
            ['block_id' => 94, 'camera_id' => 591, 'slot_number' => '50', 'parking_lamp_id' => NULL],
            ['block_id' => 94, 'camera_id' => 591, 'slot_number' => '51', 'parking_lamp_id' => NULL],

            ['block_id' => 94, 'camera_id' => 590, 'slot_number' => '52', 'parking_lamp_id' => NULL],
            ['block_id' => 94, 'camera_id' => 590, 'slot_number' => '53', 'parking_lamp_id' => NULL],
            ['block_id' => 94, 'camera_id' => 590, 'slot_number' => '54', 'parking_lamp_id' => NULL],

            ['block_id' => 94, 'camera_id' => 589, 'slot_number' => '55', 'parking_lamp_id' => NULL],
            ['block_id' => 94, 'camera_id' => 589, 'slot_number' => '56', 'parking_lamp_id' => NULL],
            ['block_id' => 94, 'camera_id' => 589, 'slot_number' => '57', 'parking_lamp_id' => NULL],

            ['block_id' => 94, 'camera_id' => 588, 'slot_number' => '58', 'parking_lamp_id' => NULL],
            ['block_id' => 94, 'camera_id' => 588, 'slot_number' => '59', 'parking_lamp_id' => NULL],
            ['block_id' => 94, 'camera_id' => 588, 'slot_number' => '60', 'parking_lamp_id' => NULL],

            // Solar4-J3 Block set 31 slot with camera and Lamp.

            ['block_id' => 95, 'camera_id' => 629, 'slot_number' => '61', 'parking_lamp_id' => NULL],
            ['block_id' => 95, 'camera_id' => 629, 'slot_number' => '62', 'parking_lamp_id' => NULL],
            ['block_id' => 95, 'camera_id' => 629, 'slot_number' => '63', 'parking_lamp_id' => NULL],

            ['block_id' => 95, 'camera_id' => 628, 'slot_number' => '64', 'parking_lamp_id' => NULL],
            ['block_id' => 95, 'camera_id' => 628, 'slot_number' => '65', 'parking_lamp_id' => NULL],
            ['block_id' => 95, 'camera_id' => 628, 'slot_number' => '66', 'parking_lamp_id' => NULL],

            ['block_id' => 95, 'camera_id' => 627, 'slot_number' => '67', 'parking_lamp_id' => NULL],
            ['block_id' => 95, 'camera_id' => 627, 'slot_number' => '68', 'parking_lamp_id' => NULL],
            ['block_id' => 95, 'camera_id' => 627, 'slot_number' => '69', 'parking_lamp_id' => NULL],

            ['block_id' => 95, 'camera_id' => 626, 'slot_number' => '70', 'parking_lamp_id' => NULL],
            ['block_id' => 95, 'camera_id' => 626, 'slot_number' => '71', 'parking_lamp_id' => NULL],
            ['block_id' => 95, 'camera_id' => 626, 'slot_number' => '72', 'parking_lamp_id' => NULL],

            ['block_id' => 95, 'camera_id' => 625, 'slot_number' => '73', 'parking_lamp_id' => NULL],
            ['block_id' => 95, 'camera_id' => 625, 'slot_number' => '74', 'parking_lamp_id' => NULL],
            ['block_id' => 95, 'camera_id' => 625, 'slot_number' => '75', 'parking_lamp_id' => NULL],

            ['block_id' => 95, 'camera_id' => 624, 'slot_number' => '76', 'parking_lamp_id' => NULL],
            ['block_id' => 95, 'camera_id' => 624, 'slot_number' => '77', 'parking_lamp_id' => NULL],
            ['block_id' => 95, 'camera_id' => 624, 'slot_number' => '78', 'parking_lamp_id' => NULL],

            ['block_id' => 95, 'camera_id' => 623, 'slot_number' => '79', 'parking_lamp_id' => NULL],
            ['block_id' => 95, 'camera_id' => 623, 'slot_number' => '80', 'parking_lamp_id' => NULL],
            ['block_id' => 95, 'camera_id' => 623, 'slot_number' => '81', 'parking_lamp_id' => NULL],

            ['block_id' => 95, 'camera_id' => 622, 'slot_number' => '82', 'parking_lamp_id' => NULL],
            ['block_id' => 95, 'camera_id' => 622, 'slot_number' => '83', 'parking_lamp_id' => NULL],
            ['block_id' => 95, 'camera_id' => 622, 'slot_number' => '84', 'parking_lamp_id' => NULL],

            ['block_id' => 95, 'camera_id' => 621, 'slot_number' => '85', 'parking_lamp_id' => NULL],
            ['block_id' => 95, 'camera_id' => 621, 'slot_number' => '86', 'parking_lamp_id' => NULL],
            ['block_id' => 95, 'camera_id' => 621, 'slot_number' => '87', 'parking_lamp_id' => NULL],

            ['block_id' => 95, 'camera_id' => 620, 'slot_number' => '88', 'parking_lamp_id' => NULL],
            ['block_id' => 95, 'camera_id' => 620, 'slot_number' => '89', 'parking_lamp_id' => NULL],
            ['block_id' => 95, 'camera_id' => 620, 'slot_number' => '90', 'parking_lamp_id' => NULL],
            ['block_id' => 95, 'camera_id' => 619, 'slot_number' => '91', 'parking_lamp_id' => NULL],

            // Solar4-J4 Block set 31 slot with camera and Lamp.

            ['block_id' => 96, 'camera_id' => 618, 'slot_number' => '92', 'parking_lamp_id' => NULL],
            ['block_id' => 96, 'camera_id' => 617, 'slot_number' => '93', 'parking_lamp_id' => NULL],
            ['block_id' => 96, 'camera_id' => 617, 'slot_number' => '94', 'parking_lamp_id' => NULL],
            ['block_id' => 96, 'camera_id' => 617, 'slot_number' => '95', 'parking_lamp_id' => NULL],

            ['block_id' => 96, 'camera_id' => 616, 'slot_number' => '96', 'parking_lamp_id' => NULL],
            ['block_id' => 96, 'camera_id' => 616, 'slot_number' => '97', 'parking_lamp_id' => NULL],
            ['block_id' => 96, 'camera_id' => 616, 'slot_number' => '98', 'parking_lamp_id' => NULL],

            ['block_id' => 96, 'camera_id' => 615, 'slot_number' => '99', 'parking_lamp_id' => NULL],
            ['block_id' => 96, 'camera_id' => 615, 'slot_number' => '100', 'parking_lamp_id' => NULL],
            ['block_id' => 96, 'camera_id' => 615, 'slot_number' => '101', 'parking_lamp_id' => NULL],

            ['block_id' => 96, 'camera_id' => 614, 'slot_number' => '102', 'parking_lamp_id' => NULL],
            ['block_id' => 96, 'camera_id' => 614, 'slot_number' => '103', 'parking_lamp_id' => NULL],
            ['block_id' => 96, 'camera_id' => 614, 'slot_number' => '104', 'parking_lamp_id' => NULL],

            ['block_id' => 96, 'camera_id' => 613, 'slot_number' => '105', 'parking_lamp_id' => NULL],
            ['block_id' => 96, 'camera_id' => 613, 'slot_number' => '106', 'parking_lamp_id' => NULL],
            ['block_id' => 96, 'camera_id' => 613, 'slot_number' => '107', 'parking_lamp_id' => NULL],

            ['block_id' => 96, 'camera_id' => 612, 'slot_number' => '108', 'parking_lamp_id' => NULL],
            ['block_id' => 96, 'camera_id' => 612, 'slot_number' => '109', 'parking_lamp_id' => NULL],
            ['block_id' => 96, 'camera_id' => 612, 'slot_number' => '110', 'parking_lamp_id' => NULL],

            ['block_id' => 96, 'camera_id' => 611, 'slot_number' => '111', 'parking_lamp_id' => NULL],
            ['block_id' => 96, 'camera_id' => 611, 'slot_number' => '112', 'parking_lamp_id' => NULL],
            ['block_id' => 96, 'camera_id' => 611, 'slot_number' => '113', 'parking_lamp_id' => NULL],

            ['block_id' => 96, 'camera_id' => 610, 'slot_number' => '114', 'parking_lamp_id' => NULL],
            ['block_id' => 96, 'camera_id' => 610, 'slot_number' => '115', 'parking_lamp_id' => NULL],
            ['block_id' => 96, 'camera_id' => 610, 'slot_number' => '116', 'parking_lamp_id' => NULL],

            ['block_id' => 96, 'camera_id' => 609, 'slot_number' => '117', 'parking_lamp_id' => NULL],
            ['block_id' => 96, 'camera_id' => 609, 'slot_number' => '118', 'parking_lamp_id' => NULL],
            ['block_id' => 96, 'camera_id' => 609, 'slot_number' => '119', 'parking_lamp_id' => NULL],

            ['block_id' => 96, 'camera_id' => 608, 'slot_number' => '120', 'parking_lamp_id' => NULL],
            ['block_id' => 96, 'camera_id' => 608, 'slot_number' => '121', 'parking_lamp_id' => NULL],
            ['block_id' => 96, 'camera_id' => 608, 'slot_number' => '122', 'parking_lamp_id' => NULL],

            // Solar3-K1 Block set 30 slot with camera and Lamp.

            ['block_id' => 97, 'camera_id' => 649, 'slot_number' => '1', 'parking_lamp_id' => NULL],
            ['block_id' => 97, 'camera_id' => 649, 'slot_number' => '2', 'parking_lamp_id' => NULL],
            ['block_id' => 97, 'camera_id' => 649, 'slot_number' => '3', 'parking_lamp_id' => NULL],

            ['block_id' => 97, 'camera_id' => 648, 'slot_number' => '4', 'parking_lamp_id' => NULL],
            ['block_id' => 97, 'camera_id' => 648, 'slot_number' => '5', 'parking_lamp_id' => NULL],
            ['block_id' => 97, 'camera_id' => 648, 'slot_number' => '6', 'parking_lamp_id' => NULL],

            ['block_id' => 97, 'camera_id' => 647, 'slot_number' => '7', 'parking_lamp_id' => NULL],
            ['block_id' => 97, 'camera_id' => 647, 'slot_number' => '8', 'parking_lamp_id' => NULL],
            ['block_id' => 97, 'camera_id' => 647, 'slot_number' => '9', 'parking_lamp_id' => NULL],

            ['block_id' => 97, 'camera_id' => 646, 'slot_number' => '10', 'parking_lamp_id' => NULL],
            ['block_id' => 97, 'camera_id' => 646, 'slot_number' => '11', 'parking_lamp_id' => NULL],
            ['block_id' => 97, 'camera_id' => 646, 'slot_number' => '12', 'parking_lamp_id' => NULL],

            ['block_id' => 97, 'camera_id' => 645, 'slot_number' => '13', 'parking_lamp_id' => NULL],
            ['block_id' => 97, 'camera_id' => 645, 'slot_number' => '14', 'parking_lamp_id' => NULL],
            ['block_id' => 97, 'camera_id' => 645, 'slot_number' => '15', 'parking_lamp_id' => NULL],

            ['block_id' => 97, 'camera_id' => 644, 'slot_number' => '16', 'parking_lamp_id' => NULL],
            ['block_id' => 97, 'camera_id' => 644, 'slot_number' => '17', 'parking_lamp_id' => NULL],
            ['block_id' => 97, 'camera_id' => 644, 'slot_number' => '18', 'parking_lamp_id' => NULL],

            ['block_id' => 97, 'camera_id' => 643, 'slot_number' => '19', 'parking_lamp_id' => NULL],
            ['block_id' => 97, 'camera_id' => 643, 'slot_number' => '20', 'parking_lamp_id' => NULL],
            ['block_id' => 97, 'camera_id' => 643, 'slot_number' => '21', 'parking_lamp_id' => NULL],

            ['block_id' => 97, 'camera_id' => 642, 'slot_number' => '22', 'parking_lamp_id' => NULL],
            ['block_id' => 97, 'camera_id' => 642, 'slot_number' => '23', 'parking_lamp_id' => NULL],
            ['block_id' => 97, 'camera_id' => 642, 'slot_number' => '24', 'parking_lamp_id' => NULL],

            ['block_id' => 97, 'camera_id' => 641, 'slot_number' => '25', 'parking_lamp_id' => NULL],
            ['block_id' => 97, 'camera_id' => 641, 'slot_number' => '26', 'parking_lamp_id' => NULL],
            ['block_id' => 97, 'camera_id' => 641, 'slot_number' => '27', 'parking_lamp_id' => NULL],

            ['block_id' => 97, 'camera_id' => 640, 'slot_number' => '28', 'parking_lamp_id' => NULL],
            ['block_id' => 97, 'camera_id' => 640, 'slot_number' => '29', 'parking_lamp_id' => NULL],
            ['block_id' => 97, 'camera_id' => 640, 'slot_number' => '30', 'parking_lamp_id' => NULL],

            // Solar3-K2 Block set 30 slot with camera and Lamp.

            ['block_id' => 98, 'camera_id' => 639, 'slot_number' => '31', 'parking_lamp_id' => NULL],
            ['block_id' => 98, 'camera_id' => 639, 'slot_number' => '32', 'parking_lamp_id' => NULL],
            ['block_id' => 98, 'camera_id' => 639, 'slot_number' => '33', 'parking_lamp_id' => NULL],

            ['block_id' => 98, 'camera_id' => 639, 'slot_number' => '34', 'parking_lamp_id' => NULL],
            ['block_id' => 98, 'camera_id' => 639, 'slot_number' => '35', 'parking_lamp_id' => NULL],
            ['block_id' => 98, 'camera_id' => 639, 'slot_number' => '36', 'parking_lamp_id' => NULL],

            ['block_id' => 98, 'camera_id' => 638, 'slot_number' => '37', 'parking_lamp_id' => NULL],
            ['block_id' => 98, 'camera_id' => 638, 'slot_number' => '38', 'parking_lamp_id' => NULL],
            ['block_id' => 98, 'camera_id' => 638, 'slot_number' => '39', 'parking_lamp_id' => NULL],

            ['block_id' => 98, 'camera_id' => 637, 'slot_number' => '40', 'parking_lamp_id' => NULL],
            ['block_id' => 98, 'camera_id' => 637, 'slot_number' => '41', 'parking_lamp_id' => NULL],
            ['block_id' => 98, 'camera_id' => 637, 'slot_number' => '42', 'parking_lamp_id' => NULL],

            ['block_id' => 98, 'camera_id' => 636, 'slot_number' => '43', 'parking_lamp_id' => NULL],
            ['block_id' => 98, 'camera_id' => 636, 'slot_number' => '44', 'parking_lamp_id' => NULL],
            ['block_id' => 98, 'camera_id' => 636, 'slot_number' => '45', 'parking_lamp_id' => NULL],

            ['block_id' => 98, 'camera_id' => 635, 'slot_number' => '46', 'parking_lamp_id' => NULL],
            ['block_id' => 98, 'camera_id' => 635, 'slot_number' => '47', 'parking_lamp_id' => NULL],
            ['block_id' => 98, 'camera_id' => 635, 'slot_number' => '48', 'parking_lamp_id' => NULL],

            ['block_id' => 98, 'camera_id' => 634, 'slot_number' => '49', 'parking_lamp_id' => NULL],
            ['block_id' => 98, 'camera_id' => 634, 'slot_number' => '50', 'parking_lamp_id' => NULL],
            ['block_id' => 98, 'camera_id' => 634, 'slot_number' => '51', 'parking_lamp_id' => NULL],

            ['block_id' => 98, 'camera_id' => 633, 'slot_number' => '52', 'parking_lamp_id' => NULL],
            ['block_id' => 98, 'camera_id' => 633, 'slot_number' => '53', 'parking_lamp_id' => NULL],
            ['block_id' => 98, 'camera_id' => 633, 'slot_number' => '54', 'parking_lamp_id' => NULL],

            ['block_id' => 98, 'camera_id' => 632, 'slot_number' => '55', 'parking_lamp_id' => NULL],
            ['block_id' => 98, 'camera_id' => 632, 'slot_number' => '56', 'parking_lamp_id' => NULL],
            ['block_id' => 98, 'camera_id' => 632, 'slot_number' => '57', 'parking_lamp_id' => NULL],

            ['block_id' => 98, 'camera_id' => 631, 'slot_number' => '58', 'parking_lamp_id' => NULL],
            ['block_id' => 98, 'camera_id' => 631, 'slot_number' => '59', 'parking_lamp_id' => NULL],
            ['block_id' => 98, 'camera_id' => 631, 'slot_number' => '60', 'parking_lamp_id' => NULL],

            // Solar4-K3 Block set 31 slot with camera and Lamp.

            ['block_id' => 99, 'camera_id' => 671, 'slot_number' => '61', 'parking_lamp_id' => NULL],
            ['block_id' => 99, 'camera_id' => 671, 'slot_number' => '62', 'parking_lamp_id' => NULL],
            ['block_id' => 99, 'camera_id' => 671, 'slot_number' => '63', 'parking_lamp_id' => NULL],

            ['block_id' => 99, 'camera_id' => 670, 'slot_number' => '64', 'parking_lamp_id' => NULL],
            ['block_id' => 99, 'camera_id' => 670, 'slot_number' => '65', 'parking_lamp_id' => NULL],
            ['block_id' => 99, 'camera_id' => 670, 'slot_number' => '66', 'parking_lamp_id' => NULL],

            ['block_id' => 99, 'camera_id' => 669, 'slot_number' => '67', 'parking_lamp_id' => NULL],
            ['block_id' => 99, 'camera_id' => 669, 'slot_number' => '68', 'parking_lamp_id' => NULL],
            ['block_id' => 99, 'camera_id' => 669, 'slot_number' => '69', 'parking_lamp_id' => NULL],

            ['block_id' => 99, 'camera_id' => 668, 'slot_number' => '70', 'parking_lamp_id' => NULL],
            ['block_id' => 99, 'camera_id' => 668, 'slot_number' => '71', 'parking_lamp_id' => NULL],
            ['block_id' => 99, 'camera_id' => 668, 'slot_number' => '72', 'parking_lamp_id' => NULL],

            ['block_id' => 99, 'camera_id' => 667, 'slot_number' => '73', 'parking_lamp_id' => NULL],
            ['block_id' => 99, 'camera_id' => 667, 'slot_number' => '74', 'parking_lamp_id' => NULL],
            ['block_id' => 99, 'camera_id' => 667, 'slot_number' => '75', 'parking_lamp_id' => NULL],

            ['block_id' => 99, 'camera_id' => 666, 'slot_number' => '76', 'parking_lamp_id' => NULL],
            ['block_id' => 99, 'camera_id' => 666, 'slot_number' => '77', 'parking_lamp_id' => NULL],
            ['block_id' => 99, 'camera_id' => 666, 'slot_number' => '78', 'parking_lamp_id' => NULL],

            ['block_id' => 99, 'camera_id' => 665, 'slot_number' => '79', 'parking_lamp_id' => NULL],
            ['block_id' => 99, 'camera_id' => 665, 'slot_number' => '80', 'parking_lamp_id' => NULL],
            ['block_id' => 99, 'camera_id' => 665, 'slot_number' => '81', 'parking_lamp_id' => NULL],

            ['block_id' => 99, 'camera_id' => 664, 'slot_number' => '82', 'parking_lamp_id' => NULL],
            ['block_id' => 99, 'camera_id' => 664, 'slot_number' => '83', 'parking_lamp_id' => NULL],
            ['block_id' => 99, 'camera_id' => 664, 'slot_number' => '84', 'parking_lamp_id' => NULL],

            ['block_id' => 99, 'camera_id' => 663, 'slot_number' => '85', 'parking_lamp_id' => NULL],
            ['block_id' => 99, 'camera_id' => 663, 'slot_number' => '86', 'parking_lamp_id' => NULL],
            ['block_id' => 99, 'camera_id' => 663, 'slot_number' => '87', 'parking_lamp_id' => NULL],

            ['block_id' => 99, 'camera_id' => 662, 'slot_number' => '88', 'parking_lamp_id' => NULL],
            ['block_id' => 99, 'camera_id' => 662, 'slot_number' => '89', 'parking_lamp_id' => NULL],
            ['block_id' => 99, 'camera_id' => 662, 'slot_number' => '90', 'parking_lamp_id' => NULL],
            ['block_id' => 99, 'camera_id' => 661, 'slot_number' => '91', 'parking_lamp_id' => NULL],

            // Solar4-K4 Block set 31 slot with camera and Lamp.

            ['block_id' => 100, 'camera_id' => 660, 'slot_number' => '92', 'parking_lamp_id' => NULL],
            ['block_id' => 100, 'camera_id' => 659, 'slot_number' => '93', 'parking_lamp_id' => NULL],
            ['block_id' => 100, 'camera_id' => 659, 'slot_number' => '94', 'parking_lamp_id' => NULL],
            ['block_id' => 100, 'camera_id' => 659, 'slot_number' => '95', 'parking_lamp_id' => NULL],

            ['block_id' => 100, 'camera_id' => 658, 'slot_number' => '96', 'parking_lamp_id' => NULL],
            ['block_id' => 100, 'camera_id' => 658, 'slot_number' => '97', 'parking_lamp_id' => NULL],
            ['block_id' => 100, 'camera_id' => 658, 'slot_number' => '98', 'parking_lamp_id' => NULL],

            ['block_id' => 100, 'camera_id' => 657, 'slot_number' => '99', 'parking_lamp_id' => NULL],
            ['block_id' => 100, 'camera_id' => 657, 'slot_number' => '100', 'parking_lamp_id' => NULL],
            ['block_id' => 100, 'camera_id' => 657, 'slot_number' => '101', 'parking_lamp_id' => NULL],

            ['block_id' => 100, 'camera_id' => 656, 'slot_number' => '102', 'parking_lamp_id' => NULL],
            ['block_id' => 100, 'camera_id' => 656, 'slot_number' => '103', 'parking_lamp_id' => NULL],
            ['block_id' => 100, 'camera_id' => 656, 'slot_number' => '104', 'parking_lamp_id' => NULL],

            ['block_id' => 100, 'camera_id' => 655, 'slot_number' => '105', 'parking_lamp_id' => NULL],
            ['block_id' => 100, 'camera_id' => 655, 'slot_number' => '106', 'parking_lamp_id' => NULL],
            ['block_id' => 100, 'camera_id' => 655, 'slot_number' => '107', 'parking_lamp_id' => NULL],

            ['block_id' => 100, 'camera_id' => 654, 'slot_number' => '108', 'parking_lamp_id' => NULL],
            ['block_id' => 100, 'camera_id' => 654, 'slot_number' => '109', 'parking_lamp_id' => NULL],
            ['block_id' => 100, 'camera_id' => 654, 'slot_number' => '110', 'parking_lamp_id' => NULL],

            ['block_id' => 100, 'camera_id' => 653, 'slot_number' => '111', 'parking_lamp_id' => NULL],
            ['block_id' => 100, 'camera_id' => 653, 'slot_number' => '112', 'parking_lamp_id' => NULL],
            ['block_id' => 100, 'camera_id' => 653, 'slot_number' => '113', 'parking_lamp_id' => NULL],

            ['block_id' => 100, 'camera_id' => 652, 'slot_number' => '114', 'parking_lamp_id' => NULL],
            ['block_id' => 100, 'camera_id' => 652, 'slot_number' => '115', 'parking_lamp_id' => NULL],
            ['block_id' => 100, 'camera_id' => 652, 'slot_number' => '116', 'parking_lamp_id' => NULL],

            ['block_id' => 100, 'camera_id' => 651, 'slot_number' => '117', 'parking_lamp_id' => NULL],
            ['block_id' => 100, 'camera_id' => 651, 'slot_number' => '118', 'parking_lamp_id' => NULL],
            ['block_id' => 100, 'camera_id' => 651, 'slot_number' => '119', 'parking_lamp_id' => NULL],

            ['block_id' => 100, 'camera_id' => 650, 'slot_number' => '120', 'parking_lamp_id' => NULL],
            ['block_id' => 100, 'camera_id' => 650, 'slot_number' => '121', 'parking_lamp_id' => NULL],
            ['block_id' => 100, 'camera_id' => 650, 'slot_number' => '122', 'parking_lamp_id' => NULL],
  
            
            // Solar3-L1 Block set 30 slot with camera and Lamp.

            ['block_id' => 101, 'camera_id' => 691, 'slot_number' => '1', 'parking_lamp_id' => NULL],
            ['block_id' => 101, 'camera_id' => 691, 'slot_number' => '2', 'parking_lamp_id' => NULL],
            ['block_id' => 101, 'camera_id' => 691, 'slot_number' => '3', 'parking_lamp_id' => NULL],

            ['block_id' => 101, 'camera_id' => 690, 'slot_number' => '4', 'parking_lamp_id' => NULL],
            ['block_id' => 101, 'camera_id' => 690, 'slot_number' => '5', 'parking_lamp_id' => NULL],
            ['block_id' => 101, 'camera_id' => 690, 'slot_number' => '6', 'parking_lamp_id' => NULL],

            ['block_id' => 101, 'camera_id' => 689, 'slot_number' => '7', 'parking_lamp_id' => NULL],
            ['block_id' => 101, 'camera_id' => 689, 'slot_number' => '8', 'parking_lamp_id' => NULL],
            ['block_id' => 101, 'camera_id' => 689, 'slot_number' => '9', 'parking_lamp_id' => NULL],

            ['block_id' => 101, 'camera_id' => 688, 'slot_number' => '10', 'parking_lamp_id' => NULL],
            ['block_id' => 101, 'camera_id' => 688, 'slot_number' => '11', 'parking_lamp_id' => NULL],
            ['block_id' => 101, 'camera_id' => 688, 'slot_number' => '12', 'parking_lamp_id' => NULL],

            ['block_id' => 101, 'camera_id' => 687, 'slot_number' => '13', 'parking_lamp_id' => NULL],
            ['block_id' => 101, 'camera_id' => 687, 'slot_number' => '14', 'parking_lamp_id' => NULL],
            ['block_id' => 101, 'camera_id' => 687, 'slot_number' => '15', 'parking_lamp_id' => NULL],

            ['block_id' => 101, 'camera_id' => 686, 'slot_number' => '16', 'parking_lamp_id' => NULL],
            ['block_id' => 101, 'camera_id' => 686, 'slot_number' => '17', 'parking_lamp_id' => NULL],
            ['block_id' => 101, 'camera_id' => 686, 'slot_number' => '18', 'parking_lamp_id' => NULL],

            ['block_id' => 101, 'camera_id' => 685, 'slot_number' => '19', 'parking_lamp_id' => NULL],
            ['block_id' => 101, 'camera_id' => 685, 'slot_number' => '20', 'parking_lamp_id' => NULL],
            ['block_id' => 101, 'camera_id' => 685, 'slot_number' => '21', 'parking_lamp_id' => NULL],

            ['block_id' => 101, 'camera_id' => 684, 'slot_number' => '22', 'parking_lamp_id' => NULL],
            ['block_id' => 101, 'camera_id' => 684, 'slot_number' => '23', 'parking_lamp_id' => NULL],
            ['block_id' => 101, 'camera_id' => 684, 'slot_number' => '24', 'parking_lamp_id' => NULL],

            ['block_id' => 101, 'camera_id' => 683, 'slot_number' => '25', 'parking_lamp_id' => NULL],
            ['block_id' => 101, 'camera_id' => 683, 'slot_number' => '26', 'parking_lamp_id' => NULL],
            ['block_id' => 101, 'camera_id' => 683, 'slot_number' => '27', 'parking_lamp_id' => NULL],

            ['block_id' => 101, 'camera_id' => 682, 'slot_number' => '28', 'parking_lamp_id' => NULL],
            ['block_id' => 101, 'camera_id' => 682, 'slot_number' => '29', 'parking_lamp_id' => NULL],
            ['block_id' => 101, 'camera_id' => 682, 'slot_number' => '30', 'parking_lamp_id' => NULL],

            // Solar3-L2 Block set 30 slot with camera and Lamp.

            ['block_id' => 102, 'camera_id' => 681, 'slot_number' => '31', 'parking_lamp_id' => NULL],
            ['block_id' => 102, 'camera_id' => 681, 'slot_number' => '32', 'parking_lamp_id' => NULL],
            ['block_id' => 102, 'camera_id' => 681, 'slot_number' => '33', 'parking_lamp_id' => NULL],

            ['block_id' => 102, 'camera_id' => 680, 'slot_number' => '34', 'parking_lamp_id' => NULL],
            ['block_id' => 102, 'camera_id' => 680, 'slot_number' => '35', 'parking_lamp_id' => NULL],
            ['block_id' => 102, 'camera_id' => 680, 'slot_number' => '36', 'parking_lamp_id' => NULL],

            ['block_id' => 102, 'camera_id' => 679, 'slot_number' => '37', 'parking_lamp_id' => NULL],
            ['block_id' => 102, 'camera_id' => 679, 'slot_number' => '38', 'parking_lamp_id' => NULL],
            ['block_id' => 102, 'camera_id' => 679, 'slot_number' => '39', 'parking_lamp_id' => NULL],

            ['block_id' => 102, 'camera_id' => 678, 'slot_number' => '40', 'parking_lamp_id' => NULL],
            ['block_id' => 102, 'camera_id' => 678, 'slot_number' => '41', 'parking_lamp_id' => NULL],
            ['block_id' => 102, 'camera_id' => 678, 'slot_number' => '42', 'parking_lamp_id' => NULL],

            ['block_id' => 102, 'camera_id' => 677, 'slot_number' => '43', 'parking_lamp_id' => NULL],
            ['block_id' => 102, 'camera_id' => 677, 'slot_number' => '44', 'parking_lamp_id' => NULL],
            ['block_id' => 102, 'camera_id' => 677, 'slot_number' => '45', 'parking_lamp_id' => NULL],

            ['block_id' => 102, 'camera_id' => 676, 'slot_number' => '46', 'parking_lamp_id' => NULL],
            ['block_id' => 102, 'camera_id' => 676, 'slot_number' => '47', 'parking_lamp_id' => NULL],
            ['block_id' => 102, 'camera_id' => 676, 'slot_number' => '48', 'parking_lamp_id' => NULL],

            ['block_id' => 102, 'camera_id' => 675, 'slot_number' => '49', 'parking_lamp_id' => NULL],
            ['block_id' => 102, 'camera_id' => 675, 'slot_number' => '50', 'parking_lamp_id' => NULL],
            ['block_id' => 102, 'camera_id' => 675, 'slot_number' => '51', 'parking_lamp_id' => NULL],

            ['block_id' => 102, 'camera_id' => 674, 'slot_number' => '52', 'parking_lamp_id' => NULL],
            ['block_id' => 102, 'camera_id' => 674, 'slot_number' => '53', 'parking_lamp_id' => NULL],
            ['block_id' => 102, 'camera_id' => 674, 'slot_number' => '54', 'parking_lamp_id' => NULL],

            ['block_id' => 102, 'camera_id' => 673, 'slot_number' => '55', 'parking_lamp_id' => NULL],
            ['block_id' => 102, 'camera_id' => 673, 'slot_number' => '56', 'parking_lamp_id' => NULL],
            ['block_id' => 102, 'camera_id' => 673, 'slot_number' => '57', 'parking_lamp_id' => NULL],

            ['block_id' => 102, 'camera_id' => 672, 'slot_number' => '58', 'parking_lamp_id' => NULL],
            ['block_id' => 102, 'camera_id' => 672, 'slot_number' => '59', 'parking_lamp_id' => NULL],
            ['block_id' => 102, 'camera_id' => 672, 'slot_number' => '60', 'parking_lamp_id' => NULL],

            // Solar4-L3 Block set 31 slot with camera and Lamp.

            ['block_id' => 103, 'camera_id' => 713, 'slot_number' => '61', 'parking_lamp_id' => NULL],
            ['block_id' => 103, 'camera_id' => 713, 'slot_number' => '62', 'parking_lamp_id' => NULL],
            ['block_id' => 103, 'camera_id' => 713, 'slot_number' => '63', 'parking_lamp_id' => NULL],

            ['block_id' => 103, 'camera_id' => 712, 'slot_number' => '64', 'parking_lamp_id' => NULL],
            ['block_id' => 103, 'camera_id' => 712, 'slot_number' => '65', 'parking_lamp_id' => NULL],
            ['block_id' => 103, 'camera_id' => 712, 'slot_number' => '66', 'parking_lamp_id' => NULL],

            ['block_id' => 103, 'camera_id' => 711, 'slot_number' => '67', 'parking_lamp_id' => NULL],
            ['block_id' => 103, 'camera_id' => 711, 'slot_number' => '68', 'parking_lamp_id' => NULL],
            ['block_id' => 103, 'camera_id' => 711, 'slot_number' => '69', 'parking_lamp_id' => NULL],

            ['block_id' => 103, 'camera_id' => 710, 'slot_number' => '70', 'parking_lamp_id' => NULL],
            ['block_id' => 103, 'camera_id' => 710, 'slot_number' => '71', 'parking_lamp_id' => NULL],
            ['block_id' => 103, 'camera_id' => 710, 'slot_number' => '72', 'parking_lamp_id' => NULL],

            ['block_id' => 103, 'camera_id' => 709, 'slot_number' => '73', 'parking_lamp_id' => NULL],
            ['block_id' => 103, 'camera_id' => 709, 'slot_number' => '74', 'parking_lamp_id' => NULL],
            ['block_id' => 103, 'camera_id' => 709, 'slot_number' => '75', 'parking_lamp_id' => NULL],

            ['block_id' => 103, 'camera_id' => 708, 'slot_number' => '76', 'parking_lamp_id' => NULL],
            ['block_id' => 103, 'camera_id' => 708, 'slot_number' => '77', 'parking_lamp_id' => NULL],
            ['block_id' => 103, 'camera_id' => 708, 'slot_number' => '78', 'parking_lamp_id' => NULL],

            ['block_id' => 103, 'camera_id' => 707, 'slot_number' => '79', 'parking_lamp_id' => NULL],
            ['block_id' => 103, 'camera_id' => 707, 'slot_number' => '80', 'parking_lamp_id' => NULL],
            ['block_id' => 103, 'camera_id' => 707, 'slot_number' => '81', 'parking_lamp_id' => NULL],

            ['block_id' => 103, 'camera_id' => 706, 'slot_number' => '82', 'parking_lamp_id' => NULL],
            ['block_id' => 103, 'camera_id' => 706, 'slot_number' => '83', 'parking_lamp_id' => NULL],
            ['block_id' => 103, 'camera_id' => 706, 'slot_number' => '84', 'parking_lamp_id' => NULL],

            ['block_id' => 103, 'camera_id' => 705, 'slot_number' => '85', 'parking_lamp_id' => NULL],
            ['block_id' => 103, 'camera_id' => 705, 'slot_number' => '86', 'parking_lamp_id' => NULL],
            ['block_id' => 103, 'camera_id' => 705, 'slot_number' => '87', 'parking_lamp_id' => NULL],

            ['block_id' => 103, 'camera_id' => 704, 'slot_number' => '88', 'parking_lamp_id' => NULL],
            ['block_id' => 103, 'camera_id' => 704, 'slot_number' => '89', 'parking_lamp_id' => NULL],
            ['block_id' => 103, 'camera_id' => 704, 'slot_number' => '90', 'parking_lamp_id' => NULL],
            ['block_id' => 103, 'camera_id' => 703, 'slot_number' => '91', 'parking_lamp_id' => NULL],

            // Solar4-L4 Block set 31 slot with camera and Lamp.

            ['block_id' => 104, 'camera_id' => 702, 'slot_number' => '92', 'parking_lamp_id' => NULL],
            ['block_id' => 104, 'camera_id' => 701, 'slot_number' => '93', 'parking_lamp_id' => NULL],
            ['block_id' => 104, 'camera_id' => 701, 'slot_number' => '94', 'parking_lamp_id' => NULL],
            ['block_id' => 104, 'camera_id' => 701, 'slot_number' => '95', 'parking_lamp_id' => NULL],

            ['block_id' => 104, 'camera_id' => 700, 'slot_number' => '96', 'parking_lamp_id' => NULL],
            ['block_id' => 104, 'camera_id' => 700, 'slot_number' => '97', 'parking_lamp_id' => NULL],
            ['block_id' => 104, 'camera_id' => 700, 'slot_number' => '98', 'parking_lamp_id' => NULL],

            ['block_id' => 104, 'camera_id' => 699, 'slot_number' => '99', 'parking_lamp_id' => NULL],
            ['block_id' => 104, 'camera_id' => 699, 'slot_number' => '100', 'parking_lamp_id' => NULL],
            ['block_id' => 104, 'camera_id' => 699, 'slot_number' => '101', 'parking_lamp_id' => NULL],

            ['block_id' => 104, 'camera_id' => 698, 'slot_number' => '102', 'parking_lamp_id' => NULL],
            ['block_id' => 104, 'camera_id' => 698, 'slot_number' => '103', 'parking_lamp_id' => NULL],
            ['block_id' => 104, 'camera_id' => 698, 'slot_number' => '104', 'parking_lamp_id' => NULL],

            ['block_id' => 104, 'camera_id' => 697, 'slot_number' => '105', 'parking_lamp_id' => NULL],
            ['block_id' => 104, 'camera_id' => 697, 'slot_number' => '106', 'parking_lamp_id' => NULL],
            ['block_id' => 104, 'camera_id' => 697, 'slot_number' => '107', 'parking_lamp_id' => NULL],

            ['block_id' => 104, 'camera_id' => 696, 'slot_number' => '108', 'parking_lamp_id' => NULL],
            ['block_id' => 104, 'camera_id' => 696, 'slot_number' => '109', 'parking_lamp_id' => NULL],
            ['block_id' => 104, 'camera_id' => 696, 'slot_number' => '110', 'parking_lamp_id' => NULL],

            ['block_id' => 104, 'camera_id' => 695, 'slot_number' => '111', 'parking_lamp_id' => NULL],
            ['block_id' => 104, 'camera_id' => 695, 'slot_number' => '112', 'parking_lamp_id' => NULL],
            ['block_id' => 104, 'camera_id' => 695, 'slot_number' => '113', 'parking_lamp_id' => NULL],

            ['block_id' => 104, 'camera_id' => 694, 'slot_number' => '114', 'parking_lamp_id' => NULL],
            ['block_id' => 104, 'camera_id' => 694, 'slot_number' => '115', 'parking_lamp_id' => NULL],
            ['block_id' => 104, 'camera_id' => 694, 'slot_number' => '116', 'parking_lamp_id' => NULL],

            ['block_id' => 104, 'camera_id' => 693, 'slot_number' => '117', 'parking_lamp_id' => NULL],
            ['block_id' => 104, 'camera_id' => 693, 'slot_number' => '118', 'parking_lamp_id' => NULL],
            ['block_id' => 104, 'camera_id' => 693, 'slot_number' => '119', 'parking_lamp_id' => NULL],

            ['block_id' => 104, 'camera_id' => 692, 'slot_number' => '120', 'parking_lamp_id' => NULL],
            ['block_id' => 104, 'camera_id' => 692, 'slot_number' => '121', 'parking_lamp_id' => NULL],
            ['block_id' => 104, 'camera_id' => 692, 'slot_number' => '122', 'parking_lamp_id' => NULL],

            // Solar3-M1 Block set 30 slot with camera and Lamp.

            ['block_id' => 105, 'camera_id' => 733, 'slot_number' => '1', 'parking_lamp_id' => NULL],
            ['block_id' => 105, 'camera_id' => 733, 'slot_number' => '2', 'parking_lamp_id' => NULL],
            ['block_id' => 105, 'camera_id' => 733, 'slot_number' => '3', 'parking_lamp_id' => NULL],

            ['block_id' => 105, 'camera_id' => 732, 'slot_number' => '4', 'parking_lamp_id' => NULL],
            ['block_id' => 105, 'camera_id' => 732, 'slot_number' => '5', 'parking_lamp_id' => NULL],
            ['block_id' => 105, 'camera_id' => 732, 'slot_number' => '6', 'parking_lamp_id' => NULL],

            ['block_id' => 105, 'camera_id' => 731, 'slot_number' => '7', 'parking_lamp_id' => NULL],
            ['block_id' => 105, 'camera_id' => 731, 'slot_number' => '8', 'parking_lamp_id' => NULL],
            ['block_id' => 105, 'camera_id' => 731, 'slot_number' => '9', 'parking_lamp_id' => NULL],

            ['block_id' => 105, 'camera_id' => 730, 'slot_number' => '10', 'parking_lamp_id' => NULL],
            ['block_id' => 105, 'camera_id' => 730, 'slot_number' => '11', 'parking_lamp_id' => NULL],
            ['block_id' => 105, 'camera_id' => 730, 'slot_number' => '12', 'parking_lamp_id' => NULL],

            ['block_id' => 105, 'camera_id' => 729, 'slot_number' => '13', 'parking_lamp_id' => NULL],
            ['block_id' => 105, 'camera_id' => 729, 'slot_number' => '14', 'parking_lamp_id' => NULL],
            ['block_id' => 105, 'camera_id' => 729, 'slot_number' => '15', 'parking_lamp_id' => NULL],

            ['block_id' => 105, 'camera_id' => 728, 'slot_number' => '16', 'parking_lamp_id' => NULL],
            ['block_id' => 105, 'camera_id' => 728, 'slot_number' => '17', 'parking_lamp_id' => NULL],
            ['block_id' => 105, 'camera_id' => 728, 'slot_number' => '18', 'parking_lamp_id' => NULL],

            ['block_id' => 105, 'camera_id' => 727, 'slot_number' => '19', 'parking_lamp_id' => NULL],
            ['block_id' => 105, 'camera_id' => 727, 'slot_number' => '20', 'parking_lamp_id' => NULL],
            ['block_id' => 105, 'camera_id' => 727, 'slot_number' => '21', 'parking_lamp_id' => NULL],

            ['block_id' => 105, 'camera_id' => 726, 'slot_number' => '22', 'parking_lamp_id' => NULL],
            ['block_id' => 105, 'camera_id' => 726, 'slot_number' => '23', 'parking_lamp_id' => NULL],
            ['block_id' => 105, 'camera_id' => 726, 'slot_number' => '24', 'parking_lamp_id' => NULL],

            ['block_id' => 105, 'camera_id' => 725, 'slot_number' => '25', 'parking_lamp_id' => NULL],
            ['block_id' => 105, 'camera_id' => 725, 'slot_number' => '26', 'parking_lamp_id' => NULL],
            ['block_id' => 105, 'camera_id' => 725, 'slot_number' => '27', 'parking_lamp_id' => NULL],

            ['block_id' => 105, 'camera_id' => 724, 'slot_number' => '28', 'parking_lamp_id' => NULL],
            ['block_id' => 105, 'camera_id' => 724, 'slot_number' => '29', 'parking_lamp_id' => NULL],
            ['block_id' => 105, 'camera_id' => 724, 'slot_number' => '30', 'parking_lamp_id' => NULL],

            // Solar3-M2 Block set 30 slot with camera and Lamp.

            ['block_id' => 106, 'camera_id' => 723, 'slot_number' => '31', 'parking_lamp_id' => NULL],
            ['block_id' => 106, 'camera_id' => 723, 'slot_number' => '32', 'parking_lamp_id' => NULL],
            ['block_id' => 106, 'camera_id' => 723, 'slot_number' => '33', 'parking_lamp_id' => NULL],

            ['block_id' => 106, 'camera_id' => 722, 'slot_number' => '34', 'parking_lamp_id' => NULL],
            ['block_id' => 106, 'camera_id' => 722, 'slot_number' => '35', 'parking_lamp_id' => NULL],
            ['block_id' => 106, 'camera_id' => 722, 'slot_number' => '36', 'parking_lamp_id' => NULL],

            ['block_id' => 106, 'camera_id' => 721, 'slot_number' => '37', 'parking_lamp_id' => NULL],
            ['block_id' => 106, 'camera_id' => 721, 'slot_number' => '38', 'parking_lamp_id' => NULL],
            ['block_id' => 106, 'camera_id' => 721, 'slot_number' => '39', 'parking_lamp_id' => NULL],

            ['block_id' => 106, 'camera_id' => 720, 'slot_number' => '40', 'parking_lamp_id' => NULL],
            ['block_id' => 106, 'camera_id' => 720, 'slot_number' => '41', 'parking_lamp_id' => NULL],
            ['block_id' => 106, 'camera_id' => 720, 'slot_number' => '42', 'parking_lamp_id' => NULL],

            ['block_id' => 106, 'camera_id' => 719, 'slot_number' => '43', 'parking_lamp_id' => NULL],
            ['block_id' => 106, 'camera_id' => 719, 'slot_number' => '44', 'parking_lamp_id' => NULL],
            ['block_id' => 106, 'camera_id' => 719, 'slot_number' => '45', 'parking_lamp_id' => NULL],

            ['block_id' => 106, 'camera_id' => 718, 'slot_number' => '46', 'parking_lamp_id' => NULL],
            ['block_id' => 106, 'camera_id' => 718, 'slot_number' => '47', 'parking_lamp_id' => NULL],
            ['block_id' => 106, 'camera_id' => 718, 'slot_number' => '48', 'parking_lamp_id' => NULL],

            ['block_id' => 106, 'camera_id' => 717, 'slot_number' => '49', 'parking_lamp_id' => NULL],
            ['block_id' => 106, 'camera_id' => 717, 'slot_number' => '50', 'parking_lamp_id' => NULL],
            ['block_id' => 106, 'camera_id' => 717, 'slot_number' => '51', 'parking_lamp_id' => NULL],

            ['block_id' => 106, 'camera_id' => 716, 'slot_number' => '52', 'parking_lamp_id' => NULL],
            ['block_id' => 106, 'camera_id' => 716, 'slot_number' => '53', 'parking_lamp_id' => NULL],
            ['block_id' => 106, 'camera_id' => 716, 'slot_number' => '54', 'parking_lamp_id' => NULL],

            ['block_id' => 106, 'camera_id' => 715, 'slot_number' => '55', 'parking_lamp_id' => NULL],
            ['block_id' => 106, 'camera_id' => 715, 'slot_number' => '56', 'parking_lamp_id' => NULL],
            ['block_id' => 106, 'camera_id' => 715, 'slot_number' => '57', 'parking_lamp_id' => NULL],

            ['block_id' => 106, 'camera_id' => 714, 'slot_number' => '58', 'parking_lamp_id' => NULL],
            ['block_id' => 106, 'camera_id' => 714, 'slot_number' => '59', 'parking_lamp_id' => NULL],
            ['block_id' => 106, 'camera_id' => 714, 'slot_number' => '60', 'parking_lamp_id' => NULL],

            // Solar4-M3 Block set 31 slot with camera and Lamp.

            ['block_id' => 107, 'camera_id' => 755, 'slot_number' => '61', 'parking_lamp_id' => NULL],
            ['block_id' => 107, 'camera_id' => 755, 'slot_number' => '62', 'parking_lamp_id' => NULL],
            ['block_id' => 107, 'camera_id' => 755, 'slot_number' => '63', 'parking_lamp_id' => NULL],

            ['block_id' => 107, 'camera_id' => 754, 'slot_number' => '64', 'parking_lamp_id' => NULL],
            ['block_id' => 107, 'camera_id' => 754, 'slot_number' => '65', 'parking_lamp_id' => NULL],
            ['block_id' => 107, 'camera_id' => 754, 'slot_number' => '66', 'parking_lamp_id' => NULL],

            ['block_id' => 107, 'camera_id' => 753, 'slot_number' => '67', 'parking_lamp_id' => NULL],
            ['block_id' => 107, 'camera_id' => 753, 'slot_number' => '68', 'parking_lamp_id' => NULL],
            ['block_id' => 107, 'camera_id' => 753, 'slot_number' => '69', 'parking_lamp_id' => NULL],

            ['block_id' => 107, 'camera_id' => 752, 'slot_number' => '70', 'parking_lamp_id' => NULL],
            ['block_id' => 107, 'camera_id' => 752, 'slot_number' => '71', 'parking_lamp_id' => NULL],
            ['block_id' => 107, 'camera_id' => 752, 'slot_number' => '72', 'parking_lamp_id' => NULL],

            ['block_id' => 107, 'camera_id' => 751, 'slot_number' => '73', 'parking_lamp_id' => NULL],
            ['block_id' => 107, 'camera_id' => 751, 'slot_number' => '74', 'parking_lamp_id' => NULL],
            ['block_id' => 107, 'camera_id' => 751, 'slot_number' => '75', 'parking_lamp_id' => NULL],

            ['block_id' => 107, 'camera_id' => 750, 'slot_number' => '76', 'parking_lamp_id' => NULL],
            ['block_id' => 107, 'camera_id' => 750, 'slot_number' => '77', 'parking_lamp_id' => NULL],
            ['block_id' => 107, 'camera_id' => 750, 'slot_number' => '78', 'parking_lamp_id' => NULL],

            ['block_id' => 107, 'camera_id' => 749, 'slot_number' => '79', 'parking_lamp_id' => NULL],
            ['block_id' => 107, 'camera_id' => 749, 'slot_number' => '80', 'parking_lamp_id' => NULL],
            ['block_id' => 107, 'camera_id' => 749, 'slot_number' => '81', 'parking_lamp_id' => NULL],

            ['block_id' => 107, 'camera_id' => 748, 'slot_number' => '82', 'parking_lamp_id' => NULL],
            ['block_id' => 107, 'camera_id' => 748, 'slot_number' => '83', 'parking_lamp_id' => NULL],
            ['block_id' => 107, 'camera_id' => 748, 'slot_number' => '84', 'parking_lamp_id' => NULL],

            ['block_id' => 107, 'camera_id' => 747, 'slot_number' => '85', 'parking_lamp_id' => NULL],
            ['block_id' => 107, 'camera_id' => 747, 'slot_number' => '86', 'parking_lamp_id' => NULL],
            ['block_id' => 107, 'camera_id' => 747, 'slot_number' => '87', 'parking_lamp_id' => NULL],

            ['block_id' => 107, 'camera_id' => 746, 'slot_number' => '88', 'parking_lamp_id' => NULL],
            ['block_id' => 107, 'camera_id' => 746, 'slot_number' => '89', 'parking_lamp_id' => NULL],
            ['block_id' => 107, 'camera_id' => 746, 'slot_number' => '90', 'parking_lamp_id' => NULL],
            ['block_id' => 107, 'camera_id' => 745, 'slot_number' => '91', 'parking_lamp_id' => NULL],

            // Solar4-M4 Block set 31 slot with camera and Lamp.

            ['block_id' => 108, 'camera_id' => 744, 'slot_number' => '92', 'parking_lamp_id' => NULL],
            ['block_id' => 108, 'camera_id' => 743, 'slot_number' => '93', 'parking_lamp_id' => NULL],
            ['block_id' => 108, 'camera_id' => 743, 'slot_number' => '94', 'parking_lamp_id' => NULL],
            ['block_id' => 108, 'camera_id' => 743, 'slot_number' => '95', 'parking_lamp_id' => NULL],

            ['block_id' => 108, 'camera_id' => 742, 'slot_number' => '96', 'parking_lamp_id' => NULL],
            ['block_id' => 108, 'camera_id' => 742, 'slot_number' => '97', 'parking_lamp_id' => NULL],
            ['block_id' => 108, 'camera_id' => 742, 'slot_number' => '98', 'parking_lamp_id' => NULL],

            ['block_id' => 108, 'camera_id' => 741, 'slot_number' => '99', 'parking_lamp_id' => NULL],
            ['block_id' => 108, 'camera_id' => 741, 'slot_number' => '100', 'parking_lamp_id' => NULL],
            ['block_id' => 108, 'camera_id' => 741, 'slot_number' => '101', 'parking_lamp_id' => NULL],

            ['block_id' => 108, 'camera_id' => 740, 'slot_number' => '102', 'parking_lamp_id' => NULL],
            ['block_id' => 108, 'camera_id' => 740, 'slot_number' => '103', 'parking_lamp_id' => NULL],
            ['block_id' => 108, 'camera_id' => 740, 'slot_number' => '104', 'parking_lamp_id' => NULL],

            ['block_id' => 108, 'camera_id' => 739, 'slot_number' => '105', 'parking_lamp_id' => NULL],
            ['block_id' => 108, 'camera_id' => 739, 'slot_number' => '106', 'parking_lamp_id' => NULL],
            ['block_id' => 108, 'camera_id' => 739, 'slot_number' => '107', 'parking_lamp_id' => NULL],

            ['block_id' => 108, 'camera_id' => 738, 'slot_number' => '108', 'parking_lamp_id' => NULL],
            ['block_id' => 108, 'camera_id' => 738, 'slot_number' => '109', 'parking_lamp_id' => NULL],
            ['block_id' => 108, 'camera_id' => 738, 'slot_number' => '110', 'parking_lamp_id' => NULL],

            ['block_id' => 108, 'camera_id' => 737, 'slot_number' => '111', 'parking_lamp_id' => NULL],
            ['block_id' => 108, 'camera_id' => 737, 'slot_number' => '112', 'parking_lamp_id' => NULL],
            ['block_id' => 108, 'camera_id' => 737, 'slot_number' => '113', 'parking_lamp_id' => NULL],

            ['block_id' => 108, 'camera_id' => 736, 'slot_number' => '114', 'parking_lamp_id' => NULL],
            ['block_id' => 108, 'camera_id' => 736, 'slot_number' => '115', 'parking_lamp_id' => NULL],
            ['block_id' => 108, 'camera_id' => 736, 'slot_number' => '116', 'parking_lamp_id' => NULL],

            ['block_id' => 108, 'camera_id' => 735, 'slot_number' => '117', 'parking_lamp_id' => NULL],
            ['block_id' => 108, 'camera_id' => 735, 'slot_number' => '118', 'parking_lamp_id' => NULL],
            ['block_id' => 108, 'camera_id' => 735, 'slot_number' => '119', 'parking_lamp_id' => NULL],

            ['block_id' => 108, 'camera_id' => 734, 'slot_number' => '120', 'parking_lamp_id' => NULL],
            ['block_id' => 108, 'camera_id' => 734, 'slot_number' => '121', 'parking_lamp_id' => NULL],
            ['block_id' => 108, 'camera_id' => 734, 'slot_number' => '122', 'parking_lamp_id' => NULL],

            // Solar3-N1 Block set 30 slot with camera and Lamp.

            ['block_id' => 109, 'camera_id' => 775, 'slot_number' => '1', 'parking_lamp_id' => NULL],
            ['block_id' => 109, 'camera_id' => 775, 'slot_number' => '2', 'parking_lamp_id' => NULL],
            ['block_id' => 109, 'camera_id' => 775, 'slot_number' => '3', 'parking_lamp_id' => NULL],

            ['block_id' => 109, 'camera_id' => 774, 'slot_number' => '4', 'parking_lamp_id' => NULL],
            ['block_id' => 109, 'camera_id' => 774, 'slot_number' => '5', 'parking_lamp_id' => NULL],
            ['block_id' => 109, 'camera_id' => 774, 'slot_number' => '6', 'parking_lamp_id' => NULL],

            ['block_id' => 109, 'camera_id' => 773, 'slot_number' => '7', 'parking_lamp_id' => NULL],
            ['block_id' => 109, 'camera_id' => 773, 'slot_number' => '8', 'parking_lamp_id' => NULL],
            ['block_id' => 109, 'camera_id' => 773, 'slot_number' => '9', 'parking_lamp_id' => NULL],

            ['block_id' => 109, 'camera_id' => 772, 'slot_number' => '10', 'parking_lamp_id' => NULL],
            ['block_id' => 109, 'camera_id' => 772, 'slot_number' => '11', 'parking_lamp_id' => NULL],
            ['block_id' => 109, 'camera_id' => 772, 'slot_number' => '12', 'parking_lamp_id' => NULL],

            ['block_id' => 109, 'camera_id' => 771, 'slot_number' => '13', 'parking_lamp_id' => NULL],
            ['block_id' => 109, 'camera_id' => 771, 'slot_number' => '14', 'parking_lamp_id' => NULL],
            ['block_id' => 109, 'camera_id' => 771, 'slot_number' => '15', 'parking_lamp_id' => NULL],

            ['block_id' => 109, 'camera_id' => 770, 'slot_number' => '16', 'parking_lamp_id' => NULL],
            ['block_id' => 109, 'camera_id' => 770, 'slot_number' => '17', 'parking_lamp_id' => NULL],
            ['block_id' => 109, 'camera_id' => 770, 'slot_number' => '18', 'parking_lamp_id' => NULL],

            ['block_id' => 109, 'camera_id' => 769, 'slot_number' => '19', 'parking_lamp_id' => NULL],
            ['block_id' => 109, 'camera_id' => 769, 'slot_number' => '20', 'parking_lamp_id' => NULL],
            ['block_id' => 109, 'camera_id' => 769, 'slot_number' => '21', 'parking_lamp_id' => NULL],

            ['block_id' => 109, 'camera_id' => 768, 'slot_number' => '22', 'parking_lamp_id' => NULL],
            ['block_id' => 109, 'camera_id' => 768, 'slot_number' => '23', 'parking_lamp_id' => NULL],
            ['block_id' => 109, 'camera_id' => 768, 'slot_number' => '24', 'parking_lamp_id' => NULL],

            ['block_id' => 109, 'camera_id' => 767, 'slot_number' => '25', 'parking_lamp_id' => NULL],
            ['block_id' => 109, 'camera_id' => 767, 'slot_number' => '26', 'parking_lamp_id' => NULL],
            ['block_id' => 109, 'camera_id' => 767, 'slot_number' => '27', 'parking_lamp_id' => NULL],

            ['block_id' => 109, 'camera_id' => 766, 'slot_number' => '28', 'parking_lamp_id' => NULL],
            ['block_id' => 109, 'camera_id' => 766, 'slot_number' => '29', 'parking_lamp_id' => NULL],
            ['block_id' => 109, 'camera_id' => 766, 'slot_number' => '30', 'parking_lamp_id' => NULL],

            // Solar3-N2 Block set 30 slot with camera and Lamp.

            ['block_id' => 110, 'camera_id' => 765, 'slot_number' => '31', 'parking_lamp_id' => NULL],
            ['block_id' => 110, 'camera_id' => 765, 'slot_number' => '32', 'parking_lamp_id' => NULL],
            ['block_id' => 110, 'camera_id' => 765, 'slot_number' => '33', 'parking_lamp_id' => NULL],

            ['block_id' => 110, 'camera_id' => 764, 'slot_number' => '34', 'parking_lamp_id' => NULL],
            ['block_id' => 110, 'camera_id' => 764, 'slot_number' => '35', 'parking_lamp_id' => NULL],
            ['block_id' => 110, 'camera_id' => 764, 'slot_number' => '36', 'parking_lamp_id' => NULL],

            ['block_id' => 110, 'camera_id' => 763, 'slot_number' => '37', 'parking_lamp_id' => NULL],
            ['block_id' => 110, 'camera_id' => 763, 'slot_number' => '38', 'parking_lamp_id' => NULL],
            ['block_id' => 110, 'camera_id' => 763, 'slot_number' => '39', 'parking_lamp_id' => NULL],

            ['block_id' => 110, 'camera_id' => 762, 'slot_number' => '40', 'parking_lamp_id' => NULL],
            ['block_id' => 110, 'camera_id' => 762, 'slot_number' => '41', 'parking_lamp_id' => NULL],
            ['block_id' => 110, 'camera_id' => 762, 'slot_number' => '42', 'parking_lamp_id' => NULL],

            ['block_id' => 110, 'camera_id' => 761, 'slot_number' => '43', 'parking_lamp_id' => NULL],
            ['block_id' => 110, 'camera_id' => 761, 'slot_number' => '44', 'parking_lamp_id' => NULL],
            ['block_id' => 110, 'camera_id' => 761, 'slot_number' => '45', 'parking_lamp_id' => NULL],

            ['block_id' => 110, 'camera_id' => 760, 'slot_number' => '46', 'parking_lamp_id' => NULL],
            ['block_id' => 110, 'camera_id' => 760, 'slot_number' => '47', 'parking_lamp_id' => NULL],
            ['block_id' => 110, 'camera_id' => 760, 'slot_number' => '48', 'parking_lamp_id' => NULL],

            ['block_id' => 110, 'camera_id' => 759, 'slot_number' => '49', 'parking_lamp_id' => NULL],
            ['block_id' => 110, 'camera_id' => 759, 'slot_number' => '50', 'parking_lamp_id' => NULL],
            ['block_id' => 110, 'camera_id' => 759, 'slot_number' => '51', 'parking_lamp_id' => NULL],

            ['block_id' => 110, 'camera_id' => 758, 'slot_number' => '52', 'parking_lamp_id' => NULL],
            ['block_id' => 110, 'camera_id' => 758, 'slot_number' => '53', 'parking_lamp_id' => NULL],
            ['block_id' => 110, 'camera_id' => 758, 'slot_number' => '54', 'parking_lamp_id' => NULL],

            ['block_id' => 110, 'camera_id' => 757, 'slot_number' => '55', 'parking_lamp_id' => NULL],
            ['block_id' => 110, 'camera_id' => 757, 'slot_number' => '56', 'parking_lamp_id' => NULL],
            ['block_id' => 110, 'camera_id' => 757, 'slot_number' => '57', 'parking_lamp_id' => NULL],

            ['block_id' => 110, 'camera_id' => 756, 'slot_number' => '58', 'parking_lamp_id' => NULL],
            ['block_id' => 110, 'camera_id' => 756, 'slot_number' => '59', 'parking_lamp_id' => NULL],
            ['block_id' => 110, 'camera_id' => 756, 'slot_number' => '60', 'parking_lamp_id' => NULL],

            // Solar4-N3 Block set 12 slot with camera and Lamp.

            ['block_id' => 111, 'camera_id' => 783, 'slot_number' => '61', 'parking_lamp_id' => NULL],
            ['block_id' => 111, 'camera_id' => 783, 'slot_number' => '62', 'parking_lamp_id' => NULL],
            ['block_id' => 111, 'camera_id' => 783, 'slot_number' => '63', 'parking_lamp_id' => NULL],

            ['block_id' => 111, 'camera_id' => 782, 'slot_number' => '64', 'parking_lamp_id' => NULL],
            ['block_id' => 111, 'camera_id' => 782, 'slot_number' => '65', 'parking_lamp_id' => NULL],
            ['block_id' => 111, 'camera_id' => 782, 'slot_number' => '66', 'parking_lamp_id' => NULL],

            ['block_id' => 111, 'camera_id' => 781, 'slot_number' => '67', 'parking_lamp_id' => NULL],
            ['block_id' => 111, 'camera_id' => 781, 'slot_number' => '68', 'parking_lamp_id' => NULL],
            ['block_id' => 111, 'camera_id' => 781, 'slot_number' => '69', 'parking_lamp_id' => NULL],

            ['block_id' => 111, 'camera_id' => 780, 'slot_number' => '70', 'parking_lamp_id' => NULL],
            ['block_id' => 111, 'camera_id' => 780, 'slot_number' => '71', 'parking_lamp_id' => NULL],
            ['block_id' => 111, 'camera_id' => 780, 'slot_number' => '72', 'parking_lamp_id' => NULL],

            // Solar4-N4 Block set 12 slot with camera and Lamp.
            ['block_id' => 112, 'camera_id' => 779, 'slot_number' => '73', 'parking_lamp_id' => NULL],
            ['block_id' => 112, 'camera_id' => 779, 'slot_number' => '74', 'parking_lamp_id' => NULL],
            ['block_id' => 112, 'camera_id' => 779, 'slot_number' => '75', 'parking_lamp_id' => NULL],

            ['block_id' => 112, 'camera_id' => 778, 'slot_number' => '76', 'parking_lamp_id' => NULL],
            ['block_id' => 112, 'camera_id' => 778, 'slot_number' => '77', 'parking_lamp_id' => NULL],
            ['block_id' => 112, 'camera_id' => 778, 'slot_number' => '78', 'parking_lamp_id' => NULL],

            ['block_id' => 112, 'camera_id' => 777, 'slot_number' => '79', 'parking_lamp_id' => NULL],
            ['block_id' => 112, 'camera_id' => 777, 'slot_number' => '80', 'parking_lamp_id' => NULL],
            ['block_id' => 112, 'camera_id' => 777, 'slot_number' => '81', 'parking_lamp_id' => NULL],

            ['block_id' => 112, 'camera_id' => 776, 'slot_number' => '82', 'parking_lamp_id' => NULL],
            ['block_id' => 112, 'camera_id' => 776, 'slot_number' => '83', 'parking_lamp_id' => NULL],
            ['block_id' => 112, 'camera_id' => 776, 'slot_number' => '84', 'parking_lamp_id' => NULL],

            // Solar3-O1 Block set 30 slot with camera and Lamp.

            ['block_id' => 113, 'camera_id' => 803, 'slot_number' => '1', 'parking_lamp_id' => NULL],
            ['block_id' => 113, 'camera_id' => 803, 'slot_number' => '2', 'parking_lamp_id' => NULL],
            ['block_id' => 113, 'camera_id' => 803, 'slot_number' => '3', 'parking_lamp_id' => NULL],

            ['block_id' => 113, 'camera_id' => 802, 'slot_number' => '4', 'parking_lamp_id' => NULL],
            ['block_id' => 113, 'camera_id' => 802, 'slot_number' => '5', 'parking_lamp_id' => NULL],
            ['block_id' => 113, 'camera_id' => 802, 'slot_number' => '6', 'parking_lamp_id' => NULL],

            ['block_id' => 113, 'camera_id' => 801, 'slot_number' => '7', 'parking_lamp_id' => NULL],
            ['block_id' => 113, 'camera_id' => 801, 'slot_number' => '8', 'parking_lamp_id' => NULL],
            ['block_id' => 113, 'camera_id' => 801, 'slot_number' => '9', 'parking_lamp_id' => NULL],

            ['block_id' => 113, 'camera_id' => 800, 'slot_number' => '10', 'parking_lamp_id' => NULL],
            ['block_id' => 113, 'camera_id' => 800, 'slot_number' => '11', 'parking_lamp_id' => NULL],
            ['block_id' => 113, 'camera_id' => 800, 'slot_number' => '12', 'parking_lamp_id' => NULL],

            ['block_id' => 113, 'camera_id' => 799, 'slot_number' => '13', 'parking_lamp_id' => NULL],
            ['block_id' => 113, 'camera_id' => 799, 'slot_number' => '14', 'parking_lamp_id' => NULL],
            ['block_id' => 113, 'camera_id' => 799, 'slot_number' => '15', 'parking_lamp_id' => NULL],

            ['block_id' => 113, 'camera_id' => 798, 'slot_number' => '16', 'parking_lamp_id' => NULL],
            ['block_id' => 113, 'camera_id' => 798, 'slot_number' => '17', 'parking_lamp_id' => NULL],
            ['block_id' => 113, 'camera_id' => 798, 'slot_number' => '18', 'parking_lamp_id' => NULL],

            ['block_id' => 113, 'camera_id' => 797, 'slot_number' => '19', 'parking_lamp_id' => NULL],
            ['block_id' => 113, 'camera_id' => 797, 'slot_number' => '20', 'parking_lamp_id' => NULL],
            ['block_id' => 113, 'camera_id' => 797, 'slot_number' => '21', 'parking_lamp_id' => NULL],

            ['block_id' => 113, 'camera_id' => 796, 'slot_number' => '22', 'parking_lamp_id' => NULL],
            ['block_id' => 113, 'camera_id' => 796, 'slot_number' => '23', 'parking_lamp_id' => NULL],
            ['block_id' => 113, 'camera_id' => 796, 'slot_number' => '24', 'parking_lamp_id' => NULL],

            ['block_id' => 113, 'camera_id' => 795, 'slot_number' => '25', 'parking_lamp_id' => NULL],
            ['block_id' => 113, 'camera_id' => 795, 'slot_number' => '26', 'parking_lamp_id' => NULL],
            ['block_id' => 113, 'camera_id' => 795, 'slot_number' => '27', 'parking_lamp_id' => NULL],

            ['block_id' => 113, 'camera_id' => 794, 'slot_number' => '28', 'parking_lamp_id' => NULL],
            ['block_id' => 113, 'camera_id' => 794, 'slot_number' => '29', 'parking_lamp_id' => NULL],
            ['block_id' => 113, 'camera_id' => 794, 'slot_number' => '30', 'parking_lamp_id' => NULL],

            // Solar3-O2 Block set 30 slot with camera and Lamp.

            ['block_id' => 114, 'camera_id' => 793, 'slot_number' => '31', 'parking_lamp_id' => NULL],
            ['block_id' => 114, 'camera_id' => 793, 'slot_number' => '32', 'parking_lamp_id' => NULL],
            ['block_id' => 114, 'camera_id' => 793, 'slot_number' => '33', 'parking_lamp_id' => NULL],

            ['block_id' => 114, 'camera_id' => 792, 'slot_number' => '34', 'parking_lamp_id' => NULL],
            ['block_id' => 114, 'camera_id' => 792, 'slot_number' => '35', 'parking_lamp_id' => NULL],
            ['block_id' => 114, 'camera_id' => 792, 'slot_number' => '36', 'parking_lamp_id' => NULL],

            ['block_id' => 114, 'camera_id' => 791, 'slot_number' => '37', 'parking_lamp_id' => NULL],
            ['block_id' => 114, 'camera_id' => 791, 'slot_number' => '38', 'parking_lamp_id' => NULL],
            ['block_id' => 114, 'camera_id' => 791, 'slot_number' => '39', 'parking_lamp_id' => NULL],

            ['block_id' => 114, 'camera_id' => 790, 'slot_number' => '40', 'parking_lamp_id' => NULL],
            ['block_id' => 114, 'camera_id' => 790, 'slot_number' => '41', 'parking_lamp_id' => NULL],
            ['block_id' => 114, 'camera_id' => 790, 'slot_number' => '42', 'parking_lamp_id' => NULL],

            ['block_id' => 114, 'camera_id' => 789, 'slot_number' => '43', 'parking_lamp_id' => NULL],
            ['block_id' => 114, 'camera_id' => 789, 'slot_number' => '44', 'parking_lamp_id' => NULL],
            ['block_id' => 114, 'camera_id' => 789, 'slot_number' => '45', 'parking_lamp_id' => NULL],

            ['block_id' => 114, 'camera_id' => 788, 'slot_number' => '46', 'parking_lamp_id' => NULL],
            ['block_id' => 114, 'camera_id' => 788, 'slot_number' => '47', 'parking_lamp_id' => NULL],
            ['block_id' => 114, 'camera_id' => 788, 'slot_number' => '48', 'parking_lamp_id' => NULL],

            ['block_id' => 114, 'camera_id' => 787, 'slot_number' => '49', 'parking_lamp_id' => NULL],
            ['block_id' => 114, 'camera_id' => 787, 'slot_number' => '50', 'parking_lamp_id' => NULL],
            ['block_id' => 114, 'camera_id' => 787, 'slot_number' => '51', 'parking_lamp_id' => NULL],

            ['block_id' => 114, 'camera_id' => 786, 'slot_number' => '52', 'parking_lamp_id' => NULL],
            ['block_id' => 114, 'camera_id' => 786, 'slot_number' => '53', 'parking_lamp_id' => NULL],
            ['block_id' => 114, 'camera_id' => 786, 'slot_number' => '54', 'parking_lamp_id' => NULL],

            ['block_id' => 114, 'camera_id' => 785, 'slot_number' => '55', 'parking_lamp_id' => NULL],
            ['block_id' => 114, 'camera_id' => 785, 'slot_number' => '56', 'parking_lamp_id' => NULL],
            ['block_id' => 114, 'camera_id' => 785, 'slot_number' => '57', 'parking_lamp_id' => NULL],

            ['block_id' => 114, 'camera_id' => 784, 'slot_number' => '58', 'parking_lamp_id' => NULL],
            ['block_id' => 114, 'camera_id' => 784, 'slot_number' => '59', 'parking_lamp_id' => NULL],
            ['block_id' => 114, 'camera_id' => 784, 'slot_number' => '60', 'parking_lamp_id' => NULL],

            // AA1 Block set 24 slot with camera and Lamp.
            ['block_id' => 115, 'camera_id' => 819, 'slot_number' => '1', 'parking_lamp_id' => 1],
            ['block_id' => 115, 'camera_id' => 819, 'slot_number' => '2', 'parking_lamp_id' => 1],
            ['block_id' => 115, 'camera_id' => 819, 'slot_number' => '3', 'parking_lamp_id' => 1],
 
            ['block_id' => 115, 'camera_id' => 818, 'slot_number' => '4', 'parking_lamp_id' => 1],
            ['block_id' => 115, 'camera_id' => 818, 'slot_number' => '5', 'parking_lamp_id' => 1 ],
            ['block_id' => 115, 'camera_id' => 818, 'slot_number' => '6', 'parking_lamp_id' => 1],
 
            ['block_id' => 115, 'camera_id' => 817, 'slot_number' => '7', 'parking_lamp_id' => 2],
            ['block_id' => 115, 'camera_id' => 817, 'slot_number' => '8', 'parking_lamp_id' => 2],
            ['block_id' => 115, 'camera_id' => 817, 'slot_number' => '9', 'parking_lamp_id' => 2],
 
            ['block_id' => 115, 'camera_id' => 816, 'slot_number' => '10', 'parking_lamp_id' => 2],
            ['block_id' => 115, 'camera_id' => 816, 'slot_number' => '11', 'parking_lamp_id' => 2],
            ['block_id' => 115, 'camera_id' => 816, 'slot_number' => '12', 'parking_lamp_id' => 2],
 
            ['block_id' => 115, 'camera_id' => 815, 'slot_number' => '13', 'parking_lamp_id' => 3],
            ['block_id' => 115, 'camera_id' => 815, 'slot_number' => '14', 'parking_lamp_id' => 3],
            ['block_id' => 115, 'camera_id' => 815, 'slot_number' => '15', 'parking_lamp_id' => 3],
 
            ['block_id' => 115, 'camera_id' => 814, 'slot_number' => '16', 'parking_lamp_id' => 3],
            ['block_id' => 115, 'camera_id' => 814, 'slot_number' => '17', 'parking_lamp_id' => 3],
            ['block_id' => 115, 'camera_id' => 814, 'slot_number' => '18', 'parking_lamp_id' => 3],
 
            ['block_id' => 115, 'camera_id' => 813, 'slot_number' => '19', 'parking_lamp_id' => 4],
            ['block_id' => 115, 'camera_id' => 813, 'slot_number' => '20', 'parking_lamp_id' => 4],
            ['block_id' => 115, 'camera_id' => 813, 'slot_number' => '21', 'parking_lamp_id' => 4],
 
            ['block_id' => 115, 'camera_id' => 812, 'slot_number' => '22', 'parking_lamp_id' => 4],
            ['block_id' => 115, 'camera_id' => 812, 'slot_number' => '23', 'parking_lamp_id' => 4],
            ['block_id' => 115, 'camera_id' => 812, 'slot_number' => '24', 'parking_lamp_id' => 4],
 
            // AA2 Block set 24 slot with camera and Lamp.
            ['block_id' => 116, 'camera_id' => 811, 'slot_number' => '25', 'parking_lamp_id' => 5],
            ['block_id' => 116, 'camera_id' => 811, 'slot_number' => '26', 'parking_lamp_id' => 5],
            ['block_id' => 116, 'camera_id' => 811, 'slot_number' => '27', 'parking_lamp_id' => 5],
 
            ['block_id' => 116, 'camera_id' => 810, 'slot_number' => '28', 'parking_lamp_id' => 5],
            ['block_id' => 116, 'camera_id' => 810, 'slot_number' => '29', 'parking_lamp_id' => 5],
            ['block_id' => 116, 'camera_id' => 810, 'slot_number' => '30', 'parking_lamp_id' => 5],
 
            ['block_id' => 116, 'camera_id' => 809, 'slot_number' => '31', 'parking_lamp_id' => 6],
            ['block_id' => 116, 'camera_id' => 809, 'slot_number' => '32', 'parking_lamp_id' => 6],
            ['block_id' => 116, 'camera_id' => 809, 'slot_number' => '33', 'parking_lamp_id' => 6],
 
            ['block_id' => 116, 'camera_id' => 808, 'slot_number' => '34', 'parking_lamp_id' => 6],
            ['block_id' => 116, 'camera_id' => 808, 'slot_number' => '35', 'parking_lamp_id' => 6],
            ['block_id' => 116, 'camera_id' => 808, 'slot_number' => '36', 'parking_lamp_id' => 6],
 
            ['block_id' => 116, 'camera_id' => 807, 'slot_number' => '37', 'parking_lamp_id' => 7],
            ['block_id' => 116, 'camera_id' => 807, 'slot_number' => '38', 'parking_lamp_id' => 7],
            ['block_id' => 116, 'camera_id' => 807, 'slot_number' => '39', 'parking_lamp_id' => 7],
 
            ['block_id' => 116, 'camera_id' => 806, 'slot_number' => '40', 'parking_lamp_id' => 7],
            ['block_id' => 116, 'camera_id' => 806, 'slot_number' => '41', 'parking_lamp_id' => 7],
            ['block_id' => 116, 'camera_id' => 806, 'slot_number' => '42', 'parking_lamp_id' => 7],
 
            ['block_id' => 116, 'camera_id' => 805, 'slot_number' => '43', 'parking_lamp_id' => 8],
            ['block_id' => 116, 'camera_id' => 805, 'slot_number' => '44', 'parking_lamp_id' => 8],
            ['block_id' => 116, 'camera_id' => 805, 'slot_number' => '45', 'parking_lamp_id' => 8],
 
            ['block_id' => 116, 'camera_id' => 804, 'slot_number' => '46', 'parking_lamp_id' => 8],
            ['block_id' => 116, 'camera_id' => 804, 'slot_number' => '47', 'parking_lamp_id' => 8],
            ['block_id' => 116, 'camera_id' => 804, 'slot_number' => '48', 'parking_lamp_id' => 8],
 
            // AB1 Block set 21 slot with camera and Lamp.
            ['block_id' => 117, 'camera_id' => 842, 'slot_number' => '1', 'parking_lamp_id' => 9],
            ['block_id' => 117, 'camera_id' => 842, 'slot_number' => '2', 'parking_lamp_id' => 9],
            ['block_id' => 117, 'camera_id' => 842, 'slot_number' => '3', 'parking_lamp_id' => 9],
  
            ['block_id' => 117, 'camera_id' => 841, 'slot_number' => '4', 'parking_lamp_id' => 10],
            ['block_id' => 117, 'camera_id' => 841, 'slot_number' => '5', 'parking_lamp_id' => 10],
            ['block_id' => 117, 'camera_id' => 841, 'slot_number' => '6', 'parking_lamp_id' => 10],
  
            ['block_id' => 117, 'camera_id' => 840, 'slot_number' => '7', 'parking_lamp_id' => 10],
            ['block_id' => 117, 'camera_id' => 840, 'slot_number' => '8', 'parking_lamp_id' => 10],
            ['block_id' => 117, 'camera_id' => 840, 'slot_number' => '9', 'parking_lamp_id' => 10],
  
            ['block_id' => 117, 'camera_id' => 839, 'slot_number' => '10', 'parking_lamp_id' => 11],
            ['block_id' => 117, 'camera_id' => 839, 'slot_number' => '11', 'parking_lamp_id' => 11],
            ['block_id' => 117, 'camera_id' => 839, 'slot_number' => '12', 'parking_lamp_id' => 11],
  
            ['block_id' => 117, 'camera_id' => 838, 'slot_number' => '13', 'parking_lamp_id' => 11],
            ['block_id' => 117, 'camera_id' => 838, 'slot_number' => '14', 'parking_lamp_id' => 11],
            ['block_id' => 117, 'camera_id' => 838, 'slot_number' => '15', 'parking_lamp_id' => 11],
  
            ['block_id' => 117, 'camera_id' => 837, 'slot_number' => '16', 'parking_lamp_id' => 12],
            ['block_id' => 117, 'camera_id' => 837, 'slot_number' => '17', 'parking_lamp_id' => 12],
            ['block_id' => 117, 'camera_id' => 837, 'slot_number' => '18', 'parking_lamp_id' => 12],
  
            ['block_id' => 117, 'camera_id' => 836, 'slot_number' => '19', 'parking_lamp_id' => 12],
            ['block_id' => 117, 'camera_id' => 836, 'slot_number' => '20', 'parking_lamp_id' => 12],
            ['block_id' => 117, 'camera_id' => 836, 'slot_number' => '21', 'parking_lamp_id' => 12],
            
            // AB2 Block set 21 slot with camera and Lamp.
            ['block_id' => 118, 'camera_id' => 849, 'slot_number' => '22', 'parking_lamp_id' => 13],
            ['block_id' => 118, 'camera_id' => 849, 'slot_number' => '23', 'parking_lamp_id' => 13],
            ['block_id' => 118, 'camera_id' => 849, 'slot_number' => '24', 'parking_lamp_id' => 13], 
  
            ['block_id' => 118, 'camera_id' => 848, 'slot_number' => '25', 'parking_lamp_id' => 13],
            ['block_id' => 118, 'camera_id' => 848, 'slot_number' => '26', 'parking_lamp_id' => 13],
            ['block_id' => 118, 'camera_id' => 848, 'slot_number' => '27', 'parking_lamp_id' => 13],
 
            ['block_id' => 118, 'camera_id' => 847, 'slot_number' => '28', 'parking_lamp_id' => 14],
            ['block_id' => 118, 'camera_id' => 847, 'slot_number' => '29', 'parking_lamp_id' => 14],
            ['block_id' => 118, 'camera_id' => 847, 'slot_number' => '30', 'parking_lamp_id' => 14],
  
            ['block_id' => 118, 'camera_id' => 846, 'slot_number' => '31', 'parking_lamp_id' => 14],
            ['block_id' => 118, 'camera_id' => 846, 'slot_number' => '32', 'parking_lamp_id' => 14],
            ['block_id' => 118, 'camera_id' => 846, 'slot_number' => '33', 'parking_lamp_id' => 14],
  
            ['block_id' => 118, 'camera_id' => 845, 'slot_number' => '34', 'parking_lamp_id' => 15],
            ['block_id' => 118, 'camera_id' => 845, 'slot_number' => '35', 'parking_lamp_id' => 15],
            ['block_id' => 118, 'camera_id' => 845, 'slot_number' => '36', 'parking_lamp_id' => 15],
  
            ['block_id' => 118, 'camera_id' => 844, 'slot_number' => '37', 'parking_lamp_id' => 15],
            ['block_id' => 118, 'camera_id' => 844, 'slot_number' => '38', 'parking_lamp_id' => 15],
            ['block_id' => 118, 'camera_id' => 844, 'slot_number' => '39', 'parking_lamp_id' => 15],
  
            ['block_id' => 118, 'camera_id' => 843, 'slot_number' => '40', 'parking_lamp_id' => 16],
            ['block_id' => 118, 'camera_id' => 843, 'slot_number' => '41', 'parking_lamp_id' => 16],
            ['block_id' => 118, 'camera_id' => 843, 'slot_number' => '42', 'parking_lamp_id' => 16],
            
            // AB3 Block set 24 slot with camera and Lamp.
            ['block_id' => 119, 'camera_id' => 835, 'slot_number' => '43', 'parking_lamp_id' => 17],
            ['block_id' => 119, 'camera_id' => 835, 'slot_number' => '44', 'parking_lamp_id' => 17],
            ['block_id' => 119, 'camera_id' => 835, 'slot_number' => '45', 'parking_lamp_id' => 17],
  
            ['block_id' => 119, 'camera_id' => 834, 'slot_number' => '46', 'parking_lamp_id' => 17],
            ['block_id' => 119, 'camera_id' => 834, 'slot_number' => '47', 'parking_lamp_id' => 17],
            ['block_id' => 119, 'camera_id' => 834, 'slot_number' => '48', 'parking_lamp_id' => 17],
 
            ['block_id' => 119, 'camera_id' => 833, 'slot_number' => '49', 'parking_lamp_id' => 18],
            ['block_id' => 119, 'camera_id' => 833, 'slot_number' => '50', 'parking_lamp_id' => 18],
            ['block_id' => 119, 'camera_id' => 833, 'slot_number' => '51', 'parking_lamp_id' => 18],
 
            ['block_id' => 119, 'camera_id' => 832, 'slot_number' => '52', 'parking_lamp_id' => 18],
            ['block_id' => 119, 'camera_id' => 832, 'slot_number' => '53', 'parking_lamp_id' => 18],
            ['block_id' => 119, 'camera_id' => 832, 'slot_number' => '54', 'parking_lamp_id' => 18],
 
            ['block_id' => 119, 'camera_id' => 831, 'slot_number' => '55', 'parking_lamp_id' => 19],
            ['block_id' => 119, 'camera_id' => 831, 'slot_number' => '56', 'parking_lamp_id' => 19],
            ['block_id' => 119, 'camera_id' => 831, 'slot_number' => '57', 'parking_lamp_id' => 19],
 
            ['block_id' => 119, 'camera_id' => 830, 'slot_number' => '58', 'parking_lamp_id' => 19],
            ['block_id' => 119, 'camera_id' => 830, 'slot_number' => '59', 'parking_lamp_id' => 19],
            ['block_id' => 119, 'camera_id' => 830, 'slot_number' => '60', 'parking_lamp_id' => 19],
 
            ['block_id' => 119, 'camera_id' => 829, 'slot_number' => '61', 'parking_lamp_id' => 20],
            ['block_id' => 119, 'camera_id' => 829, 'slot_number' => '62', 'parking_lamp_id' => 20],
            ['block_id' => 119, 'camera_id' => 829, 'slot_number' => '63', 'parking_lamp_id' => 20],
 
            ['block_id' => 119, 'camera_id' => 828, 'slot_number' => '64', 'parking_lamp_id' => 20],
            ['block_id' => 119, 'camera_id' => 828, 'slot_number' => '65', 'parking_lamp_id' => 20],
            ['block_id' => 119, 'camera_id' => 828, 'slot_number' => '66', 'parking_lamp_id' => 20],
 
            // AB4 Block set 24 slot with camera and Lamp.
            ['block_id' => 120, 'camera_id' => 827, 'slot_number' => '67', 'parking_lamp_id' => 21],
            ['block_id' => 120, 'camera_id' => 827, 'slot_number' => '68', 'parking_lamp_id' => 21],
            ['block_id' => 120, 'camera_id' => 827, 'slot_number' => '69', 'parking_lamp_id' => 21],
 
            ['block_id' => 120, 'camera_id' => 826, 'slot_number' => '70', 'parking_lamp_id' => 21],
            ['block_id' => 120, 'camera_id' => 826, 'slot_number' => '71', 'parking_lamp_id' => 21],
            ['block_id' => 120, 'camera_id' => 826, 'slot_number' => '72', 'parking_lamp_id' => 21],
 
            ['block_id' => 120, 'camera_id' => 825, 'slot_number' => '73', 'parking_lamp_id' => 22],
            ['block_id' => 120, 'camera_id' => 825, 'slot_number' => '74', 'parking_lamp_id' => 22],
            ['block_id' => 120, 'camera_id' => 825, 'slot_number' => '75', 'parking_lamp_id' => 22],
 
            ['block_id' => 120, 'camera_id' => 824, 'slot_number' => '76', 'parking_lamp_id' => 22],
            ['block_id' => 120, 'camera_id' => 824, 'slot_number' => '77', 'parking_lamp_id' => 22],
            ['block_id' => 120, 'camera_id' => 824, 'slot_number' => '78', 'parking_lamp_id' => 22],
 
            ['block_id' => 120, 'camera_id' => 823, 'slot_number' => '79', 'parking_lamp_id' => 23],
            ['block_id' => 120, 'camera_id' => 823, 'slot_number' => '80', 'parking_lamp_id' => 23],
            ['block_id' => 120, 'camera_id' => 823, 'slot_number' => '81', 'parking_lamp_id' => 23],
 
            ['block_id' => 120, 'camera_id' => 822, 'slot_number' => '82', 'parking_lamp_id' => 23],
            ['block_id' => 120, 'camera_id' => 822, 'slot_number' => '83', 'parking_lamp_id' => 23],
            ['block_id' => 120, 'camera_id' => 822, 'slot_number' => '84', 'parking_lamp_id' => 23],
 
            ['block_id' => 120, 'camera_id' => 821, 'slot_number' => '85', 'parking_lamp_id' => 24],
            ['block_id' => 120, 'camera_id' => 821, 'slot_number' => '86', 'parking_lamp_id' => 24],
            ['block_id' => 120, 'camera_id' => 821, 'slot_number' => '87', 'parking_lamp_id' => 24],
 
            ['block_id' => 120, 'camera_id' => 820, 'slot_number' => '88', 'parking_lamp_id' => 24],
            ['block_id' => 120, 'camera_id' => 820, 'slot_number' => '89', 'parking_lamp_id' => 24],
            ['block_id' => 120, 'camera_id' => 820, 'slot_number' => '90', 'parking_lamp_id' => 24],
 
            // AC1 Block set 21 slot with camera and Lamp.
            ['block_id' => 121, 'camera_id' => 872, 'slot_number' => '1', 'parking_lamp_id' => 25],
            ['block_id' => 121, 'camera_id' => 872, 'slot_number' => '2', 'parking_lamp_id' => 25],
            ['block_id' => 121, 'camera_id' => 872, 'slot_number' => '3', 'parking_lamp_id' => 25],
   
            ['block_id' => 121, 'camera_id' => 871, 'slot_number' => '4', 'parking_lamp_id' => 26],
            ['block_id' => 121, 'camera_id' => 871, 'slot_number' => '5', 'parking_lamp_id' => 26],
            ['block_id' => 121, 'camera_id' => 871, 'slot_number' => '6', 'parking_lamp_id' => 26],
   
            ['block_id' => 121, 'camera_id' => 870, 'slot_number' => '7', 'parking_lamp_id' => 26],
            ['block_id' => 121, 'camera_id' => 870, 'slot_number' => '8', 'parking_lamp_id' => 26],
            ['block_id' => 121, 'camera_id' => 870, 'slot_number' => '9', 'parking_lamp_id' => 26],
   
            ['block_id' => 121, 'camera_id' => 869, 'slot_number' => '10', 'parking_lamp_id' => 27],
            ['block_id' => 121, 'camera_id' => 869, 'slot_number' => '11', 'parking_lamp_id' => 27],
            ['block_id' => 121, 'camera_id' => 869, 'slot_number' => '12', 'parking_lamp_id' => 27],
   
            ['block_id' => 121, 'camera_id' => 868, 'slot_number' => '13', 'parking_lamp_id' => 27],
            ['block_id' => 121, 'camera_id' => 868, 'slot_number' => '14', 'parking_lamp_id' => 27],
            ['block_id' => 121, 'camera_id' => 868, 'slot_number' => '15', 'parking_lamp_id' => 27],
   
            ['block_id' => 121, 'camera_id' => 867, 'slot_number' => '16', 'parking_lamp_id' => 28],
            ['block_id' => 121, 'camera_id' => 867, 'slot_number' => '17', 'parking_lamp_id' => 28],
            ['block_id' => 121, 'camera_id' => 867, 'slot_number' => '18', 'parking_lamp_id' => 28],
   
            ['block_id' => 121, 'camera_id' => 866, 'slot_number' => '19', 'parking_lamp_id' => 28],
            ['block_id' => 121, 'camera_id' => 866, 'slot_number' => '20', 'parking_lamp_id' => 28],
            ['block_id' => 121, 'camera_id' => 866, 'slot_number' => '21', 'parking_lamp_id' => 28],
            
            // AC2 Block set 21 slot with camera and Lamp.
            ['block_id' => 122, 'camera_id' => 879, 'slot_number' => '22', 'parking_lamp_id' => 29],
            ['block_id' => 122, 'camera_id' => 879, 'slot_number' => '23', 'parking_lamp_id' => 29],
            ['block_id' => 122, 'camera_id' => 879, 'slot_number' => '24', 'parking_lamp_id' => 29],
   
            ['block_id' => 122, 'camera_id' => 878, 'slot_number' => '25', 'parking_lamp_id' => 29],
            ['block_id' => 122, 'camera_id' => 878, 'slot_number' => '26', 'parking_lamp_id' => 29],
            ['block_id' => 122, 'camera_id' => 878, 'slot_number' => '27', 'parking_lamp_id' => 29],
  
            ['block_id' => 122, 'camera_id' => 877, 'slot_number' => '28', 'parking_lamp_id' => 30],
            ['block_id' => 122, 'camera_id' => 877, 'slot_number' => '29', 'parking_lamp_id' => 30],
            ['block_id' => 122, 'camera_id' => 877, 'slot_number' => '30', 'parking_lamp_id' => 30],
   
            ['block_id' => 122, 'camera_id' => 876, 'slot_number' => '31', 'parking_lamp_id' => 30],
            ['block_id' => 122, 'camera_id' => 876, 'slot_number' => '32', 'parking_lamp_id' => 30],
            ['block_id' => 122, 'camera_id' => 876, 'slot_number' => '33', 'parking_lamp_id' => 30],
   
            ['block_id' => 122, 'camera_id' => 875, 'slot_number' => '34', 'parking_lamp_id' => 31],
            ['block_id' => 122, 'camera_id' => 875, 'slot_number' => '35', 'parking_lamp_id' => 31],
            ['block_id' => 122, 'camera_id' => 875, 'slot_number' => '36', 'parking_lamp_id' => 31],
 
            ['block_id' => 122, 'camera_id' => 874, 'slot_number' => '37', 'parking_lamp_id' => 31],
            ['block_id' => 122, 'camera_id' => 874, 'slot_number' => '38', 'parking_lamp_id' => 31],
            ['block_id' => 122, 'camera_id' => 874, 'slot_number' => '39', 'parking_lamp_id' => 31],
   
            ['block_id' => 122, 'camera_id' => 873, 'slot_number' => '40', 'parking_lamp_id' => 32],
            ['block_id' => 122, 'camera_id' => 873, 'slot_number' => '41', 'parking_lamp_id' => 32],
            ['block_id' => 122, 'camera_id' => 873, 'slot_number' => '42', 'parking_lamp_id' => 32],
 
            // AC3 Block set 24 slot with camera and Lamp.
            ['block_id' => 123, 'camera_id' => 865, 'slot_number' => '43', 'parking_lamp_id' => 33],
            ['block_id' => 123, 'camera_id' => 865, 'slot_number' => '44', 'parking_lamp_id' => 33],
            ['block_id' => 123, 'camera_id' => 865, 'slot_number' => '45', 'parking_lamp_id' => 33],
   
            ['block_id' => 123, 'camera_id' => 864, 'slot_number' => '46', 'parking_lamp_id' => 33],
            ['block_id' => 123, 'camera_id' => 864, 'slot_number' => '47', 'parking_lamp_id' => 33],
            ['block_id' => 123, 'camera_id' => 864, 'slot_number' => '48', 'parking_lamp_id' => 33],
 
            ['block_id' => 123, 'camera_id' => 863, 'slot_number' => '49', 'parking_lamp_id' => 34],
            ['block_id' => 123, 'camera_id' => 863, 'slot_number' => '50', 'parking_lamp_id' => 34],
            ['block_id' => 123, 'camera_id' => 863, 'slot_number' => '51', 'parking_lamp_id' => 34],
  
            ['block_id' => 123, 'camera_id' => 862, 'slot_number' => '52', 'parking_lamp_id' => 34],
            ['block_id' => 123, 'camera_id' => 862, 'slot_number' => '53', 'parking_lamp_id' => 34],
            ['block_id' => 123, 'camera_id' => 862, 'slot_number' => '54', 'parking_lamp_id' => 34],
  
            ['block_id' => 123, 'camera_id' => 861, 'slot_number' => '55', 'parking_lamp_id' => 35],
            ['block_id' => 123, 'camera_id' => 861, 'slot_number' => '56', 'parking_lamp_id' => 35],
            ['block_id' => 123, 'camera_id' => 861, 'slot_number' => '57', 'parking_lamp_id' => 35],
  
            ['block_id' => 123, 'camera_id' => 860, 'slot_number' => '58', 'parking_lamp_id' => 35],
            ['block_id' => 123, 'camera_id' => 860, 'slot_number' => '59', 'parking_lamp_id' => 35],
            ['block_id' => 123, 'camera_id' => 860, 'slot_number' => '60', 'parking_lamp_id' => 35],
  
            ['block_id' => 123, 'camera_id' => 859, 'slot_number' => '61', 'parking_lamp_id' => 36],
            ['block_id' => 123, 'camera_id' => 859, 'slot_number' => '62', 'parking_lamp_id' => 36],
            ['block_id' => 123, 'camera_id' => 859, 'slot_number' => '63', 'parking_lamp_id' => 36],
  
            ['block_id' => 123, 'camera_id' => 858, 'slot_number' => '64', 'parking_lamp_id' => 36],
            ['block_id' => 123, 'camera_id' => 858, 'slot_number' => '65', 'parking_lamp_id' => 36],
            ['block_id' => 123, 'camera_id' => 858, 'slot_number' => '66', 'parking_lamp_id' => 36],
            
            // AC4 Block set 21 slot with camera and Lamp.
            ['block_id' => 124, 'camera_id' => 857, 'slot_number' => '67', 'parking_lamp_id' => 37],
            ['block_id' => 124, 'camera_id' => 857, 'slot_number' => '68', 'parking_lamp_id' => 37],
            ['block_id' => 124, 'camera_id' => 857, 'slot_number' => '69', 'parking_lamp_id' => 37],
  
            ['block_id' => 124, 'camera_id' => 856, 'slot_number' => '70', 'parking_lamp_id' => 37],
            ['block_id' => 124, 'camera_id' => 856, 'slot_number' => '71', 'parking_lamp_id' => 37],
            ['block_id' => 124, 'camera_id' => 856, 'slot_number' => '72', 'parking_lamp_id' => 37],
  
            ['block_id' => 124, 'camera_id' => 855, 'slot_number' => '73', 'parking_lamp_id' => 38],
            ['block_id' => 124, 'camera_id' => 855, 'slot_number' => '74', 'parking_lamp_id' => 38],
            ['block_id' => 124, 'camera_id' => 855, 'slot_number' => '75', 'parking_lamp_id' => 38],
  
            ['block_id' => 124, 'camera_id' => 854, 'slot_number' => '76', 'parking_lamp_id' => 38],
            ['block_id' => 124, 'camera_id' => 854, 'slot_number' => '77', 'parking_lamp_id' => 38],
            ['block_id' => 124, 'camera_id' => 854, 'slot_number' => '78', 'parking_lamp_id' => 38],
  
            ['block_id' => 124, 'camera_id' => 853, 'slot_number' => '79', 'parking_lamp_id' => 39],
            ['block_id' => 124, 'camera_id' => 853, 'slot_number' => '80', 'parking_lamp_id' => 39],
            ['block_id' => 124, 'camera_id' => 853, 'slot_number' => '81', 'parking_lamp_id' => 39],
  
            ['block_id' => 124, 'camera_id' => 852, 'slot_number' => '82', 'parking_lamp_id' => 39],
            ['block_id' => 124, 'camera_id' => 852, 'slot_number' => '83', 'parking_lamp_id' => 39],
            ['block_id' => 124, 'camera_id' => 852, 'slot_number' => '84', 'parking_lamp_id' => 39],
  
            ['block_id' => 124, 'camera_id' => 851, 'slot_number' => '85', 'parking_lamp_id' => 40],
            ['block_id' => 124, 'camera_id' => 851, 'slot_number' => '86', 'parking_lamp_id' => 40],
            ['block_id' => 124, 'camera_id' => 851, 'slot_number' => '87', 'parking_lamp_id' => 40],
  
            ['block_id' => 124, 'camera_id' => 850, 'slot_number' => '88', 'parking_lamp_id' => 40],
            ['block_id' => 124, 'camera_id' => 850, 'slot_number' => '89', 'parking_lamp_id' => 40],
            ['block_id' => 124, 'camera_id' => 850, 'slot_number' => '90', 'parking_lamp_id' => 40],
 
            // AD1 Block set 24 slot number with camera and Lamp.
            ['block_id' => 125, 'camera_id' => 903, 'slot_number' => '1', 'parking_lamp_id' => 41],
            ['block_id' => 125, 'camera_id' => 903, 'slot_number' => '2', 'parking_lamp_id' => 41],
            ['block_id' => 125, 'camera_id' => 903, 'slot_number' => '3', 'parking_lamp_id' => 41],
    
            ['block_id' => 125, 'camera_id' => 902, 'slot_number' => '4', 'parking_lamp_id' => 41],
            ['block_id' => 125, 'camera_id' => 902, 'slot_number' => '5', 'parking_lamp_id' => 41],
            ['block_id' => 125, 'camera_id' => 902, 'slot_number' => '6', 'parking_lamp_id' => 41],
    
            ['block_id' => 125, 'camera_id' => 901, 'slot_number' => '7', 'parking_lamp_id' => 42],
            ['block_id' => 125, 'camera_id' => 901, 'slot_number' => '8', 'parking_lamp_id' => 42],
            ['block_id' => 125, 'camera_id' => 901, 'slot_number' => '9', 'parking_lamp_id' => 42],
    
            ['block_id' => 125, 'camera_id' => 900, 'slot_number' => '10', 'parking_lamp_id' => 42],
            ['block_id' => 125, 'camera_id' => 900, 'slot_number' => '11', 'parking_lamp_id' => 42],
            ['block_id' => 125, 'camera_id' => 900, 'slot_number' => '12', 'parking_lamp_id' => 42],
    
            ['block_id' => 125, 'camera_id' => 899, 'slot_number' => '13', 'parking_lamp_id' => 43],
            ['block_id' => 125, 'camera_id' => 899, 'slot_number' => '14', 'parking_lamp_id' => 43],
            ['block_id' => 125, 'camera_id' => 899, 'slot_number' => '15', 'parking_lamp_id' => 43],
    
            ['block_id' => 125, 'camera_id' => 898, 'slot_number' => '16', 'parking_lamp_id' => 43],
            ['block_id' => 125, 'camera_id' => 898, 'slot_number' => '17', 'parking_lamp_id' => 43],
            ['block_id' => 125, 'camera_id' => 898, 'slot_number' => '18', 'parking_lamp_id' => 43],
    
            ['block_id' => 125, 'camera_id' => 897, 'slot_number' => '19', 'parking_lamp_id' => 44],
            ['block_id' => 125, 'camera_id' => 897, 'slot_number' => '20', 'parking_lamp_id' => 44],
            ['block_id' => 125, 'camera_id' => 897, 'slot_number' => '21', 'parking_lamp_id' => 44],
    
            ['block_id' => 125, 'camera_id' => 896, 'slot_number' => '22', 'parking_lamp_id' => 44],
            ['block_id' => 125, 'camera_id' => 896, 'slot_number' => '23', 'parking_lamp_id' => 44],
            ['block_id' => 125, 'camera_id' => 896, 'slot_number' => '24', 'parking_lamp_id' => 44],
 
            // AD2 Block set 24 slot number with camera and Lamp.
            ['block_id' => 126, 'camera_id' => 911, 'slot_number' => '25', 'parking_lamp_id' => 45],
            ['block_id' => 126, 'camera_id' => 911, 'slot_number' => '26', 'parking_lamp_id' => 45],
            ['block_id' => 126, 'camera_id' => 911, 'slot_number' => '27', 'parking_lamp_id' => 45],
   
            ['block_id' => 126, 'camera_id' => 910, 'slot_number' => '28', 'parking_lamp_id' => 45],
            ['block_id' => 126, 'camera_id' => 910, 'slot_number' => '29', 'parking_lamp_id' => 45],
            ['block_id' => 126, 'camera_id' => 910, 'slot_number' => '30', 'parking_lamp_id' => 45],
    
            ['block_id' => 126, 'camera_id' => 909, 'slot_number' => '31', 'parking_lamp_id' => 46],
            ['block_id' => 126, 'camera_id' => 909, 'slot_number' => '32', 'parking_lamp_id' => 46],
            ['block_id' => 126, 'camera_id' => 909, 'slot_number' => '33', 'parking_lamp_id' => 46],
    
            ['block_id' => 126, 'camera_id' => 908, 'slot_number' => '34', 'parking_lamp_id' => 46],
            ['block_id' => 126, 'camera_id' => 908, 'slot_number' => '35', 'parking_lamp_id' => 46],
            ['block_id' => 126, 'camera_id' => 908, 'slot_number' => '36', 'parking_lamp_id' => 46],
    
            ['block_id' => 126, 'camera_id' => 907, 'slot_number' => '37', 'parking_lamp_id' => 47],
            ['block_id' => 126, 'camera_id' => 907, 'slot_number' => '38', 'parking_lamp_id' => 47],
            ['block_id' => 126, 'camera_id' => 907, 'slot_number' => '39', 'parking_lamp_id' => 47],
    
            ['block_id' => 126, 'camera_id' => 906, 'slot_number' => '40', 'parking_lamp_id' => 47],
            ['block_id' => 126, 'camera_id' => 906, 'slot_number' => '41', 'parking_lamp_id' => 47],
            ['block_id' => 126, 'camera_id' => 906, 'slot_number' => '42', 'parking_lamp_id' => 47],
    
            ['block_id' => 126, 'camera_id' => 905, 'slot_number' => '43', 'parking_lamp_id' => 48],
            ['block_id' => 126, 'camera_id' => 905, 'slot_number' => '44', 'parking_lamp_id' => 48],
            ['block_id' => 126, 'camera_id' => 905, 'slot_number' => '45', 'parking_lamp_id' => 48],
 
            ['block_id' => 126, 'camera_id' => 904, 'slot_number' => '46', 'parking_lamp_id' => 48],
            ['block_id' => 126, 'camera_id' => 904, 'slot_number' => '47', 'parking_lamp_id' => 48],
            ['block_id' => 126, 'camera_id' => 904, 'slot_number' => '48', 'parking_lamp_id' => 48],
            
            // AD3 Block set 24 slot number with camera and Lamp.
            ['block_id' => 127, 'camera_id' => 895, 'slot_number' => '49', 'parking_lamp_id' => 49],
            ['block_id' => 127, 'camera_id' => 895, 'slot_number' => '50', 'parking_lamp_id' => 49],
            ['block_id' => 127, 'camera_id' => 895, 'slot_number' => '51', 'parking_lamp_id' => 49],
 
            ['block_id' => 127, 'camera_id' => 894, 'slot_number' => '52', 'parking_lamp_id' => 49],
            ['block_id' => 127, 'camera_id' => 894, 'slot_number' => '53', 'parking_lamp_id' => 49],
            ['block_id' => 127, 'camera_id' => 894, 'slot_number' => '54', 'parking_lamp_id' => 49],
   
            ['block_id' => 127, 'camera_id' => 893, 'slot_number' => '55', 'parking_lamp_id' => 50],
            ['block_id' => 127, 'camera_id' => 893, 'slot_number' => '56', 'parking_lamp_id' => 50],
            ['block_id' => 127, 'camera_id' => 893, 'slot_number' => '57', 'parking_lamp_id' => 50],
 
            ['block_id' => 127, 'camera_id' => 892, 'slot_number' => '58', 'parking_lamp_id' => 50],
            ['block_id' => 127, 'camera_id' => 892, 'slot_number' => '59', 'parking_lamp_id' => 50],
            ['block_id' => 127, 'camera_id' => 892, 'slot_number' => '60', 'parking_lamp_id' => 50],
   
            ['block_id' => 127, 'camera_id' => 891, 'slot_number' => '61', 'parking_lamp_id' => 51],
            ['block_id' => 127, 'camera_id' => 891, 'slot_number' => '62', 'parking_lamp_id' => 51],
            ['block_id' => 127, 'camera_id' => 891, 'slot_number' => '63', 'parking_lamp_id' => 51],
   
            ['block_id' => 127, 'camera_id' => 890, 'slot_number' => '64', 'parking_lamp_id' => 51],
            ['block_id' => 127, 'camera_id' => 890, 'slot_number' => '65', 'parking_lamp_id' => 51],
            ['block_id' => 127, 'camera_id' => 890, 'slot_number' => '66', 'parking_lamp_id' => 51],
   
            ['block_id' => 127, 'camera_id' => 889, 'slot_number' => '67', 'parking_lamp_id' => 52],
            ['block_id' => 127, 'camera_id' => 889, 'slot_number' => '68', 'parking_lamp_id' => 52],
            ['block_id' => 127, 'camera_id' => 889, 'slot_number' => '69', 'parking_lamp_id' => 52],
   
            ['block_id' => 127, 'camera_id' => 888, 'slot_number' => '70', 'parking_lamp_id' => 52],
            ['block_id' => 127, 'camera_id' => 888, 'slot_number' => '71', 'parking_lamp_id' => 52],
            ['block_id' => 127, 'camera_id' => 888, 'slot_number' => '72', 'parking_lamp_id' => 52],
            
            // AD4 Block set 24 slot number with camera and Lamp.
            ['block_id' => 128, 'camera_id' => 887, 'slot_number' => '73', 'parking_lamp_id' => 53],
            ['block_id' => 128, 'camera_id' => 887, 'slot_number' => '74', 'parking_lamp_id' => 53],
            ['block_id' => 128, 'camera_id' => 887, 'slot_number' => '75', 'parking_lamp_id' => 53],
 
            ['block_id' => 128, 'camera_id' => 886, 'slot_number' => '76', 'parking_lamp_id' => 53],
            ['block_id' => 128, 'camera_id' => 886, 'slot_number' => '77', 'parking_lamp_id' => 53],
            ['block_id' => 128, 'camera_id' => 886, 'slot_number' => '78', 'parking_lamp_id' => 53],
   
            ['block_id' => 128, 'camera_id' => 885, 'slot_number' => '79', 'parking_lamp_id' => 54],
            ['block_id' => 128, 'camera_id' => 885, 'slot_number' => '80', 'parking_lamp_id' => 54],
            ['block_id' => 128, 'camera_id' => 885, 'slot_number' => '81', 'parking_lamp_id' => 54],
   
            ['block_id' => 128, 'camera_id' => 884, 'slot_number' => '82', 'parking_lamp_id' => 54],
            ['block_id' => 128, 'camera_id' => 884, 'slot_number' => '83', 'parking_lamp_id' => 54],
            ['block_id' => 128, 'camera_id' => 884, 'slot_number' => '84', 'parking_lamp_id' => 54],
   
            ['block_id' => 128, 'camera_id' => 883, 'slot_number' => '85', 'parking_lamp_id' => 55],
            ['block_id' => 128, 'camera_id' => 883, 'slot_number' => '86', 'parking_lamp_id' => 55],
            ['block_id' => 128, 'camera_id' => 883, 'slot_number' => '87', 'parking_lamp_id' => 55],
   
            ['block_id' => 128, 'camera_id' => 882, 'slot_number' => '88', 'parking_lamp_id' => 55],
            ['block_id' => 128, 'camera_id' => 882, 'slot_number' => '89', 'parking_lamp_id' => 55],
            ['block_id' => 128, 'camera_id' => 882, 'slot_number' => '90', 'parking_lamp_id' => 55],
 
            ['block_id' => 128, 'camera_id' => 881, 'slot_number' => '91', 'parking_lamp_id' => 56],
            ['block_id' => 128, 'camera_id' => 881, 'slot_number' => '92', 'parking_lamp_id' => 56],
            ['block_id' => 128, 'camera_id' => 881, 'slot_number' => '93', 'parking_lamp_id' => 56],
   
            ['block_id' => 128, 'camera_id' => 880, 'slot_number' => '94', 'parking_lamp_id' => 56],
            ['block_id' => 128, 'camera_id' => 880, 'slot_number' => '95', 'parking_lamp_id' => 56],
            ['block_id' => 128, 'camera_id' => 880, 'slot_number' => '96', 'parking_lamp_id' => 56],
 
            // AE1 Block set 24 slot with camera and Lamp.
            ['block_id' => 129, 'camera_id' => 935, 'slot_number' => '1', 'parking_lamp_id' => 57],
            ['block_id' => 129, 'camera_id' => 935, 'slot_number' => '2', 'parking_lamp_id' => 57],
            ['block_id' => 129, 'camera_id' => 935, 'slot_number' => '3', 'parking_lamp_id' => 57],
     
            ['block_id' => 129, 'camera_id' => 934, 'slot_number' => '4', 'parking_lamp_id' => 57],
            ['block_id' => 129, 'camera_id' => 934, 'slot_number' => '5', 'parking_lamp_id' => 57],
            ['block_id' => 129, 'camera_id' => 934, 'slot_number' => '6', 'parking_lamp_id' => 57],
     
            ['block_id' => 129, 'camera_id' => 933, 'slot_number' => '7', 'parking_lamp_id' => 58],
            ['block_id' => 129, 'camera_id' => 933, 'slot_number' => '8', 'parking_lamp_id' => 58],
            ['block_id' => 129, 'camera_id' => 933, 'slot_number' => '9', 'parking_lamp_id' => 58],
     
            ['block_id' => 129, 'camera_id' => 932, 'slot_number' => '10', 'parking_lamp_id' => 58],
            ['block_id' => 129, 'camera_id' => 932, 'slot_number' => '11', 'parking_lamp_id' => 58],
            ['block_id' => 129, 'camera_id' => 932, 'slot_number' => '12', 'parking_lamp_id' => 58],
     
            ['block_id' => 129, 'camera_id' => 931, 'slot_number' => '13', 'parking_lamp_id' => 59],
            ['block_id' => 129, 'camera_id' => 931, 'slot_number' => '14', 'parking_lamp_id' => 59],
            ['block_id' => 129, 'camera_id' => 931, 'slot_number' => '15', 'parking_lamp_id' => 59],
     
            ['block_id' => 129, 'camera_id' => 930, 'slot_number' => '16', 'parking_lamp_id' => 59],
            ['block_id' => 129, 'camera_id' => 930, 'slot_number' => '17', 'parking_lamp_id' => 59],
            ['block_id' => 129, 'camera_id' => 930, 'slot_number' => '18', 'parking_lamp_id' => 59],
     
            ['block_id' => 129, 'camera_id' => 929, 'slot_number' => '19', 'parking_lamp_id' => 60],
            ['block_id' => 129, 'camera_id' => 929, 'slot_number' => '20', 'parking_lamp_id' => 60],
            ['block_id' => 129, 'camera_id' => 929, 'slot_number' => '21', 'parking_lamp_id' => 60],
     
            ['block_id' => 129, 'camera_id' => 928, 'slot_number' => '22', 'parking_lamp_id' => 60],
            ['block_id' => 129, 'camera_id' => 928, 'slot_number' => '23', 'parking_lamp_id' => 60],
            ['block_id' => 129, 'camera_id' => 928, 'slot_number' => '24', 'parking_lamp_id' => 60],
            
             // AE2 Block set 24 slot with camera and Lamp.
            ['block_id' => 130, 'camera_id' => 943, 'slot_number' => '25', 'parking_lamp_id' => 61],
            ['block_id' => 130, 'camera_id' => 943, 'slot_number' => '26', 'parking_lamp_id' => 61],
            ['block_id' => 130, 'camera_id' => 943, 'slot_number' => '27', 'parking_lamp_id' => 61],
    
            ['block_id' => 130, 'camera_id' => 942, 'slot_number' => '28', 'parking_lamp_id' => 61],
            ['block_id' => 130, 'camera_id' => 942, 'slot_number' => '29', 'parking_lamp_id' => 61],
            ['block_id' => 130, 'camera_id' => 942, 'slot_number' => '30', 'parking_lamp_id' => 61],
     
            ['block_id' => 130, 'camera_id' => 941, 'slot_number' => '31', 'parking_lamp_id' => 62],
            ['block_id' => 130, 'camera_id' => 941, 'slot_number' => '32', 'parking_lamp_id' => 62],
            ['block_id' => 130, 'camera_id' => 941, 'slot_number' => '33', 'parking_lamp_id' => 62],
     
            ['block_id' => 130, 'camera_id' => 940, 'slot_number' => '34', 'parking_lamp_id' => 62],
            ['block_id' => 130, 'camera_id' => 940, 'slot_number' => '35', 'parking_lamp_id' => 62],
            ['block_id' => 130, 'camera_id' => 940, 'slot_number' => '36', 'parking_lamp_id' => 62],
     
            ['block_id' => 130, 'camera_id' => 939, 'slot_number' => '37', 'parking_lamp_id' => 63],
            ['block_id' => 130, 'camera_id' => 939, 'slot_number' => '38', 'parking_lamp_id' => 63],
            ['block_id' => 130, 'camera_id' => 939, 'slot_number' => '39', 'parking_lamp_id' => 63],
     
            ['block_id' => 130, 'camera_id' => 938, 'slot_number' => '40', 'parking_lamp_id' => 63],
            ['block_id' => 130, 'camera_id' => 938, 'slot_number' => '41', 'parking_lamp_id' => 63],
            ['block_id' => 130, 'camera_id' => 938, 'slot_number' => '42', 'parking_lamp_id' => 63],
     
            ['block_id' => 130, 'camera_id' => 937, 'slot_number' => '43', 'parking_lamp_id' => 64],
            ['block_id' => 130, 'camera_id' => 937, 'slot_number' => '44', 'parking_lamp_id' => 64],
            ['block_id' => 130, 'camera_id' => 937, 'slot_number' => '45', 'parking_lamp_id' => 64],
  
            ['block_id' => 130, 'camera_id' => 936, 'slot_number' => '46', 'parking_lamp_id' => 64],
            ['block_id' => 130, 'camera_id' => 936, 'slot_number' => '47', 'parking_lamp_id' => 64],
            ['block_id' => 130, 'camera_id' => 936, 'slot_number' => '48', 'parking_lamp_id' => 64],
            
            // AE3 Block set 24 slot with camera and Lamp.
            ['block_id' => 131, 'camera_id' => 927, 'slot_number' => '49', 'parking_lamp_id' => 65],
            ['block_id' => 131, 'camera_id' => 927, 'slot_number' => '50', 'parking_lamp_id' => 65],
            ['block_id' => 131, 'camera_id' => 927, 'slot_number' => '51', 'parking_lamp_id' => 65],
  
            ['block_id' => 131, 'camera_id' => 926, 'slot_number' => '52', 'parking_lamp_id' => 65],
            ['block_id' => 131, 'camera_id' => 926, 'slot_number' => '53', 'parking_lamp_id' => 65],
            ['block_id' => 131, 'camera_id' => 926, 'slot_number' => '54', 'parking_lamp_id' => 65],
    
            ['block_id' => 131, 'camera_id' => 925, 'slot_number' => '55', 'parking_lamp_id' => 66],
            ['block_id' => 131, 'camera_id' => 925, 'slot_number' => '56', 'parking_lamp_id' => 66],
            ['block_id' => 131, 'camera_id' => 925, 'slot_number' => '57', 'parking_lamp_id' => 66],
    
            ['block_id' => 131, 'camera_id' => 924, 'slot_number' => '58', 'parking_lamp_id' => 66],
            ['block_id' => 131, 'camera_id' => 924, 'slot_number' => '59', 'parking_lamp_id' => 66],
            ['block_id' => 131, 'camera_id' => 924, 'slot_number' => '60', 'parking_lamp_id' => 66],
    
            ['block_id' => 131, 'camera_id' => 923, 'slot_number' => '61', 'parking_lamp_id' => 67],
            ['block_id' => 131, 'camera_id' => 923, 'slot_number' => '62', 'parking_lamp_id' => 67],
            ['block_id' => 131, 'camera_id' => 923, 'slot_number' => '63', 'parking_lamp_id' => 67],
    
            ['block_id' => 131, 'camera_id' => 922, 'slot_number' => '64', 'parking_lamp_id' => 67],
            ['block_id' => 131, 'camera_id' => 922, 'slot_number' => '65', 'parking_lamp_id' => 67],
            ['block_id' => 131, 'camera_id' => 922, 'slot_number' => '66', 'parking_lamp_id' => 67],
    
            ['block_id' => 131, 'camera_id' => 921, 'slot_number' => '67', 'parking_lamp_id' => 68],
            ['block_id' => 131, 'camera_id' => 921, 'slot_number' => '68', 'parking_lamp_id' => 68],
            ['block_id' => 131, 'camera_id' => 921, 'slot_number' => '69', 'parking_lamp_id' => 68],
    
            ['block_id' => 131, 'camera_id' => 920, 'slot_number' => '70', 'parking_lamp_id' => 68],
            ['block_id' => 131, 'camera_id' => 920, 'slot_number' => '71', 'parking_lamp_id' => 68],
            ['block_id' => 131, 'camera_id' => 920, 'slot_number' => '72', 'parking_lamp_id' => 68],
 
             // AE4 Block set 24 slot with camera and Lamp.
            ['block_id' => 132, 'camera_id' => 919, 'slot_number' => '73', 'parking_lamp_id' => 69],
            ['block_id' => 132, 'camera_id' => 919, 'slot_number' => '74', 'parking_lamp_id' => 69],
            ['block_id' => 132, 'camera_id' => 919, 'slot_number' => '75', 'parking_lamp_id' => 69],
    
            ['block_id' => 132, 'camera_id' => 918, 'slot_number' => '76', 'parking_lamp_id' => 69],
            ['block_id' => 132, 'camera_id' => 918, 'slot_number' => '77', 'parking_lamp_id' => 69],
            ['block_id' => 132, 'camera_id' => 918, 'slot_number' => '78', 'parking_lamp_id' => 69],
    
            ['block_id' => 132, 'camera_id' => 917, 'slot_number' => '79', 'parking_lamp_id' => 70],
            ['block_id' => 132, 'camera_id' => 917, 'slot_number' => '80', 'parking_lamp_id' => 70],
            ['block_id' => 132, 'camera_id' => 917, 'slot_number' => '81', 'parking_lamp_id' => 70],
    
            ['block_id' => 132, 'camera_id' => 916, 'slot_number' => '82', 'parking_lamp_id' => 70],
            ['block_id' => 132, 'camera_id' => 916, 'slot_number' => '83', 'parking_lamp_id' => 70],
            ['block_id' => 132, 'camera_id' => 916, 'slot_number' => '84', 'parking_lamp_id' => 70],
    
            ['block_id' => 132, 'camera_id' => 915, 'slot_number' => '85', 'parking_lamp_id' => 71],
            ['block_id' => 132, 'camera_id' => 915, 'slot_number' => '86', 'parking_lamp_id' => 71],
            ['block_id' => 132, 'camera_id' => 915, 'slot_number' => '87', 'parking_lamp_id' => 71],
    
            ['block_id' => 132, 'camera_id' => 914, 'slot_number' => '88', 'parking_lamp_id' => 71],
            ['block_id' => 132, 'camera_id' => 914, 'slot_number' => '89', 'parking_lamp_id' => 71],
            ['block_id' => 132, 'camera_id' => 914, 'slot_number' => '90', 'parking_lamp_id' => 71],
  
            ['block_id' => 132, 'camera_id' => 913, 'slot_number' => '91', 'parking_lamp_id' => 72],
            ['block_id' => 132, 'camera_id' => 913, 'slot_number' => '92', 'parking_lamp_id' => 72],
            ['block_id' => 132, 'camera_id' => 913, 'slot_number' => '93', 'parking_lamp_id' => 72],
    
            ['block_id' => 132, 'camera_id' => 912, 'slot_number' => '94', 'parking_lamp_id' => 72],
            ['block_id' => 132, 'camera_id' => 912, 'slot_number' => '95', 'parking_lamp_id' => 72],
            ['block_id' => 132, 'camera_id' => 912, 'slot_number' => '96', 'parking_lamp_id' => 72],
 
            // AF1 Block set 24 slot with camera and Lamp.
            ['block_id' => 133, 'camera_id' => 967, 'slot_number' => '1', 'parking_lamp_id' => 73],
            ['block_id' => 133, 'camera_id' => 967, 'slot_number' => '2', 'parking_lamp_id' => 73],
            ['block_id' => 133, 'camera_id' => 967, 'slot_number' => '3', 'parking_lamp_id' => 73],
      
            ['block_id' => 133, 'camera_id' => 966, 'slot_number' => '4', 'parking_lamp_id' => 73],
            ['block_id' => 133, 'camera_id' => 966, 'slot_number' => '5', 'parking_lamp_id' => 73],
            ['block_id' => 133, 'camera_id' => 966, 'slot_number' => '6', 'parking_lamp_id' => 73],
      
            ['block_id' => 133, 'camera_id' => 965, 'slot_number' => '7', 'parking_lamp_id' => 74],
            ['block_id' => 133, 'camera_id' => 965, 'slot_number' => '8', 'parking_lamp_id' => 74],
            ['block_id' => 133, 'camera_id' => 965, 'slot_number' => '9', 'parking_lamp_id' => 74],
      
            ['block_id' => 133, 'camera_id' => 964, 'slot_number' => '10', 'parking_lamp_id' => 74],
            ['block_id' => 133, 'camera_id' => 964, 'slot_number' => '11', 'parking_lamp_id' => 74],
            ['block_id' => 133, 'camera_id' => 964, 'slot_number' => '12', 'parking_lamp_id' => 74],
      
            ['block_id' => 133, 'camera_id' => 963, 'slot_number' => '13', 'parking_lamp_id' => 75],
            ['block_id' => 133, 'camera_id' => 963, 'slot_number' => '14', 'parking_lamp_id' => 75],
            ['block_id' => 133, 'camera_id' => 963, 'slot_number' => '15', 'parking_lamp_id' => 75],
      
            ['block_id' => 133, 'camera_id' => 962, 'slot_number' => '16', 'parking_lamp_id' => 75],
            ['block_id' => 133, 'camera_id' => 962, 'slot_number' => '17', 'parking_lamp_id' => 75],
            ['block_id' => 133, 'camera_id' => 962, 'slot_number' => '18', 'parking_lamp_id' => 75],
      
            ['block_id' => 133, 'camera_id' => 961, 'slot_number' => '19', 'parking_lamp_id' => 76],
            ['block_id' => 133, 'camera_id' => 961, 'slot_number' => '20', 'parking_lamp_id' => 76],
            ['block_id' => 133, 'camera_id' => 961, 'slot_number' => '21', 'parking_lamp_id' => 76],
      
            ['block_id' => 133, 'camera_id' => 960, 'slot_number' => '22', 'parking_lamp_id' => 76],
            ['block_id' => 133, 'camera_id' => 960, 'slot_number' => '23', 'parking_lamp_id' => 76],
            ['block_id' => 133, 'camera_id' => 960, 'slot_number' => '24', 'parking_lamp_id' => 76],
            
            // AF2 Block set 24 slot with camera and Lamp.
            ['block_id' => 134, 'camera_id' => 975, 'slot_number' => '25', 'parking_lamp_id' => 77],
            ['block_id' => 134, 'camera_id' => 975, 'slot_number' => '26', 'parking_lamp_id' => 77],
            ['block_id' => 134, 'camera_id' => 975, 'slot_number' => '27', 'parking_lamp_id' => 77],
     
            ['block_id' => 134, 'camera_id' => 974, 'slot_number' => '28', 'parking_lamp_id' => 77],
            ['block_id' => 134, 'camera_id' => 974, 'slot_number' => '29', 'parking_lamp_id' => 77],
            ['block_id' => 134, 'camera_id' => 974, 'slot_number' => '30', 'parking_lamp_id' => 77],
      
            ['block_id' => 134, 'camera_id' => 973, 'slot_number' => '31', 'parking_lamp_id' => 78],
            ['block_id' => 134, 'camera_id' => 973, 'slot_number' => '32', 'parking_lamp_id' => 78],
            ['block_id' => 134, 'camera_id' => 973, 'slot_number' => '33', 'parking_lamp_id' => 78],
      
            ['block_id' => 134, 'camera_id' => 972, 'slot_number' => '34', 'parking_lamp_id' => 78],
            ['block_id' => 134, 'camera_id' => 972, 'slot_number' => '35', 'parking_lamp_id' => 78],
            ['block_id' => 134, 'camera_id' => 972, 'slot_number' => '36', 'parking_lamp_id' => 78],
      
            ['block_id' => 134, 'camera_id' => 971, 'slot_number' => '37', 'parking_lamp_id' => 79],
            ['block_id' => 134, 'camera_id' => 971, 'slot_number' => '38', 'parking_lamp_id' => 79],
            ['block_id' => 134, 'camera_id' => 971, 'slot_number' => '39', 'parking_lamp_id' => 79],
      
            ['block_id' => 134, 'camera_id' => 970, 'slot_number' => '40', 'parking_lamp_id' => 79],
            ['block_id' => 134, 'camera_id' => 970, 'slot_number' => '41', 'parking_lamp_id' => 79],
            ['block_id' => 134, 'camera_id' => 970, 'slot_number' => '42', 'parking_lamp_id' => 79],
     
            ['block_id' => 134, 'camera_id' => 969, 'slot_number' => '43', 'parking_lamp_id' => 80],
            ['block_id' => 134, 'camera_id' => 969, 'slot_number' => '44', 'parking_lamp_id' => 80],
            ['block_id' => 134, 'camera_id' => 969, 'slot_number' => '45', 'parking_lamp_id' => 80],
   
            ['block_id' => 134, 'camera_id' => 968, 'slot_number' => '46', 'parking_lamp_id' => 80],
            ['block_id' => 134, 'camera_id' => 968, 'slot_number' => '47', 'parking_lamp_id' => 80],
            ['block_id' => 134, 'camera_id' => 968, 'slot_number' => '48', 'parking_lamp_id' => 80],
            
            // AF3 Block set 24 slot with camera and Lamp.
            ['block_id' => 135, 'camera_id' => 959, 'slot_number' => '49', 'parking_lamp_id' => 81],
            ['block_id' => 135, 'camera_id' => 959, 'slot_number' => '50', 'parking_lamp_id' => 81],
            ['block_id' => 135, 'camera_id' => 959, 'slot_number' => '51', 'parking_lamp_id' => 81],
   
            ['block_id' => 135, 'camera_id' => 958, 'slot_number' => '52', 'parking_lamp_id' => 81],
            ['block_id' => 135, 'camera_id' => 958, 'slot_number' => '53', 'parking_lamp_id' => 81],
            ['block_id' => 135, 'camera_id' => 958, 'slot_number' => '54', 'parking_lamp_id' => 81],
     
            ['block_id' => 135, 'camera_id' => 957, 'slot_number' => '55', 'parking_lamp_id' => 82],
            ['block_id' => 135, 'camera_id' => 957, 'slot_number' => '56', 'parking_lamp_id' => 82],
            ['block_id' => 135, 'camera_id' => 957, 'slot_number' => '57', 'parking_lamp_id' => 82],
     
            ['block_id' => 135, 'camera_id' => 956, 'slot_number' => '58', 'parking_lamp_id' => 82],
            ['block_id' => 135, 'camera_id' => 956, 'slot_number' => '59', 'parking_lamp_id' => 82],
            ['block_id' => 135, 'camera_id' => 956, 'slot_number' => '60', 'parking_lamp_id' => 82],
     
            ['block_id' => 135, 'camera_id' => 955, 'slot_number' => '61', 'parking_lamp_id' => 83],
            ['block_id' => 135, 'camera_id' => 955, 'slot_number' => '62', 'parking_lamp_id' => 83],
            ['block_id' => 135, 'camera_id' => 955, 'slot_number' => '63', 'parking_lamp_id' => 83],
     
            ['block_id' => 135, 'camera_id' => 954, 'slot_number' => '64', 'parking_lamp_id' => 83],
            ['block_id' => 135, 'camera_id' => 954, 'slot_number' => '65', 'parking_lamp_id' => 83],
            ['block_id' => 135, 'camera_id' => 954, 'slot_number' => '66', 'parking_lamp_id' => 83],
     
            ['block_id' => 135, 'camera_id' => 953, 'slot_number' => '67', 'parking_lamp_id' => 84],
            ['block_id' => 135, 'camera_id' => 953, 'slot_number' => '68', 'parking_lamp_id' => 84],
            ['block_id' => 135, 'camera_id' => 953, 'slot_number' => '69', 'parking_lamp_id' => 84],
     
            ['block_id' => 135, 'camera_id' => 952, 'slot_number' => '70', 'parking_lamp_id' => 84],
            ['block_id' => 135, 'camera_id' => 952, 'slot_number' => '71', 'parking_lamp_id' => 84],
            ['block_id' => 135, 'camera_id' => 952, 'slot_number' => '72', 'parking_lamp_id' => 84],
            
            // AF4 Block set 24 slot with camera and Lamp.
            ['block_id' => 136, 'camera_id' => 951, 'slot_number' => '73', 'parking_lamp_id' => 85],
            ['block_id' => 136, 'camera_id' => 951, 'slot_number' => '74', 'parking_lamp_id' => 85],
            ['block_id' => 136, 'camera_id' => 951, 'slot_number' => '75', 'parking_lamp_id' => 85],
     
            ['block_id' => 136, 'camera_id' => 950, 'slot_number' => '76', 'parking_lamp_id' => 85],
            ['block_id' => 136, 'camera_id' => 950, 'slot_number' => '77', 'parking_lamp_id' => 85],
            ['block_id' => 136, 'camera_id' => 950, 'slot_number' => '78', 'parking_lamp_id' => 85],
     
            ['block_id' => 136, 'camera_id' => 949, 'slot_number' => '79', 'parking_lamp_id' => 86],
            ['block_id' => 136, 'camera_id' => 949, 'slot_number' => '80', 'parking_lamp_id' => 86],
            ['block_id' => 136, 'camera_id' => 949, 'slot_number' => '81', 'parking_lamp_id' => 86],
     
            ['block_id' => 136, 'camera_id' => 948, 'slot_number' => '82', 'parking_lamp_id' => 86],
            ['block_id' => 136, 'camera_id' => 948, 'slot_number' => '83', 'parking_lamp_id' => 86],
            ['block_id' => 136, 'camera_id' => 948, 'slot_number' => '84', 'parking_lamp_id' => 86],
     
            ['block_id' => 136, 'camera_id' => 947, 'slot_number' => '85', 'parking_lamp_id' => 87],
            ['block_id' => 136, 'camera_id' => 947, 'slot_number' => '86', 'parking_lamp_id' => 87],
            ['block_id' => 136, 'camera_id' => 947, 'slot_number' => '87', 'parking_lamp_id' => 87],
     
            ['block_id' => 136, 'camera_id' => 946, 'slot_number' => '88', 'parking_lamp_id' => 87],
            ['block_id' => 136, 'camera_id' => 946, 'slot_number' => '89', 'parking_lamp_id' => 87],
            ['block_id' => 136, 'camera_id' => 946, 'slot_number' => '90', 'parking_lamp_id' => 87],
   
            ['block_id' => 136, 'camera_id' => 945, 'slot_number' => '91', 'parking_lamp_id' => 88],
            ['block_id' => 136, 'camera_id' => 945, 'slot_number' => '92', 'parking_lamp_id' => 88],
            ['block_id' => 136, 'camera_id' => 945, 'slot_number' => '93', 'parking_lamp_id' => 88],
     
            ['block_id' => 136, 'camera_id' => 944, 'slot_number' => '94', 'parking_lamp_id' => 88],
            ['block_id' => 136, 'camera_id' => 944, 'slot_number' => '95', 'parking_lamp_id' => 88],
            ['block_id' => 136, 'camera_id' => 944, 'slot_number' => '96', 'parking_lamp_id' => 88],
  
            // AG1 Block set 24 slots with camera and Lamp.
            ['block_id' => 137, 'camera_id' => 999, 'slot_number' => '1', 'parking_lamp_id' => 89],
            ['block_id' => 137, 'camera_id' => 999, 'slot_number' => '2', 'parking_lamp_id' => 89],
            ['block_id' => 137, 'camera_id' => 999, 'slot_number' => '3', 'parking_lamp_id' => 89],
       
            ['block_id' => 137, 'camera_id' => 998, 'slot_number' => '4', 'parking_lamp_id' => 89],
            ['block_id' => 137, 'camera_id' => 998, 'slot_number' => '5', 'parking_lamp_id' => 89],
            ['block_id' => 137, 'camera_id' => 998, 'slot_number' => '6', 'parking_lamp_id' => 89],
       
            ['block_id' => 137, 'camera_id' => 997, 'slot_number' => '7', 'parking_lamp_id' => 90],
            ['block_id' => 137, 'camera_id' => 997, 'slot_number' => '8', 'parking_lamp_id' => 90],
            ['block_id' => 137, 'camera_id' => 997, 'slot_number' => '9', 'parking_lamp_id' => 90],
       
            ['block_id' => 137, 'camera_id' => 996, 'slot_number' => '10', 'parking_lamp_id' => 90],
            ['block_id' => 137, 'camera_id' => 996, 'slot_number' => '11', 'parking_lamp_id' => 90],
            ['block_id' => 137, 'camera_id' => 996, 'slot_number' => '12', 'parking_lamp_id' => 90],
       
            ['block_id' => 137, 'camera_id' => 995, 'slot_number' => '13', 'parking_lamp_id' => 91],
            ['block_id' => 137, 'camera_id' => 995, 'slot_number' => '14', 'parking_lamp_id' => 91],
            ['block_id' => 137, 'camera_id' => 995, 'slot_number' => '15', 'parking_lamp_id' => 91],
       
            ['block_id' => 137, 'camera_id' => 994, 'slot_number' => '16', 'parking_lamp_id' => 91],
            ['block_id' => 137, 'camera_id' => 994, 'slot_number' => '17', 'parking_lamp_id' => 91],
            ['block_id' => 137, 'camera_id' => 994, 'slot_number' => '18', 'parking_lamp_id' => 91],
       
            ['block_id' => 137, 'camera_id' => 993, 'slot_number' => '19', 'parking_lamp_id' => 92],
            ['block_id' => 137, 'camera_id' => 993, 'slot_number' => '20', 'parking_lamp_id' => 92],
            ['block_id' => 137, 'camera_id' => 993, 'slot_number' => '21', 'parking_lamp_id' => 92],
       
            ['block_id' => 137, 'camera_id' => 992, 'slot_number' => '22', 'parking_lamp_id' => 92],
            ['block_id' => 137, 'camera_id' => 992, 'slot_number' => '23', 'parking_lamp_id' => 92],
            ['block_id' => 137, 'camera_id' => 992, 'slot_number' => '24', 'parking_lamp_id' => 92],
            
            // AG2 Block set 24 slot with camera and Lamp.
            ['block_id' => 138, 'camera_id' => 1007, 'slot_number' => '25', 'parking_lamp_id' => 93],
            ['block_id' => 138, 'camera_id' => 1007, 'slot_number' => '26', 'parking_lamp_id' => 93],
            ['block_id' => 138, 'camera_id' => 1007, 'slot_number' => '27', 'parking_lamp_id' => 93],
      
            ['block_id' => 138, 'camera_id' => 1006, 'slot_number' => '28', 'parking_lamp_id' => 93],
            ['block_id' => 138, 'camera_id' => 1006, 'slot_number' => '29', 'parking_lamp_id' => 93],
            ['block_id' => 138, 'camera_id' => 1006, 'slot_number' => '30', 'parking_lamp_id' => 93],
       
            ['block_id' => 138, 'camera_id' => 1005, 'slot_number' => '31', 'parking_lamp_id' => 94],
            ['block_id' => 138, 'camera_id' => 1005, 'slot_number' => '32', 'parking_lamp_id' => 94],
            ['block_id' => 138, 'camera_id' => 1005, 'slot_number' => '33', 'parking_lamp_id' => 94],
       
            ['block_id' => 138, 'camera_id' => 1004, 'slot_number' => '34', 'parking_lamp_id' => 94],
            ['block_id' => 138, 'camera_id' => 1004, 'slot_number' => '35', 'parking_lamp_id' => 94],
            ['block_id' => 138, 'camera_id' => 1004, 'slot_number' => '36', 'parking_lamp_id' => 94],
       
            ['block_id' => 138, 'camera_id' => 1003, 'slot_number' => '37', 'parking_lamp_id' => 95],
            ['block_id' => 138, 'camera_id' => 1003, 'slot_number' => '38', 'parking_lamp_id' => 95],
            ['block_id' => 138, 'camera_id' => 1003, 'slot_number' => '39', 'parking_lamp_id' => 95],
       
            ['block_id' => 138, 'camera_id' => 1002, 'slot_number' => '40', 'parking_lamp_id' => 95],
            ['block_id' => 138, 'camera_id' => 1002, 'slot_number' => '41', 'parking_lamp_id' => 95],
            ['block_id' => 138, 'camera_id' => 1002, 'slot_number' => '42', 'parking_lamp_id' => 95],
      
            ['block_id' => 138, 'camera_id' => 1001, 'slot_number' => '43', 'parking_lamp_id' => 96],
            ['block_id' => 138, 'camera_id' => 1001, 'slot_number' => '44', 'parking_lamp_id' => 96],
            ['block_id' => 138, 'camera_id' => 1001, 'slot_number' => '45', 'parking_lamp_id' => 96],
    
            ['block_id' => 138, 'camera_id' => 1000, 'slot_number' => '46', 'parking_lamp_id' => 96],
            ['block_id' => 138, 'camera_id' => 1000, 'slot_number' => '47', 'parking_lamp_id' => 96],
            ['block_id' => 138, 'camera_id' => 1000, 'slot_number' => '48', 'parking_lamp_id' => 96],
 
             // AG3 Block set 24 slot with camera and Lamp.
            ['block_id' => 139, 'camera_id' => 991, 'slot_number' => '49', 'parking_lamp_id' => 97],
            ['block_id' => 139, 'camera_id' => 991, 'slot_number' => '50', 'parking_lamp_id' => 97],
            ['block_id' => 139, 'camera_id' => 991, 'slot_number' => '51', 'parking_lamp_id' => 97],
    
            ['block_id' => 139, 'camera_id' => 990, 'slot_number' => '52', 'parking_lamp_id' => 97],
            ['block_id' => 139, 'camera_id' => 990, 'slot_number' => '53', 'parking_lamp_id' => 97],
            ['block_id' => 139, 'camera_id' => 990, 'slot_number' => '54', 'parking_lamp_id' => 97],
      
            ['block_id' => 139, 'camera_id' => 989, 'slot_number' => '55', 'parking_lamp_id' => 98],
            ['block_id' => 139, 'camera_id' => 989, 'slot_number' => '56', 'parking_lamp_id' => 98],
            ['block_id' => 139, 'camera_id' => 989, 'slot_number' => '57', 'parking_lamp_id' => 98],
      
            ['block_id' => 139, 'camera_id' => 988, 'slot_number' => '58', 'parking_lamp_id' => 98],
            ['block_id' => 139, 'camera_id' => 988, 'slot_number' => '59', 'parking_lamp_id' => 98],
            ['block_id' => 139, 'camera_id' => 988, 'slot_number' => '60', 'parking_lamp_id' => 98],
      
            ['block_id' => 139, 'camera_id' => 987, 'slot_number' => '61', 'parking_lamp_id' => 99],
            ['block_id' => 139, 'camera_id' => 987, 'slot_number' => '62', 'parking_lamp_id' => 99],
            ['block_id' => 139, 'camera_id' => 987, 'slot_number' => '63', 'parking_lamp_id' => 99],
      
            ['block_id' => 139, 'camera_id' => 986, 'slot_number' => '64', 'parking_lamp_id' => 99],
            ['block_id' => 139, 'camera_id' => 986, 'slot_number' => '65', 'parking_lamp_id' => 99],
            ['block_id' => 139, 'camera_id' => 986, 'slot_number' => '66', 'parking_lamp_id' => 99],
      
            ['block_id' => 139, 'camera_id' => 985, 'slot_number' => '67', 'parking_lamp_id' => 100],
            ['block_id' => 139, 'camera_id' => 985, 'slot_number' => '68', 'parking_lamp_id' => 100],
            ['block_id' => 139, 'camera_id' => 985, 'slot_number' => '69', 'parking_lamp_id' => 100],
      
            ['block_id' => 139, 'camera_id' => 984, 'slot_number' => '70', 'parking_lamp_id' => 100],
            ['block_id' => 139, 'camera_id' => 984, 'slot_number' => '71', 'parking_lamp_id' => 100],
            ['block_id' => 139, 'camera_id' => 984, 'slot_number' => '72', 'parking_lamp_id' => 100],
      
            // AG4 Block set 24 slot with camera and Lamp.
            ['block_id' => 140, 'camera_id' => 983, 'slot_number' => '73', 'parking_lamp_id' => 101],
            ['block_id' => 140, 'camera_id' => 983, 'slot_number' => '74', 'parking_lamp_id' => 101],
            ['block_id' => 140, 'camera_id' => 983, 'slot_number' => '75', 'parking_lamp_id' => 101],
      
            ['block_id' => 140, 'camera_id' => 982, 'slot_number' => '76', 'parking_lamp_id' => 101],
            ['block_id' => 140, 'camera_id' => 982, 'slot_number' => '77', 'parking_lamp_id' => 101],
            ['block_id' => 140, 'camera_id' => 982, 'slot_number' => '78', 'parking_lamp_id' => 101],
      
            ['block_id' => 140, 'camera_id' => 981, 'slot_number' => '79', 'parking_lamp_id' => 102],
            ['block_id' => 140, 'camera_id' => 981, 'slot_number' => '80', 'parking_lamp_id' => 102],
            ['block_id' => 140, 'camera_id' => 981, 'slot_number' => '81', 'parking_lamp_id' => 102],
     
            ['block_id' => 140, 'camera_id' => 980, 'slot_number' => '82', 'parking_lamp_id' => 102],
            ['block_id' => 140, 'camera_id' => 980, 'slot_number' => '83', 'parking_lamp_id' => 102],
            ['block_id' => 140, 'camera_id' => 980, 'slot_number' => '84', 'parking_lamp_id' => 102],
      
            ['block_id' => 140, 'camera_id' => 979, 'slot_number' => '85', 'parking_lamp_id' => 103],
            ['block_id' => 140, 'camera_id' => 979, 'slot_number' => '86', 'parking_lamp_id' => 103],
            ['block_id' => 140, 'camera_id' => 979, 'slot_number' => '87', 'parking_lamp_id' => 103],
      
            ['block_id' => 140, 'camera_id' => 978, 'slot_number' => '88', 'parking_lamp_id' => 103],
            ['block_id' => 140, 'camera_id' => 978, 'slot_number' => '89', 'parking_lamp_id' => 103],
            ['block_id' => 140, 'camera_id' => 978, 'slot_number' => '90', 'parking_lamp_id' => 103],
    
            ['block_id' => 140, 'camera_id' => 977, 'slot_number' => '91', 'parking_lamp_id' => 104],
            ['block_id' => 140, 'camera_id' => 977, 'slot_number' => '92', 'parking_lamp_id' => 104],
            ['block_id' => 140, 'camera_id' => 977, 'slot_number' => '93', 'parking_lamp_id' => 104],
      
            ['block_id' => 140, 'camera_id' => 976, 'slot_number' => '94', 'parking_lamp_id' => 104],
            ['block_id' => 140, 'camera_id' => 976, 'slot_number' => '95', 'parking_lamp_id' => 104],
            ['block_id' => 140, 'camera_id' => 976, 'slot_number' => '96', 'parking_lamp_id' => 104]

        ]);
    }
}
