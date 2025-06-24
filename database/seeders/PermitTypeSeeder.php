<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermitTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Perdagangan'],
            ['name' => 'Industri'],
            ['name' => 'Jasa'],
            ['name' => 'Konstruksi'],
            ['name' => 'Pertanian'],
        ];

        DB::table('permit_type')->insert($data);
    }
}
