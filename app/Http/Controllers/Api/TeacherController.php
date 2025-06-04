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
        $teacher = teacher::get();
        return response()->json($teacher, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $teacher = new teacher(); 
        $teacher->name = $request->name;
        $teacher->nip = $request->nip;
        $teacher->gender = $request->gender;
        $teacher->address = $request->address;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->save(); // menyimpan ke database
        return response()->json($teacher, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = teacher::find($id); 
        return response()->json($teacher, 200); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $teacher = teacher::find($id);
        if (!$teacher) {
            return response()->json(['message' => 'teacher Tidak Ditemukan'], 404);
        }

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'nip' => 'sometimes|required|numeric|unique:teachers,nip,' . $teacher->id,
            'gender' => 'sometimes|required|in:Laki-laki,Perempuan',
            'address' => 'sometimes|required|string',
            'phone' => 'sometimes|required|string',
            'email' => 'sometimes|required|email|unique:teachers,email,' . $teacher->id,
        ]);

        $teacher->name = $request->name ?? $teacher->name;
        $teacher->nip = $request->nip ?? $teacher->nip;
        $teacher->gender = $request->gender ?? $teacher->gender;
        $teacher->address = $request->address ?? $teacher->address;
        $teacher->phone = $request->phone ?? $teacher->phone;
        $teacher->email = $request->email ?? $teacher->email;
        $teacher->save();

        return response()->json($teacher, 200); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        teacher::destroy($id); // menghapus baris dengan ID yang dimaksud
        return response()->json(["message"=>"Deleted"], 200);
    }
}