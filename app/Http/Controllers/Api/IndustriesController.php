<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\industry;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $industry = industry::get();
        return response()->json($industry, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $industry = new Industri(); 
        $industry->nama = $request->nama;
        $industry->bidang_usaha = $request->bidang_usaha;
        $industry->alamat = $request->alamat;
        $industry->kontak = $request->kontak;
        $industry->email = $request->email;
        $industry->website = $request->website;
        $industry->save(); // menyimpan ke database
        return response()->json($industry, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $industry = Industri::find($id);
        return response()->json($industry, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $industry = Industri::find($id);
        if (!$industry) {
            return response()->json(['message' => 'Industri Tidak Ditemukan'], 404);
        }

        $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'bidang_usaha' => 'sometimes|required|string',
            'alamat' => 'sometimes|required|string',
            'kontak' => 'sometimes|required|string',
            'email' => 'sometimes|required|email|unique:industries,email,' . $industry->id,
            'website' => 'sometimes|required|url',
        ]);

        $industry->nama = $request->nama ?? $industry->nama;
        $industry->bidang_usaha = $request->bidang_usaha ?? $industry->bidang_usaha;
        $industry->alamat = $request->alamat ?? $industry->alamat;
        $industry->kontak = $request->kontak ?? $industry->kontak;
        $industry->email = $request->email ?? $industry->email;
        $industry->website = $request->website ?? $industry->website;
        $industry->save();

        return response()->json($industry, 200); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Industri::destroy($id); // menghapus baris dengan ID yang dimaksud
        return response()->json(["message"=>"Deleted"], 200);
    }
}