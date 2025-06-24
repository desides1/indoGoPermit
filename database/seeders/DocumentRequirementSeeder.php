<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentRequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'document_number' => 'DOC/2025/001',
                'valid_until' => '2025-12-31',
                'status' => 'fill',
                'file_path' => 'documents/ktp_001.pdf',
                'no_expiry' => false,
                'requirement_id' => 1
            ],
            [
                'document_number' => 'DOC/2025/002',
                'valid_until' => null,
                'status' => 'fill',
                'file_path' => 'documents/npwp_001.pdf',
                'no_expiry' => true,
                'requirement_id' => 2
            ],
            [
                'document_number' => 'DOC/2025/003',
                'valid_until' => '2025-06-30',
                'status' => 'unfill',
                'file_path' => 'documents/domisili_001.pdf',
                'no_expiry' => false,
                'requirement_id' => 3
            ],
            [
                'document_number' => 'DOC/2025/004',
                'valid_until' => null,
                'status' => 'fill',
                'file_path' => 'documents/akta_001.pdf',
                'no_expiry' => true,
                'requirement_id' => 4
            ],
        ];

        DB::table('document_requirements')->insert($data);
    }
}
