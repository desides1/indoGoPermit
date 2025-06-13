<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPerizinan extends Model
{

    protected $table = 'data_perizinan';

    protected $fillable = [
        'user_id', 
        'foto_pemohon',
        'nama_pemohon',
        'jenis_perizinan',
        'status',
        'tanggal_pengajuan',
        'file_dokumen',
    ];

    // Definisikan relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Definisikan relasi lainnya jika ada
    public function permissionType()
    {
        return $this->belongsTo(PermissionType::class, 'jenis_perizinan', 'id');
    }
}
