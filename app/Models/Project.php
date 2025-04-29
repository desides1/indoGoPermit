<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $primaryKey = 'id_project';

    protected $fillable = [
        'project_name',
        'investment_value',
        'target_pad',
        'total_employee',
    ];
}
