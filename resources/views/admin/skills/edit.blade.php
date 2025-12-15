@extends('layouts.admin')

@section('header', 'Edit Skill')

@section('content')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <form method="POST" action="{{ route('admin.skills.update', $skill) }}">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Skill Name</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="name" type="text" name="name" value="{{ old('name', $skill->name) }}" required>
                    @error('name') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                </div>

                <!-- Category -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="category">Category</label>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="category" name="category" required>
                        <option value="">Select Category</option>
                        @foreach(['Frontend', 'Backend', 'Database', 'Mobile', 'DevOps', 'Tools', 'Other'] as $cat)
                            <option value="{{ $cat }}" {{ old('category', $skill->category) == $cat ? 'selected' : '' }}>
                                {{ $cat }}</option>
                        @endforeach
                    </select>
                    @error('category') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                </div>

                <!-- Proficiency -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="proficiency">Proficiency (0-100)</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="proficiency" type="number" name="proficiency"
                        value="{{ old('proficiency', $skill->proficiency) }}" min="0" max="100">
                    @error('proficiency') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                </div>

                <!-- Icon -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="icon">Icon Class
                        (FontAwesome/Devicon)</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="icon" type="text" name="icon" value="{{ old('icon', $skill->icon) }}"
                        placeholder="fa-brands fa-laravel">
                    @error('icon') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4 flex items-center gap-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" class="form-checkbox h-5 w-5 text-indigo-600" {{ old('is_active', $skill->is_active) ? 'checked' : '' }}>
                        <span class="ml-2 text-gray-700">Active</span>
                    </label>
                </div>

                <div class="flex items-center justify-between">
                    <button
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Update Skill
                    </button>
                    <a href="{{ route('admin.skills.index') }}"
                        class="inline-block align-baseline font-bold text-sm text-indigo-600 hover:text-indigo-800">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection