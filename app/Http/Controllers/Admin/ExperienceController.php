<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = \App\Models\Experience::orderBy('start_date', 'desc')->get();
        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'company' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
        ]);

        $validated['is_current'] = $request->has('is_current');

        \App\Models\Experience::create($validated);

        return redirect()->route('admin.experiences.index')->with('success', 'Experience added successfully.');
    }

    public function edit(\App\Models\Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(\Illuminate\Http\Request $request, \App\Models\Experience $experience)
    {
        $validated = $request->validate([
            'company' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
        ]);

        $validated['is_current'] = $request->has('is_current');

        $experience->update($validated);

        return redirect()->route('admin.experiences.index')->with('success', 'Experience updated successfully.');
    }

    public function destroy(\App\Models\Experience $experience)
    {
        $experience->delete();
        return redirect()->route('admin.experiences.index')->with('success', 'Experience deleted successfully.');
    }
}
