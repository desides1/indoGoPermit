<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Individual extends Model
{
    protected $table = 'individual';
    protected $primaryKey = 'id_individual';

    protected $fillable = [
        'indentity_type',
        'number_identity',
        'name',
        'gender',
        'birthplace',
        'telephone_hp',
        'email',
        'job',
        'npwp_number',
        'village',
        'postal_code',
        'detail_address',
        'date_of_bird',
        'id_province',
        'id_city',
        'id_subdistric',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id_province');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id_city');
    }

    public function subdistric()
    {
        return $this->belongsTo(Subdistric::class, 'subdistrict_id', 'id_subdistrict');
    }
}
