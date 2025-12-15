@extends('layouts.public')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
            <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">About Me</h2>
                <p class="mb-4">
                    {{ \App\Models\Setting::getValue('site_description', 'I am a passionate developer dedicated to building high-quality software.') }}
                </p>
                <p>
                    My journey in technology has allowed me to work on diverse projects, ranging from small business
                    websites to large-scale enterprise applications. I believe in writing clean, maintainable code and
                    solving real-world problems through technology.
                </p>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-8">
                <img class="w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-2.png"
                    alt="office content 1">
                <img class="w-full mt-4 w-full rounded-lg lg:mt-10"
                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-1.png"
                    alt="office content 2">
            </div>
        </div>
    </section>
@endsection