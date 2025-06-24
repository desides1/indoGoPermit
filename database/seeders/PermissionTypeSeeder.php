<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Course LKP Fun Mandarin'],
            ['name' => 'Course LKP Mandafun Rin'],
            ['name' => 'Course LKP Mandarin Fun'],
        ];

        DB::table('permission_type')->insert($data);
    }
}
