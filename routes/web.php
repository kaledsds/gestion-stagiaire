<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProblemeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolutionController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    Route::resource('/', DashboardController::class);
    Route::resource('/dashboard', DashboardController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('/problemes', ProblemeController::class);
Route::resource('/solutions', SolutionController::class);
Route::get('/solutions/{p_id}/create', [SolutionController::class, 'create'])->name('solutions.create');
Route::get('/solutions/{s_id}/show', [SolutionController::class, 'show'])->name('solutions.show');
Route::post('/solutions/{probleme_id}/store', [SolutionController::class, 'store'])->name('solutions.store');
require __DIR__ . '/auth.php';
