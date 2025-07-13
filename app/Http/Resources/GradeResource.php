<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GradeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'inspection_id' => $this->inspection_id,
            'component_id' => $this->component_id,
            'grade_type_id' => $this->grade_type_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
