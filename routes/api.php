<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

Route::apiResource('/students',App\Http\Controllers\Api\StudentController::class);
Route::apiResource('/teachers',App\Http\Controllers\Api\TeacherController::class);
Route::apiResource('/industries',App\Http\Controllers\Api\IndustriesController::class);
Route::get('/internship', [App\Http\Controllers\Api\FormPKL::class, 'index']);
Route::post('/internship', [App\Http\Controllers\Api\FormPKL::class, 'store']);

