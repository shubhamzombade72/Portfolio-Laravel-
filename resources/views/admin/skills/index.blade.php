@extends('layouts.admin')

@section('header', 'Skills')

@section('content')
    <div class="mb-4 flex justify-between items-center">
        <div class="flex-1 pr-4"></div>
        <div>
            <a href="{{ route('admin.skills.create') }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded shadow">
                + Add Skill
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
                            Skill
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Category
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Proficiency
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($skills as $skill)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    @if($skill->icon)
                                        <div
                                            class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-gray-200 rounded-full mr-3 text-lg">
                                            <i class="{{ $skill->icon }}"></i>
                                        </div>
                                    @endif
                                    <p class="text-gray-900 whitespace-no-wrap font-medium">
                                        {{ $skill->name }}
                                    </p>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <span
                                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                                    {{ $skill->category }}
                                </span>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $skill->proficiency }}%"></div>
                                </div>
                                <span class="text-xs text-gray-500">{{ $skill->proficiency }}%</span>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('admin.skills.edit', $skill) }}"
                                        class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST"
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
            @if($skills->isEmpty())
                <div class="text-center py-4 text-gray-500">No skills found.</div>
            @endif
        </div>
    </div>
@endsection