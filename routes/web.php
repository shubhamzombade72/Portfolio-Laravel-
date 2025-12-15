<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(App\Http\Controllers\PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/projects', 'projects')->name('projects.index');
    Route::get('/projects/{project:slug}', 'projectShow')->name('projects.show');
    Route::get('/experience', 'experience')->name('experience');
    Route::get('/skills', 'skills')->name('skills');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'contactStore')->name('contact.store');
});

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('projects', App\Http\Controllers\Admin\ProjectController::class);
    Route::resource('experiences', App\Http\Controllers\Admin\ExperienceController::class);
    Route::resource('skills', App\Http\Controllers\Admin\SkillController::class);
    Route::resource('settings', App\Http\Controllers\Admin\SettingController::class);
    Route::resource('contacts', App\Http\Controllers\Admin\ContactController::class)->only(['index', 'show', 'destroy']);
});

require __DIR__ . '/auth.php';
