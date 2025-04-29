<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermitType extends Model
{
    protected $primaryKey = 'id_permit_type';

    protected $fillable = [
        'name',
        'created_at',
    ];
}
