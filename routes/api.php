<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

Route::apiResource('/students',App\Http\Controllers\Api\StudentController::class);
Route::apiResource('/teachers',App\Http\Controllers\Api\TeacherController::class);
Route::apiResource('/industries',App\Http\Controllers\Api\IndustriesController::class);

Route::post('/login', function (Request $request) {
    // Validasi input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Cari user berdasarkan email
    $user = User::where('email', $request->email)->first();

    // Cek apakah user ditemukan dan password cocok
    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json([
            'message' => 'Email atau password salah.'
        ], 401);
    }

    // Buat token baru
    $token = $user->createToken('api-token')->plainTextToken;

    // Kembalikan token ke client
    return response()->json([
        'token' => $token,
        'user' => $user,
    ]);
});