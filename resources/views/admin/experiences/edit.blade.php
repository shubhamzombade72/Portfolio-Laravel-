@extends('layouts.admin')

@section('header', 'Edit Experience')

@section('content')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <form method="POST" action="{{ route('admin.experiences.update', $experience) }}">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Company -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="company">Company</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="company" type="text" name="company" value="{{ old('company', $experience->company) }}"
                            required>
                        @error('company') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                    </div>

                    <!-- Role -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="role">Role</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="role" type="text" name="role" value="{{ old('role', $experience->role) }}" required>
                        @error('role') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Start Date -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="start_date">Start Date</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="start_date" type="date" name="start_date"
                            value="{{ old('start_date', $experience->start_date ? $experience->start_date->format('Y-m-d') : '') }}"
                            required>
                        @error('start_date') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                    </div>

                    <!-- End Date -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="end_date">End Date</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="end_date" type="date" name="end_date"
                            value="{{ old('end_date', $experience->end_date ? $experience->end_date->format('Y-m-d') : '') }}">
                        <p class="text-gray-500 text-xs mt-1">Leave empty if currently working here.</p>
                        @error('end_date') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_current" class="form-checkbox h-5 w-5 text-indigo-600" {{ old('is_current', $experience->is_current) ? 'checked' : '' }}>
                        <span class="ml-2 text-gray-700">Currently Working Here</span>
                    </label>
                </div>

                <!-- Location -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="location">Location</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="location" type="text" name="location" value="{{ old('location', $experience->location) }}">
                    @error('location') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description (Rich Text
                        Supported)</label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="description" name="description"
                        rows="5">{{ old('description', $experience->description) }}</textarea>
                    @error('description') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Update Experience
                    </button>
                    <a href="{{ route('admin.experiences.index') }}"
                        class="inline-block align-baseline font-bold text-sm text-indigo-600 hover:text-indigo-800">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection