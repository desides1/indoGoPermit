<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailDone extends Model
{
    use HasFactory;

    protected $table = 'detail_done';

    protected $fillable = [
        'user_id',
        'perizinan_id',
        'permission_type_id',
        'tanggal_pengajuan',
        'tanggal_selesai',
        'catatan',
        'surat_keputusan',
        'sertifikat_izin',
        'berita_acara',
        'dokumen_pendukung'
    ];

    protected $dates = [
        'tanggal_pengajuan',
        'tanggal_selesai',
        'created_at',
        'updated_at'
    ];

    /**
     * Relasi ke tabel users
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

    /**
     * Relasi ke tabel perizinan
     */
    public function perizinan()
    {
        return $this->belongsTo(Perizinan::class, 'perizinan_id', 'id_perizinan');
    }

    /**
     * Relasi ke tabel permission_type
     */
    public function permissionType()
    {
        return $this->belongsTo(PermissionType::class, 'permission_type_id', 'id_permission_type');
    }
}
