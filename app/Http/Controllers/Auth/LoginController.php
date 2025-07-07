<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function showLoginForm()
    {
        // Kita akan menggunakan view 'sign-in' sebagai halaman login
        return view('sign-in');
    }

    /**
     * Menangani proses login.
     */
    public function login(Request $request)
    {
        // 1. Validasi input dari form
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // 2. Mencoba untuk mengautentikasi user
        if (Auth::attempt($credentials)) {
            // Jika berhasil, buat session baru untuk keamanan
            $request->session()->regenerate();

            // 3. Arahkan (redirect) berdasarkan role user
            $user = Auth::user();
            if ($user->role_id == 1) { // Asumsi 1 = Admin
                return redirect()->intended('/admin/index');
            } elseif ($user->role_id == 2) { // Asumsi 2 = Santri
                return redirect()->intended('/santri/index');
            }

            // Default redirect jika role tidak dikenali
            return redirect()->intended('/');
        }

        // 4. Jika gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'username' => 'Username atau Password yang Anda masukkan salah.',
        ])->onlyInput('username');
    }

    /**
     * Menangani proses logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
