<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student; // <- hati-hati huruf kecil
use App\Models\teacher;
use App\Models\industry;
use App\Models\internship;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //show student information
    public function index()
    {
        $user = Auth::user();
        $student = student::select(
                '*',
                DB::raw('internship_status(internship_status) as status_label'),
                DB::raw('gender_Status(gender) as gender_label'),

            )
            ->with('internship')
            ->where('email', $user->email)
            ->first();

        $pkl = null;
        $hasPklData = false;
        $internship = null;
        $hasInternshipData = false;
        $teacher = null;
        $industry = null;

        if ($student) {
            $internship = internship::where('student_id', $student->id)->latest()->first();
            $internship = Internship::with(['teacher', 'industry'])
                ->where('student_id', $student->id)
                ->latest()
                ->first();
            $hasInternshipData = $internship !== null;
        }
        return inertia('dashboard',[
            'student' => $student,
            'internship' => $internship,
            'hasInternshipData' => $hasInternshipData,
            'teacher' => $teacher ?? null,
            'industry' => $industry ?? null,
        ]);
    }
    //show student internship information
}
