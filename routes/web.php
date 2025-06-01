<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Redirect()->route('login');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
Route::get('/industries', function () {
        return Inertia::render('industries');
    })->name('industries');
});
Route::resource('/industries', App\Http\Controllers\IndustriesCotroller::class);
Route::resource('/dashboard', App\Http\Controllers\DashboardController::class);
require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
