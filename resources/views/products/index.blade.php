@extends('layouts.app', ['title' => 'Каталог авто'])

@section('content')

<div class="max-w-[1800px] mx-auto px-6">

    {{-- SECTION TITLE --}}
    <h1 class="sr-only">Каталог автомобілів USA IMPORTS</h1>

    @foreach($products as $product)

        <section class="relative w-full py-32 border-b border-zinc-900">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                {{-- IMAGE --}}
                <div class="relative group overflow-hidden rounded-2xl shadow-xl">

                    <img src="{{ asset('storage/' . $product->image) }}"
                         class="w-full h-[500px] object-cover group-hover:scale-105 transition duration-700">

                    {{-- VIEW DETAILS FLOATING BUTTON --}}
                    <a href="{{ route('products.show', $product) }}"
                       class="absolute bottom-6 right-6 flex items-center gap-2 text-brand font-bold uppercase text-xs tracking-widest group-hover:scale-110 transition">
                        <span>View Details</span>
                        <span class="w-4 h-4 border border-brand rotate-45"></span>
                    </a>

                </div>


                {{-- TEXT BLOCK --}}
                <div>

                    {{-- CATEGORY + ID --}}
                    <div class="flex items-center gap-4 mb-4">
                        <span class="px-3 py-1 bg-zinc-900 text-[10px] uppercase tracking-widest font-mono">
                            {{ $product->category->name ?? '—' }}
                        </span>

                        <span class="text-brand text-xs font-mono tracking-widest">
                            #{{ $product->id }}_US
                        </span>
                    </div>


                    {{-- HEADING --}}
                    <h2 class="text-6xl lg:text-7xl font-black leading-none mb-2">
                        {{ strtoupper($product->make) }}
                    </h2>

                    <p class="text-3xl lg:text-4xl text-zinc-400 font-light tracking-wide mb-10">
                        {{ strtoupper($product->model) }}
                    </p>


                    {{-- SPECS LINE --}}
                    <div class="flex items-center gap-16 text-zinc-400 font-mono text-sm uppercase tracking-widest mb-10">

                        <div>
                            <div class="text-[10px] text-zinc-600">Year</div>
                            <div class="text-xl text-white">{{ $product->year }}</div>
                        </div>

                        <div>
                            <div class="text-[10px] text-zinc-600">Est. Price</div>
                            <div class="text-xl text-white">
                                ${{ number_format($product->price, 0, '.', ' ') }}
                            </div>
                        </div>

                    </div>


                    {{-- BUTTONS --}}
                    <a href="{{ route('products.show', $product) }}"
                       class="inline-block px-10 py-4 bg-white text-black font-black text-sm uppercase tracking-wide rounded-xl hover:bg-brand hover:text-black transition">
                       View Details
                    </a>

                </div>

            </div>

        </section>

    @endforeach


    {{-- PAGINATION --}}
    <div class="mt-20">
        {{ $products->links() }}
    </div>

</div>

@endsection
