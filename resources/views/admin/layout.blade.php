<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel — USA IMPORTS</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;900&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color:#050505;
            color:#e4e4e7;
            font-family:'Inter', sans-serif;
            overflow-x:hidden;
        }

        /* Brand helpers so CDN Tailwind sees custom accent */
        .text-brand { color:#a3e635; }
        .bg-brand { background-color:#a3e635; }
        .border-brand { border-color:#a3e635; }
        .ring-brand { --tw-ring-color:#a3e635; }

        .bg-noise {
            position:fixed;
            inset:0;
            z-index:20;
            opacity:.04;
            pointer-events:none;
            background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
        }
        .admin-grid {
            background-image: linear-gradient(#111 1px, transparent 1px), 
                               linear-gradient(90deg, #111 1px, transparent 1px);
            background-size: 32px 32px;
        }

        /* Form surface refinement */
        .card-surface {
            background: radial-gradient(circle at 20% 20%, rgba(163,230,53,0.04), transparent 35%),
                        rgba(24,24,27,0.8);
            border:1px solid #27272a;
        }
        .input-soft {
            background-color:#0a0a0a;
            border:1px solid #27272a;
            transition:border-color .2s, box-shadow .2s;
        }
        .input-soft:focus {
            border-color:#a3e635;
            box-shadow:0 0 0 3px rgba(163,230,53,0.15);
            outline: none;
        }
        .label-muted { color:#a1a1aa; letter-spacing:.08em; font-size:11px; text-transform:uppercase; }
        .helper { color:#71717a; font-size:12px; }
    </style>
</head>

<body class="admin-grid">

<div class="bg-noise"></div>

<!-- TOP BAR -->
<header class="fixed top-0 left-0 right-0 z-50 bg-black/40 backdrop-blur-xl border-b border-zinc-800 py-4 px-10 flex items-center justify-between select-none">

    <a href="{{ route('home') }}" class="flex flex-col">
        <span class="text-[10px] text-brand font-mono tracking-widest">US_IMP_V2.0</span>
        <span class="text-xl font-black">USA<span class="text-brand">IMPORTS</span></span>
    </a>

    <nav class="flex items-center gap-10 uppercase font-mono text-xs tracking-widest text-zinc-500">
        <a href="{{ route('admin.dashboard') }}" class="hover:text-brand">Dashboard</a>
        <a href="{{ route('admin.products.index') }}" class="hover:text-brand">Products</a>
        <a href="{{ route('admin.categories.index') }}" class="hover:text-brand">Categories</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="hover:text-brand">Logout</button>
        </form>
    </nav>

</header>

<!-- PAGE CONTENT -->
<div class="pt-32 px-12">
    @yield('content')
</div>

</body>
</html>
