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

class ApiEndpointsTest extends TestCase
{
    use RefreshDatabase;

    public function test_farms_index_returns_data()
    {
        $farms = Farm::factory()->count(2)->create();

        $response = $this->getJson('/api/farms');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [['id', 'name', 'created_at', 'updated_at']]
            ]);

        $response->assertJsonFragment(['name' => $farms->first()->name]);
    }

    public function test_turbines_index_returns_data()
    {
        $turbines = Turbine::factory()->count(2)->create();

        $response = $this->getJson('/api/turbines');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [['id', 'name', 'farm_id', 'created_at', 'updated_at']]
            ]);
        $response->assertJsonFragment(['name' => $turbines->first()->name]);
    }

    public function test_components_index_returns_data()
    {
        $components = Component::factory()->count(2)->create();

        $response = $this->getJson('/api/components');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [['id', 'name', 'turbine_id', 'component_type_id', 'created_at', 'updated_at']]
            ]);
    }

    public function test_inspections_index_returns_data()
    {
        $inspections = Inspection::factory()->count(2)->create();

        $response = $this->getJson('/api/inspections');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [['id', 'turbine_id', 'inspected_at', 'created_at', 'updated_at']]
            ]);
    }

    public function test_component_types_index_returns_data()
    {
        $componentTypes = ComponentType::factory()->count(2)->create();

        $response = $this->getJson('/api/component-types');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [['id', 'name', 'created_at', 'updated_at']]
            ]);
    }

    public function test_grade_types_index_returns_data()
    {
        $gradeTypes = GradeType::factory()->count(2)->create();

        $response = $this->getJson('/api/grade-types');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [['id', 'name', 'created_at', 'updated_at']]
            ]);
    }
}
