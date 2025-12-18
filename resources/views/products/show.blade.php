@extends('layouts.app', ['title' => $product->make . ' ' . $product->model])

@section('content')

<div class="max-w-[1700px] mx-auto px-6">

    {{-- BACK --}}
    <a href="{{ route('home') }}"
       class="inline-flex items-center gap-2 text-zinc-500 hover:text-white font-mono uppercase tracking-widest text-xs mb-10 transition">
        <span class="w-3 h-px bg-zinc-500"></span> Back to catalog
    </a>


    {{-- MAIN WRAPPER --}}
    <section class="grid grid-cols-1 lg:grid-cols-[55%_45%] gap-16 items-center py-16">

        {{-- LEFT: IMAGE --}}
        <div class="relative">

            <div class="overflow-hidden rounded-2xl border border-zinc-800 bg-zinc-900/40">
                <img src="{{ asset('storage/' . $product->image) }}"
                     class="w-full h-[520px] object-cover object-center transition duration-700 rounded-2xl">
            </div>

            {{-- FLOAT TAG --}}
            <div class="absolute top-6 left-6 px-3 py-1 bg-zinc-900/80 backdrop-blur border border-zinc-700 
                        text-[10px] uppercase tracking-widest font-mono text-brand rounded">
                #{{ $product->id }}_US
            </div>

        </div>


        {{-- RIGHT TEXT PANEL --}}
        <div class="flex flex-col justify-center h-full">

            {{-- CATEGORY --}}
            <div class="flex items-center gap-4 mb-6">
                <span class="px-3 py-1 bg-zinc-900 text-[10px] uppercase tracking-widest font-mono">
                    {{ $product->category->name ?? '—' }}
                </span>

                <span class="text-brand text-xs font-mono tracking-widest">EST. IMPORT</span>
            </div>

            {{-- TITLE --}}
            <h1 class="text-6xl font-black uppercase leading-none">
                {{ strtoupper($product->make) }}
            </h1>

            <p class="text-3xl text-zinc-400 uppercase mt-2 tracking-wide">
                {{ strtoupper($product->model) }}
            </p>


            {{-- SPECS GRID --}}
            <div class="mt-10 grid grid-cols-2 gap-y-8 text-zinc-400 font-mono uppercase tracking-widest text-sm">

                <div>
                    <div class="text-[10px] text-zinc-600">Year</div>
                    <div class="text-2xl text-white">{{ $product->year }}</div>
                </div>

                <div>
                    <div class="text-[10px] text-zinc-600">Est. Price</div>
                    <div class="text-2xl text-white">${{ number_format($product->price, 0, '.', ' ') }}</div>
                </div>

                @if($product->engine)
                    <div>
                        <div class="text-[10px] text-zinc-600">Engine</div>
                        <div class="text-xl text-white">{{ $product->engine }}</div>
                    </div>
                @endif

                @if($product->mileage)
                    <div>
                        <div class="text-[10px] text-zinc-600">Mileage</div>
                        <div class="text-xl text-white">{{ number_format($product->mileage) }} MI</div>
                    </div>
                @endif

            </div>


            {{-- BUTTONS --}}
            <div class="mt-12 flex gap-6">

                <a href="#"
                   class="px-10 py-4 bg-brand text-black font-black text-sm uppercase tracking-widest rounded-xl
                          hover:bg-white shadow-[0_0_25px_6px_rgba(163,230,53,0.6)] transition">
                    Request Delivery
                </a>

                <a href="{{ route('home') }}"
                   class="px-10 py-4 bg-zinc-900 border border-zinc-700 text-white font-black text-sm uppercase tracking-widest rounded-xl
                          hover:bg-zinc-800 transition">
                    Back
                </a>

            </div>

        </div>

    </section>



    {{-- DESCRIPTION --}}
    @if($product->description)
        <section class="max-w-4xl mt-20 mb-40">
            <h2 class="text-2xl font-black uppercase tracking-widest mb-6 text-brand">Vehicle Description</h2>

            <p class="text-zinc-400 leading-relaxed text-lg">
                {{ $product->description }}
            </p>
        </section>
    @endif

</div>

@endsection
