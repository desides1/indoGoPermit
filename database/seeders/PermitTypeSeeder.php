<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PermitType;
use Illuminate\Support\Facades\DB;

class PermitTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permits = [
            ['name' => 'Izin Pendirian Satuan Pendidikan NonFormal-SPNF'],
            ['name' => 'Izin Pendirian Satuan Pedidikan Anak Usia Dini-PAUD'],
            ['name' => 'Izin Pendirian Satuan Pendidikan Satuan Sekolah Dasar-SD'],
            ['name' => 'Izin Pendirian Satuan Pendidikan Satuan Sekolah Menengah Pertama-SMP'],
            ['name' => 'Izin Penyelenggaraan Laboratorium Kesehatan Masyarakat'],
            ['name' => 'Izin Peruntukan Penggunaan Tanahh-IPPT'],
            ['name' => 'IKonfirmasi Kesesuaian Kegiatan Pemanfaatan Ruang NonBerusaha-KKKPR'],
            ['name' => 'Legalisir IMB-LIMB'],
            ['name' => 'Izin Pendirian Satuan Pendidikan NonFormal'],
        ];
        foreach ($permits as $permit) {
            // PermitType::factory()->create($permit);
            PermitType::create($permit);
        }
    }
}
