<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // Karena di UI awal user disuruh memilih role, kita bisa ambil dari request jika ada
        $role = $request->input('role');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->intended('/dashboard');
            } elseif ($user->role === 'petugas') {
                return redirect()->intended('/kasir');
            } elseif ($user->role === 'siswa') {
                return redirect()->intended('/siswa');
            }

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
