<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndividualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'identity_type' => 'KTP',
                'number_identity' => '3578123456781234',
                'name' => 'Ahmad Santoso',
                'gender' => 'Laki-laki',
                'birthplace' => 'Surabaya',
                'telephone_hp' => '081234567890',
                'email' => 'ahmad@email.com',
                'job' => 'Wiraswasta',
                'npwp_number' => '12.345.678.9-012.000',
                'village' => 'Gubeng Kertajaya',
                'postal_code' => '60286',
                'detail_address' => 'Jl. Kertajaya No. 10',
                'date_of_bird' => '1985-05-15',
                'province_id' => 1,
                'city_id' => 1,
                'subdistrict_id' => 1
            ],
            [
                'identity_type' => 'KTP',
                'number_identity' => '3271456789012345',
                'name' => 'Siti Rahayu',
                'gender' => 'Perempuan',
                'birthplace' => 'Jakarta',
                'telephone_hp' => '081987654321',
                'email' => 'siti@email.com',
                'job' => 'Pegawai Swasta',
                'npwp_number' => '98.765.432.1-098.000',
                'village' => 'Menteng Dalam',
                'postal_code' => '10310',
                'detail_address' => 'Jl. Menteng Raya No. 25',
                'date_of_bird' => '1990-08-22',
                'province_id' => 4,
                'city_id' => 7,
                'subdistrict_id' => 11
            ],
        ];

        DB::table('individual')->insert($data);
    }
}
