<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{

    protected $table = 'data_perizinan';

    protected $fillable = [
        'foto_pemohon',
        'nama_pemohon',
        'jenis_perizinan',
        'status',
        'tanggal_pengajuan',
        'file_dokumen',
    ];
}
