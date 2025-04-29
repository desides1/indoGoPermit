<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $primaryKey = 'id_city';

    protected $fillable = [
        'name',
        'subdistrict_id_subdistrict',
    ];

    public function subdistrict()
    {
        return $this->belongsTo(Subdistric::class, 'subdistrict_id_subdistrict', 'id_subdistrict');
    }
}
