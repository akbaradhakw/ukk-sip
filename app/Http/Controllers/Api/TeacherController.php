<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\teacher; 
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = request()->user();
        // menampilakan data siswa yang terdaftar
        $teachers = teacher::all()->map(function($teachers){
            return[
                'id' => $teachers->id,
                'name' => $teachers->name,
                'email' => $teachers->email,
                'nis' => $teachers->nip,
                'phone' => $teachers->phone,
                'address' => $teachers->address,
                'photo' => $teachers->photo ? asset('storage/' . $students->photo) : null, // mengembalikan URL foto
            ];
        });
        return response()->json($teachers);
    }
}
