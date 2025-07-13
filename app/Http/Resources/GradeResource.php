<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Enums\GradeName;

class GradeResource extends JsonResource
{
    public function toArray($request)
    {
        $name = null;
        if (GradeName::tryFrom($this->grade)) {
            $name = GradeName::from($this->grade)->label();
        }
        return [
            'id' => $this->id,
            'inspection_id' => $this->inspection_id,
            'component_id' => $this->component_id,
            'grade_type_id' => $this->grade_type_id,
            'grade' => $this->grade,
            'name' => $name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
