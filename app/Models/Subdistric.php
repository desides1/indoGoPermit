<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subdistric extends Model
{
    protected $table = 'subdistrict';
    protected $primaryKey = 'id_subdistrict';

    protected $fillable = [
        'name',
        'id_city',
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'id_city', 'id_city');
    }
}
