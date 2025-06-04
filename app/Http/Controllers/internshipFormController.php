<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\student; // <- hati-hati huruf kecil
use App\Models\teacher;
use App\Models\industry;
use App\Models\internship;
use Carbon\Carbon;
class internshipFormController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $student = student::select()->where('email', $user->email)->first();
        $teacher = teacher::all();
        $industries = industry::all();
        return inertia('internshipForm', [
            'student' => $student,
            'teacher' => $teacher,
            'industries' => $industries,
        ]);
    }
    public function store(Request $request)
    {
        try{
            $validated = $request->validate([
                'student_id' => 'required|exists:students,id|unique:internships,student_id',
                'teacher_id' => 'required|exists:teachers,id',
                'industry_id' => 'required|exists:industries,id',
                'start' => 'required|date',
                'end' => [
                    'required',
                    'date',
                    'after_or_equal:start',
                    function ($attribute, $value, $fail) use ($request) {
                        if ($request->has('start') && $value) {
                            $start = Carbon::parse($request->start);
                            $end = Carbon::parse($value);
                            if ($start->diffInDays($end) < 90) {
                                $fail('Durasi PKL minimal 90 hari.');
                            }
                        }
                    }
                ],
            ]);

        $internship = internship::create($validated);
        return inertia("internshipForm", [
            'success' => 'Formulir PKL berhasil dikirim.',
            'internship' => $internship,
        ]);
        }
        catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        }
    }
}
