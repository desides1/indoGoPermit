<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BussinessEntity extends Model
{
    protected $table = 'bussiness_entity';
    protected $primaryKey = 'id_bussiness_entity';

    protected $fillable = [
        'name_bussiness',
        'registration_number',
        'npwp_number',
        'bussiness_type',
        'company_type',
        'total_employee',
        'investment_value',
        'telephone_hp',
        'email',
        'fax',
        'village',
        'postal_code',
        'detail_address',
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
