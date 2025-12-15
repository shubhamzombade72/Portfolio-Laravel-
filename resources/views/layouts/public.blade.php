<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Portfolio') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-900 bg-gray-50">
    <nav class="fixed w-full z-20 top-0 start-0 border-b border-gray-200 bg-white/80 backdrop-blur-md">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span
                    class="self-center text-2xl font-semibold whitespace-nowrap dark:text-gray-900">{{ \App\Models\Setting::getValue('site_name', 'Portfolio') }}</span>
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <a href="{{ route('contact') }}"
                    class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">Get
                    in touch</a>
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent">
                    <li>
                        <a href="{{ route('home') }}"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-indigo-700 md:p-0 {{ request()->routeIs('home') ? 'text-indigo-700' : '' }}"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-indigo-700 md:p-0 {{ request()->routeIs('about') ? 'text-indigo-700' : '' }}">About</a>
                    </li>
                    <li>
                        <a href="{{ route('projects.index') }}"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-indigo-700 md:p-0 {{ request()->routeIs('projects.*') ? 'text-indigo-700' : '' }}">Projects</a>
                    </li>
                    <li>
                        <a href="{{ route('experience') }}"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-indigo-700 md:p-0 {{ request()->routeIs('experience') ? 'text-indigo-700' : '' }}">Experience</a>
                    </li>
                    <li>
                        <a href="{{ route('skills') }}"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-indigo-700 md:p-0 {{ request()->routeIs('skills') ? 'text-indigo-700' : '' }}">Skills</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="min-h-screen pt-20">
        @yield('content')
    </main>

    <footer class="bg-white rounded-lg shadow m-4 dark:bg-gray-800">
        <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© {{ date('Y') }} <a
                    href="{{ route('home') }}"
                    class="hover:underline">{{ \App\Models\Setting::getValue('site_name', 'Portfolio') }}</a>. All
                Rights Reserved.
            </span>
            <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
                <li>
                    <a href="{{ route('about') }}" class="hover:underline me-4 md:me-6">About</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
    </footer>
</body>

</html>