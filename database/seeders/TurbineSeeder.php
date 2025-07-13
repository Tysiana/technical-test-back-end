<?php

namespace Database\Seeders;

use App\Models\Turbine;
use App\Models\Farm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TurbineSeeder extends Seeder
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Turbine::class;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $farms = Farm::all();

        foreach ($farms as $farm) {
            Turbine::factory()
                ->count(5)
                ->create([
                    'farm_id' => $farm->id,
                ]);
        }
    }
}
