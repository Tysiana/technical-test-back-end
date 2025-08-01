<?php

namespace Database\Factories;

use App\Models\Turbine;
use App\Models\Farm;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Turbine>
 */
class TurbineFactory extends Factory
{
    protected $model = Turbine::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'farm_id' => Farm::factory(), 
            'name' => $this->faker->unique()->word(),
            'lat' => $this->faker->latitude(55.0, 56.0),
            'lng' => $this->faker->longitude(-4.0, -2.0),
        ];
    }
}
