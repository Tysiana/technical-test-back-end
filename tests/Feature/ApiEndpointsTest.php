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
        Farm::factory()->count(2)->create();
        $response = $this->getJson('/api/farms');
        $response->assertStatus(200)->assertJsonStructure(['data']);
    }

    public function test_turbines_index_returns_data()
    {
        Turbine::factory()->count(2)->create();
        $response = $this->getJson('/api/turbines');
        $response->assertStatus(200)->assertJsonStructure(['data']);
    }

    public function test_components_index_returns_data()
    {
        Component::factory()->count(2)->create();
        $response = $this->getJson('/api/components');
        $response->assertStatus(200)->assertJsonStructure(['data']);
    }

    public function test_inspections_index_returns_data()
    {
        Inspection::factory()->count(2)->create();
        $response = $this->getJson('/api/inspections');
        $response->assertStatus(200)->assertJsonStructure(['data']);
    }

    public function test_grades_index_returns_data()
    {
        Grade::factory()->count(2)->create();
        $response = $this->getJson('/api/grades/1');
        $response->assertStatus(200);
    }

    public function test_component_types_index_returns_data()
    {
        ComponentType::factory()->count(2)->create();
        $response = $this->getJson('/api/component-types');
        $response->assertStatus(200)->assertJsonStructure(['data']);
    }

    public function test_grade_types_index_returns_data()
    {
        GradeType::factory()->count(2)->create();
        $response = $this->getJson('/api/grade-types');
        $response->assertStatus(200)->assertJsonStructure(['data']);
    }
}
