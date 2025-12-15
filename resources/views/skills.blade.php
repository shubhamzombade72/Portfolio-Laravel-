@extends('layouts.public')

@section('content')
    <section class="bg-white dark:bg-gray-900 py-12">
        <div class="max-w-screen-xl px-4 mx-auto">
            <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
                <h2 class="mb-4 text-3xl tracking-tight font-extrabold text-gray-900 dark:text-white">Skills</h2>
                <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Technical proficiency and tools.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($skills as $category => $categorySkills)
                    <div class="p-6 bg-white rounded-lg border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $category }}</h5>
                        <ul class="space-y-4 text-gray-500 list-disc list-inside dark:text-gray-400">
                            @foreach($categorySkills as $skill)
                                <li class="flex items-center space-x-3">
                                    @if($skill->icon)
                                        <i class="{{ $skill->icon }} text-indigo-500 w-6"></i>
                                    @else
                                        <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    @endif
                                    <div class="w-full">
                                        <div class="flex justify-between mb-1">
                                            <span
                                                class="text-base font-medium text-gray-900 dark:text-white">{{ $skill->name }}</span>
                                            <span
                                                class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $skill->proficiency }}%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                            <div class="bg-indigo-600 h-2.5 rounded-full" style="width: {{ $skill->proficiency }}%">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection