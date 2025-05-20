<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subdistric extends Model
{
    protected $primaryKey = 'id_subdistrict';

    protected $fillable = [
        'name',
    ];
}
