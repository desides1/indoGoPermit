<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubdistricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Gubeng', 'id_city' => 1],
            ['name' => 'Wonokromo', 'id_city' => 1],
            ['name' => 'Klojen', 'id_city' => 2],
            ['name' => 'Blimbing', 'id_city' => 2],
            ['name' => 'Banyumanik', 'id_city' => 3],
            ['name' => 'Tembalang', 'id_city' => 3],
            ['name' => 'Laweyan', 'id_city' => 4],
            ['name' => 'Banjarsari', 'id_city' => 4],
            ['name' => 'Coblong', 'id_city' => 5],
            ['name' => 'Bantul', 'id_city' => 6],
            ['name' => 'Menteng', 'id_city' => 7],
            ['name' => 'Denpasar Utara', 'id_city' => 8],
        ];

        DB::table('subdistrict')->insert($data);
    }
}
