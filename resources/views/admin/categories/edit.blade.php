@extends('admin.layout')

@section('content')

<div class="mb-16">
    <h1 class="text-5xl font-black tracking-tight">
        EDIT_<span class="text-brand">CATEGORY</span>
    </h1>

    <p class="text-zinc-500 font-mono text-xs uppercase tracking-widest mt-2">
        Editing category #{{ $category->id }}
    </p>
</div>

<form action="{{ route('admin.categories.update', $category) }}" method="POST" class="max-w-3xl space-y-12">
    @csrf
    @method('PUT')

    {{-- CATEGORY INFO --}}
    <div class="bg-zinc-900/60 p-10 border border-zinc-800 rounded-2xl">

        <h2 class="text-xl font-black uppercase mb-8 tracking-widest">
            Category_<span class="text-brand">Info</span>
        </h2>

        {{-- NAME --}}
        <div class="mb-8">
            <label class="block text-xs font-mono uppercase tracking-widest text-zinc-500 mb-2">
                Category Name
            </label>
            <input type="text" name="name" required value="{{ $category->name }}"
                class="w-full bg-zinc-950 border border-zinc-800 text-sm text-zinc-100 
                       rounded-xl px-4 py-3 focus:border-brand transition">
        </div>

        {{-- DESCRIPTION --}}
        <div>
            <label class="block text-xs font-mono uppercase tracking-widest text-zinc-500 mb-2">
                Description
            </label>
            <textarea name="description" rows="5"
                class="w-full bg-zinc-950 border border-zinc-800 text-sm text-zinc-100 
                       rounded-xl px-4 py-3 focus:border-brand transition"
            >{{ $category->description }}</textarea>
        </div>
    </div>

    {{-- SUBMIT --}}
    <button type="submit"
        class="px-10 py-4 bg-white text-black font-black text-sm uppercase tracking-widest rounded-xl
               hover:bg-brand hover:text-black border border-brand
               shadow-[0_0_25px_6px_rgba(255,255,255,0.3)]
               hover:shadow-[0_0_30px_8px_rgba(163,230,53,0.8)]
               transition">
        Update Category
    </button>

</form>

@endsection
