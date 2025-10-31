@extends('layouts.app')

@section('title', 'Diagnosa Penyakit')

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Diagnosa Penyakit Ayam</h3>
    </div>
    
    <form action="{{ route('diagnosa.proses') }}" method="POST">
        @csrf
        <div class="box-body">
            <div class="alert alert-info">
                <i class="fa fa-info-circle"></i> Pilih gejala-gejala yang dialami oleh ayam untuk mendapatkan diagnosa penyakit.
            </div>
            
            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            <div class="form-group">
                <label for="nama_user">Nama Pengguna</label>
                <input type="text" class="form-control" id="nama_user" name="nama_user" 
                       placeholder="Masukkan nama Anda" required>
            </div>
            
            <div class="form-group">
                <label>Pilih Gejala yang Dialami:</label>
                <div class="row">
                    @foreach($gejala as $g)
                    <div class="col-md-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="gejala[]" value="{{ $g->kode_gejala }}">
                                {{ $g->nama_gejala }}
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-search-plus"></i> Proses Diagnosa
            </button>
            <button type="reset" class="btn btn-default">
                <i class="fa fa-refresh"></i> Reset
            </button>
        </div>
    </form>
</div>
@endsection
