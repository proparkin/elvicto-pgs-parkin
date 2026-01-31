<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\V2\Common\BookingResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\{ParkingSlot,ParkingBlock};
use DB;
use Illuminate\Support\Facades\Http;

class ParkingController extends Controller 
{
    public function getvehicleCount()
    {
        // $blocks = ParkingSlot::where('status',2)->whereIn('block_id',[1,2,5,6,9,10,13,14,17,18,21,22,25,26,29,30])->Count();
        // $blocks = ParkingSlot::where('status',2)->whereIn('block_id',[3,4,7,8,11,12,15,16,19,20,23,24,27,28,31,32])->Count();
        // $blocks = ParkingSlot::where('status',2)->whereIn('block_id',[33,34,37,38,41,42,45,46,49,50,53,54,57,58,61,62])->Count();
        // $blocks = ParkingSlot::where('status',2)->whereIn('block_id',[35,36,39,40,43,44,47,48,51,52,55,56,59,60,63,64])->Count();
        // $blocks = ParkingSlot::where('status',2)->whereIn('block_id',[89,90,93,94,97,98,101,102,105,106,109,110,113,114])->Count();
        $blocks = ParkingSlot::where('status',2)->whereIn('block_id',[91,92,95,96,99,100,103,104,107,108,111,112])->Count();

        return $blocks;
    }
    public function displayCountDtc1Dtc2() 
    {
        try 
        {
            $blocks = ParkingBlock::select('block_name')
                ->withCount(['slots' => function ($query) {
                    $query->where('status', 1);
                }])
                ->get()
                ->keyBy('block_name'); // Index by block_name for easy lookup
                

            $customResponse = [
                'Display-1' => $blocks['DTC1-P1']->slots_count ?? 0, // Display-1, block_id - 1
                'Display-2' => $blocks['DTC2-P3']->slots_count ?? 0, // Display-2, block id - 3
                'Display-3' => ($blocks['DTC1-P2']->slots_count ?? 0) + ($blocks['DTC1-Q1']->slots_count ?? 0), // Display-3, block_id - 2 -5 
                'Display-4' => ($blocks['DTC2-P4']->slots_count ?? 0) + ($blocks['DTC2-Q3']->slots_count ?? 0), // Display-4, block_id - 4 - 7
                'Display-5' => ($blocks['DTC1-Q2']->slots_count ?? 0) + ($blocks['DTC1-R1']->slots_count ?? 0), // Display-5, block_id - 6 - 9
                'Display-6' => ($blocks['DTC2-Q4']->slots_count ?? 0) + ($blocks['DTC2-R3']->slots_count ?? 0), // Display-6, block_id - 8 - 11
                'Display-7' => ($blocks['DTC1-R2']->slots_count ?? 0) + ($blocks['DTC1-S1']->slots_count ?? 0), // Display-7, block_id - 10 - 13
                'Display-8' => ($blocks['DTC2-R4']->slots_count ?? 0) + ($blocks['DTC2-S3']->slots_count ?? 0), // Display-8,block_id - 12 - 15
                'Display-9' => ($blocks['DTC1-S2']->slots_count ?? 0) + ($blocks['DTC1-T1']->slots_count ?? 0), // Display-9, block_id -14 - 17
                'Display-10' => ($blocks['DTC2-S4']->slots_count ?? 0) + ($blocks['DTC2-T3']->slots_count ?? 0),// Display-10, block_id - 16 - 19
                'Display-11' => ($blocks['DTC1-T2']->slots_count ?? 0) + ($blocks['DTC1-U1']->slots_count ?? 0),// Display-11, block_id - 18 - 21
                'Display-12' => ($blocks['DTC2-T4']->slots_count ?? 0) + ($blocks['DTC2-U3']->slots_count ?? 0),// Display-12, block_id - 20 - 23
                'Display-13' => ($blocks['DTC1-U2']->slots_count ?? 0) + ($blocks['DTC1-V1']->slots_count ?? 0),// Display-13, block_id - 22 - 25
                'Display-14' => ($blocks['DTC2-U4']->slots_count ?? 0) + ($blocks['DTC2-V3']->slots_count ?? 0),// Display-14, block_id - 24 - 27
                'Display-15' => ($blocks['DTC1-V2']->slots_count ?? 0) + ($blocks['DTC1-W1']->slots_count ?? 0) + ($blocks['DTC1-W2']->slots_count ?? 0),// Display-15, block_id - 26 - 29 - 30
                'Display-16' => ($blocks['DTC2-V4']->slots_count ?? 0) + ($blocks['DTC2-W3']->slots_count ?? 0),// Display-16, block_id - 28 - 31
            ];

            return response()->json($customResponse);
        } 
        catch (\Exception $e) 
        {
            return response()->json(['error' => 'Error fetching parking slots', 'message' => $e->getMessage()], 500);
        }
    }

    public function totalDisplayCountDtc1Dtc2()
    {
        $blocks = ParkingBlock::select('block_name')
                ->withCount(['slots' => function ($query) {
                    $query->where('status', 1);
                }])
                ->get()
                ->keyBy('block_name'); 
                
        $customResponse = [
            'Display-1' => $blocks['DTC1-P1']->slots_count ?? 0,
            'Display-2' => $blocks['DTC2-P3']->slots_count ?? 0,
            'Display-3' => ($blocks['DTC1-P2']->slots_count ?? 0) + ($blocks['DTC1-Q1']->slots_count ?? 0),
            'Display-4' => ($blocks['DTC2-P4']->slots_count ?? 0) + ($blocks['DTC2-Q3']->slots_count ?? 0),
            'Display-5' => ($blocks['DTC1-Q2']->slots_count ?? 0) + ($blocks['DTC1-R1']->slots_count ?? 0),
            'Display-6' => ($blocks['DTC2-Q4']->slots_count ?? 0) + ($blocks['DTC2-R3']->slots_count ?? 0),
            'Display-7' => ($blocks['DTC1-R2']->slots_count ?? 0) + ($blocks['DTC1-S1']->slots_count ?? 0),
            'Display-8' => ($blocks['DTC2-R4']->slots_count ?? 0) + ($blocks['DTC2-S3']->slots_count ?? 0),
            'Display-9' => ($blocks['DTC1-S2']->slots_count ?? 0) + ($blocks['DTC1-T1']->slots_count ?? 0),
            'Display-10' => ($blocks['DTC2-S4']->slots_count ?? 0) + ($blocks['DTC2-T3']->slots_count ?? 0),
            'Display-11' => ($blocks['DTC1-T2']->slots_count ?? 0) + ($blocks['DTC1-U1']->slots_count ?? 0),
            'Display-12' => ($blocks['DTC2-T4']->slots_count ?? 0) + ($blocks['DTC2-U3']->slots_count ?? 0),
            'Display-13' => ($blocks['DTC1-U2']->slots_count ?? 0) + ($blocks['DTC1-V1']->slots_count ?? 0),
            'Display-14' => ($blocks['DTC2-U4']->slots_count ?? 0) + ($blocks['DTC2-V3']->slots_count ?? 0),
            'Display-15' => ($blocks['DTC1-V2']->slots_count ?? 0) + ($blocks['DTC1-W1']->slots_count ?? 0) + ($blocks['DTC1-W2']->slots_count ?? 0),
            'Display-16' => ($blocks['DTC2-V4']->slots_count ?? 0) + ($blocks['DTC2-W3']->slots_count ?? 0),
        ];
       

        $total_display_count = array_sum($customResponse);
        return response()->json(['Total_display_count' => $total_display_count]);
    }

    public function displayCountDtc3Dtc4() 
    {
        try 
        {
            $blocks = ParkingBlock::select('block_name')
                ->withCount(['slots' => function ($query) {
                    $query->where('status', 1);
                }])
                ->get()
                ->keyBy('block_name'); // Index by block_name for easy lookup

            $customResponse = [
                'Display-1' => $blocks['DTC3-P1']->slots_count ?? 0, // block -id - 33
                'Display-2' => $blocks['DTC4-P3']->slots_count ?? 0, // block -id - 35
                'Display-3' => ($blocks['DTC3-P2']->slots_count ?? 0) + ($blocks['DTC3-Q1']->slots_count ?? 0), // block - id - 34 - 37
                'Display-4' => ($blocks['DTC4-P4']->slots_count ?? 0) + ($blocks['DTC4-Q3']->slots_count ?? 0), // block - id - 36 - 39
                'Display-5' => ($blocks['DTC3-Q2']->slots_count ?? 0) + ($blocks['DTC3-R1']->slots_count ?? 0), // block - id - 
                'Display-6' => ($blocks['DTC4-Q4']->slots_count ?? 0) + ($blocks['DTC4-R3']->slots_count ?? 0), // block - id - 38 - 43
                'Display-7' => ($blocks['DTC3-R2']->slots_count ?? 0) + ($blocks['DTC3-S1']->slots_count ?? 0), // block - id - 42 - 45
                'Display-8' => ($blocks['DTC4-R4']->slots_count ?? 0) + ($blocks['DTC4-S3']->slots_count ?? 0), // block - id - 44 - 47
                'Display-9' => ($blocks['DTC3-S2']->slots_count ?? 0) + ($blocks['DTC3-T1']->slots_count ?? 0), // block - id - 46 - 49
                'Display-10' => ($blocks['DTC4-S4']->slots_count ?? 0) + ($blocks['DTC4-T3']->slots_count ?? 0), // block - id - 48 - 51
                'Display-11' => ($blocks['DTC3-T2']->slots_count ?? 0) + ($blocks['DTC3-U1']->slots_count ?? 0), // block - id - 50 
                'Display-12' => ($blocks['DTC4-T4']->slots_count ?? 0) + ($blocks['DTC4-U3']->slots_count ?? 0),
                'Display-13' => ($blocks['DTC3-U2']->slots_count ?? 0) + ($blocks['DTC3-V1']->slots_count ?? 0),
                'Display-14' => ($blocks['DTC4-U4']->slots_count ?? 0) + ($blocks['DTC4-V3']->slots_count ?? 0),
                'Display-15' => ($blocks['DTC3-V2']->slots_count ?? 0) + ($blocks['DTC3-W1']->slots_count ?? 0) + ($blocks['DTC3-W2']->slots_count ?? 0),
                'Display-16' => ($blocks['DTC4-V4']->slots_count ?? 0) + ($blocks['DTC4-W3']->slots_count ?? 0) + ($blocks['DTC4-W4']->slots_count ?? 0),
            ];

            return response()->json($customResponse);
        
        } 
        catch (\Exception $e) 
        {
            return response()->json(['error' => 'Error fetching parking slots', 'message' => $e->getMessage()], 500);
        }
    }

    public function totalDisplayCountDtc3Dtc4()
    {
        try 
        {
            $blocks = ParkingBlock::select('block_name')
                ->withCount(['slots' => function ($query) {
                    $query->where('status', 1);
                }])
                ->get()
                ->keyBy('block_name'); // Index by block_name for easy lookup

            $customResponse = [
                'Display-1' => $blocks['DTC3-P1']->slots_count ?? 0,
                'Display-2' => $blocks['DTC4-P3']->slots_count ?? 0,
                'Display-3' => ($blocks['DTC3-P2']->slots_count ?? 0) + ($blocks['DTC3-Q1']->slots_count ?? 0),
                'Display-4' => ($blocks['DTC4-P4']->slots_count ?? 0) + ($blocks['DTC4-Q3']->slots_count ?? 0),
                'Display-5' => ($blocks['DTC3-Q2']->slots_count ?? 0) + ($blocks['DTC3-R1']->slots_count ?? 0),
                'Display-6' => ($blocks['DTC4-Q4']->slots_count ?? 0) + ($blocks['DTC4-R3']->slots_count ?? 0),
                'Display-7' => ($blocks['DTC3-R2']->slots_count ?? 0) + ($blocks['DTC3-S1']->slots_count ?? 0),
                'Display-8' => ($blocks['DTC4-R4']->slots_count ?? 0) + ($blocks['DTC4-S3']->slots_count ?? 0),
                'Display-9' => ($blocks['DTC3-S2']->slots_count ?? 0) + ($blocks['DTC3-T1']->slots_count ?? 0),
                'Display-10' => ($blocks['DTC4-S4']->slots_count ?? 0) + ($blocks['DTC4-T3']->slots_count ?? 0),
                'Display-11' => ($blocks['DTC3-T2']->slots_count ?? 0) + ($blocks['DTC3-U1']->slots_count ?? 0),
                'Display-12' => ($blocks['DTC4-T4']->slots_count ?? 0) + ($blocks['DTC4-U3']->slots_count ?? 0),
                'Display-13' => ($blocks['DTC3-U2']->slots_count ?? 0) + ($blocks['DTC3-V1']->slots_count ?? 0),
                'Display-14' => ($blocks['DTC4-U4']->slots_count ?? 0) + ($blocks['DTC4-V3']->slots_count ?? 0),
                'Display-15' => ($blocks['DTC3-V2']->slots_count ?? 0) + ($blocks['DTC3-W1']->slots_count ?? 0) + ($blocks['DTC3-W2']->slots_count ?? 0),
                'Display-16' => ($blocks['DTC4-V4']->slots_count ?? 0) + ($blocks['DTC4-W3']->slots_count ?? 0) + ($blocks['DTC4-W4']->slots_count ?? 0),
            ];

            $total_display_count = array_sum($customResponse);

            return response()->json(['Total_display_count' => $total_display_count]);
        
        } 
        catch (\Exception $e) 
        {
            return response()->json(['error' => 'Error fetching parking slots', 'message' => $e->getMessage()], 500);
        }
    }

    public function displayCountINT1() 
    {
        try 
        {
            $blocks = ParkingBlock::select('block_name')
                ->withCount(['slots' => function ($query) {
                    $query->where('status', 1);
                }])
                ->get()
                ->keyBy('block_name'); // Index by block_name for easy lookup

            $customResponse = [
                'Display-1' => ($blocks['INT1-A1']->slots_count ?? 0) + ($blocks['INT1-A2']->slots_count ?? 0) + ($blocks['INT1-B2']->slots_count ?? 0),
                'Display-2' => ($blocks['INT1-B1']->slots_count ?? 0) + ($blocks['INT1-C2']->slots_count ?? 0),
                'Display-3' => ($blocks['INT1-C1']->slots_count ?? 0),
            ];

            return response()->json($customResponse);
        } 
        catch (\Exception $e)
        {
            return response()->json(['error' => 'Error fetching parking slots', 'message' => $e->getMessage()], 500);
        }
    }

    public function totalDisplayCountINT1() 
    {
        try 
        {
            $blocks = ParkingBlock::select('block_name')
                ->withCount(['slots' => function ($query) {
                    $query->where('status', 1);
                }])
                ->get()
                ->keyBy('block_name'); // Index by block_name for easy lookup

            $customResponse = [
                'Display-1' => ($blocks['INT1-A1']->slots_count ?? 0) + ($blocks['INT1-A2']->slots_count ?? 0) + ($blocks['INT1-B2']->slots_count ?? 0),
                'Display-2' => ($blocks['INT1-B1']->slots_count ?? 0) + ($blocks['INT1-C2']->slots_count ?? 0),
                'Display-3' => ($blocks['INT1-C1']->slots_count ?? 0),
            ];

            $total_display_count = array_sum($customResponse);

            return response()->json(['Total_display_count' => $total_display_count]);
        } 
        catch (\Exception $e)
        {
            return response()->json(['error' => 'Error fetching parking slots', 'message' => $e->getMessage()], 500);
        }
    }

    public function displayCountINT2() 
    {
        try 
        {
            $blocks = ParkingBlock::select('block_name')
                ->withCount(['slots' => function ($query) {
                    $query->where('status', 1);
                }])
                ->get()
                ->keyBy('block_name'); // Index by block_name for easy lookup

            $customResponse = [
                'Display-1' => ($blocks['INT2-A1']->slots_count ?? 0) + ($blocks['INT2-A2']->slots_count ?? 0),
                'Display-2' => ($blocks['INT2-B2']->slots_count ?? 0),
                'Display-3' => ($blocks['INT2-C2']->slots_count ?? 0) + ($blocks['INT2-B1']->slots_count ?? 0),
                'Display-4' => ($blocks['INT2-C1']->slots_count ?? 0) + ($blocks['INT2-D2']->slots_count ?? 0),
                'Display-5' => ($blocks['INT2-E2']->slots_count ?? 0) + ($blocks['INT2-D1']->slots_count ?? 0),
                'Display-6' => ($blocks['INT2-F2']->slots_count ?? 0) + ($blocks['INT2-E1']->slots_count ?? 0),
                'Display-7' => ($blocks['INT2-G2']->slots_count ?? 0) + ($blocks['INT2-F1']->slots_count ?? 0),
                'Display-8' => ($blocks['INT2-H1']->slots_count ?? 0) + ($blocks['INT2-H2']->slots_count ?? 0) + ($blocks['INT2-G1']->slots_count ?? 0),
              
            ];

            return response()->json($customResponse);
        } 
        catch (\Exception $e)
        {
            return response()->json(['error' => 'Error fetching parking slots', 'message' => $e->getMessage()], 500);
        }
    }

    public function totalDisplayCountINT2() 
    {
        try 
        {
            $blocks = ParkingBlock::select('block_name')
                ->withCount(['slots' => function ($query) {
                    $query->where('status', 1);
                }])
                ->get()
                ->keyBy('block_name'); // Index by block_name for easy lookup

            $customResponse = [
                'Display-1' => ($blocks['INT2-A2']->slots_count ?? 0),
                'Display-2' => ($blocks['INT2-A1']->slots_count ?? 0) + ($blocks['INT2-B2']->slots_count ?? 0),
                'Display-3' => ($blocks['INT2-B1']->slots_count ?? 0) + ($blocks['INT2-C2']->slots_count ?? 0),
                'Display-4' => ($blocks['INT2-C1']->slots_count ?? 0) + ($blocks['INT2-D2']->slots_count ?? 0),
                'Display-5' => ($blocks['INT2-D1']->slots_count ?? 0) + ($blocks['INT2-E2']->slots_count ?? 0),
                'Display-6' => ($blocks['INT2-E1']->slots_count ?? 0) + ($blocks['INT2-F2']->slots_count ?? 0),
                'Display-7' => ($blocks['INT2-F1']->slots_count ?? 0) + ($blocks['INT2-G2']->slots_count ?? 0),
                'Display-8' => ($blocks['INT2-G1']->slots_count ?? 0) + ($blocks['INT2-H1']->slots_count ?? 0) + ($blocks['INT2-H2']->slots_count ?? 0),
            ];

            $total_display_count = array_sum($customResponse);

            return response()->json(['Total_display_count' => $total_display_count]);
        } 
        catch (\Exception $e)
        {
            return response()->json(['error' => 'Error fetching parking slots', 'message' => $e->getMessage()], 500);
        }
    }

    public function displayCountINT3INT4() 
    {
        try 
        {
            $blocks = ParkingBlock::select('block_name')
                ->withCount(['slots' => function ($query) {
                    $query->where('status', 1);
                }])
                ->get()
                ->keyBy('block_name'); // Index by block_name for easy lookup

            $customResponse = [
                'Display-1' => ($blocks['INT3-I1']->slots_count ?? 0) + ($blocks['INT3-I2']->slots_count ?? 0) + ($blocks['INT3-J2']->slots_count ?? 0),// block id - 89 - 90 - 94
                'Display-2' => ($blocks['INT3-J1']->slots_count ?? 0) + ($blocks['INT3-K2']->slots_count ?? 0), // block id - 93 -98
                'Display-3' => ($blocks['INT3-K1']->slots_count ?? 0) + ($blocks['INT3-L2']->slots_count ?? 0),
                'Display-4' => ($blocks['INT3-L1']->slots_count ?? 0) + ($blocks['INT3-M2']->slots_count ?? 0),
                'Display-5' => ($blocks['INT3-M1']->slots_count ?? 0) + ($blocks['INT3-N2']->slots_count ?? 0),
                'Display-6' => ($blocks['INT3-N1']->slots_count ?? 0) + ($blocks['INT3-O2']->slots_count ?? 0),
                'Display-7' => $blocks['INT3-O2']->slots_count ?? 0,

                'Display-8' => ($blocks['INT4-I3']->slots_count ?? 0) + ($blocks['INT4-I4']->slots_count ?? 0) + ($blocks['INT3-J4']->slots_count ?? 0),
                'Display-9' => ($blocks['INT4-J3']->slots_count ?? 0) + ($blocks['INT4-K4']->slots_count ?? 0),
                'Display-10' => ($blocks['INT4-J3']->slots_count ?? 0) + ($blocks['INT4-K4']->slots_count ?? 0),
                'Display-11' => ($blocks['INT4-L3']->slots_count ?? 0) + ($blocks['INT4-M4']->slots_count ?? 0),
                'Display-12' => ($blocks['INT4-M3']->slots_count ?? 0) + ($blocks['INT4-N4']->slots_count ?? 0),
            ];

            return response()->json($customResponse);
        } 
        catch (\Exception $e)
        {
            return response()->json(['error' => 'Error fetching parking slots', 'message' => $e->getMessage()], 500);
        }
    }

    public function totalDisplayCountINT3INT4() 
    {
        try 
        {
            $blocks = ParkingBlock::select('block_name')
                ->withCount(['slots' => function ($query) {
                    $query->where('status', 1);
                }])
                ->get()
                ->keyBy('block_name'); // Index by block_name for easy lookup

            $customResponse = [
                'Display-1' => $blocks['INT3-I2']->slots_count ?? 0, // block id - 90
                'Display-2' => $blocks['INT4-I4']->slots_count ?? 0, // block id - 92
                'Display-3' => ($blocks['INT3-I1']->slots_count ?? 0) + ($blocks['INT3-J2']->slots_count ?? 0),// block id - 89 - 94
                'Display-4' => ($blocks['INT4-I3']->slots_count ?? 0) + ($blocks['INT4-J4']->slots_count ?? 0),// block id - 91 - 96
                'Display-5' => ($blocks['INT3-J1']->slots_count ?? 0) + ($blocks['INT3-K2']->slots_count ?? 0),// block id - 93 - 98
                'Display-6' => ($blocks['INT4-J3']->slots_count ?? 0) + ($blocks['INT4-K4']->slots_count ?? 0),// block id - 95 - 100
                'Display-7' => ($blocks['INT3-K1']->slots_count ?? 0) + ($blocks['INT3-L2']->slots_count ?? 0),// block id - 97 - 102
                'Display-8' => ($blocks['INT4-K3']->slots_count ?? 0) + ($blocks['INT4-L4']->slots_count ?? 0),// block id - 99 - 104 
                'Display-9' => ($blocks['INT3-L1']->slots_count ?? 0) + ($blocks['INT3-M2']->slots_count ?? 0),// block id - 101 - 106 
                'Display-10' => ($blocks['INT4-L3']->slots_count ?? 0) + ($blocks['INT4-M4']->slots_count ?? 0),// block id - 103 - 108
                'Display-11' => ($blocks['INT3-M1']->slots_count ?? 0) + ($blocks['INT3-N2']->slots_count ?? 0),// block id - 105 - 110
                'Display-12' => ($blocks['INT4-M3']->slots_count ?? 0) + ($blocks['INT4-N4']->slots_count ?? 0) + ($blocks['INT4-N3']->slots_count ?? 0),// block id - 107 - 112  - 111 
                'Display-13' => ($blocks['INT3-N1']->slots_count ?? 0) + ($blocks['INT3-O2']->slots_count ?? 0) + ($blocks['INT3-O1']->slots_count ?? 0),// block id - 109 - 114 - 113
            ];

            $total_display_count = array_sum($customResponse);

            return response()->json(['Total_display_count' => $total_display_count]);
        } 
        catch (\Exception $e)
        {
            return response()->json(['error' => 'Error fetching parking slots', 'message' => $e->getMessage()], 500);
        }
    }

    // New Parking Display Count Api

    public function newParkingSlotsCount() 
    {
        try 
        {
            $blocks = ParkingBlock::select('block_name')
                ->withCount(['slots' => function ($query) {
                    $query->where('status', 1);
                }])
                ->whereBetween('id', [115, 140])
                ->get()
                ->keyBy('block_name'); // Index by block_name for easy lookup

            // Create the formatted response based on required logic
            $customResponse = [
                'Display-1' => $blocks['NEWP-AA1']->slots_count ?? 0,
                'Display-2' => $blocks['NEWP-AB1']->slots_count ?? 0,
                'Display-3' => ($blocks['NEWP-AA2']->slots_count ?? 0) + ($blocks['NEWP-AB3']->slots_count ?? 0),
                'Display-4' => ($blocks['NEWP-AB2']->slots_count ?? 0) + ($blocks['NEWP-AC1']->slots_count ?? 0),
                'Display-5' => ($blocks['NEWP-AB4']->slots_count ?? 0) + ($blocks['NEWP-AC3']->slots_count ?? 0),
                'Display-6' => ($blocks['NEWP-AC2']->slots_count ?? 0) + ($blocks['NEWP-AD1']->slots_count ?? 0),
                'Display-7' => ($blocks['NEWP-AC4']->slots_count ?? 0) + ($blocks['NEWP-AD3']->slots_count ?? 0),
                'Display-8' => ($blocks['NEWP-AD2']->slots_count ?? 0) + ($blocks['NEWP-AE1']->slots_count ?? 0),
                'Display-9' => ($blocks['NEWP-AD4']->slots_count ?? 0) + ($blocks['NEWP-AE3']->slots_count ?? 0),
                'Display-10' => ($blocks['NEWP-AE2']->slots_count ?? 0) + ($blocks['NEWP-AF1']->slots_count ?? 0),
                'Display-11' => ($blocks['NEWP-AE4']->slots_count ?? 0) + ($blocks['NEWP-AF3']->slots_count ?? 0),
                'Display-12' => ($blocks['NEWP-AF2']->slots_count ?? 0) + ($blocks['NEWP-AG1']->slots_count ?? 0) + ($blocks['NEWP-AG2']->slots_count ?? 0),
                'Display-13' => ($blocks['NEWP-AF4']->slots_count ?? 0) + ($blocks['NEWP-AG3']->slots_count ?? 0) + ($blocks['NEWP-AG4']->slots_count ?? 0),
            ];

            return response()->json($customResponse);
        } 
        catch (\Exception $e) 
        {
            return response()->json(['error' => 'Error fetching parking slots', 'message' => $e->getMessage()], 500);
        }
    }


    // public function searchVehicleLocation($license_plate)
    // {
    //     try
    //     {
    //         $response = Http::post('https://parkin.pro/api/v4/vehicle-info-pgs/vehicle-list-get', [
    //             'registration_number' => $license_plate
    //         ]);
            
    //         $search_number = preg_replace('/[^A-Za-z0-9]/', '', strtoupper($license_plate)); // Clean & uppercase

    //         $parking_slots = ParkingSlot::select(
    //                 'parking_blocks.block_name',
    //                 'parking_blocks.lot_name',
    //                 'parking_slots.slot_number',
    //                 'parking_slots.vehicle_number_plate',
    //                 'parking_slots.vehicle_image'
    //             )
    //             ->join('parking_blocks', 'parking_slots.block_id', '=', 'parking_blocks.id')
    //             ->whereRaw("REPLACE(UPPER(vehicle_number_plate), ' ', '') LIKE ?", ["%$search_number%"])
    //             ->get();
            
    //         if ($response->successful()) 
    //         {
    //             $data = $response->json();
    //             $bookings = $data['bookings'] ?? null;

    //             $matched_slots = [];

    //             if (is_array($bookings)) 
    //             {
    //                 foreach ($bookings as &$booking) 
    //                 {
    //                     $booking_plate = preg_replace('/[^A-Za-z0-9]/', '', strtoupper($booking['registration_number']));


    //                     foreach ($parking_slots as $slot) 
    //                     {
    //                         $slot_plate = preg_replace('/[^A-Za-z0-9]/', '', strtoupper($slot->vehicle_number_plate));
    //                         $match = false;

    //                         // 1. Exact match
    //                         if ($slot_plate === $booking_plate) 
    //                         {
    //                             $match = true;
    //                         }
    //                         // 2. First 4 & last 4 character match
    //                         else 
    //                         {
    //                             $booking_start = substr($booking_plate, 0, 4);
    //                             $booking_end = substr($booking_plate, -4);
    //                             $slot_start = substr($slot_plate, 0, 4);
    //                             $slot_end = substr($slot_plate, -4);

    //                             if ($booking_start === $slot_start && $booking_end === $slot_end) 
    //                             {
    //                                 $match = true;
    //                             }
                               
    //                         }

    //                         if (!$match) 
    //                         {
    //                             $percent = 0;
    //                             similar_text($slot_plate, $booking_plate, $percent);
    //                             if ($percent >= 80) 
    //                             {
    //                                 $match = true;
    //                             }
    //                         }

    //                         if (!$match) 
    //                         {
    //                             $distance = levenshtein($slot_plate, $booking_plate);
    //                             $maxLen = max(strlen($slot_plate), strlen($booking_plate));
    //                             if ($maxLen > 0 && (1 - $distance / $maxLen) >= 0.8) 
    //                             {
    //                                 $match = true;
    //                             }
    //                         }

    //                         if ($match) 
    //                         {
    //                             $booking['parking_slot_info'] = [
    //                                 'block_name' => $slot->block_name,
    //                                 'lot_name' => $slot->lot_name,
    //                                 'slot_number' => $slot->slot_number,
    //                                 'vehicle_image' => $slot->vehicle_image,
    //                             ];
    //                             break; // Stop checking further slots for this booking
    //                         }
    //                     }
    //                 }

    //                 usort($bookings, function ($a, $b) 
    //                 {
    //                     $a_matched = isset($a['parking_slot_info']) ? 1 : 0;
    //                     $b_matched = isset($b['parking_slot_info']) ? 1 : 0;
                
    //                     return $b_matched <=> $a_matched; // matched
    //                 });
    //             }

    //             return [
    //                 'status' => true,
    //                 'message' => 'Data search successfully',
    //                 'all_vehicle_data' => $bookings,
    //             ];
    //         }

    //     }
    //     catch (\Exception $e)
    //     {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Error search vehicle location',
    //             'error' => $e->getMessage(),
    //         ], 500);
    //     }
    // }

    // public function searchVehicleLocation($license_plate)
    // {
    //     try {
    //         $response = Http::post('https://parkin.pro/api/v4/vehicle-info-pgs/vehicle-list-get', [
    //             'registration_number' => $license_plate
    //         ]);

    //         $search_number = preg_replace('/[^A-Za-z0-9]/', '', strtoupper($license_plate)); // Clean & uppercase

    //         $parking_slots = ParkingSlot::select(
    //                 'parking_blocks.block_name',
    //                 'parking_blocks.lot_name',
    //                 'parking_slots.slot_number',
    //                 'parking_slots.vehicle_number_plate',
    //                 'parking_slots.vehicle_image'
    //             )
    //             ->join('parking_blocks', 'parking_slots.block_id', '=', 'parking_blocks.id')
    //             ->get();

    //         if ($response->successful()) {
    //             $data = $response->json();
    //             $bookings = $data['bookings'] ?? null;

    //             if (is_array($bookings)) {
    //                 foreach ($bookings as &$booking) {
    //                     $booking_plate = preg_replace('/[^A-Za-z0-9]/', '', strtoupper($booking['registration_number']));

    //                     $best_match = null;
    //                     $best_score = 0;

    //                     foreach ($parking_slots as $slot) 
    //                     {
    //                         $slot_plate = preg_replace('/[^A-Za-z0-9]/', '', strtoupper($slot->vehicle_number_plate));

    //                         // 1. Exact match
    //                         if ($slot_plate === $booking_plate) 
    //                         {
    //                             $best_match = $slot;
    //                             $best_score = 100;
    //                             break; 
    //                         }

    //                         // 2. First 4 + Last 4
    //                         $booking_start = substr($booking_plate, 0, 4);
    //                         $booking_end   = substr($booking_plate, -4);
    //                         $slot_start    = substr($slot_plate, 0, 4);
    //                         $slot_end      = substr($slot_plate, -4);

    //                         if ($booking_start === $slot_start && $booking_end === $slot_end) 
    //                         {
    //                             $best_match = $slot;
    //                             $best_score = 95;
    //                             break;
    //                         }

    //                         // 3. Fuzzy Match 
    //                         $percent = 0;
    //                         similar_text($slot_plate, $booking_plate, $percent);

    //                         if ($percent > $best_score) 
    //                         {
    //                             $best_score = $percent;
    //                             $best_match = $slot;
    //                         }
    //                     }

    //                     // if get any match then attach only one
    //                     if ($best_match && $best_score >= 70) {
    //                         $booking['parking_slot_info'] = [
    //                             'block_name' => $best_match->block_name,
    //                             'lot_name'   => $best_match->lot_name,
    //                             'slot_number'=> $best_match->slot_number,
    //                             'vehicle_image' => $best_match->vehicle_image,
    //                             'match_score'   => $best_score
    //                         ];
    //                     }
    //                 }
    //             }

    //             return [
    //                 'status' => true,
    //                 'message' => 'Data search successfully',
    //                 'all_vehicle_data' => $bookings,
    //             ];
    //         }

    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Error search vehicle location',
    //             'error' => $e->getMessage(),
    //         ], 500);
    //     }
    // }

    private function normalizeLot($name)
    {
        $name = strtoupper(trim($name));

        if (str_contains($name, 'INTERNATIONAL TERMINAL') || str_contains($name, 'INT')) 
        {
            return 'INT';
        }

        if (str_contains($name, 'DOMESTIC CAR PARKING') || str_contains($name, 'DTC')) 
        {
            return 'DTC';
        }

        return 'UNKNOWN';
    }

    public function searchVehicleLocation($license_plate)
    {
        try 
        {
            $response = Http::post('https://parkin.pro/api/v4/vehicle-info-pgs/vehicle-list-get', [
                'registration_number' => $license_plate
            ]);

            $search_number = preg_replace('/[^A-Za-z0-9]/', '', strtoupper($license_plate)); // Clean & uppercase

            // All available slots
            $parking_slots = ParkingSlot::select(
                    'parking_blocks.block_name',
                    'parking_blocks.lot_name',
                    'parking_slots.slot_number',
                    'parking_slots.vehicle_number_plate',
                    'parking_slots.vehicle_image'
                )
                ->join('parking_blocks', 'parking_slots.block_id', '=', 'parking_blocks.id')
                ->get()
                ->toArray(); // convert to array so we can unset later

            if ($response->successful()) 
            {
                $data = $response->json();
                $bookings = $data['bookings'] ?? null;

                if (is_array($bookings)) 
                {
                    foreach ($bookings as &$booking) 
                    {
                        $booking_plate = preg_replace('/[^A-Za-z0-9]/', '', strtoupper($booking['registration_number']));

                        $best_match = null;
                        $best_score = 0;
                        $best_index = null;

                        $booking_lot = $this->normalizeLot($booking['parking_lot']);
                        

                        foreach ($parking_slots as $index => $slot) 
                        {
                            $slot_lot = $this->normalizeLot($slot['lot_name']);

                            if ($booking_lot !== $slot_lot) 
                            {
                                continue;
                            }

                            $slot_plate = preg_replace('/[^A-Za-z0-9]/', '', strtoupper($slot['vehicle_number_plate']));
                          
                            // 1. Exact match
                            if ($slot_plate === $booking_plate) 
                            {
                                $best_match = $slot;
                                $best_score = 100;
                                $best_index = $index;
                                break;
                            }

                            // 2. Last 4 digits strict
                            if (substr($slot_plate, -4) === substr($booking_plate, -4)) 
                            {
                                $best_match = $slot;
                                $best_score = 98;
                                $best_index = $index;
                                break;
                            }

                            // 3. First 4 + Last 3 strict
                            if 
                            (
                                substr($slot_plate, 0, 4) === substr($booking_plate, 0, 4) &&
                                substr($slot_plate, -3) === substr($booking_plate, -3)
                            ) 
                            {
                                $best_match = $slot;
                                $best_score = 95;
                                $best_index = $index;
                                break;
                            }

                            // 4. Fuzzy fallback (high threshold)
                            $percent = 0;
                            similar_text($slot_plate, $booking_plate, $percent);

                            if ($percent > $best_score && $percent >= 85) 
                            {
                                $best_score = $percent;
                                $best_match = $slot;
                                $best_index = $index;
                            }
                        }

                        // if get any valid match then attach slot list
                        if ($best_match) 
                        {
                            $booking['parking_slot_info'] = [
                                'block_name'   => $best_match['block_name'],
                                'lot_name'     => $best_match['lot_name'],
                                'slot_number'  => $best_match['slot_number'],
                                'vehicle_image'=> $best_match['vehicle_image'],
                                'match_score'  => $best_score
                            ];

                            // Slot consume bookings reuse
                            unset($parking_slots[$best_index]);
                        }
                    }
                }

                return [
                    'status' => true,
                    'message' => 'Data search successfully',
                    'all_vehicle_data' => $bookings,
                ];
            }

        } 
        catch (\Exception $e) 
        {
            return response()->json([
                'status' => false,
                'message' => 'Error search vehicle location',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // public function searchVehicleLocation($license_plate)
    // {
    //     try {
    //         $response = Http::post('https://parkin.pro/api/v4/vehicle-info-pgs/vehicle-list-get', [
    //             'registration_number' => $license_plate
    //         ]);

    //         //return $response;


    //         $search_number = preg_replace('/[^A-Za-z0-9]/', '', strtoupper($license_plate)); // Clean & uppercase

    //         // All available slots
    //         $parking_slots = ParkingSlot::select(
    //                 'parking_blocks.block_name',
    //                 'parking_blocks.lot_name',
    //                 'parking_slots.slot_number',
    //                 'parking_slots.vehicle_number_plate',
    //                 'parking_slots.vehicle_image'
    //             )
    //             ->join('parking_blocks', 'parking_slots.block_id', '=', 'parking_blocks.id')
    //             ->get()
    //             ->toArray(); // convert to array so we can unset later

    //         // return $parking_slots;

    //         if ($response->successful()) 
    //         {
    //             $data = $response->json();
    //             $bookings = $data['bookings'] ?? null;

    //             if (is_array($bookings)) 
    //             {
    //                 foreach ($bookings as &$booking) 
    //                 {
    //                     $booking_plate = preg_replace('/[^A-Za-z0-9]/', '', strtoupper($booking['registration_number']));

    //                     $best_match = null;
    //                     $best_score = 0;
    //                     $best_index = null;

    //                     foreach ($parking_slots as $index => $slot) 
    //                     {
    //                         $slot_plate = preg_replace('/[^A-Za-z0-9]/', '', strtoupper($slot['vehicle_number_plate']));

    //                         // 1. Exact match
    //                         if ($slot_plate === $booking_plate) 
    //                         {
    //                             $best_match = $slot;
    //                             $best_score = 100;
    //                             $best_index = $index;
    //                             break;
    //                         }

    //                         // 2. Last 4 digits strict
    //                         if (substr($slot_plate, -4) === substr($booking_plate, -4)) {
    //                             $best_match = $slot;
    //                             $best_score = 98;
    //                             $best_index = $index;
    //                             break;
    //                         }

    //                         // 3. First 4 + Last 3 strict
    //                         if 
    //                         (
    //                             substr($slot_plate, 0, 4) === substr($booking_plate, 0, 4) &&
    //                             substr($slot_plate, -3) === substr($booking_plate, -3)
    //                         ) 
    //                         {
    //                             $best_match = $slot;
    //                             $best_score = 95;
    //                             $best_index = $index;
    //                             break;
    //                         }

    //                         // 4. Fuzzy fallback (high threshold)
    //                         $percent = 0;
    //                         similar_text($slot_plate, $booking_plate, $percent);

    //                         if ($percent > $best_score && $percent >= 85) 
    //                         {
    //                             $best_score = $percent;
    //                             $best_match = $slot;
    //                             $best_index = $index;
    //                         }
    //                     }

    //                     // if get any valid match then attach slot list
    //                     if ($best_match) {
    //                         $booking['parking_slot_info'] = [
    //                             'block_name'   => $best_match['block_name'],
    //                             'lot_name'     => $best_match['lot_name'],
    //                             'slot_number'  => $best_match['slot_number'],
    //                             'vehicle_image'=> $best_match['vehicle_image'],
    //                             'match_score'  => $best_score
    //                         ];

    //                         // Slot consume bookings reuse
    //                         unset($parking_slots[$best_index]);
    //                     }
    //                 }
    //             }

    //             return [
    //                 'status' => true,
    //                 'message' => 'Data search successfully',
    //                 'all_vehicle_data' => $bookings,
    //             ];
    //         }

    //     } 
    //     catch (\Exception $e) 
    //     {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Error search vehicle location',
    //             'error' => $e->getMessage(),
    //         ], 500);
    //     }
    // }
}
