<!DOCTYPE html>
<html lang="uk" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{ $title ?? 'USA IMPORTS — Автомобілі з США' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;900&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-dark text-zinc-200 font-sans antialiased overflow-x-hidden">

    <!-- Noise texture -->
    <div class="bg-noise pointer-events-none"></div>

    <!-- ======================= -->
    <!--        TOP NAVBAR       -->
    <!-- ======================= -->
    <header class="fixed top-0 left-0 w-full z-50 border-b border-zinc-900/40 backdrop-blur-xl bg-black/20">
        <div class="max-w-[1800px] mx-auto px-6 py-4 flex items-center justify-between">

            <!-- Logo -->
            <a href="/" class="group flex flex-col leading-tight select-none">
                <span class="text-[10px] font-mono tracking-widest text-brand group-hover:text-white transition">US_IMP_V2.0</span>
                <span class="text-2xl font-black tracking-tight group-hover:text-brand transition">
                    USA<span class="text-white">IMPORTS</span>
                </span>
            </a>

            <!-- Nav -->
            <nav class="hidden md:flex items-center gap-10 font-mono text-xs uppercase tracking-widest text-zinc-500">
                <a href="{{ route('home') }}" class="hover:text-brand transition">Каталог</a>
                 @auth
        <a href="{{ route('delivery.index', 1) }}" 
           class="hover:text-brand transition">
            Доставка
        </a>

        {{-- PROFILE --}}
        <a href="{{ route('profile.edit') }}" 
           class="hover:text-brand transition">
            Профіль
        </a>
    @endauth
                <a href="{{ route('filters.index') }}" class="hover:text-brand transition">Фільтри</a>

                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.products.index') }}" class="hover:text-brand transition">Адмін панель</a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="hover:text-brand transition">Вийти</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:text-brand transition">Логін</a>
                @endauth
            </nav>
        </div>
    </header>

    <!-- відступ під fixed header -->
    <div class="pt-28"></div>

    <!-- ======================= -->
    <!--       PAGE CONTENT      -->
    <!-- ======================= -->
    <main class="relative z-10 min-h-screen">
        @if (isset($slot))
            {{-- коли використовується як <x-app-layout> --}}
            {{ $slot }}
        @else
            {{-- коли використовується як @extends('layouts.app') --}}
            @yield('content')
        @endif
    </main>

    <!-- ======================= -->
    <!--    FLOATING COMMAND     -->
    <!-- ======================= -->
    <div class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50">
        <div class="flex items-center gap-2 bg-zinc-900/80 backdrop-blur-lg px-4 py-2 rounded-2xl border border-zinc-800 shadow-2xl">

            <a href="{{ route('home') }}"
               class="px-6 py-3 rounded-xl font-bold text-sm uppercase tracking-wide transition-all
               {{ request()->routeIs('home') ? 'bg-white text-black' : 'text-zinc-400 hover:text-white' }}">
               Catalog
            </a>

            <div class="w-px h-6 bg-zinc-700"></div>

            <a href="{{ route('filters.index') }}"
               class="px-6 py-3 rounded-xl font-bold text-sm uppercase tracking-wide transition-all text-zinc-400 hover:text-white">
               Filters
            </a>

            <div class="w-px h-6 bg-zinc-700"></div>

            @auth
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.products.index') }}"
                       class="px-6 py-3 rounded-xl font-bold text-sm uppercase tracking-wide transition-all text-zinc-400 hover:text-white">
                       System
                    </a>
                @endif
            @else
                <a href="{{ route('login') }}"
                   class="px-6 py-3 rounded-xl font-bold text-sm uppercase tracking-wide transition-all text-zinc-400 hover:text-white">
                   Login
                </a>
            @endauth
        </div>
    </div>

    <!-- ======================= -->
    <!--         FOOTER          -->
    <!-- ======================= -->
    <footer class="mt-40 py-10 text-center text-zinc-600 text-xs font-mono tracking-widest">
        © {{ date('Y') }} USA IMPORTS — Автомобілі з США.
        <span class="text-brand">Преміальний сервіс. Прозора історія.</span>
    </footer>

</body>
</html>
