<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\internship;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class FormPKL extends Controller
{
    public function index()
    {
        $internship = internship::with(['student', 'teacher', 'industry'])->get()->map(function ($internship) {
            $start = Carbon::parse($internship->start);
            $end = Carbon::parse($internship->end);
            $duration = $start->diffInDays($end);

            return [
                'id' => $internship->id,
                'siswa' => [
                    'id' => $internship->student->id,
                    'nama' => $internship->student->name
                ],
                'guru' => [
                    'id' => $internship->teacher->id,
                    'nama' => $internship->teacher->name
                ],
                'industri' => [
                    'id' => $internship->industry->id,
                    'nama' => $internship->industry->name
                ],
                'tanggal_mulai' => $internship->start->format('d-m-Y'),
                'tanggal_selesai' => $internship->end->format('d-m-Y'),
                'durasi' => $duration . ' hari',
            ];
        });

        return response()->json($internship);
    }

    public function store(Request $request)
    {
        try {
            $message = [
                'end.after_or_equal' => 'Tanggal selesai harus sama dengan atau setelah tanggal mulai',
                'end.required' => 'Tanggal selesai harus diisi',
                'start.required' => 'Tanggal mulai harus diisi',
                'student_id.required' => 'Siswa harus diisi',
                'student_id.unique' => 'Anda sudah mendaftar PKL sebelumnya',
                'teacher_id.required' => 'Guru harus dipilih',
                'industry_id.required' => 'Industri harus dipilih',
            ];

            $validated = $request->validate([
                'student_id' => [
                    'required',
                    'exists:students,id',
                    Rule::unique('internships', 'student_id')
                ],
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
            ], $message);

            $internship = internship::create($validated);

            return response()->json([
                'message' => 'Formulir berhasil disimpan',
                'data' => $internship
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validasi gagal.',
                'errors' => $e->errors()
            ], 422);
        }
    }
}
