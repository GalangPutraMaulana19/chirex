@extends('layouts.app')

@section('title', 'Detail Diagnosa')

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Detail Diagnosa</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th width="40%">Tanggal Diagnosa</th>
                        <td>{{ date('d F Y H:i', strtotime($diagnosa->tanggal)) }}</td>
                    </tr>
                    <tr>
                        <th>Nama User</th>
                        <td>{{ $diagnosa->nama_user }}</td>
                    </tr>
                    <tr>
                        <th>Penyakit</th>
                        <td><strong>{{ $diagnosa->penyakit->nama_penyakit }}</strong></td>
                    </tr>
                    <tr>
                        <th>Tingkat Kepastian</th>
                        <td>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" style="width: {{ $diagnosa->hasil_nilai }}%">
                                    {{ number_format($diagnosa->hasil_nilai, 2) }}%
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Gejala yang Dipilih</th>
                        <td>
                            @php
                                $gejala_ids = explode(',', $diagnosa->gejala_dipilih);
                                $gejala_list = \App\Models\Gejala::whereIn('kode_gejala', $gejala_ids)->get();
                            @endphp
                            <ul>
                                @foreach($gejala_list as $g)
                                <li>{{ $g->nama_gejala }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="col-md-6">
                @if($diagnosa->penyakit->gambar)
                <img src="{{ asset('gambar/' . $diagnosa->penyakit->gambar) }}" class="img-responsive img-thumbnail">
                @endif
            </div>
        </div>
        
        <hr>
        
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">Informasi Penyakit</h4>
            </div>
            <div class="panel-body">
                <h5><strong>Deskripsi:</strong></h5>
                <div>{!! $diagnosa->penyakit->det_penyakit !!}</div>
                
                @if($diagnosa->penyakit->srn_penyakit)
                <hr>
                <h5><strong>Saran Pengobatan:</strong></h5>
                <div>{!! $diagnosa->penyakit->srn_penyakit !!}</div>
                @endif
            </div>
        </div>
    </div>
    <div class="box-footer">
        <a href="{{ route('riwayat') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i> Kembali ke Riwayat
        </a>
    </div>
</div>
@endsection
