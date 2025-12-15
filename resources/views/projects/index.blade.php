@extends('layouts.public')

@section('content')
    <section class="bg-white dark:bg-gray-900 py-12">
        <div class="max-w-screen-xl px-4 mx-auto">
            <div class="mx-auto max-w-screen-sm text-center mb-8">
                <h2 class="mb-4 text-3xl tracking-tight font-extrabold text-gray-900 dark:text-white">All Projects</h2>
                <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">A collection of my work.</p>
            </div>
            <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2 lg:grid-cols-3">
                @foreach($projects as $project)
                    <div
                        class="flex flex-col items-center bg-gray-50 rounded-lg shadow md:flex-row md:max-w-xl dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <div class="flex flex-col justify-between p-4 leading-normal w-full">
                            @if($project->image)
                                <a href="{{ route('projects.show', $project) }}" class="mb-4">
                                    <img class="w-full rounded-lg object-cover h-40" src="{{ asset('storage/' . $project->image) }}"
                                        alt="{{ $project->title }}">
                                </a>
                            @endif
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                <a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a>
                            </h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                {{ Str::limit($project->short_description, 120) }}
                            </p>
                            <div class="flex justify-between items-center mt-4">
                                <span
                                    class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-indigo-600 bg-indigo-200 uppercase last:mr-0 mr-1">
                                    {{ $project->category }}
                                </span>
                                <a href="{{ route('projects.show', $project) }}"
                                    class="inline-flex items-center font-medium text-indigo-600 hover:underline">
                                    Read more
                                    <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-8 flex justify-center">
                {{ $projects->links() }}
            </div>
        </div>
    </section>
@endsection