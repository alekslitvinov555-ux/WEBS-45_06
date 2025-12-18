@extends('admin.layout')

@section('content')

<div class="flex justify-between items-center mb-16">
    <h1 class="text-5xl font-black tracking-tight">
        ADMIN_<span class="text-brand">VEHICLES</span>
    </h1>

<a href="{{ route('admin.products.create') }}"
   class="px-7 py-3 
          bg-brand text-black 
          font-black rounded-xl 
          uppercase text-xs tracking-widest 
          shadow-[0_0_15px_3px_rgba(163,230,53,0.6)]
          border border-brand
          hover:bg-white 
          hover:shadow-[0_0_25px_6px_rgba(163,230,53,0.9)]
          transition-all">
    + Add Vehicle
</a>

</div>

{{-- GRID WRAPPER --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

    @foreach($products as $car)
    <div class="group bg-zinc-900/60 border border-zinc-800 rounded-2xl overflow-hidden hover:border-brand transition">

        {{-- IMAGE --}}
        <div class="relative h-48 w-full overflow-hidden">
            <img src="{{ asset('storage/' . $car->image) }}"
                 class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
        </div>

        {{-- CONTENT --}}
        <div class="p-6">

            {{-- CATEGORY + ID --}}
            <div class="flex items-center justify-between mb-3">
                <span class="px-2 py-1 bg-zinc-800 text-[10px] uppercase tracking-widest font-mono">
                    {{ $car->category->name ?? '—' }}
                </span>

                <span class="text-zinc-500 font-mono text-xs">ID: {{ $car->id }}</span>
            </div>

            {{-- MODEL --}}
            <h2 class="text-2xl font-black uppercase leading-tight mb-1 group-hover:text-brand transition">
                {{ $car->make }}
                <span class="block text-lg text-zinc-400">{{ $car->model }}</span>
            </h2>

            {{-- PRICE --}}
            <p class="font-mono text-sm text-zinc-400 mt-3">
                Price:
                <span class="text-white">${{ number_format($car->price, 0, '.', ',') }}</span>
            </p>

            {{-- ACTIONS --}}
            <div class="flex items-center justify-between mt-6 pt-4 border-t border-zinc-800">

                <a href="{{ route('admin.products.edit', $car) }}"
                   class="text-brand font-mono text-xs uppercase tracking-widest hover:text-white transition">
                    Edit
                </a>

                <form method="POST" action="{{ route('admin.products.destroy', $car) }}">
                    @csrf
                    @method('DELETE')
                    <button
                        onclick="return confirm('Delete this vehicle?')"
                        class="text-red-500 font-mono text-xs uppercase tracking-widest hover:text-red-300 transition">
                        Delete
                    </button>
                </form>

            </div>

        </div>

    </div>
    @endforeach

</div>


{{-- FLOATING ADD BUTTON --}}
<a href="{{ route('admin.products.create') }}"
   class="fixed bottom-10 right-10 z-50 bg-brand text-black w-14 h-14 rounded-full flex items-center justify-center
          text-3xl font-black shadow-xl hover:bg-white transition transform hover:scale-110">
    +
</a>


{{-- PAGINATION --}}
<div class="mt-12">
    {{ $products->links() }}
</div>

@endsection
