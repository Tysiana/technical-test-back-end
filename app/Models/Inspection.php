<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'turbine_id'];

    public function turbine()
    {
        return $this->belongsTo(Turbine::class);
    }
}
