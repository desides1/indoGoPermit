<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Perizinan extends Model
{
    use HasFactory;

    protected $table = 'perizinan';
    protected $primaryKey = 'id_perizinan';

    protected $fillable = [
        'user_id',
        'permission_type_id',
        'location_id',
        'request_id',
        'individual_id',
        'bussiness_entity_id',
        'document_requirements_id',
        'project_id',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the user that owns the perizinan
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the permission type
     */
    public function permissionType(): BelongsTo
    {
        return $this->belongsTo(PermissionType::class, 'permission_type_id', 'id_permission_type');
    }

    /**
     * Get the location
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id', 'id_location');
    }

    /**
     * Get the request
     */
    public function request(): BelongsTo
    {
        return $this->belongsTo(Request::class, 'request_id', 'id_request');
    }

    /**
     * Get the individual (nullable)
     */
    public function individual(): BelongsTo
    {
        return $this->belongsTo(Individual::class, 'individual_id', 'id_individual');
    }

    /**
     * Get the business entity (nullable)
     */
    public function bussinessEntity(): BelongsTo
    {
        return $this->belongsTo(BussinessEntity::class, 'bussiness_entity_id', 'id_bussiness_entity');
    }

    /**
     * Get the document requirements
     */
    public function documentRequirements(): BelongsTo
    {
        return $this->belongsTo(DocumentRequirements::class, 'document_requirements_id', 'id_document_requirements');
    }

    /**
     * Get the project
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id', 'id_project');
    }

    /**
     * Scope for draft status
     */
    public function scopeDrafts($query)
    {
        return $query->where('status', 'draft');
    }

    /**
     * Scope for non-draft status (activities)
     */
    public function scopeActivities($query)
    {
        return $query->whereNotIn('status', ['draft']);
    }

    /**
     * Scope for user's perizinan
     */
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
