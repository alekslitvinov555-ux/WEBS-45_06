@extends('admin.layout')

@section('content')

<div class="mb-16">
    <h1 class="text-5xl font-black tracking-tight">
        EDIT_<span class="text-brand">VEHICLE</span>
    </h1>

    <p class="text-zinc-500 font-mono text-xs uppercase tracking-widest mt-2">
        Editing vehicle #{{ $product->id }}
    </p>
</div>


<form action="{{ route('admin.products.update', $product) }}" 
      method="POST" 
      enctype="multipart/form-data"
      class="max-w-4xl space-y-12">

    @csrf
    @method('PUT')


    {{-- BASIC INFO --}}
    <div class="bg-zinc-900/60 p-10 border border-zinc-800 rounded-2xl">
        <h2 class="text-xl font-black uppercase mb-8 tracking-widest">
            Basic_<span class="text-brand">Info</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            {{-- MAKE --}}
            <div>
                <label class="block text-xs font-mono uppercase tracking-widest text-zinc-500 mb-2">Make</label>
                <input type="text" 
                       name="make"
                       value="{{ old('make', $product->make ?? '') }}"
                       required
                       class="w-full bg-zinc-950 border border-zinc-800 text-sm text-zinc-100 
                              rounded-xl px-4 py-3 focus:border-brand transition">
            </div>

            {{-- MODEL --}}
            <div>
                <label class="block text-xs font-mono uppercase tracking-widest text-zinc-500 mb-2">Model</label>
                <input type="text" 
                       name="model"
                       value="{{ old('model', $product->model ?? '') }}"
                       required
                       class="w-full bg-zinc-950 border border-zinc-800 text-sm text-zinc-100 
                              rounded-xl px-4 py-3 focus:border-brand transition">
            </div>

            {{-- YEAR --}}
            <div>
                <label class="block text-xs font-mono uppercase tracking-widest text-zinc-500 mb-2">Year</label>
                <input type="number" 
                       name="year"
                       min="1990"
                       max="{{ date('Y') }}"
                       value="{{ old('year', $product->year ?? '') }}"
                       required
                       class="w-full bg-zinc-950 border border-zinc-800 text-sm text-zinc-100 
                              rounded-xl px-4 py-3 focus:border-brand transition">
            </div>

            {{-- PRICE --}}
            <div>
                <label class="block text-xs font-mono uppercase tracking-widest text-zinc-500 mb-2">Price (USD)</label>
                <input type="number" 
                       name="price"
                       min="0"
                       value="{{ old('price', $product->price ?? '') }}"
                       required
                       class="w-full bg-zinc-950 border border-zinc-800 text-sm text-zinc-100 
                              rounded-xl px-4 py-3 focus:border-brand transition">
            </div>

        </div>
    </div>



    {{-- CATEGORY & SPECS --}}
    <div class="bg-zinc-900/60 p-10 border border-zinc-800 rounded-2xl">

        <h2 class="text-xl font-black uppercase mb-8 tracking-widest">
            Category_<span class="text-brand">Specs</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            {{-- CATEGORY --}}
            <div>
                <label class="block text-xs font-mono uppercase tracking-widest text-zinc-500 mb-2">Category</label>

                <select name="category_id"
                        class="w-full bg-zinc-950 border border-zinc-800 text-sm text-zinc-100 
                               rounded-xl px-4 py-3 focus:border-brand transition">

                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}"
                            @selected(old('category_id', $product->category_id) == $cat->id)>
                            {{ $cat->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- ENGINE --}}
            <div>
                <label class="block text-xs font-mono uppercase tracking-widest text-zinc-500 mb-2">Engine</label>
                <input type="text" 
                       name="engine"
                       value="{{ old('engine', $product->engine ?? '') }}"
                       class="w-full bg-zinc-950 border border-zinc-800 text-sm text-zinc-100 
                              rounded-xl px-4 py-3 focus:border-brand transition">
            </div>

            {{-- MILEAGE --}}
            <div>
                <label class="block text-xs font-mono uppercase tracking-widest text-zinc-500 mb-2">Mileage (mi)</label>
                <input type="number" 
                       name="mileage"
                       min="0"
                       value="{{ old('mileage', $product->mileage ?? '') }}"
                       class="w-full bg-zinc-950 border border-zinc-800 text-sm text-zinc-100 
                              rounded-xl px-4 py-3 focus:border-brand transition">
            </div>

        </div>

    </div>



    {{-- IMAGE --}}
    <div class="bg-zinc-900/60 p-10 border border-zinc-800 rounded-2xl">

        <h2 class="text-xl font-black uppercase mb-8 tracking-widest">
            Vehicle_<span class="text-brand">Image</span>
        </h2>

        {{-- CURRENT IMAGE --}}
        <div class="mb-6">
            <p class="text-xs font-mono uppercase text-zinc-500 mb-3">Current Image</p>

            <img src="{{ asset('storage/'.$product->image) }}"
                 class="w-72 h-48 object-cover rounded-xl border border-zinc-700">
        </div>

        {{-- NEW UPLOAD --}}
        <label class="block text-xs font-mono uppercase tracking-widest text-zinc-500 mb-4">
            Upload New Image (optional)
        </label>

        <div class="border-2 border-dashed border-zinc-700 rounded-xl p-8 text-center hover:border-brand transition">
            <input type="file" name="image" class="hidden" id="imageInput">

            <label for="imageInput"
                   class="cursor-pointer text-zinc-400 hover:text-brand transition block">
                Click to upload new image
            </label>
        </div>
    </div>



    {{-- DESCRIPTION --}}
    <div class="bg-zinc-900/60 p-10 border border-zinc-800 rounded-2xl">

        <h2 class="text-xl font-black uppercase mb-8 tracking-widest">
            Vehicle_<span class="text-brand">Description</span>
        </h2>

        <textarea name="description" rows="6"
                  class="w-full bg-zinc-950 border border-zinc-800 text-sm text-zinc-100 
                         rounded-xl px-4 py-3 focus:border-brand transition"
                  placeholder="Enter vehicle description...">{{ old('description', $product->description ?? '') }}</textarea>
    </div>


    {{-- SUBMIT --}}
    <button type="submit"
            class="px-10 py-4 bg-brand text-black font-black text-sm uppercase tracking-widest rounded-xl
                   hover:bg-white shadow-[0_0_25px_6px_rgba(163,230,53,0.6)] transition">
        Update Vehicle
    </button>

</form>

@endsection
