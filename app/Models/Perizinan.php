<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{


    protected $primaryKey = 'id_perizinan';
    protected $table = 'perizinan';
    protected $fillable = [
        'user_id',
        'permission_type_id_permission_type',
        'location_id_location',
        'request_id_request',
        'individual_id_individual',
        'bussiness_entity_id_bussiness_entity',
        'document_requirements_id_document_requirements',
        'project_id_project',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function permissionType()
    {
        return $this->belongsTo(PermissionType::class, 'permission_type_id_permission_type', 'id_permission_type');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id_location', 'id_location');
    }

    public function request()
    {
        return $this->belongsTo(Request::class, 'request_id_request', 'id_request');
    }

    public function individual()
    {
        return $this->belongsTo(Individual::class, 'individual_id', 'id_individual');
    }

    public function bussinessEntity()
    {
        return $this->belongsTo(BussinessEntity::class, 'bussiness_entity_id_bussiness_entity', 'id_bussiness_entity');
    }

    public function documentRequirements()
    {
        return $this->belongsTo(DocumentRequirements::class, 'document_requirements_id_document_requirements', 'id_document_requirements');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id_project', 'id_project');
    }
}
