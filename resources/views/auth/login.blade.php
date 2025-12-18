<x-guest-layout>

    <!-- Noise Background -->
    <div class="bg-noise"></div>

    <!-- LOGIN SCREEN -->
    <div class="min-h-screen flex flex-col justify-center px-6">

        <!-- BRAND HEADER -->
        <div class="flex flex-col items-center mb-16 select-none">
            
            <span class="text-brand font-mono text-xs tracking-[0.35em] mb-3">
                SYSTEM_ACCESS_MODULE
            </span>

            <h1 class="text-6xl md:text-8xl font-black text-outline leading-none tracking-tight">
                LOGIN
            </h1>

            <p class="text-zinc-500 font-mono text-[11px] uppercase tracking-widest mt-4">
                Restricted zone: authentication required
            </p>
        </div>

        <!-- LOGIN PANEL -->
        <div class="max-w-md w-full mx-auto bg-zinc-900/50 backdrop-blur-xl border border-zinc-800 p-12 rounded-2xl shadow-2xl">

            <form method="POST" action="{{ route('login') }}" class="space-y-10">
                @csrf

                <!-- USERNAME MODULE -->
                <div>
                    <p class="font-mono text-xs uppercase text-brand tracking-[0.3em] mb-3">
                        [ user_id ]
                    </p>

                    <input
                        type="email"
                        name="email"
                        required
                        autofocus
                        placeholder="ENTER IDENTIFIER…"
                        class="w-full bg-transparent border-0 border-b border-zinc-700
                               text-xl font-bold tracking-wide text-zinc-200 pb-3
                               placeholder:text-zinc-600 focus:border-brand focus:ring-0 transition"
                    >
                </div>

                <!-- PASSWORD MODULE -->
                <div>
                    <p class="font-mono text-xs uppercase text-brand tracking-[0.3em] mb-3">
                        [ access_key ]
                    </p>

                    <input
                        type="password"
                        name="password"
                        required
                        placeholder="••••••••"
                        class="w-full bg-transparent border-0 border-b border-zinc-700
                               text-xl font-bold tracking-wide text-zinc-200 pb-3
                               placeholder:text-zinc-600 focus:border-brand focus:ring-0 transition"
                    >
                </div>

                <!-- OPTIONS ROW -->
                <div class="flex items-center gap-3">
                    <input
                        type="checkbox"
                        name="remember"
                        class="h-4 w-4 bg-zinc-900 border-zinc-600 text-brand focus:ring-brand rounded-none"
                    >
                    <span class="text-[10px] text-zinc-400 font-mono uppercase tracking-widest">
                        remember session
                    </span>
                </div>

                <!-- ACTIONS -->
                <div class="flex items-center justify-between pt-6">

                    <a href="{{ route('register') }}"
                        class="font-mono text-[10px] uppercase tracking-widest text-zinc-500 hover:text-brand transition">
                        create access id
                    </a>

                    <button
                        type="submit"
                        class="px-10 py-4 bg-brand text-black font-black text-xs uppercase tracking-[0.25em]
                               rounded-xl hover:bg-white transition shadow-lg"
                    >
                        enter system
                    </button>
                </div>

            </form>
        </div>

        <!-- FOOTER -->
        <p class="text-center text-zinc-600 text-[11px] tracking-widest font-mono mt-14">
            SYSTEM_NODE_{{ date('Y') }} — USA_IMPORTS / AUTH_CONTROL_V2.0
        </p>

    </div>

</x-guest-layout>
