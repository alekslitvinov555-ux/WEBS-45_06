<x-app-layout>

    <section class="px-6 py-20 max-w-6xl mx-auto">

        {{-- большой заголовок слева --}}
        <div class="mb-16 select-none">
            <h1 class="text-5xl sm:text-6xl md:text-7xl font-black leading-none tracking-tight">
                <span class="text-white">SEARCH_</span>
                <span class="text-brand">PARAMETERS</span>
            </h1>
        </div>

        {{-- ВАЖНО: жесткое ограничение ширины формы --}}
        <div class="max-w-[640px]">

            <form action="{{ route('home') }}" method="GET" class="space-y-16">

                {{-- KEYWORD --}}
                <div>
                    <p class="font-mono text-xs text-brand uppercase tracking-[0.25em]">
                        [ keyword ]
                    </p>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="ENTER MODEL..."
                        class="mt-6 w-full bg-transparent border-0 border-b border-zinc-700
                               text-3xl sm:text-4xl font-black tracking-wide text-zinc-300
                               placeholder:text-zinc-700 focus:ring-0 focus:border-brand"
                    >
                </div>

                {{-- TYPE (пока просто select, позже можно заменить на кнопки) --}}
                <div>
                    <p class="font-mono text-xs text-brand uppercase tracking-[0.25em] mb-4">
                        [ type ]
                    </p>

                    <select
                        name="category"
                        class="w-full bg-zinc-900 border border-zinc-700 rounded-xl px-5 py-3 text-sm
                               text-zinc-100 focus:ring-0 focus:border-brand"
                    >
                        <option value="">Всі категорії</option>
                        @foreach(\App\Models\Category::all() as $c)
                            <option value="{{ $c->id }}" @selected(request('category') == $c->id)>
                                {{ $c->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- BUDGET RANGE --}}
                <div>
                    <p class="font-mono text-xs text-brand uppercase tracking-[0.25em] mb-4">
                        [ budget range ]
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                        {{-- min --}}
                        <div>
                            <label class="font-mono text-[10px] uppercase tracking-[0.25em] text-zinc-500">
                                min
                            </label>
                            <input
                                type="number"
                                name="min"
                                value="{{ request('min') }}"
                                placeholder="0"
                                class="mt-3 w-full bg-zinc-900 border border-zinc-700 rounded-xl px-5 py-3
                                       text-base text-white placeholder:text-zinc-600
                                       focus:ring-0 focus:border-brand"
                            >
                        </div>

                        {{-- max --}}
                        <div>
                            <label class="font-mono text-[10px] uppercase tracking-[0.25em] text-zinc-500">
                                max
                            </label>
                            <input
                                type="number"
                                name="max"
                                value="{{ request('max') }}"
                                placeholder="1000000"
                                class="mt-3 w-full bg-zinc-900 border border-zinc-700 rounded-xl px-5 py-3
                                       text-base text-white placeholder:text-zinc-600
                                       focus:ring-0 focus:border-brand"
                            >
                        </div>
                    </div>
                </div>

                {{-- КНОПКИ --}}
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6 pt-4">

                    <a href="{{ route('filters.index') }}"
                       class="text-xs font-mono uppercase tracking-[0.25em] text-zinc-400
                              border border-zinc-600 rounded-xl px-6 py-3 hover:text-brand hover:border-brand transition">
                        reset
                    </a>

                    <button
                        type="submit"
                        class="px-12 py-4 bg-brand text-black font-black text-sm uppercase tracking-[0.3em]
                               rounded-xl hover:bg-white transition shadow-xl"
                    >
                        apply filters
                    </button>
                </div>

            </form>

        </div>

    </section>

</x-app-layout>
