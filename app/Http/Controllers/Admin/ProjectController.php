<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = \App\Models\Project::orderBy('sort_order')->orderBy('created_at', 'desc')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:projects',
            'short_description' => 'required|string',
            'full_description' => 'nullable|string',
            'problem' => 'nullable|string',
            'solution' => 'nullable|string',
            'tech_stack' => 'nullable|string',
            'category' => 'required|string',
            'live_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg',
            'download_file' => 'nullable|file|mimes:pdf,zip,rar,doc,docx,xls,xlsx,csv',
            'gallery' => 'nullable|array',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        if ($request->hasFile('download_file')) {
            $validated['download_file'] = $request->file('download_file')->store('downloads', 'public');
        }

        // Convert tech_stack string to array
        if (!empty($validated['tech_stack'])) {
            $validated['tech_stack'] = array_map('trim', explode(',', $validated['tech_stack']));
        } else {
            $validated['tech_stack'] = [];
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active');

        $project = \App\Models\Project::create($validated);

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $path = $image->store('project_gallery', 'public');
                $project->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }
    public function edit(\App\Models\Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(\Illuminate\Http\Request $request, \App\Models\Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:projects,slug,' . $project->id,
            'short_description' => 'required|string',
            'full_description' => 'nullable|string',
            'problem' => 'nullable|string',
            'solution' => 'nullable|string',
            'tech_stack' => 'nullable|string',
            'category' => 'required|string',
            'live_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg',
            'download_file' => 'nullable|file|mimes:pdf,zip,rar,doc,docx,xls,xlsx,csv',
            'gallery' => 'nullable|array',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($project->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($project->image);
            }
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        if ($request->hasFile('download_file')) {
            // Delete old file
            if ($project->download_file) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($project->download_file);
            }
            $validated['download_file'] = $request->file('download_file')->store('downloads', 'public');
        }

        // Convert tech_stack string to array
        if (isset($validated['tech_stack'])) {
            $validated['tech_stack'] = array_map('trim', explode(',', $validated['tech_stack']));
        } else {
            $validated['tech_stack'] = [];
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active');

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(\App\Models\Project $project)
    {
        if ($project->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($project->image);
        }
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
