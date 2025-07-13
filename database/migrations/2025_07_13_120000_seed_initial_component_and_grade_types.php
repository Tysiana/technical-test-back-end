<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Database\Seeders\ComponentTypeSeeder;
use Database\Seeders\GradeTypeSeeder;
use App\Models\ComponentType;
use App\Models\GradeType;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Run the seeders for initial data
        (new ComponentTypeSeeder())->run();
        (new GradeTypeSeeder())->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        ComponentType::whereIn('name', ComponentTypeSeeder::INITIAL_COMPONENT_TYPES)->delete();
        GradeType::whereIn('name', GradeTypeSeeder::INITIAL_GRADE_TYPES)->delete();
    }
};
