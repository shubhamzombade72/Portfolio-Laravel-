<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $featuredProjects = \App\Models\Project::where('is_active', true)->where('is_featured', true)->orderBy('sort_order')->take(3)->get();
        $latestExperience = \App\Models\Experience::orderBy('start_date', 'desc')->take(2)->get();
        $skills = \App\Models\Skill::where('is_active', true)->orderBy('proficiency', 'desc')->take(6)->get();

        return view('home', compact('featuredProjects', 'latestExperience', 'skills'));
    }

    public function about()
    {
        return view('about');
    }

    public function projects()
    {
        $projects = \App\Models\Project::where('is_active', true)->orderBy('sort_order')->orderBy('created_at', 'desc')->paginate(9);
        return view('projects.index', compact('projects'));
    }

    public function projectShow(\App\Models\Project $project)
    {
        abort_if(!$project->is_active, 404);
        return view('projects.show', compact('project'));
    }

    public function experience()
    {
        $experiences = \App\Models\Experience::orderBy('start_date', 'desc')->get();
        return view('experience', compact('experiences'));
    }

    public function skills()
    {
        $skills = \App\Models\Skill::where('is_active', true)->orderBy('category')->orderBy('proficiency', 'desc')->get()->groupBy('category');
        return view('skills', compact('skills'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function contactStore(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        \App\Models\Contact::create($validated);

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
