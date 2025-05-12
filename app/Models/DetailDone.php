<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailDone extends Model
{
    // Nama tabel (opsional, Laravel akan otomatis gunakan 'detail_dones')
    protected $table = 'detail_done';

    // Kolom yang dapat diisi secara mass-assignment
    protected $fillable = [
        'nama_pemohon',
        'status',
        'jenis_perizinan',
        'tanggal_pengajuan',
        'tanggal_selesai',
        'catatan',
        'surat_keputusan',
        'sertifikat_izin',
        'berita_acara',
        'dokumen_pendukung',
    ];
}
