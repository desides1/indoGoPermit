<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $primaryKey = 'id_province';

    protected $fillable = [
        'name',
        'city_id_city',
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id_city', 'id_city');
    }
}
