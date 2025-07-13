<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Component;
use App\Models\Grade;
use App\Models\Inspection;

class ExampleGradedComponentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inspections = Inspection::factory()->count(3)->create();

        $components = Component::factory()->count(10)->create();

        foreach ($inspections as $inspection) {
            foreach ($components as $component) {
                Grade::factory()->create([
                    'component_id' => $component->id,
                    'inspection_id' => $inspection->id,
                ]);
            }
        }
    }
}
