<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InspectionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'turbine_id' => $this->turbine_id,
            'inspected_at' => $this->inspected_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
