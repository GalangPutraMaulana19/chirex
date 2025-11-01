@extends('layouts.app')

@section('title', 'Keterangan Penyakit')

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Informasi Penyakit Ayam</h3>
    </div>
    <div class="box-body">
        @php
            $posts = \App\Models\Post::all();
        @endphp
        
        @if($posts->isEmpty())
        <div class="alert alert-info">
            Belum ada informasi penyakit yang tersedia.
        </div>
        @else
        @foreach($posts as $post)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">{{ $post->nama_post }}</h4>
            </div>
            <div class="panel-body">
                @if($post->gambar)
                <img src="{{ asset('gambar/posting/' . $post->gambar) }}" class="img-responsive" 
                     style="max-width: 300px; float: left; margin-right: 15px; margin-bottom: 10px;">
                @endif
                
                <div>{!! $post->det_post !!}</div>
                
                @if($post->srn_post)
                <div class="clearfix"></div>
                <hr>
                <h5><strong>Pencegahan & Pengobatan:</strong></h5>
                <div>{!! $post->srn_post !!}</div>
                @endif
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection
