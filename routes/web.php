<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/kategori', function () {
        $kategoris = \App\Models\Kategori::all();
        return view('kategori', compact('kategoris'));
    })->name('kategori');

    Route::post('/kategori', function (\Illuminate\Http\Request $request) {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nominal' => 'required|integer|min:0',
            'keterangan' => 'required|string|max:255',
        ]);
        \App\Models\Kategori::create($validated);
        return redirect()->route('kategori')->with('success', 'Kategori berhasil ditambahkan!');
    });

    Route::get('/kasir', function () {
        return view('kasir');
    })->name('kasir');

    Route::get('/siswa', function () {
        return view('siswa');
    })->name('siswa');

    Route::get('/pengguna', function () {
        $users = \App\Models\User::all();
        return view('pengguna', compact('users'));
    })->name('pengguna');

    Route::post('/pengguna', function (\Illuminate\Http\Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|in:admin,petugas,siswa',
            'password' => 'required|string|min:6',
        ]);

        $validated['password'] = \Illuminate\Support\Facades\Hash::make($validated['password']);
        \App\Models\User::create($validated);

        return redirect()->route('pengguna')->with('success', 'Pengguna berhasil ditambahkan!');
    });

    Route::get('/laporan', function () {
        return view('laporan');
    })->name('laporan');

    Route::get('/pengaturan', function () {
        return view('pengaturan');
    })->name('pengaturan');
});
