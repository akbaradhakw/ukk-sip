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
            $start_date = Carbon::parse($internship->start_date);
            $end_date = Carbon::parse($internship->end_date);
            $duration = $start_date->diffInDays($end_date);

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
                'tanggal_mulai' => $internship->start_date->format('d-m-Y'),
                'tanggal_selesai' => $internship->end_date->format('d-m-Y'),
                'durasi' => $duration . ' hari',
            ];
        });

        return response()->json($internship);
    }

    public function store(Request $request)
    {
        try {
            $message = [
                'end_date.after_or_equal' => 'Tanggal selesai harus sama dengan atau setelah tanggal mulai',
                'end_date.required' => 'Tanggal selesai harus diisi',
                'start_date.required' => 'Tanggal mulai harus diisi',
                'student_id.required' => 'Siswa harus diisi',
                'student_id.unique' => 'Anda sudah mendaftar PKL sebelumnya',
                'teacher_id.required' => 'Guru harus dipilih',
                'industry_id.required' => 'Industri harus dipilih',
            ];

            $validated = $request->validate([
                'student_id' => [
                    'required',
                    'exists:student,id',
                    Rule::unique('internship', 'student_id')
                ],
                'teacher_id' => 'required|exists:teacher,id',
                'industry_id' => 'required|exists:industry,id',
                'start_date' => 'required|date',
                'end_date' => [
                    'required',
                    'date',
                    'after_or_equal:start_date',
                    function ($attribute, $value, $fail) use ($request) {
                        if ($request->has('start_date') && $value) {
                            $start = Carbon::parse($request->start_date);
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
