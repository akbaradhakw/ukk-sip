<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student; 
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = request()->user();
        // menampilakan data siswa yang terdaftar
        $students = student::all()->map(function($students){
            return[
                'id' => $students->id,
                'name' => $students->name,
                'email' => $students->email,
                'nis' => $students->nis,
                'phone' => $students->phone,
                'address' => $students->address,
                'photo' => $students->photo ? asset('storage/' . $students->photo) : null, // mengembalikan URL foto
                'status_pkl' => $students->internship_status,
            ];
        });
        return response()->json($students);
    }
}
