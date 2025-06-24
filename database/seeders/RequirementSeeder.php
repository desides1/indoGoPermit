<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Fotocopy KTP Pemohon'],
            ['name' => 'Fotocopy NPWP'],
            ['name' => 'Surat Keterangan Domisili'],
            ['name' => 'Akta Pendirian Perusahaan'],
            ['name' => 'Izin Gangguan (HO)'],
            ['name' => 'Sertifikat Tanah'],
            ['name' => 'IMB Bangunan'],
        ];

        DB::table('requirement')->insert($data);
    }
}
