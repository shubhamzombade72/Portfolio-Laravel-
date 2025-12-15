@extends('layouts.public')

@section('content')
    <section class="bg-white dark:bg-gray-900 py-12">
        <div class="max-w-screen-xl px-4 mx-auto">
            <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
                <h2 class="mb-4 text-3xl tracking-tight font-extrabold text-gray-900 dark:text-white">Experience</h2>
                <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">My professional journey.</p>
            </div>

            <ol class="relative border-l border-gray-200 dark:border-gray-700 mx-auto max-w-screen-md">
                @foreach($experiences as $experience)
                    <li class="mb-10 ml-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 bg-indigo-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-indigo-900">
                            <svg class="w-3 h-3 text-indigo-800 dark:text-indigo-300" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 00-1-1H6zm1 2h6v1H7V4zm6 3v2H7V7h6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                            {{ $experience->role }}
                            @if($experience->company)
                                <span class="hidden sm:inline-block mx-2">—</span> <span
                                    class="text-indigo-600 dark:text-indigo-400">{{ $experience->company }}</span>
                            @endif
                            @if($experience->is_current)
                                <span
                                    class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-200 dark:text-indigo-900 ml-3">Current</span>
                            @endif
                        </h3>
                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
                            {{ $experience->start_date->format('F Y') }} -
                            @if($experience->is_current)
                                Present
                            @elseif($experience->end_date)
                                {{ $experience->end_date->format('F Y') }}
                            @else
                                N/A
                            @endif
                            @if($experience->location)
                                | {{ $experience->location }}
                            @endif
                        </time>
                        <div class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400 prose dark:prose-invert">
                            {!! nl2br(e($experience->description)) !!}
                        </div>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>
@endsection