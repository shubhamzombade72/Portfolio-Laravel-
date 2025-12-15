<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        return response()->json(\App\Models\Experience::orderBy('start_date', 'desc')->get());
    }

    public function show(\App\Models\Experience $experience)
    {
        return response()->json($experience);
    }
}
