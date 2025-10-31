<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;
use App\Models\BasisPengetahuan;
use App\Models\Penyakit;
use App\Models\HasilDiagnosa;
use App\Models\TmpAnalisa;

class DiagnosaController extends Controller
{
    public function index()
    {
        $gejala = Gejala::orderBy('kode_gejala')->get();
        return view('diagnosa.index', compact('gejala'));
    }

    public function proses(Request $request)
    {
        $request->validate([
            'nama_user' => 'required',
            'gejala' => 'required|array|min:1',
        ]);

        $session_id = session()->getId();
        $nama_user = $request->nama_user;
        $gejala_dipilih = $request->gejala;

        // Clear temporary analysis
        TmpAnalisa::where('session', $session_id)->delete();

        // Process selected symptoms
        foreach ($gejala_dipilih as $kode_gejala) {
            $basis = BasisPengetahuan::where('kode_gejala', $kode_gejala)->get();
            
            foreach ($basis as $b) {
                $cf = $b->mb - $b->md;
                
                TmpAnalisa::create([
                    'kode_pengetahuan' => $b->kode_pengetahuan,
                    'kode_gejala' => $b->kode_gejala,
                    'kode_penyakit' => $b->kode_penyakit,
                    'session' => $session_id,
                    'nilai_cf' => $cf,
                ]);
            }
        }

        // Calculate CF for each disease
        $diseases = TmpAnalisa::where('session', $session_id)
            ->select('kode_penyakit')
            ->distinct()
            ->get();

        $hasil = [];
        foreach ($diseases as $disease) {
            $cf_values = TmpAnalisa::where('session', $session_id)
                ->where('kode_penyakit', $disease->kode_penyakit)
                ->pluck('nilai_cf')
                ->toArray();

            $cf_combine = $this->calculateCombinedCF($cf_values);
            $hasil[] = [
                'kode_penyakit' => $disease->kode_penyakit,
                'cf' => $cf_combine,
            ];
        }

        // Sort by CF value
        usort($hasil, function($a, $b) {
            return $b['cf'] <=> $a['cf'];
        });

        // Save diagnosis result (top result)
        if (!empty($hasil)) {
            $top_result = $hasil[0];
            HasilDiagnosa::create([
                'kode_penyakit' => $top_result['kode_penyakit'],
                'gejala_dipilih' => implode(',', $gejala_dipilih),
                'hasil_nilai' => $top_result['cf'] * 100,
                'nama_user' => $nama_user,
            ]);
        }

        return view('diagnosa.hasil', compact('hasil', 'nama_user'));
    }

    private function calculateCombinedCF($cf_values)
    {
        if (empty($cf_values)) {
            return 0;
        }

        if (count($cf_values) === 1) {
            return $cf_values[0];
        }

        $cf_old = $cf_values[0];
        
        for ($i = 1; $i < count($cf_values); $i++) {
            $cf_new = $cf_values[$i];
            
            if ($cf_old >= 0 && $cf_new >= 0) {
                // Both positive
                $cf_old = $cf_old + $cf_new * (1 - $cf_old);
            } elseif ($cf_old < 0 && $cf_new < 0) {
                // Both negative
                $cf_old = $cf_old + $cf_new * (1 + $cf_old);
            } else {
                // One positive, one negative
                $cf_old = ($cf_old + $cf_new) / (1 - min(abs($cf_old), abs($cf_new)));
            }
        }

        return $cf_old;
    }
}
