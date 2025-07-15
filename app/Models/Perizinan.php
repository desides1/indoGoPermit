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

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

    // Relasi ke PermissionType
    public function permissionType()
    {
        return $this->belongsTo(PermissionType::class, 'permission_type_id_permission_type', 'id_permission_type');
    }

    // Relasi ke Location
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id_location', 'id_location');
    }

    // Relasi ke Request
    public function request()
    {
        return $this->belongsTo(Request::class, 'request_id_request', 'id_request');
    }

    // Relasi ke Individual
    public function individual()
    {
        return $this->belongsTo(Individual::class, 'individual_id', 'id_individual');
    }

    // Relasi ke BussinessEntity
    public function bussinessEntity()
    {
        return $this->belongsTo(BussinessEntity::class, 'bussiness_entity_id_bussiness_entity', 'id_bussiness_entity');
    }

    // Relasi ke DocumentRequirements
    public function documentRequirements()
    {
        return $this->belongsTo(DocumentRequirements::class, 'document_requirements_id_document_requirements', 'id_document_requirements');
    }

    // Relasi ke Project
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id_project', 'id_project');
    }

    // Relasi ke DetailDone
    public function detailDone()
    {
        return $this->hasOne(DetailDone::class, 'perizinan_id', 'id_perizinan');
    }
}
