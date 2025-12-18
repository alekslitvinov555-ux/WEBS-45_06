<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user()
        ]);
    }


    public function update(Request $r)
    {
        $user = Auth::user();

        $r->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'nullable|min:6|confirmed',
            'avatar' => 'nullable|image|max:2048',
        ]);

        // update basic fields
        $user->name = $r->name;
        $user->email = $r->email;

        // password
        if ($r->password) {
            $user->password = Hash::make($r->password);
        }

        // avatar
        if ($r->hasFile('avatar')) {
            $path = $r->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        $user->save();

        return back()->with('success', 'Profile updated!');
    }
}
