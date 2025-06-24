<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'latitude' => -7.2574719,
                'longitude' => 112.7520883,
                'detail_address' => 'Jl. Pemuda No. 12, Surabaya',
                'maps' => 'https://maps.google.com/location1'
            ],
            [
                'latitude' => -7.9666204,
                'longitude' => 112.6326321,
                'detail_address' => 'Jl. Brawijaya No. 45, Malang',
                'maps' => 'https://maps.google.com/location2'
            ],
            [
                'latitude' => -6.9174639,
                'longitude' => 107.6191228,
                'detail_address' => 'Jl. Asia Afrika No. 100, Bandung',
                'maps' => null
            ],
        ];

        DB::table('location')->insert($data);
    }
}
