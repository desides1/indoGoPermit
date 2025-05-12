<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{
    use HasFactory;

    protected $table = 'perizinan';

    protected $fillable = [
        'foto_pemohon',
        'nama_pemohon',
        'jenis_perizinan',
        'status',
        'tanggal_pengajuan',
        'file_dokumen',
    ];
}
