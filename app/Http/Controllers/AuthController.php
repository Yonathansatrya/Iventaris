<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout berhasil!');
    }
}
