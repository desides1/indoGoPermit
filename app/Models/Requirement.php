<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $table = 'requirement';
    protected $primaryKey = 'id_requirement';

    protected $fillable = [
        'name',
        'create_at',
        'update_at',
    ];
}
