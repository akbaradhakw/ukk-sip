<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Internship;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Industry;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class InternshipForm extends Controller
{
    public function store(Request $request)
    {
        try {
            $user = Auth::user();

            // Ambil data student berdasarkan email user yang login
            $student = Student::where('email', $user->email)->firstOrFail();

            // Validasi input
            $messages = [
                'end.after_or_equal' => 'Tanggal selesai harus sama dengan atau setelah tanggal mulai',
                'end.required' => 'Tanggal selesai harus diisi',
                'start.required' => 'Tanggal mulai harus diisi',
                'teacher_id.required' => 'Guru harus dipilih',
                'industry_id.required' => 'Industri harus dipilih',
            ];

            $validated = $request->validate([
                'teacher_id' => ['required', 'exists:teachers,id'],
                'industry_id' => ['required', 'exists:industries,id'],
                'start' => ['required', 'date'],
                'end' => [
                    'required',
                    'date',
                    'after_or_equal:start',
                    function ($attribute, $value, $fail) use ($request) {
                        $start = Carbon::parse($request->start);
                        $end = Carbon::parse($value);
                        if ($start->diffInDays($end) < 90) {
                            $fail('Durasi PKL minimal 90 hari.');
                        }
                    }
                ],
            ], $messages);

            // Tambahkan student_id dari user login
            $validated['student_id'] = $student->id;

            // Cek apakah siswa sudah pernah daftar PKL
            if (Internship::where('student_id', $student->id)->exists()) {
                return response()->json(['message' => 'Anda sudah mendaftar PKL sebelumnya.'], 422);
            }

            // Simpan data PKL
            $internship = Internship::create($validated);

            // Ambil data tambahan untuk dikirim ke front-end
            $teacher = Teacher::find($validated['teacher_id']);
            $industry = Industry::find($validated['industry_id']);
            $hasInternshipData = true;

            // Kirim data ke Inertia (frontend)
            return inertia('dashboard', [
                'student' => $student,
                'internship' => $internship,
                'hasInternshipData' => $hasInternshipData,
                'teacher' => $teacher,
                'industry' => $industry,
            ]);

        } catch (ValidationException $e) {
            // Kirim error validasi ke frontend
            return back()->withErrors($e->errors())->withInput();
        }
    }
}
