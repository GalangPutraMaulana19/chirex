@extends('layouts.app')

@section('title', 'Tentang')

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Tentang Chirexs 1.0</h3>
    </div>
    <div class="box-body">
        <h4><strong>Sistem Pakar Diagnosa Penyakit Pada Ayam</strong></h4>
        <p style="text-align: justify;">
            Chirexs 1.0 adalah sistem pakar berbasis web yang dikembangkan untuk membantu dalam mendiagnosa 
            penyakit pada ayam menggunakan metode Certainty Factor (CF). Metode CF digunakan untuk mengukur 
            tingkat kepastian dalam pengambilan keputusan berdasarkan gejala-gejala yang diamati.
        </p>
        
        <h4><strong>Metode Certainty Factor (CF)</strong></h4>
        <p style="text-align: justify;">
            Certainty Factor merupakan salah satu teknik yang digunakan untuk mengatasi ketidakpastian dalam 
            pengambilan keputusan. Formula yang digunakan:
        </p>
        <ul>
            <li>CF(CF1, CF2) = CF1 + CF2 × (1 - CF1), jika CF1 dan CF2 keduanya positif</li>
            <li>CF(CF1, CF2) = CF1 + CF2 × (1 + CF1), jika CF1 dan CF2 keduanya negatif</li>
            <li>CF(CF1, CF2) = (CF1 + CF2) / (1 - min(|CF1|, |CF2|)), jika salah satu negatif</li>
        </ul>
        
        <h4><strong>Pengembang</strong></h4>
        <p>
            Original Developer: <strong>Januriawan</strong><br>
            Laravel Version: <strong>{{ config('app.name') }}</strong><br>
            Framework: <strong>Laravel {{ app()->version() }}</strong>
        </p>
        
        <div class="alert alert-warning">
            <i class="fa fa-exclamation-triangle"></i> Sistem ini hanya sebagai alat bantu diagnosa. 
            Untuk penanganan lebih lanjut, konsultasikan dengan dokter hewan.
        </div>
    </div>
</div>
@endsection
