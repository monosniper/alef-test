<?php

use App\Http\Controllers\Api\V1\GroupController;
use App\Http\Controllers\Api\V1\LectureController;
use App\Http\Controllers\Api\V1\PlanController;
use App\Http\Controllers\Api\V1\StudentController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    Route::apiResources([
        'students' => StudentController::class,
        'groups' => GroupController::class,
        'lectures' => LectureController::class,
        'plans' => PlanController::class,
    ]);
});
