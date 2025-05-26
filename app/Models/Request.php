<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $primaryKey = 'id_request';

    protected $fillable = [
        'request_type',
        'permit_type_id',
        'request_number_id',
    ];

    public function permitType()
    {
        return $this->belongsTo(PermitType::class, 'permit_type_id_request_type', 'id_request_type');
    }

    public function requestNumber()
    {
        return $this->belongsTo(RequestNumber::class, 'request_number_id_request_number', 'id_request_number');
    }
}
