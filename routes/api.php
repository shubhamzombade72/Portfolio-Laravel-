<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('projects', \App\Http\Controllers\Api\ProjectController::class)->names('api.projects')->only(['index', 'show']);
Route::apiResource('experiences', \App\Http\Controllers\Api\ExperienceController::class)->names('api.experiences')->only(['index', 'show']);
Route::apiResource('skills', \App\Http\Controllers\Api\SkillController::class)->names('api.skills')->only(['index']);
Route::get('settings', [\App\Http\Controllers\Api\SettingController::class, 'index']);
