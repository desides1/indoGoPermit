<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestNumber extends Model
{
    protected $primaryKey = 'id_request_number';

    protected $fillable = [
        'number',
        'create_at',
    ];
}
