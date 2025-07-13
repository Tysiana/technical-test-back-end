<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Turbine;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Inspection>
 */
class InspectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'turbine_id' => Turbine::inRandomOrder()->first()->id ?? Turbine::factory(),
            'inspected_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
