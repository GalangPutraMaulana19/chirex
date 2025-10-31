@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Selamat Datang di Chirexs 1.0</h3>
            </div>
            <div class="box-body">
                <h4><strong>Sistem Pakar Diagnosa Penyakit Pada Ayam Menggunakan Metode Certainty Factor</strong></h4>
                <br>
                <p style="text-align: justify;">
                    Chirexs 1.0 adalah sistem pakar yang dirancang untuk membantu dalam mendiagnosa penyakit pada ayam 
                    menggunakan metode Certainty Factor (CF). Sistem ini dapat mengidentifikasi berbagai jenis penyakit 
                    berdasarkan gejala-gejala yang dialami oleh ayam.
                </p>
                
                <h4><strong>Fitur Utama:</strong></h4>
                <ul>
                    <li>Diagnosa penyakit ayam berdasarkan gejala yang dipilih</li>
                    <li>Perhitungan tingkat kepastian menggunakan metode Certainty Factor</li>
                    <li>Informasi lengkap tentang berbagai penyakit ayam</li>
                    <li>Riwayat diagnosa yang telah dilakukan</li>
                    <li>Manajemen data penyakit, gejala, dan basis pengetahuan (untuk admin)</li>
                </ul>
                
                @if(!session('admin_username'))
                <div class="alert alert-info">
                    <h4><i class="icon fa fa-info"></i> Informasi</h4>
                    Untuk melakukan diagnosa penyakit, silakan klik menu <strong>Diagnosa</strong> di sidebar.
                </div>
                @endif
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="info-box bg-aqua">
                            <span class="info-box-icon"><i class="fa fa-bug"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Penyakit</span>
                                <span class="info-box-number">{{ \App\Models\Penyakit::count() }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="info-box bg-green">
                            <span class="info-box-icon"><i class="fa fa-eyedropper"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Gejala</span>
                                <span class="info-box-number">{{ \App\Models\Gejala::count() }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="info-box bg-yellow">
                            <span class="info-box-icon"><i class="fa fa-flask"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Basis Pengetahuan</span>
                                <span class="info-box-number">{{ \App\Models\BasisPengetahuan::count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
