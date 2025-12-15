@extends('layouts.public')

@section('content')
    <section class="bg-white dark:bg-gray-900 py-12">
        <div class="max-w-screen-xl px-4 mx-auto">
            <div class="mb-4 lg:mb-8">
                <a href="{{ route('projects.index') }}"
                    class="inline-flex items-center font-medium text-indigo-600 hover:underline">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Back to Projects
                </a>
            </div>

            <h1
                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                {{ $project->title }}
            </h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">
                {{ $project->short_description }}
            </p>

            <!-- Gallery / Image Carousel -->
            <div x-data="{ 
                    activeSlide: 0, 
                    lightboxOpen: false,
                    slides: [
                        @if($project->image) '{{ asset('storage/' . $project->image) }}', @endif
                        @foreach($project->images as $img) '{{ asset('storage/' . $img->image_path) }}', @endforeach
                    ] 
                }" class="mb-8" x-show="slides.length > 0">

                <!-- Main Display (Click to open Lightbox) -->
                <div class="relative rounded-lg overflow-hidden aspect-video bg-gray-100 dark:bg-gray-800 group cursor-pointer"
                    @click="lightboxOpen = true">
                    <template x-for="(slide, index) in slides" :key="index">
                        <div x-show="activeSlide === index" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="absolute inset-0 w-full h-full flex items-center justify-center">
                            <img :src="slide" alt="{{ $project->title }}" class="w-full h-full object-contain bg-black/5">
                        </div>
                    </template>

                    <!-- Hover Overlay Hint -->
                    <div
                        class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all flex items-center justify-center opacity-0 group-hover:opacity-100">
                        <span class="text-white bg-black bg-opacity-50 px-3 py-1 rounded-full text-sm">Click to
                            Expand</span>
                    </div>

                    <!-- Navigation Arrows (Inline) -->
                    <div x-show="slides.length > 1">
                        <button @click.stop="activeSlide = activeSlide === 0 ? slides.length - 1 : activeSlide - 1"
                            class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75 transition opacity-0 group-hover:opacity-100">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                                </path>
                            </svg>
                        </button>
                        <button @click.stop="activeSlide = activeSlide === slides.length - 1 ? 0 : activeSlide + 1"
                            class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75 transition opacity-0 group-hover:opacity-100">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Thumbnails -->
                <div class="mt-4 flex gap-2 overflow-x-auto pb-2" x-show="slides.length > 1">
                    <template x-for="(slide, index) in slides" :key="index">
                        <button @click="activeSlide = index" :class="{ 'ring-2 ring-indigo-600': activeSlide === index }"
                            class="flex-shrink-0 w-24 h-16 rounded-lg overflow-hidden border border-gray-200 dark:border-gray-700 hover:opacity-75 transition">
                            <img :src="slide" class="w-full h-full object-cover">
                        </button>
                    </template>
                </div>

                <!-- Lightbox Modal -->
                <div x-show="lightboxOpen" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-95 p-4"
                    @keydown.escape.window="lightboxOpen = false" style="display: none;">

                    <!-- Close Button -->
                    <button @click="lightboxOpen = false"
                        class="absolute top-4 right-4 text-white hover:text-gray-300 z-50">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>

                    <!-- Active Image -->
                    <template x-for="(slide, index) in slides" :key="index">
                        <div x-show="activeSlide === index" class="w-full h-full flex items-center justify-center">
                            <img :src="slide" class="max-w-full max-h-screen object-contain shadow-2xl">
                        </div>
                    </template>

                    <!-- Navigation Arrows (Lightbox) -->
                    <div x-show="slides.length > 1">
                        <button @click.stop="activeSlide = activeSlide === 0 ? slides.length - 1 : activeSlide - 1"
                            class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white p-4 hover:bg-white hover:bg-opacity-10 rounded-full transition">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                                </path>
                            </svg>
                        </button>
                        <button @click.stop="activeSlide = activeSlide === slides.length - 1 ? 0 : activeSlide + 1"
                            class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white p-4 hover:bg-white hover:bg-opacity-10 rounded-full transition">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </button>
                    </div>

                    <!-- Slide Counter -->
                    <div
                        class="absolute bottom-4 left-1/2 transform -translate-x-1/2 text-white text-sm bg-black bg-opacity-50 px-3 py-1 rounded-full">
                        <span x-text="activeSlide + 1"></span> / <span x-text="slides.length"></span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <div class="lg:col-span-2">
                    <div class="prose max-w-none dark:prose-invert">
                        <h3 class="text-2xl font-bold mb-4">Overview</h3>
                        <p class="mb-6 whitespace-pre-wrap">{{ $project->full_description }}</p>

                        @if($project->problem)
                            <h3 class="text-2xl font-bold mb-4">The Problem</h3>
                            <p class="mb-6 whitespace-pre-wrap">{{ $project->problem }}</p>
                        @endif

                        @if($project->solution)
                            <h3 class="text-2xl font-bold mb-4">The Solution</h3>
                            <p class="mb-6 whitespace-pre-wrap">{{ $project->solution }}</p>
                        @endif
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-lg">
                        <h4 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Project Details</h4>

                        <div class="mb-4">
                            <span class="block text-sm font-medium text-gray-500">Category</span>
                            <span
                                class="text-lg font-semibold text-gray-900 dark:text-white">{{ $project->category }}</span>
                        </div>

                        @if($project->tech_stack)
                            <div class="mb-4">
                                <span class="block text-sm font-medium text-gray-500 mb-2">Tech Stack</span>
                                <div class="flex flex-wrap gap-2">
                                    @forelse($project->tech_stack as $tech)
                                        <span
                                            class="bg-indigo-100 text-indigo-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-200 dark:text-indigo-900">{{ $tech }}</span>
                                    @empty
                                        <span class="text-gray-500">Not specified</span>
                                    @endforelse
                                </div>
                            </div>
                        @endif

                        <div class="flex flex-col gap-3 mt-6">
                            @if($project->live_url)
                                <a href="{{ $project->live_url }}" target="_blank"
                                    class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 focus:outline-none dark:focus:ring-indigo-800 text-center">
                                    View Live Site
                                </a>
                            @endif
                            @if($project->github_url)
                                <a href="{{ $project->github_url }}" target="_blank"
                                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 text-center">
                                    View Code
                                </a>
                            @endif
                            @if($project->download_file)
                                <a href="{{ asset('storage/' . $project->download_file) }}" target="_blank" download
                                    class="text-indigo-700 bg-indigo-100 border border-indigo-200 focus:outline-none hover:bg-indigo-200 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-indigo-900 dark:text-indigo-200 dark:border-indigo-800 dark:hover:bg-indigo-800 dark:focus:ring-indigo-800 text-center flex items-center justify-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>
                                    Download Assets
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
```