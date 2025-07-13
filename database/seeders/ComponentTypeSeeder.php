<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ComponentType;

class ComponentTypeSeeder extends Seeder
{

    const INITIAL_COMPONENT_TYPES = ['Blade', 'Rotor', 'Hub', 'Generator'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $initialComponentTypesData = [];
        foreach (self::INITIAL_COMPONENT_TYPES as $typeName) {
            $initialComponentTypesData[] = array('name' => $typeName);
        }

        ComponentType::insert($initialComponentTypesData);
    }
}
