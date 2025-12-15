<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = \App\Models\Skill::orderBy('category')->orderBy('sort_order')->get();
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'proficiency' => 'integer|min:0|max:100',
            'icon' => 'nullable|string|max:255', // Could be a class name or detailed implementation
            'sort_order' => 'integer|min:0',
        ]);

        $validated['is_active'] = $request->has('is_active');

        \App\Models\Skill::create($validated);

        return redirect()->route('admin.skills.index')->with('success', 'Skill added successfully.');
    }

    public function edit(\App\Models\Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(\Illuminate\Http\Request $request, \App\Models\Skill $skill)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'proficiency' => 'integer|min:0|max:100',
            'icon' => 'nullable|string|max:255',
            'sort_order' => 'integer|min:0',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $skill->update($validated);

        return redirect()->route('admin.skills.index')->with('success', 'Skill updated successfully.');
    }

    public function destroy(\App\Models\Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skills.index')->with('success', 'Skill deleted successfully.');
    }
}
