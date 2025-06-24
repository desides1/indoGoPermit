<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerizinanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 2,
                'permission_type_id' => 1,
                'location_id' => 1,
                'request_id' => 1,
                'individual_id' => 1,
                'bussiness_entity_id' => null,
                'document_requirements_id' => 1,
                'project_id' => 1,
                'status' => 'disetujui',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 2,
                'permission_type_id' => 2,
                'location_id' => 2,
                'request_id' => 2,
                'individual_id' => null,
                'bussiness_entity_id' => 1,
                'document_requirements_id' => 2,
                'project_id' => 2,
                'status' => 'ditolak',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 2,
                'permission_type_id' => 3,
                'location_id' => 3,
                'request_id' => 3,
                'individual_id' => 2,
                'bussiness_entity_id' => null,
                'document_requirements_id' => 3,
                'project_id' => 3,
                'status' => 'draft',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 2,
                'permission_type_id' => 1,
                'location_id' => 1,
                'request_id' => 1,
                'individual_id' => 1,
                'bussiness_entity_id' => null,
                'document_requirements_id' => 1,
                'project_id' => 1,
                'status' => 'draft',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        DB::table('perizinan')->insert($data);
    }
}
