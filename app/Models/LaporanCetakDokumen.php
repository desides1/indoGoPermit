<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanCetakDokumen extends Model
{
    protected $table = 'laporan_cetak_dokumen';

    protected $fillable = [
        'user_id',
        'perizinan_id',
        'permission_type_id',
        'tanggal_pengajuan',
        'tanggal_selesai',
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

    // Relasi ke perizinan
    public function perizinan()
    {
        return $this->belongsTo(Perizinan::class, 'perizinan_id', 'id_perizinan');
    }

    // Relasi ke permission type
    public function permissionType()
    {
        return $this->belongsTo(PermissionType::class, 'permission_type_id', 'id_permission_type');
    }
}
