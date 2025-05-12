<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerizinanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('perizinan')->insert([
            [
                'foto_pemohon' => 'user.png',
                'nama_pemohon' => 'Charlie Kristen',
                'jenis_perizinan' => 'New',
                'status' => 'waiting',
                'tanggal_pengajuan' => '2023-02-12',
                'file_dokumen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'foto_pemohon' => 'user.png',
                'nama_pemohon' => 'Malaika Brown',
                'jenis_perizinan' => 'Extension',
                'status' => 'accepted',
                'tanggal_pengajuan' => '2023-02-11',
                'file_dokumen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'foto_pemohon' => 'user.png',
                'nama_pemohon' => 'Simon Minter',
                'jenis_perizinan' => 'Change',
                'status' => 'rejected',
                'tanggal_pengajuan' => '2023-01-10',
                'file_dokumen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'foto_pemohon' => 'user.png',
                'nama_pemohon' => 'Nishant Talwar',
                'jenis_perizinan' => 'Change',
                'status' => 'done',
                'tanggal_pengajuan' => '2022-12-08',
                'file_dokumen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'foto_pemohon' => 'user.png',
                'nama_pemohon' => 'Mark Jacobs',
                'jenis_perizinan' => 'New',
                'status' => 'process',
                'tanggal_pengajuan' => '2023-02-07',
                'file_dokumen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'foto_pemohon' => 'user.png',
                'nama_pemohon' => 'Ashley Brooke',
                'jenis_perizinan' => 'Retraction',
                'status' => 'rejected',
                'tanggal_pengajuan' => '2023-03-09',
                'file_dokumen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
