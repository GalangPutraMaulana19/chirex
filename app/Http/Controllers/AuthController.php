<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (session()->has('admin_username')) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('username', $request->username)->first();

        if ($admin && md5($request->password) === $admin->password) {
            session([
                'admin_username' => $admin->username,
                'admin_password' => $admin->password,
                'admin_nama' => $admin->nama_lengkap,
            ]);

            return redirect()->route('home')->with('success', 'Login berhasil!');
        }

        return back()->with('error', 'Username atau password salah!');
    }

    public function logout()
    {
        session()->forget(['admin_username', 'admin_password', 'admin_nama']);
        return redirect()->route('home')->with('success', 'Logout berhasil!');
    }

    public function showPasswordForm()
    {
        return view('admin.password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:5',
            'konfirmasi_password' => 'required|same:password_baru',
        ]);

        $username = session('admin_username');
        $admin = Admin::where('username', $username)->first();

        if (md5($request->password_lama) !== $admin->password) {
            return back()->with('error', 'Password lama tidak sesuai!');
        }

        $admin->password = md5($request->password_baru);
        $admin->save();

        return back()->with('success', 'Password berhasil diubah!');
    }
}
