<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Turbine;
use App\Models\Component;
use App\Models\ComponentType;

class ComponentSeeder extends Seeder
{
    public function run()
    {
        $componentTypes = ComponentType::all();
        $turbines = Turbine::all();

        foreach ($turbines as $turbine) {
            foreach ($componentTypes as $type) {
                Component::factory()->create([
                    'turbine_id' => $turbine->id,
                    'component_type_id' => $type->id,
                ]);
            }
        }
    }
}
