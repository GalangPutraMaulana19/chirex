@extends('layouts.app')

@section('title', 'Hasil Diagnosa')

@section('content')
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Hasil Diagnosa Penyakit</h3>
    </div>
    <div class="box-body">
        <div class="alert alert-success">
            <h4><i class="fa fa-check"></i> Diagnosa Selesai!</h4>
            Nama Pengguna: <strong>{{ $nama_user }}</strong>
        </div>
        
        @if(empty($hasil))
        <div class="alert alert-warning">
            <i class="fa fa-exclamation-triangle"></i> Tidak dapat menentukan penyakit berdasarkan gejala yang dipilih.
        </div>
        @else
        <h4><strong>Hasil Diagnosa:</strong></h4>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Ranking</th>
                        <th>Nama Penyakit</th>
                        <th>Tingkat Kepastian (CF)</th>
                        <th>Persentase</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hasil as $index => $h)
                    @php
                        $penyakit = \App\Models\Penyakit::find($h['kode_penyakit']);
                        $persentase = $h['cf'] * 100;
                    @endphp
                    <tr class="{{ $index == 0 ? 'success' : '' }}">
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <strong>{{ $penyakit->nama_penyakit }}</strong>
                            @if($index == 0)
                            <span class="label label-success pull-right">Paling Cocok</span>
                            @endif
                        </td>
                        <td>{{ number_format($h['cf'], 4) }}</td>
                        <td>
                            <div class="progress" style="margin-bottom: 0;">
                                <div class="progress-bar progress-bar-{{ $index == 0 ? 'success' : 'info' }}" 
                                     style="width: {{ abs($persentase) }}%">
                                    {{ number_format(abs($persentase), 2) }}%
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @php
            $top_penyakit = \App\Models\Penyakit::find($hasil[0]['kode_penyakit']);
        @endphp
        
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">Detail Penyakit: {{ $top_penyakit->nama_penyakit }}</h4>
            </div>
            <div class="panel-body">
                @if($top_penyakit->gambar)
                <img src="{{ asset('gambar/' . $top_penyakit->gambar) }}" class="img-responsive" 
                     style="max-width: 300px; float: left; margin-right: 15px; margin-bottom: 10px;">
                @endif
                
                <h5><strong>Deskripsi Penyakit:</strong></h5>
                <div>{!! $top_penyakit->det_penyakit !!}</div>
                
                @if($top_penyakit->srn_penyakit)
                <div class="clearfix"></div>
                <hr>
                <h5><strong>Saran Pengobatan:</strong></h5>
                <div>{!! $top_penyakit->srn_penyakit !!}</div>
                @endif
            </div>
        </div>
        
        <div class="alert alert-warning">
            <i class="fa fa-exclamation-triangle"></i> <strong>Perhatian:</strong> Hasil diagnosa ini hanya sebagai referensi. 
            Untuk penanganan lebih lanjut, konsultasikan dengan dokter hewan.
        </div>
        @endif
    </div>
    <div class="box-footer">
        <a href="{{ route('diagnosa') }}" class="btn btn-primary">
            <i class="fa fa-refresh"></i> Diagnosa Lagi
        </a>
        <a href="{{ route('riwayat') }}" class="btn btn-default">
            <i class="fa fa-clock-o"></i> Lihat Riwayat
        </a>
    </div>
</div>
@endsection
