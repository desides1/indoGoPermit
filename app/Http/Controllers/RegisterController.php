<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Tampilkan form register
    public function showForm()
    {
        return view('Auth/register');
    }

    // Proses registrasi user baru
    public function register(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|min:4|max:255|unique:users', // Tambahkan username juga
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255|confirmed', // Gunakan confirmed untuk konfirmasi password
        ]);

        // Simpan user baru
        User::create([
            'username' => $validateData['username'],
            'email' => $validateData['email'],
            'password' => Hash::make($validateData['password']),
        ]);

        return redirect('/login')->with('success', 'Account created successfully! Please login.');
    }
}


