@extends('layouts.public')

@section('content')

    <!-- Hero Section -->
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                    {{ \App\Models\Setting::getValue('hero_title', 'Hi, I am a Developer') }}
                </h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    {{ \App\Models\Setting::getValue('hero_subtitle', 'Building efficient and scalable solutions.') }}
                </p>
                <a href="{{ route('projects.index') }}"
                    class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 dark:focus:ring-indigo-900">
                    View Work
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                @if(\App\Models\Setting::getValue('resume_file'))
                    <a href="{{ asset('storage/' . \App\Models\Setting::getValue('resume_file')) }}" target="_blank"
                        class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        Download CV
                    </a>
                @endif
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                @if(\App\Models\Setting::getValue('site_logo'))
                    <img src="{{ asset('storage/' . \App\Models\Setting::getValue('site_logo')) }}" alt="mockup">
                @else
                    <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/phone-mockup.png" alt="mockup">
                @endif
            </div>
        </div>
    </section>

    <!-- Featured Projects -->
    @if($featuredProjects->count() > 0)
        <section class="bg-gray-50 dark:bg-gray-800 py-12">
            <div class="max-w-screen-xl px-4 mx-auto">
                <div class="mx-auto max-w-screen-sm text-center mb-8">
                    <h2 class="mb-4 text-3xl tracking-tight font-extrabold text-gray-900 dark:text-white">Featured Projects</h2>
                    <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Some of my most relevant work.
                    </p>
                </div>
                <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($featuredProjects as $project)
                        <div
                            class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700 border border-gray-200">
                            <div class="w-full">
                                @if($project->image)
                                    <a href="{{ route('projects.show', $project) }}">
                                        <img class="w-full rounded-t-lg h-48 object-cover"
                                            src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                                    </a>
                                @endif
                                <div class="p-5">
                                    <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        <a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a>
                                    </h3>
                                    <span class="text-gray-500 dark:text-gray-400">{{ $project->category }}</span>
                                    <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">
                                        {{ Str::limit($project->short_description, 100) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Skills Overview -->
    <section class="bg-white dark:bg-gray-900 py-12">
        <div class="py-8 px-4 mx-auto max-w-screen-xl">
            <h2 class="mb-4 text-3xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Top Skills
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-8 text-gray-500 sm:gap-12 md:grid-cols-6 dark:text-gray-400">
                @foreach($skills as $skill)
                    <div class="flex justify-center items-center flex-col">
                        @if($skill->icon)
                            <i class="{{ $skill->icon }} text-4xl mb-2 text-indigo-600"></i>
                        @else
                            <svg class="w-10 h-10 mb-2 text-indigo-600" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        @endif
                        <span class="font-medium text-gray-900">{{ $skill->name }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection