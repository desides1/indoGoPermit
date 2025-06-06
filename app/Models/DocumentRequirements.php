<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentRequirements extends Model
{
    protected $primaryKey = 'id_document_requirements';
    protected $table = 'document_requirements';

    protected $fillable = [
        'document_number',
        'valid_until',
        'status',
        'file_path',
        'create_at',
        'update_at',
        'document_requirement_id',
        'perizinan_id',
    ];


    public function requirement()
    {
        return $this->belongsTo(Requirement::class, 'requirement_id_requirement', 'id_requirement');
    }
}
