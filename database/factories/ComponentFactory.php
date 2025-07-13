<?php

namespace Database\Factories;

use App\Models\Component;
use App\Models\Turbine;
use App\Models\ComponentType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComponentFactory extends Factory
{
    protected $model = Component::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'turbine_id' => Turbine::inRandomOrder()->first()->id ?? Turbine::factory(),
            'component_type_id' => ComponentType::inRandomOrder()->first()->id ?? ComponentType::factory(),
        ];
    }
}
