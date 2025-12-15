<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = \App\Models\Setting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(\Illuminate\Http\Request $request)
    {
        $data = $request->except(['_token', '_method']);

        foreach ($data as $key => $value) {
            $setting = \App\Models\Setting::where('key', $key)->first();
            if ($setting) {
                // Skip if it's a file, we handle it below
                if ($request->hasFile($key)) {
                    continue;
                }
                $setting->update(['value' => $value]);
            } else {
                // Optional: Create if not exists (though typically we seed them)
                // For now, let's assume we only update existing or create simple text ones
                \App\Models\Setting::create([
                    'key' => $key,
                    'value' => $value,
                    'group' => 'general'
                ]);
            }
        }

        // Handle files specifically to ensure they are processed correctly if not in $data
        foreach ($request->allFiles() as $key => $file) {
            $setting = \App\Models\Setting::where('key', $key)->first();
            if ($setting) {
                $path = $file->store('settings', 'public');
                $setting->update(['value' => $path]);
            }
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully.');
    }
}
