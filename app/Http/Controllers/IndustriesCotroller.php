<?php

namespace App\Http\Controllers;

use App\Models\industry;
use Illuminate\Http\Request;

class IndustriesCotroller extends Controller
{
    public function index()
    {
        $industries = industry::all();
        return inertia('industries',[
            'industries' => $industries
        ]);
    }
}
