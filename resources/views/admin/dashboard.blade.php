@extends('admin.layout')

@section('content')

<div class="max-w-5xl">

    <h1 class="text-6xl font-black mb-10">
        ADMIN_<span class="text-brand">MODULE</span>
    </h1>

    <p class="text-zinc-500 font-mono text-xs uppercase tracking-widest mb-10">
        SYSTEM_READY — CONTROL_PANEL — USA_IMPORTS_2025
    </p>

    <div class="grid grid-cols-3 gap-10">

        <a href="{{ route('admin.products.index') }}"
           class="bg-zinc-900/60 p-10 border border-zinc-800 hover:border-brand transition rounded-xl">
            <h2 class="text-2xl font-black">Products</h2>
            <p class="text-zinc-500 text-sm mt-2">Manage imported vehicles</p>
        </a>

        <a href="{{ route('admin.categories.index') }}"
           class="bg-zinc-900/60 p-10 border border-zinc-800 hover:border-brand transition rounded-xl">
            <h2 class="text-2xl font-black">Categories</h2>
            <p class="text-zinc-500 text-sm mt-2">Vehicle classes, types</p>
        </a>

    </div>

</div>

@endsection
