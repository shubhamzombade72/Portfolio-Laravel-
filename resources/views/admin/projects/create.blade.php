@extends('layouts.admin')

@section('header', 'Create Project')

@section('content')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
                @csrf

                @if ($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Whoops!</strong>
                        <span class="block sm:inline">There were some problems with your input.</span>
                        <ul class="mt-2 list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Title -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Title</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="title" type="text" name="title" value="{{ old('title') }}" required>
                    @error('title') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                </div>

                <!-- Slug -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="slug">Slug</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="slug" type="text" name="slug" value="{{ old('slug') }}" required>
                    @error('slug') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                </div>

                <!-- Category -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="category">Category</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="category" type="text" name="category" value="{{ old('category') }}">
                    @error('category') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                </div>

                <!-- Short Description -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="short_description">Short
                        Description</label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="short_description" name="short_description" rows="3"
                        required>{{ old('short_description') }}</textarea>
                    @error('short_description') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                </div>

                <!-- Full Description -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="full_description">Full
                        Description</label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="full_description" name="full_description" rows="6">{{ old('full_description') }}</textarea>
                    @error('full_description') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                </div>

                <!-- Tech Stack -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="tech_stack">Tech Stack (comma
                        separated)</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="tech_stack" type="text" name="tech_stack" value="{{ old('tech_stack') }}"
                        placeholder="Laravel, Vue, Tailwind">
                    @error('tech_stack') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                </div>

                <!-- Links -->
                <div class="flex mb-4 gap-4">
                    <div class="w-1/2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="live_url">Live URL</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="live_url" type="url" name="live_url" value="{{ old('live_url') }}">
                        @error('live_url') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                    </div>
                    <div class="w-1/2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="github_url">GitHub URL</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="github_url" type="url" name="github_url" value="{{ old('github_url') }}">
                        @error('github_url') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Image -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Project Thumbnail (Image)</label>
                    <input type="file" name="image" id="image"
                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    @error('image')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="download_file" class="block text-sm font-medium text-gray-700">Downloadable File (PDF, Zip,
                        etc.)</label>
                    <input type="file" name="download_file" id="download_file"
                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    @error('download_file')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="gallery" class="block text-sm font-medium text-gray-700">Gallery Images (Select
                        Multiple)</label>
                    <input type="file" name="gallery[]" id="gallery" multiple
                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    @error('gallery.*')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Options -->
                <div class="mb-4 flex items-center gap-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_featured" value="1" class="form-checkbox h-5 w-5 text-indigo-600" {{ old('is_featured') ? 'checked' : '' }}>
                        <span class="ml-2 text-gray-700">Featured</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" class="form-checkbox h-5 w-5 text-indigo-600"
                            checked>
                        <span class="ml-2 text-gray-700">Active</span>
                    </label>
                </div>

                <div class="flex items-center justify-between">
                    <button
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Create Project
                    </button>
                    <a href="{{ route('admin.projects.index') }}"
                        class="inline-block align-baseline font-bold text-sm text-indigo-600 hover:text-indigo-800">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Simple slug generator
        document.getElementById('title').addEventListener('input', function () {
            let slug = this.value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)+/g, '');
            document.getElementById('slug').value = slug;
        });
    </script>
@endsection