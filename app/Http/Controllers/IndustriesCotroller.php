<?php

namespace App\Http\Controllers;

use App\Models\industry;
use Illuminate\Http\Request;

class IndustriesCotroller extends Controller
{
    public function index(Request $request)
    {
        $query = industry::query();

        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $industries = $query->latest()->paginate(6)->withQueryString();

        return inertia('industries', [
            'industries' => $industries,
            'filters' => [
                'search' => $request->search,
            ],
        ]);
    }
    // Simpan data industri baru
    public function store(Request $request)
    {
        if (auth()->user()->hasRole('guru')) {
        abort(403, 'Hanya Siswa Yang Boleh');
    }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'business_fields' => 'nullable|string',
            'website' => 'nullable|string',
            'email' => 'nullable|string',
        ]);


        $industry = industry::create($validated);
        return redirect()->route('industries.index')->with('success', 'Industry berhasil ditambahkan.');

    }
}
