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
        $student = student::get();
        return response()->json($student, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = new student(); 
        $student->name = $request->name;
        $student->nis = $request->nis;
        $student->gender = $request->gender;
        $student->address = $request->address;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->status_lapor_pkl = $request->status_lapor_pkl;
        $student->save(); // menyimpan ke database
        return response()->json($student, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = student::find($id); 
        return response()->json($student, 200); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Siswa Tidak Ditemukan'], 404);
        }

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'nis' => 'sometimes|required|numeric|unique:student$students,nis,' . $student->id,
            'gender' => 'sometimes|required|in:Laki-laki,Perempuan',
            'address' => 'sometimes|required|string',
            'phone' => 'sometimes|required|string',
            'email' => 'sometimes|required|email|unique:student$students,email,' . $student->id,
            'status_lapor_pkl' => 'sometimes|required|boolean',
        ]);

        $student->name = $request->name ?? $student->name;
        $student->nis = $request->nis ?? $student->nis;
        $student->gender = $request->gender ?? $student->gender;
        $student->address = $request->address ?? $student->address;
        $student->phone = $request->phone ?? $student->phone;
        $student->email = $request->email ?? $student->email;
        $student->status_lapor_pkl = $request->status_lapor_pkl ?? $student->status_lapor_pkl;
        $student->save();

        return response()->json($student, 200); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        student::destroy($id); // menghapus baris dengan ID yang dimaksud
        return response()->json(["message"=>"Deleted"], 200);
    }
}