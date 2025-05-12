<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetailDone;

class DetailDoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetailDone::create([
            'nama_pemohon'      => 'Charlie Kristen',
            'status'            => 'new',
            'jenis_perizinan'   => 'Izin Usaha',
            'tanggal_pengajuan' => '2024-05-01',
            'tanggal_selesai'   => '2024-05-10',
            'catatan'           => 'Dokumen lengkap, menunggu verifikasi.',
            'surat_keputusan'   => 'sk_charlie.pdf',
            'sertifikat_izin'   => 'izin_charlie.pdf',
            'berita_acara'      => 'bap_charlie.pdf',
            'dokumen_pendukung' => 'support_docs_charlie.zip',
        ]);
    }
}
