<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Menampilkan form registrasi
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Menyimpan data registrasi
     */
    public function registerSimpan(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama'           => 'required|string|max:255',
            'alamat'         => 'required|string|max:255',
            'tanggal_lahir'  => 'required|date',
            'email'          => 'required|email|unique:users,email',
            'password'       => 'required|confirmed|min:6',
        ]);

        // Simpan user ke database (DENGAN Hash Password)
        User::create([
            'nama'           => $request->nama,
            'alamat'         => $request->alamat,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'email'          => $request->email,
            'password'       => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    /**
     * Menampilkan form login
     */
    public function login()
    {
        return view('auth.login');
    }

    public function loginAksi(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'Email atau password salah.']);
        }

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Login berhasil sebagai Admin!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Anda telah logout.');
    }

    /**
     * Menampilkan form forgot password
     */
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Mengirimkan email reset password
     */
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? redirect()->route('login')->with('success', 'Email reset password telah dikirim!')
            : back()->withErrors(['email' => 'Gagal mengirim email reset password.']);
    }

    /**
     * Menampilkan form reset password
     */
    public function showResetPasswordForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    /**
     * Memproses perubahan password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'email'    => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
            'token'    => 'required'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->update(['password' => Hash::make($password)]);
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', 'Password berhasil diperbarui! Silakan login.')
            : back()->withErrors(['email' => 'Gagal reset password.']);
    }
}
