<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanCetakDokumen extends Model
{
    use HasFactory;

    protected $table = 'laporan_cetak_dokumen';

    protected $fillable = [
        'nama_pemohon',
        'jenis_izin',
        'status',
        'tanggal_pengajuan',
        'tanggal_selesai'
    ];
}
