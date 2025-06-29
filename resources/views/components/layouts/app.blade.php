<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'SEA Catering - Premium Catering Services' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .gradient-bg {
            background: linear-gradient(#AAC4FF 0%, #EEF1FF 47%);
        }

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">

</head>

<body class="flex flex-col min-h-screen gradient-bg">
    <!-- Navigation Bar -->
    <nav>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Mobile Navigation -->
            <div class="md:hidden flex items-center justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-blue-600">SEA Catering</h1>
                </div>
                <button type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-blue-600 hover:bg-gray-100"
                    x-data="{ open: false }" @click="open = !open" :class="{ 'bg-gray-100': open }">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center justify-between h-20">

                <!-- Navigation Links - Centered -->
                <div class="flex-1 flex justify-center">
                    <div class="flex">
                        <a href="/"
                            class="text-gray-700 hover:text-blue-600 px-6 py-2 text-lg font-medium transition-colors duration-200 {{ request()->is('/') ? 'text-blue-600 font-semibold' : '' }}">
                            Home
                        </a>
                        <a href="/catering"
                            class="text-gray-700 hover:text-blue-600 px-6 py-2 text-lg font-medium transition-colors duration-200 {{ request()->is('catering*') ? 'text-blue-600 font-semibold' : '' }}">
                            Catering
                        </a>
                        <a href="/delivery"
                            class="text-gray-700 hover:text-blue-600 px-6 py-2 text-lg font-medium transition-colors duration-200 {{ request()->is('delivery*') ? 'text-blue-600 font-semibold' : '' }}">
                            Delivery
                        </a>
                        <a href="/about"
                            class="text-gray-700 hover:text-blue-600 px-6 py-2 text-lg font-medium transition-colors duration-200 {{ request()->is('about*') ? 'text-blue-600 font-semibold' : '' }}">
                            About Us
                        </a>
                    </div>
                </div>

                {{-- <!-- Auth Section -->
                <div class="flex-shrink-0">
                    @auth
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="/login"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200">
                            Login
                        </a>
                    @endauth
                </div> --}}
            </div>

            <!-- Mobile Menu -->
            <div class="md:hidden" x-data="{ open: false }" x-show="open" x-transition>
                <div class="px-2 pt-2 pb-3 space-y-1 bg-white rounded-lg shadow-lg mt-2">
                    <a href="/"
                        class="block px-6 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-md {{ request()->is('/') ? 'text-blue-600 bg-blue-50' : '' }}">
                        Home
                    </a>
                    <a href="/catering"
                        class="block px-6 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-md {{ request()->is('catering*') ? 'text-blue-600 bg-blue-50' : '' }}">
                        Catering
                    </a>
                    <a href="/delivery"
                        class="block px-6 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-md {{ request()->is('delivery*') ? 'text-blue-600 bg-blue-50' : '' }}">
                        Delivery
                    </a>
                    <a href="/about"
                        class="block px-6 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-md {{ request()->is('about*') ? 'text-blue-600 bg-blue-50' : '' }}">
                        About Us
                    </a>
                    <div class="border-t pt-2">
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-3 py-2 text-base font-medium text-red-600 hover:bg-red-50 rounded-md">
                                    Logout
                                </button>
                            </form>
                        @else
                            <a href="/login"
                                class="block px-3 py-2 text-base font-medium text-blue-600 hover:bg-blue-50 rounded-md">
                                Login
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Footer Section -->
    <footer class="bg-gray-800 text-white mt-auto">
        <div class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
                <!-- Company Info -->
                <div class="text-center md:text-left">
                    <h3 class="text-2xl font-bold text-blue-400 mb-2">SEA Catering</h3>
                    <p class="text-gray-300">Premium catering services for all your special occasions</p>
                </div>

                <!-- Contact Information -->
                <div class="text-center">
                    <h4 class="text-lg font-semibold mb-3 text-blue-400">📞 Contact Us</h4>
                    <div class="space-y-1">
                        <p class="text-gray-300">
                            <span class="font-medium">Manager:</span> Brian
                        </p>
                        <p class="text-gray-300">
                            <span class="font-medium">Phone:</span>
                            <a href="tel:08123456789" class="text-blue-400 hover:text-blue-300 transition-colors">
                                08123456789
                            </a>
                        </p>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="text-center md:text-right">
                    <h4 class="text-lg font-semibold mb-3 text-blue-400">Quick Links</h4>
                    <div class="space-y-2">
                        <a href="/catering" class="block text-gray-300 hover:text-blue-400 transition-colors">Our
                            Menu</a>
                        <a href="/delivery" class="block text-gray-300 hover:text-blue-400 transition-colors">Delivery
                            Info</a>
                        <a href="/about" class="block text-gray-300 hover:text-blue-400 transition-colors">About Us</a>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-gray-700 mt-8 pt-6 text-center">
                <p class="text-gray-400">
                    &copy; {{ date('Y') }} SEA Catering. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    @livewireScripts
    <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>
