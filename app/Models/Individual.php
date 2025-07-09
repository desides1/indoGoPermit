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
        'perizinan_id',
    ];

    public function perizinan()
    {
        return $this->belongsTo(Perizinan::class, 'perizinan_id', 'id_perizinan');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id_province', 'id_province');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id_city', 'id_city');
    }

    public function subdistric()
    {
        return $this->belongsTo(Subdistric::class, 'subdistric_id_subdistric', 'id_subdistric');
    }
}
