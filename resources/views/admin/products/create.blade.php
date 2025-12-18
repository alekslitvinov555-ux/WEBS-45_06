@extends('admin.layout')

@section('content')

<div class="mb-16">
    <h1 class="text-5xl font-black tracking-tight">
        ADD_<span class="text-brand">VEHICLE</span>
    </h1>

    <p class="text-zinc-500 font-mono text-xs uppercase tracking-widest mt-2">
        New vehicle entry — USA Imports System
    </p>
</div>

{{-- FORM WRAPPER --}}
<form action="{{ route('admin.products.store') }}" 
    method="POST" 
    enctype="multipart/form-data"
    class="max-w-4xl space-y-12">

    @csrf


    {{-- BASIC INFO --}}
    <div class="card-surface p-10 rounded-2xl backdrop-blur">

        <h2 class="text-xl font-black uppercase mb-8 tracking-widest">
            Basic_<span class="text-brand">Info</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            {{-- MAKE --}}
            <div>
                <div class="flex items-center justify-between mb-2">
                    <label class="label-muted">Make<span class="text-brand"> *</span></label>
                    <span class="helper">Марка авто</span>
                </div>
                <input type="text" name="make" required value="{{ old('make') }}"
                       class="w-full input-soft text-sm text-zinc-100 rounded-xl px-4 py-3">
                @error('make')
                    <p class="text-red-400 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            {{-- MODEL --}}
            <div>
                <div class="flex items-center justify-between mb-2">
                    <label class="label-muted">Model<span class="text-brand"> *</span></label>
                    <span class="helper">Конкретна модель</span>
                </div>
                <input type="text" name="model" required value="{{ old('model') }}"
                       class="w-full input-soft text-sm text-zinc-100 rounded-xl px-4 py-3">
                @error('model')
                    <p class="text-red-400 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>


            {{-- YEAR --}}
            <div>
                <div class="flex items-center justify-between mb-2">
                    <label class="label-muted">Year<span class="text-brand"> *</span></label>
                    <span class="helper">1990 – {{ date('Y') }}</span>
                </div>
                <input type="number" name="year" min="1990" max="{{ date('Y') }}" required value="{{ old('year') }}"
                       class="w-full input-soft text-sm text-zinc-100 rounded-xl px-4 py-3">
                @error('year')
                    <p class="text-red-400 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            {{-- PRICE --}}
            <div>
                <div class="flex items-center justify-between mb-2">
                    <label class="label-muted">Price (USD)<span class="text-brand"> *</span></label>
                    <span class="helper">Ціна в доларах</span>
                </div>
                <input type="number" name="price" min="0" required value="{{ old('price') }}"
                       class="w-full input-soft text-sm text-zinc-100 rounded-xl px-4 py-3">
                @error('price')
                    <p class="text-red-400 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

        </div>
    </div>



    {{-- CATEGORY & TECH --}}
    <div class="card-surface p-10 rounded-2xl backdrop-blur">

        <h2 class="text-xl font-black uppercase mb-8 tracking-widest">
            Category_<span class="text-brand">Specs</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            {{-- CATEGORY --}}
            <div>
                <div class="flex items-center justify-between mb-2">
                    <label class="label-muted">Category<span class="text-brand"> *</span></label>
                    <span class="helper">Оберіть тип авто</span>
                </div>

                <select name="category_id"
                        class="w-full input-soft text-sm text-zinc-100 rounded-xl px-4 py-3">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" @selected(old('category_id')==$cat->id)>{{ $cat->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-400 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>


            {{-- ENGINE --}}
            <div>
                <div class="flex items-center justify-between mb-2">
                    <label class="label-muted">Engine</label>
                    <span class="helper">Напр. 2.0L Turbo</span>
                </div>
                <input type="text" name="engine" value="{{ old('engine') }}"
                       class="w-full input-soft text-sm text-zinc-100 rounded-xl px-4 py-3">
                @error('engine')
                    <p class="text-red-400 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>


            {{-- MILEAGE --}}
            <div>
                <div class="flex items-center justify-between mb-2">
                    <label class="label-muted">Mileage (mi)</label>
                    <span class="helper">Пробіг у милях</span>
                </div>
                <input type="number" name="mileage" min="0" value="{{ old('mileage') }}"
                       class="w-full input-soft text-sm text-zinc-100 rounded-xl px-4 py-3">
                @error('mileage')
                    <p class="text-red-400 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

        </div>

    </div>



    {{-- IMAGE UPLOAD --}}
    <div class="card-surface p-10 rounded-2xl backdrop-blur">

        <h2 class="text-xl font-black uppercase mb-8 tracking-widest">
            Vehicle_<span class="text-brand">Image</span>
        </h2>

        <div class="flex items-center justify-between mb-4">
            <label class="label-muted">Upload Image<span class="text-brand"> *</span></label>
            <span class="helper">JPG/PNG до 4 МБ</span>
        </div>

        <div class="border-2 border-dashed border-zinc-700 rounded-xl p-8 text-center hover:border-brand transition group">

            <input type="file" name="image" required accept="image/*" class="hidden" id="imageInput">

            <label for="imageInput"
                   class="cursor-pointer text-zinc-400 group-hover:text-brand transition block">
                Натисніть щоб обрати файл
            </label>
        </div>

        @error('image')
            <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
        @enderror
    </div>



    {{-- DESCRIPTION --}}
    <div class="card-surface p-10 rounded-2xl backdrop-blur">

        <h2 class="text-xl font-black uppercase mb-8 tracking-widest">
            Vehicle_<span class="text-brand">Description</span>
        </h2>

        <div class="flex items-center justify-between mb-2">
            <label class="label-muted">Vehicle Description</label>
            <span class="helper">Опишіть стан, комплектацію</span>
        </div>
        <textarea name="description" rows="6"
                  class="w-full input-soft text-sm text-zinc-100 rounded-xl px-4 py-3"
                  placeholder="Enter vehicle description...">{{ old('description') }}</textarea>
        @error('description')
            <p class="text-red-400 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>



    {{-- SUBMIT --}}
<button type="submit"
        class="px-10 py-4 
               bg-white text-black 
               font-black text-sm uppercase tracking-widest 
               rounded-xl border border-brand 
               shadow-[0_0_25px_6px_rgba(255,255,255,0.25)]
               hover:bg-brand hover:text-black
               hover:shadow-[0_0_30px_8px_rgba(163,230,53,0.8)]
               transition">
    Save Vehicle
</button>


</form>

@endsection
