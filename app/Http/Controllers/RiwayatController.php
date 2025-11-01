<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HasilDiagnosa;
use App\Models\Penyakit;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayat = HasilDiagnosa::with('penyakit')
            ->orderBy('tanggal', 'desc')
            ->paginate(10);
            
        return view('riwayat.index', compact('riwayat'));
    }

    public function detail($id)
    {
        $diagnosa = HasilDiagnosa::with('penyakit')->findOrFail($id);
        return view('riwayat.detail', compact('diagnosa'));
    }
}
