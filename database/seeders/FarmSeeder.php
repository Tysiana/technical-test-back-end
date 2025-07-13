<?php

namespace Database\Seeders;

use App\Models\Farm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FarmSeeder extends Seeder
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Farm::class;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Farm::factory()->count(2)->create();
    }
}
