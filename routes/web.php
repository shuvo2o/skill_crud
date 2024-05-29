<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [

        'canLogin' => Route::has('login'),

        'canRegister' => Route::has('register'),

        'laravelVersion' => Application::VERSION,

        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/admin/skill/index', function () {

    return Inertia::render('Dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

// Skill Route
Route::get('admin/skill/index', [SkillController::class, 'index'])->name('skill.index');

Route::get('admin/skill/create', [SkillController::class, 'SkillCreate'])->name('skill.create');

Route::post('admin/skill/store', [SkillController::class, 'SkillStore'])->name('skill.store');

Route::get('admin/skill/edit/{skill}', [SkillController::class, 'SkillEdit'])->name('skill.edit');

Route::put('admin/skill/update/{skill}',[SkillController::class, 'SkillUpdate'])->name('skill.update');










require __DIR__.'/auth.php';
