<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $nama     = trim($request->input('nama', ''));
        $email    = trim($request->input('email', ''));
        $password = trim($request->input('password', ''));
        $konfirm  = trim($request->input('confirm_password', ''));

        if (!$nama || !$email || !$password || !$konfirm) {
            return response()->json(['success' => false, 'message' => 'Semua kolom wajib diisi.']);
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return response()->json(['success' => false, 'message' => 'Format email tidak valid.']);
        }
        if (strlen($password) < 8) {
            return response()->json(['success' => false, 'message' => 'Kata sandi minimal 8 karakter.']);
        }
        if ($password !== $konfirm) {
            return response()->json(['success' => false, 'message' => 'Konfirmasi kata sandi tidak cocok.']);
        }
        if (Pengguna::where('email', $email)->exists()) {
            return response()->json(['success' => false, 'message' => 'Email sudah terdaftar. Silakan masuk.']);
        }

        $pengguna = Pengguna::create([
            'nama'     => $nama,
            'email'    => $email,
            'password' => Hash::make($password),
        ]);

        return response()->json(['success' => true, 'message' => 'Akun berhasil dibuat! Silakan masuk.']);
    }

    public function login(Request $request)
    {
        $email    = trim($request->input('email', ''));
        $password = trim($request->input('password', ''));

        if (!$email || !$password) {
            return response()->json(['success' => false, 'message' => 'Email dan kata sandi wajib diisi.']);
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return response()->json(['success' => false, 'message' => 'Format email tidak valid.']);
        }

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request->session()->regenerate();
            $pengguna = Auth::user();

            return response()->json([
                'success'  => true,
                'message'  => 'Login berhasil! Mengalihkan...',
                'redirect' => '/dashboard'
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Email atau kata sandi salah.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/auth');
    }
}