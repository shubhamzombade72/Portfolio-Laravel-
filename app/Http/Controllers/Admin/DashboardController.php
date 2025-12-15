<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $projectCount = \App\Models\Project::count();
        $experienceCount = \App\Models\Experience::count();
        $skillCount = \App\Models\Skill::count();
        $messageCount = \App\Models\Contact::where('is_read', false)->count();
        $recentContacts = \App\Models\Contact::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('projectCount', 'experienceCount', 'skillCount', 'messageCount', 'recentContacts'));
    }
}
