<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');

    Route::get('/industries', function () {
        return Inertia::render('industries');
    })->name('industries');
    Route::get('/createindustry', function () {
        return Inertia::render('industryCreate');
    })->name('industries');
    Route::get('/internship ', [App\Http\Controllers\internshipFormController::class, 'index'])->name('internshipForm');
    Route::post('/internship', [App\Http\Controllers\internshipFormController::class, 'store'])->name('internship.store');


});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::resource('/industries', App\Http\Controllers\IndustriesCotroller::class);
Route::resource('/dashboard', App\Http\Controllers\DashboardController::class);

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
