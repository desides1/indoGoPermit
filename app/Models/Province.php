<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'province';
    protected $primaryKey = 'id_province';

    protected $fillable = [
        'name',
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id_city', 'id_city');
    }
}
