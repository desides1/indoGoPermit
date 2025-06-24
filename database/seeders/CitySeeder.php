<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Surabaya', 'id_province' => 1],
            ['name' => 'Malang', 'id_province' => 1],
            ['name' => 'Semarang', 'id_province' => 2],
            ['name' => 'Solo', 'id_province' => 2],
            ['name' => 'Bandung', 'id_province' => 3],
            ['name' => 'Bekasi', 'id_province' => 3],
            ['name' => 'Jakarta Pusat', 'id_province' => 4],
            ['name' => 'Denpasar', 'id_province' => 5],
        ];

        DB::table('city')->insert($data);
    }
}
