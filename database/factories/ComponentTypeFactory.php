<?php

namespace Database\Factories;

use App\Models\ComponentType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ComponentType>
 */
class ComponentTypeFactory extends Factory
{
    protected $model = ComponentType::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
        ];
    }
}
