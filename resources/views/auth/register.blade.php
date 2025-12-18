<x-guest-layout>

    <!-- Background Noise -->
    <div class="bg-noise"></div>

    <!-- =========================== -->
    <!--      PAGE WRAPPER           -->
    <!-- =========================== -->
    <div class="min-h-screen flex flex-col justify-center px-6">

        <!-- Logo Block -->
        <div class="flex flex-col items-center mb-14 select-none">
            <span class="text-brand font-mono text-xs tracking-[0.3em] mb-2">US_IMP_V2.0</span>

            <h1 class="text-5xl md:text-7xl font-black text-outline tracking-tight leading-none">
                REGISTER
            </h1>

            <p class="text-zinc-500 font-mono text-xs uppercase tracking-widest mt-4">
                Create operator access
            </p>
        </div>

        <!-- FORM CONTAINER -->
        <div class="max-w-md w-full mx-auto bg-zinc-900/60 backdrop-blur-xl border border-zinc-800 p-10 rounded-2xl shadow-2xl">

            <form method="POST" action="{{ route('register') }}" class="space-y-8">
                @csrf

                <!-- Name -->
                <div>
                    <label class="block text-xs font-mono uppercase tracking-widest text-zinc-400 mb-2">
                        Ім’я
                    </label>

                    <input
                        type="text"
                        name="name"
                        required
                        autofocus
                        class="w-full bg-zinc-950 border border-zinc-800 text-sm text-zinc-100 rounded-xl px-4 py-3
                               focus:border-brand focus:ring-0 transition placeholder:text-zinc-600"
                        placeholder="John Doe"
                    >
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-xs font-mono uppercase tracking-widest text-zinc-400 mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        required
                        class="w-full bg-zinc-950 border border-zinc-800 text-sm text-zinc-100 rounded-xl px-4 py-3
                               focus:border-brand focus:ring-0 transition placeholder:text-zinc-600"
                        placeholder="john@example.com"
                    >
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-xs font-mono uppercase tracking-widest text-zinc-400 mb-2">
                        Пароль
                    </label>

                    <input
                        type="password"
                        name="password"
                        required
                        class="w-full bg-zinc-950 border border-zinc-800 text-sm text-zinc-100 rounded-xl px-4 py-3
                               focus:border-brand focus:ring-0 transition placeholder:text-zinc-600"
                        placeholder="•••••••"
                    >
                </div>

                <!-- Confirm -->
                <div>
                    <label class="block text-xs font-mono uppercase tracking-widest text-zinc-400 mb-2">
                        Підтвердження пароля
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        required
                        class="w-full bg-zinc-950 border border-zinc-800 text-sm text-zinc-100 rounded-xl px-4 py-3
                               focus:border-brand focus:ring-0 transition placeholder:text-zinc-600"
                        placeholder="•••••••"
                    >
                </div>

                <!-- ADMIN CHECKBOX -->
                <div class="bg-zinc-950 border border-zinc-800 p-4 rounded-xl flex items-start gap-4 hover:border-brand/50 transition">
                    <input
                        type="checkbox"
                        name="wants_admin"
                        value="1"
                        class="h-5 w-5 bg-zinc-900 border-zinc-700 text-brand focus:ring-brand rounded-none"
                    >
                    <div>
                        <span class="text-brand font-mono text-xs tracking-widest uppercase">
                            Admin Access
                        </span>
                        <p class="text-zinc-400 text-xs mt-1 leading-relaxed">
                            Запитую доступ адміністратора для керування автопарком (CRUD автомобілів).
                        </p>
                    </div>
                </div>

                <!-- Submit -->
                <div class="flex items-center justify-between pt-4">
                    <a href="{{ route('login') }}"
                       class="text-xs font-mono text-zinc-500 hover:text-brand uppercase tracking-widest transition">
                        Вже є акаунт?
                    </a>

                    <button
                        type="submit"
                        class="px-7 py-3 bg-brand text-black font-bold text-xs uppercase tracking-widest rounded-xl
                               hover:bg-white shadow-xl transition">
                        Створити акаунт
                    </button>
                </div>
            </form>

        </div>

        <!-- FOOTER -->
        <p class="text-center text-zinc-600 text-xs tracking-widest font-mono mt-12">
            © {{ date('Y') }} USA IMPORTS
        </p>
    </div>

</x-guest-layout>
