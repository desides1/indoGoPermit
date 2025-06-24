<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'project_type' => 'PMDN',
                'investment_value' => 1000000000,
                'target_pad' => 50000000,
                'total_employee' => 30
            ],
            [
                'project_type' => 'PMA',
                'investment_value' => 2500000000,
                'target_pad' => 125000000,
                'total_employee' => 75
            ],
            [
                'project_type' => 'Non Fasilitas',
                'investment_value' => 500000000,
                'target_pad' => 25000000,
                'total_employee' => 20
            ],
        ];

        DB::table('project')->insert($data);
    }
}
