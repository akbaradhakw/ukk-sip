<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\industry;

class IndustriesController extends Controller
{
    public function index()
    {
        // menampilakan data siswa yang terdaftar
        $industries = industry::all()->map(function($industries){
            return[
                'id' => $industries->id,
                'name' => $industries->name,
                'business_fields' => $industries->business_fields,
                'address' => $industries->address,
                'phone' => $industries->phone,
                'email' => $industries->email,
                'website' => $industries->website,
                'photo' => $industries->photo ? asset('storage/' . $industries->photo) : null, // mengembalikan URL foto
            ];
        });
        return response()->json($industries);
    }
}
