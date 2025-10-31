@extends('layouts.app')

@section('title', 'Bantuan')

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Bantuan Penggunaan Sistem</h3>
    </div>
    <div class="box-body">
        <h4><strong>Panduan Penggunaan Chirexs 1.0</strong></h4>
        <p>Sistem pakar ini dirancang untuk membantu dalam mendiagnosa penyakit pada ayam. Berikut panduan penggunaannya:</p>
        
        <h5><strong>Untuk Pengguna Umum:</strong></h5>
        <ol>
            <li><strong>Diagnosa:</strong> Pilih gejala-gejala yang dialami ayam, lalu sistem akan memberikan hasil diagnosa penyakit</li>
            <li><strong>Riwayat:</strong> Lihat riwayat diagnosa yang telah dilakukan</li>
            <li><strong>Keterangan:</strong> Informasi detail tentang penyakit-penyakit ayam</li>
            <li><strong>Info Harga:</strong> Informasi harga obat dan vaksin</li>
        </ol>
        
        <h5><strong>Untuk Administrator:</strong></h5>
        <ol>
            <li><strong>Admin:</strong> Kelola data admin sistem</li>
            <li><strong>Penyakit:</strong> Kelola data penyakit ayam</li>
            <li><strong>Gejala:</strong> Kelola data gejala penyakit</li>
            <li><strong>Pengetahuan:</strong> Kelola basis pengetahuan (relasi penyakit-gejala dengan nilai CF)</li>
            <li><strong>Post Keterangan:</strong> Kelola artikel/informasi penyakit</li>
        </ol>
        
        <div class="alert alert-info">
            <i class="fa fa-info-circle"></i> Jika mengalami kesulitan, silakan hubungi administrator sistem.
        </div>
    </div>
</div>
@endsection
