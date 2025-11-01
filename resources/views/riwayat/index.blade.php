@extends('layouts.app')

@section('title', 'Riwayat Diagnosa')

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Riwayat Diagnosa Penyakit</h3>
    </div>
    <div class="box-body">
        @if($riwayat->isEmpty())
        <div class="alert alert-info">
            <i class="fa fa-info-circle"></i> Belum ada riwayat diagnosa.
        </div>
        @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama User</th>
                        <th>Penyakit</th>
                        <th>Nilai CF (%)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($riwayat as $index => $r)
                    <tr>
                        <td>{{ $riwayat->firstItem() + $index }}</td>
                        <td>{{ date('d/m/Y H:i', strtotime($r->tanggal)) }}</td>
                        <td>{{ $r->nama_user }}</td>
                        <td>{{ $r->penyakit->nama_penyakit }}</td>
                        <td>
                            <div class="progress" style="margin-bottom: 0;">
                                <div class="progress-bar progress-bar-success" style="width: {{ $r->hasil_nilai }}%">
                                    {{ number_format($r->hasil_nilai, 2) }}%
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('riwayat.detail', $r->kode_diagnosa) }}" class="btn btn-sm btn-info">
                                <i class="fa fa-eye"></i> Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="text-center">
            {{ $riwayat->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
