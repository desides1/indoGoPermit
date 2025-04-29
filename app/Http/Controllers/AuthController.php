<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    function login() {
        return view('Auth/login')  ;
    }

    function register() {
        return view('Auth/register')  ;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }
    //
    public function authentication(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Jika login berhasil, redirect ke halaman yang diinginkan
            return redirect()->intended('dashboard')->with('success', 'Login successful!');
        }

        // Jika login gagal, redirect kembali dengan pesan error
        return redirect()->back()->withErrors(['username' => 'username or password is incorrect'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login')->with('success', 'You have been logged out.');
    }
}
