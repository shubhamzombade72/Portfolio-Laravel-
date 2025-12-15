@extends('layouts.admin')

@section('header', 'Experience')

@section('content')
    <div class="mb-4 flex justify-between items-center">
        <div class="flex-1 pr-4">
        </div>
        <div>
            <a href="{{ route('admin.experiences.create') }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded shadow">
                + Add Experience
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
                            Company / Role
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Duration
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Location
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($experiences as $experience)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <div>
                                        <p class="text-gray-900 whitespace-no-wrap font-bold">
                                            {{ $experience->company }}
                                        </p>
                                        <p class="text-gray-600 text-sm">
                                            {{ $experience->role }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $experience->start_date->format('M Y') }} -
                                    @if($experience->is_current)
                                        Present
                                    @elseif($experience->end_date)
                                        {{ $experience->end_date->format('M Y') }}
                                    @else
                                        N/A
                                    @endif
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $experience->location ?? 'Remote' }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('admin.experiences.edit', $experience) }}"
                                        class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ route('admin.experiences.destroy', $experience) }}" method="POST"
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
            @if($experiences->isEmpty())
                <div class="text-center py-4 text-gray-500">No experience entries found.</div>
            @endif
        </div>
    </div>
@endsection