<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json(\App\Models\Project::where('is_active', true)->orderBy('sort_order')->get());
    }

    public function show(\App\Models\Project $project)
    {
        if (!$project->is_active) {
            return response()->json(['message' => 'Not found'], 404);
        }
        return response()->json($project);
    }
}
