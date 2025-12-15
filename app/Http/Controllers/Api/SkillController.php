<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        return response()->json(\App\Models\Skill::where('is_active', true)->orderBy('category')->orderBy('proficiency', 'desc')->get());
    }
}
