<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
        <div class="min-h-screen flex flex-col">
            <header class="bg-white dark:bg-gray-800 shadow-lg">
                <nav class="container mx-auto px-6 py-4">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <svg class="h-8 w-8 text-[#93B1A6]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            <span class="ml-2 text-xl font-semibold">Store </span>
                        </div>
                        @if (Route::has('login'))
                            <div class="flex items-center space-x-4">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="text-lg text-black">Home</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-lg px-8">Log in</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="text-lg bg-[#b49d85]  text-white px-4 py-2 rounded-md transition duration-300">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </nav>
            </header>

            <main class="flex-grow">
                <div class="container mx-auto px-6 py-8">
                    <div class="flex flex-col md:flex-row items-center justify-between">
                        <div class="md:w-1/2 mb-8 md:mb-0">
                            <h1 class="text-4xl md:text-5xl font-bold mb-7 text-transparent bg-clip-text bg-gradient-to-r from-[#000] to-[#93B1A6]">Welcome To Your Store</h1>
                            <a href="#" class="bg-[#b49d85]  text-white px-6 py-3 rounded-lg text-lg font-semibold transition duration-300">Get Started</a>
                        </div>
                        <div class="md:w-1/2">
                            <img src="https://t3.ftcdn.net/jpg/01/07/00/50/360_F_107005010_vHGDB9kSbCKY0bYpYkGd9oAhgmSY9f8v.jpg" alt="Laravel Illustration" class="rounded-lg shadow-xl">
                        </div>
                    </div>

                  
                </div>
            </main>

            <footer class="bg-white dark:bg-gray-800 shadow-md mt-12">
                <div class="container mx-auto px-6 py-4">
                    <div class="flex justify-between items-center">
                        <div>
                            <p>&copy; 2024 StoreApp. All rights reserved.</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <a href="#" class="hover:text-red-500">Privacy Policy</a>
                            <a href="#" class="hover:text-red-500">Terms of Service</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>