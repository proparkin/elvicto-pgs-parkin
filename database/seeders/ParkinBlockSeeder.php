<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ParkinBlockSeeder extends Seeder
{
    /*** Run the database seeds.*/
    public function run(): void
    {
        $blocks = [
            // DTC 1 Bay Block & DTC 2 Bay Block
            ['block_name' => 'DTC1-P1','lot_name' => 'DTC1'], 
            ['block_name' => 'DTC1-P2','lot_name' => 'DTC1'], 
            ['block_name' => 'DTC2-P3','lot_name' => 'DTC2'], 
            ['block_name' => 'DTC2-P4','lot_name' => 'DTC2'], 
            ['block_name' => 'DTC1-Q1','lot_name' => 'DTC1'], 
            ['block_name' => 'DTC1-Q2','lot_name' => 'DTC1'],
            ['block_name' => 'DTC2-Q3','lot_name' => 'DTC2'],
            ['block_name' => 'DTC2-Q4','lot_name' => 'DTC2'],
            ['block_name' => 'DTC1-R1','lot_name' => 'DTC1'],
            ['block_name' => 'DTC1-R2','lot_name' => 'DTC1'],
            ['block_name' => 'DTC2-R3','lot_name' => 'DTC2'],
            ['block_name' => 'DTC2-R4','lot_name' => 'DTC2'],
            ['block_name' => 'DTC1-S1','lot_name' => 'DTC1'], 
            ['block_name' => 'DTC1-S2','lot_name' => 'DTC1'], 
            ['block_name' => 'DTC2-S3','lot_name' => 'DTC2'], 
            ['block_name' => 'DTC2-S4','lot_name' => 'DTC2'], 
            ['block_name' => 'DTC1-T1','lot_name' => 'DTC1'], 
            ['block_name' => 'DTC1-T2','lot_name' => 'DTC1'], 
            ['block_name' => 'DTC2-T3','lot_name' => 'DTC2'], 
            ['block_name' => 'DTC2-T4','lot_name' => 'DTC2'], 
            ['block_name' => 'DTC1-U1','lot_name' => 'DTC1'],
            ['block_name' => 'DTC1-U2','lot_name' => 'DTC1'],
            ['block_name' => 'DTC2-U3','lot_name' => 'DTC2'],
            ['block_name' => 'DTC2-U4','lot_name' => 'DTC2'],
            ['block_name' => 'DTC1-V1','lot_name' => 'DTC1'],
            ['block_name' => 'DTC1-V2','lot_name' => 'DTC1'],
            ['block_name' => 'DTC2-V3','lot_name' => 'DTC2'],
            ['block_name' => 'DTC2-V4','lot_name' => 'DTC2'],
            ['block_name' => 'DTC1-W1','lot_name' => 'DTC1'],
            ['block_name' => 'DTC1-W2','lot_name' => 'DTC1'], 
            ['block_name' => 'DTC2-W3','lot_name' => 'DTC2'],
            ['block_name' => 'DTC2-W4','lot_name' => 'DTC2'],

            // DTC 3 Bay Block & DTC 4 Bay Block
            ['block_name' => 'DTC3-P1','lot_name' => 'DTC3'], 
            ['block_name' => 'DTC3-P2','lot_name' => 'DTC3'], 
            ['block_name' => 'DTC4-P3','lot_name' => 'DTC4'], 
            ['block_name' => 'DTC4-P4','lot_name' => 'DTC4'], 
            ['block_name' => 'DTC3-Q1','lot_name' => 'DTC3'], 
            ['block_name' => 'DTC3-Q2','lot_name' => 'DTC3'],
            ['block_name' => 'DTC4-Q3','lot_name' => 'DTC4'],
            ['block_name' => 'DTC4-Q4','lot_name' => 'DTC4'],
            ['block_name' => 'DTC3-R1','lot_name' => 'DTC3'],
            ['block_name' => 'DTC3-R2','lot_name' => 'DTC3'],
            ['block_name' => 'DTC4-R3','lot_name' => 'DTC4'],
            ['block_name' => 'DTC4-R4','lot_name' => 'DTC4'],
            ['block_name' => 'DTC3-S1','lot_name' => 'DTC3'], 
            ['block_name' => 'DTC3-S2','lot_name' => 'DTC3'], 
            ['block_name' => 'DTC4-S3','lot_name' => 'DTC4'], 
            ['block_name' => 'DTC4-S4','lot_name' => 'DTC4'], 
            ['block_name' => 'DTC3-T1','lot_name' => 'DTC3'], 
            ['block_name' => 'DTC3-T2','lot_name' => 'DTC3'], 
            ['block_name' => 'DTC4-T3','lot_name' => 'DTC4'], 
            ['block_name' => 'DTC4-T4','lot_name' => 'DTC4'], 
            ['block_name' => 'DTC3-U1','lot_name' => 'DTC3'],
            ['block_name' => 'DTC3-U2','lot_name' => 'DTC3'],
            ['block_name' => 'DTC4-U3','lot_name' => 'DTC4'],
            ['block_name' => 'DTC4-U4','lot_name' => 'DTC4'],
            ['block_name' => 'DTC3-V1','lot_name' => 'DTC3'],
            ['block_name' => 'DTC3-V2','lot_name' => 'DTC3'],
            ['block_name' => 'DTC4-V3','lot_name' => 'DTC4'],
            ['block_name' => 'DTC4-V4','lot_name' => 'DTC4'],
            ['block_name' => 'DTC3-W1','lot_name' => 'DTC3'],
            ['block_name' => 'DTC3-W2','lot_name' => 'DTC3'], 
            ['block_name' => 'DTC4-W3','lot_name' => 'DTC4'],
            ['block_name' => 'DTC4-W4','lot_name' => 'DTC4'],

            // Solar 1 Bay Block
            ['block_name' => 'INT1-A1','lot_name' => 'INT1'], 
            ['block_name' => 'INT1-A2','lot_name' => 'INT1'], 
            ['block_name' => 'INT1-B1','lot_name' => 'INT1'], 
            ['block_name' => 'INT1-B2','lot_name' => 'INT1'], 
            ['block_name' => 'INT1-C1','lot_name' => 'INT1'], 
            ['block_name' => 'INT1-C2','lot_name' => 'INT1'],
            ['block_name' => 'INT1-D1','lot_name' => 'INT1'],
            ['block_name' => 'INT1-D2','lot_name' => 'INT1'],

            // Solar 2 Bay Block
            ['block_name' => 'INT2-A1','lot_name' => 'INT2'],
            ['block_name' => 'INT2-A2','lot_name' => 'INT2'],
            ['block_name' => 'INT2-B1','lot_name' => 'INT2'],
            ['block_name' => 'INT2-B2','lot_name' => 'INT2'],
            ['block_name' => 'INT2-C1','lot_name' => 'INT2'], 
            ['block_name' => 'INT2-C2','lot_name' => 'INT2'], 
            ['block_name' => 'INT2-D1','lot_name' => 'INT2'], 
            ['block_name' => 'INT2-D2','lot_name' => 'INT2'], 
            ['block_name' => 'INT2-E1','lot_name' => 'INT2'], 
            ['block_name' => 'INT2-E2','lot_name' => 'INT2'], 
            ['block_name' => 'INT2-F1','lot_name' => 'INT2'], 
            ['block_name' => 'INT2-F2','lot_name' => 'INT2'], 
            ['block_name' => 'INT2-G1','lot_name' => 'INT2'],
            ['block_name' => 'INT2-G2','lot_name' => 'INT2'],
            ['block_name' => 'INT2-H1','lot_name' => 'INT2'],
            ['block_name' => 'INT2-H2','lot_name' => 'INT2'],

            // Solar 3 Bay Block Solar 4 Bay Block

            ['block_name' => 'INT3-I1','lot_name' => 'INT3'],
            ['block_name' => 'INT3-I2','lot_name' => 'INT3'],
            ['block_name' => 'INT4-I3','lot_name' => 'INT4'],
            ['block_name' => 'INT4-I4','lot_name' => 'INT4'],
            ['block_name' => 'INT3-J1','lot_name' => 'INT3'],
            ['block_name' => 'INT3-J2','lot_name' => 'INT3'], 
            ['block_name' => 'INT4-J3','lot_name' => 'INT4'],
            ['block_name' => 'INT4-J4','lot_name' => 'INT4'],
            ['block_name' => 'INT3-K1','lot_name' => 'INT3'],
            ['block_name' => 'INT3-K2','lot_name' => 'INT3'],
            ['block_name' => 'INT4-K3','lot_name' => 'INT4'],
            ['block_name' => 'INT4-K4','lot_name' => 'INT4'], 
            ['block_name' => 'INT3-L1','lot_name' => 'INT3'],
            ['block_name' => 'INT3-L2','lot_name' => 'INT3'], 
            ['block_name' => 'INT4-L3','lot_name' => 'INT4'],
            ['block_name' => 'INT4-L4','lot_name' => 'INT4'],
            ['block_name' => 'INT3-M1','lot_name' => 'INT3'],
            ['block_name' => 'INT3-M2','lot_name' => 'INT3'],
            ['block_name' => 'INT4-M3','lot_name' => 'INT4'],
            ['block_name' => 'INT4-M4','lot_name' => 'INT4'],
            ['block_name' => 'INT3-N1','lot_name' => 'INT3'],
            ['block_name' => 'INT3-N2','lot_name' => 'INT3'], 
            ['block_name' => 'INT4-N3','lot_name' => 'INT4'],
            ['block_name' => 'INT4-N4','lot_name' => 'INT4'],
            ['block_name' => 'INT3-O1','lot_name' => 'INT3'],
            ['block_name' => 'INT3-O2','lot_name' => 'INT3'],
            
            // New parking block

            ['block_name' => 'NEWP-AA1','lot_name' => 'NEWP'], 
            ['block_name' => 'NEWP-AA2','lot_name' => 'NEWP'], 
            ['block_name' => 'NEWP-AB1','lot_name' => 'NEWP'],
            ['block_name' => 'NEWP-AB2','lot_name' => 'NEWP'],
            ['block_name' => 'NEWP-AB3','lot_name' => 'NEWP'],
            ['block_name' => 'NEWP-AB4','lot_name' => 'NEWP'],
            ['block_name' => 'NEWP-AC1','lot_name' => 'NEWP'], 
            ['block_name' => 'NEWP-AC2','lot_name' => 'NEWP'], 
            ['block_name' => 'NEWP-AC3','lot_name' => 'NEWP'], 
            ['block_name' => 'NEWP-AC4','lot_name' => 'NEWP'], 
            ['block_name' => 'NEWP-AD1','lot_name' => 'NEWP'],
            ['block_name' => 'NEWP-AD2','lot_name' => 'NEWP'],
            ['block_name' => 'NEWP-AD3','lot_name' => 'NEWP'],
            ['block_name' => 'NEWP-AD4','lot_name' => 'NEWP'],
            ['block_name' => 'NEWP-AE1','lot_name' => 'NEWP'],
            ['block_name' => 'NEWP-AE2','lot_name' => 'NEWP'],  
            ['block_name' => 'NEWP-AE3','lot_name' => 'NEWP'],
            ['block_name' => 'NEWP-AE4','lot_name' => 'NEWP'], 
            ['block_name' => 'NEWP-AF1','lot_name' => 'NEWP'],
            ['block_name' => 'NEWP-AF2','lot_name' => 'NEWP'],
            ['block_name' => 'NEWP-AF3','lot_name' => 'NEWP'],
            ['block_name' => 'NEWP-AF4','lot_name' => 'NEWP'],
            ['block_name' => 'NEWP-AG1','lot_name' => 'NEWP'],
            ['block_name' => 'NEWP-AG2','lot_name' => 'NEWP'],
            ['block_name' => 'NEWP-AG3','lot_name' => 'NEWP'],
            ['block_name' => 'NEWP-AG4','lot_name' => 'NEWP']

        ];

        foreach ($blocks as $block) 
        {
            DB::table('parking_blocks')->updateOrInsert(
                ['block_name' => $block['block_name']],
                ['lot_name' => $block['lot_name']] 
            );
        }
    }
}
