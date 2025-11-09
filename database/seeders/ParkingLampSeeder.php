<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ParkingLampSeeder extends Seeder
{
    /*** Run the database seeds.*/
    public function run(): void
    {
        // List of cameras to insert or update
        $lamps = [

            // AA Block Cover 8 Lamp.
            ['name' => 'AAL1', 'lamp_device_id' => 'd7c7659bfef8d6e163vuaa'], 
            ['name' => 'AAL2', 'lamp_device_id' => 'd745e0813461fabdddkpsn'], 
            ['name' => 'AAL3', 'lamp_device_id' => 'd766d06942a9ca8b4cqypn'], 
            ['name' => 'AAL4', 'lamp_device_id' => 'd7768e102855188fdcguva'], 
            ['name' => 'AAL5', 'lamp_device_id' => 'd7b4124e3228b71a80y2iz'], 
            ['name' => 'AAL6', 'lamp_device_id' => 'd759654f9d444e65a6qq5a'], 
            ['name' => 'AAL7', 'lamp_device_id' => 'd7123a3e384930899b2nnr'], 
            ['name' => 'AAL8', 'lamp_device_id' => 'd7f35bd0bd4f9b0544gnyk'], 

            // AB Block Cover 16 Lamp.
            ['name' => 'ABL1', 'lamp_device_id' => 'd77b526aa91d59d4cfhc9i'],
            ['name' => 'ABL2', 'lamp_device_id' => 'd79f75f3089e8391afpy1a'],
            ['name' => 'ABL3', 'lamp_device_id' => 'd761d47c2582fb77a2obix'],
            ['name' => 'ABL4', 'lamp_device_id' => 'd78f6b6de93c83f638tobo'],
            ['name' => 'ABL5', 'lamp_device_id' => 'd7f03dfec9bb4b7e45aez3'],
            ['name' => 'ABL6', 'lamp_device_id' => 'd74cd9d61370c45f293aeu'],
            ['name' => 'ABL7', 'lamp_device_id' => 'd7fa171789586825ebur6r'],
            ['name' => 'ABL8', 'lamp_device_id' => 'd748b6ea78121c479ajevq'],
            ['name' => 'ABL9', 'lamp_device_id' => 'd7b5a8f135a6d5bbd1e0if'],
            ['name' => 'ABL10', 'lamp_device_id' => 'd7038192f37f1dd85c6wap'], 
            ['name' => 'ABL11', 'lamp_device_id' => 'd73ea83388ed289e1cnxhd'], 
            ['name' => 'ABL12', 'lamp_device_id' => 'd737ebaab8f56c2d19r4wp'], 
            ['name' => 'ABL13', 'lamp_device_id' => 'd7104e48222633642cmauw'], 
            ['name' => 'ABL14', 'lamp_device_id' => 'd76be8c0783e6b782eu0cl'], 
            ['name' => 'ABL15', 'lamp_device_id' => 'd70861ddb8d988b44fdxmg'], 
            ['name' => 'ABL16', 'lamp_device_id' => 'd7a2147f649036c979l0c5'], 

            // AC Block Cover 16 Lamp.
            ['name' => 'ACL1', 'lamp_device_id' => 'd79f79b7444df36629lwsn'], 
            ['name' => 'ACL2', 'lamp_device_id' => 'd72a8b7b91f87f247cffhv'], 
            ['name' => 'ACL3', 'lamp_device_id' => 'd7645165f87c205720yhjh'], 
            ['name' => 'ACL4', 'lamp_device_id' => 'd7859d1a7c2dfd3e08ylrb'], 
            ['name' => 'ACL5', 'lamp_device_id' => 'd74184b0985e21fe79yyfc'], 
            ['name' => 'ACL6', 'lamp_device_id' => 'd72290f548ebbd4f0az0p4'], 
            ['name' => 'ACL7', 'lamp_device_id' => 'd73daf8f4593a94404szdp'], 
            ['name' => 'ACL8', 'lamp_device_id' => 'd7551e199130fd33cbiesa'], 
            ['name' => 'ACL9', 'lamp_device_id' => 'd7b58a5f6f3fffc48e5rd8'],
            ['name' => 'ACL10', 'lamp_device_id' => 'd73ac0a6caff74a55bxtoq'],
            ['name' => 'ACL11', 'lamp_device_id' => 'd7274d060633a7705dvg8q'],
            ['name' => 'ACL12', 'lamp_device_id' => 'd7a971003db54bbb5bbtvw'],
            ['name' => 'ACL13', 'lamp_device_id' => 'd77c0930c692756db1olpc'],
            ['name' => 'ACL14', 'lamp_device_id' => 'd71250edb54d7aff62ha3g'],
            ['name' => 'ACL15', 'lamp_device_id' => 'd70d5db08be0c89574oiur'],
            ['name' => 'ACL16', 'lamp_device_id' => 'd7f056775c53ff4eb3vuaz'],

            // AD Block Cover 16 Lamp.
            ['name' => 'ADL1', 'lamp_device_id' => 'd7255e863fd7f793f1hakq'], 
            ['name' => 'ADL2', 'lamp_device_id' => 'd7f4806d5957ba2284zazw'], 
            ['name' => 'ADL3', 'lamp_device_id' => 'd70cf95515e42c551axjdp'], 
            ['name' => 'ADL4', 'lamp_device_id' => 'd7de3cd633a242f4e9rww0'], 
            ['name' => 'ADL5', 'lamp_device_id' => 'd7cc9c8a0b6ae313a6pe6b'], 
            ['name' => 'ADL6', 'lamp_device_id' => 'd77ee1f869967446f96xg9'], 
            ['name' => 'ADL7', 'lamp_device_id' => 'd7b77566349669b4c5n2ff'], 
            ['name' => 'ADL8', 'lamp_device_id' => 'd7fa8dd7eaade047b2zvcu'], 
            ['name' => 'ADL9', 'lamp_device_id' => 'd7f3ed3c109bc8ccc2k7e6'], 
            ['name' => 'ADL10', 'lamp_device_id' => 'd7048bbf3a75b4f2a4ocox'], 
            ['name' => 'ADL11', 'lamp_device_id' => 'd7c1a795c5a3706b95ymxa'], 
            ['name' => 'ADL12', 'lamp_device_id' => 'd7ea5a03757a39917282bn'], 
            ['name' => 'ADL13', 'lamp_device_id' => 'd7589d21aa7842d858gwam'], 
            ['name' => 'ADL14', 'lamp_device_id' => 'd7dc289df738b67944aac6'], 
            ['name' => 'ADL15', 'lamp_device_id' => 'd7ae996f44048f323bkesz'], 
            ['name' => 'ADL16', 'lamp_device_id' => 'd7009810f07ca67957atxw'], 

            // AE Block cover 16 Lamp.
            ['name' => 'AEL1', 'lamp_device_id' => 'd79d5d57f0f4393fddx85r'], 
            ['name' => 'AEL2', 'lamp_device_id' => 'd704e83bac064d9cb4miy3'], 
            ['name' => 'AEL3', 'lamp_device_id' => 'd7354ac85ad55e055fa1yz'], 
            ['name' => 'AEL4', 'lamp_device_id' => 'd7a766e272db6eb7effuer'], 
            ['name' => 'AEL5', 'lamp_device_id' => 'd75a7ade92930bbfdatlyj'], 
            ['name' => 'AEL6', 'lamp_device_id' => 'd74c6ce6ac891a3d052rqf'], 
            ['name' => 'AEL7', 'lamp_device_id' => 'd7b9060ec62e5a0819dovp'], 
            ['name' => 'AEL8', 'lamp_device_id' => 'd7d1ee190f706bd7d76c1r'], 
            ['name' => 'AEL9', 'lamp_device_id' => 'd76c16da0c45a76b46e76h'], 
            ['name' => 'AEL10', 'lamp_device_id' => 'd7902f15747449ba5bh5si'],
            ['name' => 'AEL11', 'lamp_device_id' => 'd7d55e539c84435816l0q7'],
            ['name' => 'AEL12', 'lamp_device_id' => 'd7536a27cdb932ec55leaz'],
            ['name' => 'AEL13', 'lamp_device_id' => 'd77d373bcf337d7acecht8'], 
            ['name' => 'AEL14', 'lamp_device_id' => 'd74663d1c3be2c10fbasgu'],
            ['name' => 'AEL15', 'lamp_device_id' => 'd7098ad6f9dff19d3chq1m'],
            ['name' => 'AEL16', 'lamp_device_id' => 'd78ae977d75669e6a8rzda'], 

            // AF Block Cover 16 Lamp.
            ['name' => 'AFL1', 'lamp_device_id' => 'd787d0d5460e2af7d3dg1n'],
            ['name' => 'AFL2', 'lamp_device_id' => 'd7d8003930ca5e48ef6szh'],
            ['name' => 'AFL3', 'lamp_device_id' => 'd78ca130805d1266d6amie'],
            ['name' => 'AFL4', 'lamp_device_id' => 'd728025b0e2f30af6bgamm'],
            ['name' => 'AFL5', 'lamp_device_id' => 'd7f68e5bfda7846bf8yits'],
            ['name' => 'AFL6', 'lamp_device_id' => 'd786525a298c3adda9x1sm'],
            ['name' => 'AFL7', 'lamp_device_id' => 'd7c8498aade5804414wgvp'],  
            ['name' => 'AFL8', 'lamp_device_id' => 'd75c1749af6cfaaf38rxrr'],
            ['name' => 'AFL9', 'lamp_device_id' => 'd71ba1a4d181b06c26syat'], 
            ['name' => 'AFL10', 'lamp_device_id' => 'd735c39254df17eeealaay'],
            ['name' => 'AFL11', 'lamp_device_id' => 'd7a9ab51d57db6ea3azwzq'],
            ['name' => 'AFL12', 'lamp_device_id' => 'd7217d969d54609a5fme7f'],
            ['name' => 'AFL13', 'lamp_device_id' => 'd7a83292f6644cb8fbugqc'], 
            ['name' => 'AFL14', 'lamp_device_id' => 'd7abf84e037f340c30zjwp'],
            ['name' => 'AFL15', 'lamp_device_id' => 'd7f0e06b076d5b70b9qlwl'],
            ['name' => 'AFL16', 'lamp_device_id' => 'd7da8d8b6918c5e10c5vqb'],

            // AG Block Cover 16 Lamp.
            ['name' => 'AGL1', 'lamp_device_id' => 'd72cc4efe9365a49f3jk0e'],
            ['name' => 'AGL2', 'lamp_device_id' => 'd76a14c4e413b052abvdho'],
            ['name' => 'AGL3', 'lamp_device_id' => 'd753866f46a229ae335afj'],
            ['name' => 'AGL4', 'lamp_device_id' => 'd729d7e433007f7746jsvf'],
            ['name' => 'AGL5', 'lamp_device_id' => 'd7917a20ff1659856dazol'],
            ['name' => 'AGL6', 'lamp_device_id' => 'd7c02a4978f9f48672ewat'],
            ['name' => 'AGL7', 'lamp_device_id' => 'd7b732e9c11841c348s8g5'],
            ['name' => 'AGL8', 'lamp_device_id' => 'd7b7ae5a836fa2542finqo'],
            ['name' => 'AGL9', 'lamp_device_id' => 'd7460819e7266866bbapyu'],
            ['name' => 'AGL10', 'lamp_device_id' => 'd76051132d5e7fae9cn6da'],
            ['name' => 'AGL11', 'lamp_device_id' => 'd76b8fc39b2e5ed454cqat'],
            ['name' => 'AGL12', 'lamp_device_id' => 'd742b9af022e2b71f0wwda'],
            ['name' => 'AGL13', 'lamp_device_id' => 'd74299c309e6158d6bgcz8'],
            ['name' => 'AGL14', 'lamp_device_id' => 'd7c32e82600fe8ae6eg02d'],
            ['name' => 'AGL15', 'lamp_device_id' => 'd7519faf7ba581f096b0tg'],
            ['name' => 'AGL16', 'lamp_device_id' => 'd71d14b26304ae3dbbfo5z'],

        ];

        foreach ($lamps as $lamp) 
        {
            DB::table('parking_lamps')->updateOrInsert(
                ['name' => $lamp['name']],
                ['lamp_device_id' => $lamp['lamp_device_id']]
            );
        }
    }
}
