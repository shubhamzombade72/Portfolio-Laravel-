@extends('layouts.admin')

@section('header', 'Projects')

@section('content')
    <div class="mb-4 flex justify-between items-center">
        <div class="flex-1 pr-4">
            <div class="relative md:w-1/3">
                <input type="search"
                    class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                    placeholder="Search...">
                <div class="absolute top-0 left-0 inline-flex items-center p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                        <circle cx="10" cy="10" r="7" />
                        <line x1="21" y1="21" x2="15" y2="15" />
                    </svg>
                </div>
            </div>
        </div>
        <div>
            <a href="{{ route('admin.projects.create') }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded shadow">
                + Add Project
            </a>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Project
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Category
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Status
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    @if($project->image)
                                        <div class="flex-shrink-0 w-10 h-10">
                                            <img class="w-full h-full rounded-full object-cover"
                                                src="{{ asset('storage/' . $project->image) }}" alt="" />
                                        </div>
                                    @endif
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $project->title }}
                                        </p>
                                        <p class="text-gray-600 text-xs">
                                            {{ $project->slug }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $project->category ?? 'N/A' }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <span
                                    class="relative inline-block px-3 py-1 font-semibold leading-tight {{ $project->is_active ? 'text-green-900' : 'text-red-900' }}">
                                    <span aria-hidden="true"
                                        class="absolute inset-0 {{ $project->is_active ? 'bg-green-200' : 'bg-red-200' }} opacity-50 rounded-full"></span>
                                    <span class="relative">{{ $project->is_active ? 'Active' : 'Hidden' }}</span>
                                </span>
                                @if($project->is_featured)
                                    <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-yellow-900 ml-2">
                                        <span aria-hidden="true"
                                            class="absolute inset-0 bg-yellow-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Featured</span>
                                    </span>
                                @endif
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('admin.projects.edit', $project) }}"
                                        class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($projects->isEmpty())
                <div class="text-center py-4 text-gray-500">No projects found.</div>
            @endif
        </div>
    </div>
@endsection