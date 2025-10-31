<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function bantuan()
    {
        return view('home.bantuan');
    }

    public function tentang()
    {
        return view('home.tentang');
    }

    public function keterangan()
    {
        return view('home.keterangan');
    }

    public function harga()
    {
        return view('home.harga');
    }

    public function kirimForm(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'pesan' => 'required',
        ]);

        // Here you can implement email sending logic
        // For now, we'll just return success
        return response()->json(['status' => 'ok']);
    }
}
