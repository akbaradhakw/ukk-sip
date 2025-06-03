<?php

namespace App\Http\Controllers;

use App\Models\industry;
use Illuminate\Http\Request;

class IndustriesCotroller extends Controller
{
    public function index(Request $request)
    {
        $query = Industry::query();

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
}
