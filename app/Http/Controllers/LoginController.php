<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Coba autentikasi berdasarkan username dan password
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            // Jika berhasil login
            $request->session()->regenerate();
            return redirect()->intended('/landingpage')->with('success', 'Login successful!'); // Ganti '/dashboard' sesuai kebutuhanmu
        }

        // Jika gagal login
        return redirect()->back()->withErrors(['username' => 'Username or Password is incorrect']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
