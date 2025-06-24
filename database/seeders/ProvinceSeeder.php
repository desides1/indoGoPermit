<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Jawa Timur'],
            ['name' => 'Jawa Tengah'],
            ['name' => 'Jawa Barat'],
            ['name' => 'DKI Jakarta'],
            ['name' => 'Bali'],
        ];

        DB::table('province')->insert($data);
    }
}
