<?php

namespace Database\Factories;

use App\Models\Grade;
use App\Models\GradeType;
use App\Models\Component;
use App\Models\Inspection;
use Illuminate\Database\Eloquent\Factories\Factory;

class GradeFactory extends Factory
{
    protected $model = Grade::class;

    public function definition()
    {
        return [
            'grade' => $this->faker->numberBetween(1, 5),
            'grade_type_id' => GradeType::inRandomOrder()->first()->id ?? GradeType::factory(),
            'component_id' => Component::inRandomOrder()->first()->id ?? Component::factory(),
            'inspection_id' => Inspection::inRandomOrder()->first()->id ?? Inspection::factory(),
        ];
    }
}
