<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComponentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'component_type_id' => $this->component_type_id,
            'name' => $this->name,
            'turbine_id' => $this->turbine_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
