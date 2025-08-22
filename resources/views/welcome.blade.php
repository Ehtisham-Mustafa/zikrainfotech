<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MultiTenant App</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-[#fefefe] via-[#fafafa] to-[#f2f2f2] dark:from-[#0a0a0a] dark:via-[#141414] dark:to-[#1a1a1a] text-[#1b1b18] dark:text-white min-h-screen flex flex-col items-center justify-center px-6">

    <!-- Navbar -->
    <header class="w-full max-w-6xl flex justify-between items-center py-4">
        <h1 class="text-xl font-bold tracking-tight">🌐 MultiTenant</h1>
        <nav class="flex items-center gap-4 text-sm">
            @auth
                <a href="{{ url('/dashboard') }}" class="px-4 py-2 rounded-lg border dark:border-neutral-700 hover:bg-neutral-100 dark:hover:bg-neutral-800 transition">Dashboard</a>
                <a href="{{ url('/tenants/create') }}" class="px-4 py-2 rounded-lg bg-[#F53003] text-white hover:bg-[#d82b00] transition">Create Company</a>
            @else
                {{-- <a href="{{ route('login') }}" class="px-4 py-2 rounded-lg border dark:border-neutral-700 hover:bg-neutral-100 dark:hover:bg-neutral-800 transition">Log in</a> --}}
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="px-4 py-2 rounded-lg bg-[#F53003] text-white hover:bg-[#d82b00] transition">Register</a>
                @endif
            @endauth
        </nav>
    </header>

    <!-- Hero Section -->
    <main class="w-full max-w-6xl text-center lg:text-left flex flex-col lg:flex-row items-center gap-10 lg:gap-20 py-16">
        <!-- Text -->
        <div class="flex-1">
            <h2 class="text-4xl font-extrabold leading-tight mb-4">Manage Multiple <span class="text-[#F53003]">Companies</span> Seamlessly</h2>
            <p class="text-lg text-neutral-600 dark:text-neutral-400 mb-6">Easily create, switch, and manage your organizations in one unified platform. Perfect for multi-tenant applications powered by Laravel.</p>
            
            @auth
                <div class="flex gap-4 justify-center lg:justify-start">
                    <a href="{{ url('/dashboard') }}" class="px-6 py-3 bg-[#1b1b18] text-white rounded-lg hover:bg-black transition">Go to Dashboard</a>
                    <a href="{{ url('/tenants/create') }}" class="px-6 py-3 border border-[#F53003] text-[#F53003] rounded-lg hover:bg-[#F53003] hover:text-white transition">Create Company</a>
                </div>
            @else
                <div class="flex gap-4 justify-center lg:justify-start">
                    <a href="{{ route('login') }}" class="px-6 py-3 bg-[#1b1b18] text-white rounded-lg hover:bg-black transition">Log in</a>
                    <a href="{{ route('register') }}" class="px-6 py-3 border border-[#F53003] text-[#F53003] rounded-lg hover:bg-[#F53003] hover:text-white transition">Register</a>
                </div>
            @endauth
        </div>

        <!-- Illustration / Logo -->
        <div class="flex-1 flex items-center justify-center">
            <div class="bg-[#fff2f2] dark:bg-[#1D0002] p-8 rounded-2xl shadow-lg">
                <svg class="w-72 h-auto text-[#F53003] dark:text-[#F61500]" viewBox="0 0 100 100" fill="currentColor">
                    <circle cx="50" cy="50" r="45" stroke="currentColor" stroke-width="6" fill="none"/>
                    <path d="M25 60 L50 30 L75 60 Z" fill="currentColor"/>
                </svg>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="w-full max-w-6xl text-center text-sm text-neutral-500 dark:text-neutral-400 py-6">
        © {{ date('Y') }} MultiTenant App. All rights reserved.
    </footer>
</body>
</html>
