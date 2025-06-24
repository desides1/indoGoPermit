<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'request_type' => 'Perpanjangan',
                'request_type_id' => 2,
                'request_number_id' => 2
            ],
            [
                'request_type' => 'Perubahan',
                'request_type_id' => 3,
                'request_number_id' => 3
            ],
            [
                'request_type' => 'Pencabutan',
                'request_type_id' => 1,
                'request_number_id' => 4
            ],
        ];

        DB::table('request')->insert($data);
    }
}
