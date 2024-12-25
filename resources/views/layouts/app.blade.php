<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Crypto Assistant') }}</title>
    <meta name="description" content="Your comprehensive cryptocurrency trading assistant">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Alpine.js for interactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @stack('styles')
</head>
<body class="bg-gray-50 text-gray-900 font-inter leading-normal tracking-normal">
    <header x-data="{ open: false }" class="fixed w-full z-50 top-0 bg-gradient-to-r from-blue-600 to-indigo-700 shadow-lg">
        <nav class="container mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-white text-2xl font-bold flex items-center">
                    <svg class="w-8 h-8 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                    </svg>
                    Crypto Assistant
                </a>
            </div>

            <div class="hidden md:flex space-x-6 items-center">
                <a href="{{ route('home') }}" class="text-white hover:text-blue-200 transition">Home</a>
                <a href="{{ route('packages.index') }}" class="text-white hover:text-blue-200 transition">Packages</a>
                <a href="{{ route('posts.index') }}" class="text-white hover:text-blue-200 transition">Blog</a>

                @if(Auth::check())
                    <a href="{{ route('dashboard') }}" class="text-white hover:text-blue-200 transition">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-white hover:text-red-300 transition">Logout</button>
                    </form>
                @else
                    <div class="flex space-x-4">
                        <a href="{{ route('login') }}" class="bg-white text-blue-600 px-4 py-2 rounded-md hover:bg-blue-50 transition">Login</a>
                        <a href="{{ route('register') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">Register</a>
                    </div>
                @endif
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button @click="open = !open" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </nav>

        <!-- Mobile Menu -->
        <div x-show="open" x-transition class="md:hidden bg-white shadow-lg">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ route('home') }}" class="text-gray-700 hover:bg-gray-200 block px-3 py-2 rounded-md">Home</a>
                <a href="{{ route('packages.index') }}" class="text-gray-700 hover:bg-gray-200 block px-3 py-2 rounded-md">Packages</a>
                <a href="{{ route('posts.index') }}" class="text-gray-700 hover:bg-gray-200 block px-3 py-2 rounded-md">Blog</a>

                @if(Auth::check())
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:bg-gray-200 block px-3 py-2 rounded-md">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:bg-gray-200 block px-3 py-2 rounded-md w-full text-left">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:bg-gray-200 block px-3 py-2 rounded-md">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:bg-gray-200 block px-3 py-2 rounded-md">Register</a>
                @endif
            </div>
        </div>
    </header>

    <main class=" mx-auto px-4 pt-24 pb-12">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto grid md:grid-cols-4 gap-8 px-4">
            <div>
                <h3 class="text-xl font-bold mb-4">Crypto Assistant</h3>
                <p class="text-gray-400">Your trusted partner in cryptocurrency trading and analysis.</p>
            </div>
            <div>
                <h4 class="font-semibold mb-3">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="hover:text-blue-400 transition">Home</a></li>
                    <li><a href="{{ route('packages.index') }}" class="hover:text-blue-400 transition">Packages</a></li>
                    <li><a href="{{ route('posts.index') }}" class="hover:text-blue-400 transition">Blog</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-3">Legal</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-blue-400 transition">Privacy Policy</a></li>
                    <li><a href="#" class="hover:text-blue-400 transition ">Terms of Service</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-3">Contact Us</h4>
                <p class="text-gray-400">Email: support@cryptoassistant.com</p>
                <p class="text-gray-400">Phone: +1 (234) 567-890</p>
            </div>
        </div>
        <div class="text-center mt-8">
            <p class="text-gray-400">&copy; 2024 Crypto Assistant. All rights reserved.</p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
