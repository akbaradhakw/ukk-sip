<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use Illuminate\Support\Facades\Auth;
class StudentController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $student = $user->student; // ambil data student dari user
        return inertia('Dashboard',[
            'student' => $student
        ]);
    }
}

