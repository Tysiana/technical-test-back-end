<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Component;
use App\Models\Grade;
use App\Models\Inspection;
use App\Models\Turbine;

class ExampleGradedComponentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $turbines = Turbine::all();

        foreach ($turbines as $turbine) {
            $components = $turbine->components;
            if ($components->isEmpty()) continue;

            $inspection = Inspection::factory()->create([
                'turbine_id' => $turbine->id,
            ]);

            foreach ($components as $component) {
                Grade::factory()->create([
                    'component_id' => $component->id,
                    'inspection_id' => $inspection->id,
                ]);
            }
        }
    }
}
