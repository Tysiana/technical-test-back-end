<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['grade', 'grade_type_id', 'component_id', 'inspection_id'];

    protected $casts = [
        'grade' => 'integer',
    ];

    public function gradeType()
    {
        return $this->belongsTo(GradeType::class);
    }

    public function component()
    {
        return $this->belongsTo(Component::class);
    }
    
    public function inspection()
    {
        return $this->belongsTo(Inspection::class);
    }
}
