<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LaporanCetakDokumenSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('laporan_cetak_dokumen')->insert([
            [
                'nama_pemohon'      => 'LIVIA DEWI',
                'jenis_izin'        => 'Baru',
                'status'            => 'disetujui',
                'tanggal_pengajuan' => '2025-03-10',
                'tanggal_selesai'   => '2025-03-17',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'nama_pemohon'      => 'MARYANA ROSALINA',
                'jenis_izin'        => 'Perpanjangan',
                'status'            => 'ditolak',
                'tanggal_pengajuan' => '2025-02-22',
                'tanggal_selesai'   => '2025-02-28',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'nama_pemohon'      => 'VANIA',
                'jenis_izin'        => 'Perubahan',
                'status'            => 'selesai',
                'tanggal_pengajuan' => '2025-03-13',
                'tanggal_selesai'   => '2025-03-20',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]
        ]);
    }
}
