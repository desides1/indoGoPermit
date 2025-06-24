<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';
    protected $primaryKey = 'id_city';

    protected $fillable = [
        'name',
        'id_province',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'id_province', 'id_province');
    }
}
