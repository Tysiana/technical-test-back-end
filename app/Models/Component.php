<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'component_type_id', 'turbine_id'];

    public function turbine()
    {
        return $this->belongsTo(Turbine::class);
    }

    public function componentType()
    {
        return $this->belongsTo(ComponentType::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function inspections()
    {
        return $this->hasManyThrough(Inspection::class, Grade::class);
    }

}
