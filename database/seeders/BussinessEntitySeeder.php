<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BussinessEntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name_bussiness' => 'PT Maju Bersama',
                'registration_number' => '1234567890123456',
                'npwp_number' => '01.234.567.8-901.000',
                'bussiness_type' => 'Trading',
                'company_type' => 'PT',
                'total_employee' => 25,
                'investment_value' => 500000000,
                'telephone_hp' => '081234567890',
                'email' => 'info@majubersama.com',
                'fax' => '031-1234567',
                'village' => 'Gubeng Kertajaya',
                'postal_code' => '60286',
                'detail_address' => 'Jl. Raya Gubeng No. 123',
                'province_id' => 1,
                'city_id' => 1,
                'subdistrict_id' => 1
            ],
            [
                'name_bussiness' => 'CV Berkah Jaya',
                'registration_number' => '9876543210987654',
                'npwp_number' => '09.876.543.2-109.000',
                'bussiness_type' => 'Manufacturing',
                'company_type' => 'CV',
                'total_employee' => 15,
                'investment_value' => 750000000,
                'telephone_hp' => '081987654321',
                'email' => 'contact@berkahjaya.com',
                'fax' => '0341-987654',
                'village' => 'Klojen',
                'postal_code' => '65111',
                'detail_address' => 'Jl. Ijen No. 45',
                'province_id' => 1,
                'city_id' => 2,
                'subdistrict_id' => 3
            ],
        ];

        DB::table('bussiness_entity')->insert($data);
    }
}
