<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionType extends Model
{
    protected $table = 'permission_type';
    protected $primaryKey = 'id_permission_type';

    protected $fillable = [
        'name',
        'created_at',
    ];
}
