<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Farm;
use App\Models\Turbine;
use App\Models\Component;
use App\Models\Inspection;
use App\Models\Grade;
use App\Models\ComponentType;
use App\Models\GradeType;

class ApiRelationshipsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        \Faker\Factory::create()->unique(true);
    }

    public function test_farm_turbines_relationship()
    {
        $farm = Farm::factory()->create();
        Turbine::factory()->count(3)->create(['farm_id' => $farm->id]);
        $response = $this->getJson("/api/farms/{$farm->id}/turbines");
        $response->assertStatus(200)->assertJsonStructure([
            'data' => [
                '*' => [
                    'id', 'name', 'farm_id', 'lat', 'lng', 'created_at', 'updated_at'
                ]
            ]
        ]);
    }

    public function test_turbine_components_relationship()
    {
        $turbine = Turbine::factory()->create();
        $types = ComponentType::factory()->count(2)->create();
        GradeType::factory()->count(2)->create();
        foreach ($types as $type) {
            $component = Component::factory()->create(['turbine_id' => $turbine->id, 'component_type_id' => $type->id]);
            $inspection = Inspection::factory()->create(['turbine_id' => $turbine->id]);
            
            Grade::factory()->create([
                'component_id' => $component->id,
                'inspection_id' => $inspection->id,
                'grade_type_id' => 1,
                'grade' => 2
            ]);
        }
        $response = $this->getJson("/api/turbines/{$turbine->id}/components");
        $response->assertStatus(200)->assertJsonStructure([
            'data' => [
                '*' => [
                    'id', 'component_type_id', 'name', 'turbine_id', 'created_at', 'updated_at'
                ]
            ]
        ]);
    }

    public function test_component_grade_relationship()
    {
        $component = Component::factory()->create();
        $inspection = Inspection::factory()->create(['turbine_id' => $component->turbine_id]);
        GradeType::factory()->count(2)->create();
        $grade = Grade::factory()->create([
            'component_id' => $component->id,
            'inspection_id' => $inspection->id,
            'grade_type_id' => 1,
            'grade' => 2
        ]);
        $response = $this->getJson("/api/components/{$component->id}/grades");

        $response->assertStatus(200)->assertJsonStructure([
            'data' => [
                '*' => [
                    'id', 'inspection_id', 'component_id', 'grade_type_id', 'grade', 'name', 'created_at', 'updated_at'
                ]
            ]
        ]);
        $this->assertEquals($grade->id, $response->json('data.0.id'));
    }

    public function test_inspection_grades_relationship()
    {
        $inspection = Inspection::factory()->create();
        $component = Component::factory()->create(['turbine_id' => $inspection->turbine_id]);
        GradeType::factory()->count(2)->create();
        $grade = Grade::factory()->create([
            'component_id' => $component->id,
            'inspection_id' => $inspection->id,
            'grade_type_id' => 1,
            'grade' => 3
        ]);
        $response = $this->getJson("/api/inspections/{$inspection->id}/grades");
        $response->assertStatus(200)->assertJsonStructure([
            'data' => [
                '*' => [
                    'id', 'inspection_id', 'component_id', 'grade_type_id', 'grade', 'name', 'created_at', 'updated_at'
                ]
            ]
        ]);
        $this->assertEquals($grade->id, $response->json('data.0.id'));
    }
}
