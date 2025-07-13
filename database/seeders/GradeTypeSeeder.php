<?php

namespace Database\Seeders;

use App\Models\GradeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeTypeSeeder extends Seeder
{

    const INITIAL_GRADE_TYPES = ['Wear', 'Corrosion'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $initialGradeTypesData = [];
        foreach (self::INITIAL_GRADE_TYPES as $typeName) {
            $initialGradeTypesData[] = array('name' => $typeName);
        }

        GradeType::insert($initialGradeTypesData);
    }
}
