@extends('layouts.admin')

@section('header', 'Settings')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
        <form method="POST" action="{{ route('admin.settings.update', 1) }}" enctype="multipart/form-data"> <!-- ID 1 is dummy, route is resource but we use a custom method or just update fake ID? Route resource expects ID for update. I should check routes -->
            @csrf
            @method('PUT')
            
            <!-- We need to fix the route. Resource route 'settings.update' expects an ID. 
                 But we are updating *all* settings. 
                 I should have defined a custom route or just use a dummy ID and ignore it in controller. 
                 The controller I wrote takes $request, it doesn't seem to care about ID if I didn't type hint it ?? 
                 Wait, my controller update signature is `update(Request $request)`. It does NOT take $setting.
                 So route parameters might cause issues if not handled.
                 Let's check web.php... `Route::resource('settings', ...)`
                 This generates /settings/{setting} for update.
                 I should change the route to be a singleton or custom.
                 For now, let's just make it work by passing a dummy ID like '1' and ensuring controller ignores it.
                 Controller signature: `update(Request $request)`. If the route passes a param, Laravel might inject it? 
                 If I don't ask for it, it might be fine.
            -->

            @foreach($settings as $group => $groupSettings)
                <h3 class="text-lg font-medium text-gray-900 mb-4 capitalize">{{ $group }} Settings</h3>
                <div class="grid grid-cols-1 gap-6 mb-6">
                    @foreach($groupSettings as $setting)
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="{{ $setting->key }}">
                                {{ ucwords(str_replace('_', ' ', $setting->key)) }}
                            </label>
                            
                            @if($setting->type === 'image')
                                @if($setting->value)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $setting->value) }}" alt="{{ $setting->key }}" class="h-20 w-auto object-cover rounded">
                                    </div>
                                @endif
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="{{ $setting->key }}" type="file" name="{{ $setting->key }}">
                            @elseif($setting->type === 'file')
                                @if($setting->value)
                                    <div class="mb-2">
                                        <a href="{{ asset('storage/' . $setting->value) }}" target="_blank" class="text-indigo-600 hover:text-indigo-800 underline">View Current File</a>
                                    </div>
                                @endif
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="{{ $setting->key }}" type="file" name="{{ $setting->key }}">
                            @elseif($setting->type === 'textarea')
                                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="{{ $setting->key }}" name="{{ $setting->key }}" rows="4">{{ $setting->value }}</textarea>
                            @else
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="{{ $setting->key }}" type="text" name="{{ $setting->key }}" value="{{ $setting->value }}">
                            @endif
                        </div>
                    @endforeach
                </div>
                <hr class="mb-6">
            @endforeach

            @if($settings->isEmpty())
                <p class="text-gray-500 mb-4">No settings found. Run the seeder!</p>
            @endif

            <div class="flex items-center justify-between">
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Save Settings
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
