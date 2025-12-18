@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto px-6">

    {{-- TITLE --}}
    <div class="mb-16">
        <h1 class="text-5xl font-black tracking-tight">
            PROFILE_<span class="text-brand">SETTINGS</span>
        </h1>

        <p class="text-zinc-500 font-mono text-xs uppercase tracking-widest mt-2">
            Manage your personal data
        </p>
    </div>


    {{-- SUCCESS MSG --}}
    @if(session('success'))
        <div class="mb-6 px-6 py-4 bg-brand text-black rounded-xl font-mono text-xs uppercase tracking-widest">
            {{ session('success') }}
        </div>
    @endif


    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-12">
        @csrf


        {{-- BASIC INFO --}}
        <div class="bg-zinc-900/60 p-10 border border-zinc-800 rounded-2xl">

            <h2 class="text-xl font-black uppercase mb-8 tracking-widest">
                Account_<span class="text-brand">Info</span>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                {{-- NAME --}}
                <div>
                    <label class="block text-xs font-mono uppercase tracking-widest text-zinc-500 mb-2">
                        Name
                    </label>
                    <input type="text"
                           name="name"
                           value="{{ $user->name }}"
                           class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-sm text-zinc-100
                                  focus:border-brand transition">
                </div>

                {{-- EMAIL --}}
                <div>
                    <label class="block text-xs font-mono uppercase tracking-widest text-zinc-500 mb-2">
                        Email
                    </label>
                    <input type="email"
                           name="email"
                           value="{{ $user->email }}"
                           class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-sm text-zinc-100
                                  focus:border-brand transition">
                </div>

            </div>

        </div>


        {{-- PASSWORD --}}
        <div class="bg-zinc-900/60 p-10 border border-zinc-800 rounded-2xl">

            <h2 class="text-xl font-black uppercase mb-8 tracking-widest">
                Security_<span class="text-brand">Update</span>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <div>
                    <label class="block text-xs font-mono uppercase tracking-widest text-zinc-500 mb-2">
                        New Password
                    </label>
                    <input type="password"
                           name="password"
                           class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-sm text-zinc-100
                                  focus:border-brand transition">
                </div>

                <div>
                    <label class="block text-xs font-mono uppercase tracking-widest text-zinc-500 mb-2">
                        Confirm Password
                    </label>
                    <input type="password"
                           name="password_confirmation"
                           class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-sm text-zinc-100
                                  focus:border-brand transition">
                </div>

            </div>

        </div>


        {{-- AVATAR --}}
        <div class="bg-zinc-900/60 p-10 border border-zinc-800 rounded-2xl">

            <h2 class="text-xl font-black uppercase mb-8 tracking-widest">
                Profile_<span class="text-brand">Avatar</span>
            </h2>

            @if($user->avatar)
                <p class="text-xs text-zinc-500 mb-4">Current avatar:</p>

                <img src="{{ asset('storage/'.$user->avatar) }}"
                     class="w-32 h-32 rounded-xl object-cover border border-zinc-700 mb-6">
            @endif

            <input type="file" name="avatar"
                   class="text-zinc-300 file:bg-brand file:text-black file:px-4 file:py-2 file:rounded-lg file:font-black file:uppercase
                          file:hover:bg-white transition">

        </div>


        {{-- SUBMIT --}}
        <button type="submit"
                class="px-10 py-4 bg-brand text-black font-black text-sm uppercase tracking-widest rounded-xl
                       hover:bg-white shadow-[0_0_25px_6px_rgba(163,230,53,0.6)] transition">
            Save Changes
        </button>

    </form>

</div>

@endsection
