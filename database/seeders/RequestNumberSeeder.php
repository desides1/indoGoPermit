<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['number' => 'REQ/2025/001'],
            ['number' => 'REQ/2025/002'],
            ['number' => 'REQ/2025/003'],
            ['number' => 'REQ/2025/004'],
            ['number' => 'REQ/2025/005'],
        ];

        DB::table('request_number')->insert($data);
    }
}
