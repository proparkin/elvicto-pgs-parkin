<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{TuyaAccount};

class TuyaAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accounts = [
            [
                'name' => 'Account-1',
                'client_id' => '4auw95gn8ega5ct3wanj',
                'secret' => 'cdc4525c8834428784fd63e98a39ddd4',
                'api_url' => 'https://openapi.tuyain.com'
            ],
            [
                'name' => 'Account-2',
                'client_id' => 'uufwch9kryn7qrkr3vyv',
                'secret' => '45fbc9a53a2b4161b14d30fdd5f59660',
                'api_url' => 'https://openapi.tuyain.com'
            ],
        ];

        foreach ($accounts as $acc) 
        {
            TuyaAccount::create($acc);
        }
    }
}
