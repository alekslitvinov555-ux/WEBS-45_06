@extends('admin.layout')

@section('content')

<div class="flex justify-between items-center mb-16">
    <h1 class="text-5xl font-black tracking-tight">
        ADMIN_<span class="text-brand">CATEGORIES</span>
    </h1>

    <a href="{{ route('admin.categories.create') }}"
       class="px-7 py-3 bg-brand text-black font-black rounded-xl uppercase text-xs tracking-widest
              hover:bg-white transition shadow-[0_0_20px_4px_rgba(163,230,53,0.5)]">
        + Add Category
    </a>
</div>


{{-- GRID --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

    @foreach($categories as $cat)
    <div class="group bg-zinc-900/60 border border-zinc-800 p-8 rounded-2xl hover:border-brand transition">

        {{-- CATEGORY NAME --}}
        <h2 class="text-3xl font-black uppercase tracking-tight mb-4 group-hover:text-brand transition">
            {{ $cat->name }}
        </h2>

        {{-- DESCRIPTION --}}
        <p class="text-zinc-400 text-sm font-mono leading-relaxed mb-8">
            {{ $cat->description ?: 'No description...' }}
        </p>

        {{-- ACTIONS --}}
        <div class="flex items-center justify-between border-t border-zinc-800 pt-4">

            {{-- Edit --}}
            <a href="{{ route('admin.categories.edit', $cat) }}"
               class="text-brand text-xs font-mono uppercase tracking-widest hover:text-white transition">
                Edit
            </a>

            {{-- Delete --}}
            <form method="POST" action="{{ route('admin.categories.destroy', $cat) }}">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Delete this category?')"
                        class="text-red-500 hover:text-red-300 text-xs font-mono uppercase tracking-widest">
                    Delete
                </button>
            </form>

        </div>

    </div>
    @endforeach

</div>


{{-- PAGINATION --}}
<div class="mt-12">
    {{ $categories->links() }}
</div>

@endsection
