<?php

use App\Http\Resources\ComponentCollection;
use App\Http\Resources\InspectionCollection;
use App\Http\Resources\ComponentTypeCollection;
use App\Http\Resources\FarmResource;
use App\Http\Resources\TurbineCollection;
use App\Http\Resources\TurbineResource;
use App\Http\Resources\ComponentResource;
use App\Http\Resources\InspectionResource;
use App\Http\Resources\GradeCollection;
use App\Http\Resources\GradeTypeCollection;
use App\Http\Resources\GradeResource;
use App\Http\Resources\ComponentTypeResource;
use App\Http\Resources\GradeTypeResource;
use App\Models\Grade;
use App\Models\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Farm;
use App\Models\Turbine;
use App\Models\ComponentType;
use App\Models\GradeType;
use App\Models\Inspection;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Farms
Route::get('farms', function () {
     return FarmResource::collection(Farm::paginate());
});
Route::get('farms/{farm}', function (Farm $farm) {
    return new FarmResource($farm);
});
Route::get('farms/{farm}/turbines', function (Farm $farm) {
     return new TurbineCollection($farm->turbines);
});
Route::get('farms/{farm}/turbines/{turbine}', function (Farm $farm, Turbine $turbine) {
    return new TurbineResource($turbine);
});

// Turbines
Route::get('turbines', function () {
     return TurbineResource::collection(Turbine::paginate());
});

Route::get('turbines/{turbine}', function (Turbine $turbine) {
     return new TurbineResource($turbine);
});

Route::get('turbines/{turbine}/components', function (Turbine $turbine) {
     return new ComponentCollection($turbine->components);
});

Route::get('turbines/{turbine}/inspections', function (Turbine $turbine) {
     return new InspectionCollection($turbine->inspections);
});

Route::get('turbines/{turbine}/inspections/{inspection}', function (Turbine $turbine, Inspection $inspection) {
    return new InspectionResource($inspection);
});

// Components
Route::get('components', function () {
     return new ComponentCollection(Component::paginate());
});
Route::get('components/{component}', function (Component $component) {
    return new ComponentResource($component);
});

Route::get('components/{component}/grades', function (Component $component) {
     return new GradeCollection($component->grades);
});

Route::get('components/{component}/grades/{grade}', function (Component $component, Grade $grade) {
    return new GradeResource($grade);
});

// Inspections
Route::get('inspections', function () {
     return new InspectionCollection(Inspection::paginate());
});

Route::get('inspections/{inspection}', function (Inspection $inspection) {
    return new InspectionResource($inspection);
});

Route::get('inspections/{inspection}/grades', function (Inspection $inspection) {
     return new GradeCollection($inspection->grades);
});

Route::get('inspections/{inspection}/grades/{grade}', function (Inspection $inspection, Grade $grade) {
    return new GradeResource($grade);
});

Route::get('grades/{grade}', function (Grade $grade) {
    return new GradeResource($grade);
});

// Component Types
Route::get('component-types', function () {
     return new ComponentTypeCollection(ComponentType::all());
});
Route::get('component-types/{componentType}', function (ComponentType $componentType) {
    return new ComponentTypeResource($componentType);
}); 

// Grade Types
Route::get('grade-types', function () {
     return new GradeTypeCollection(GradeType::all());
});
Route::get('grade-types/{gradeType}', function (GradeType $gradeType) {
    return new GradeTypeResource($gradeType);
});