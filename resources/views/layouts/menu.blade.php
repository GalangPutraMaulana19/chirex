<li><a class="{{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
<div class="container"></div>

@if(session('admin_username'))
    <li><a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.index') }}"><i class="fa fa-user"></i> <span>Admin</span></a></li>
    <div class="container"></div>
    
    <li><a class="{{ Request::is('penyakit') ? 'active' : '' }}" href="{{ route('penyakit.index') }}"><i class="fa fa-bug"></i> <span>Penyakit</span></a></li>
    <div class="container"></div>
    
    <li><a class="{{ Request::is('gejala') ? 'active' : '' }}" href="{{ route('gejala.index') }}"><i class="fa fa-eyedropper"></i> <span>Gejala</span></a></li>
    <div class="container"></div>
    
    <li><a class="{{ Request::is('pengetahuan') ? 'active' : '' }}" href="{{ route('pengetahuan.index') }}"><i class="fa fa-flask"></i> <span>Pengetahuan</span></a></li>
    <div class="container"></div>
    
    <li><a class="{{ Request::is('post') ? 'active' : '' }}" href="{{ route('post.index') }}"><i class="fa fa-file-text"></i> <span>Post Keterangan</span></a></li>
    <div class="container"></div>
    
    <li><a class="{{ Request::is('password') ? 'active' : '' }}" href="{{ route('password.form') }}"><i class="fa fa-edit"></i> <span>Ubah Password</span></a></li>
    <div class="container"></div>
@else
    <li><a class="{{ Request::is('diagnosa') ? 'active' : '' }}" href="{{ route('diagnosa') }}"><i class="fa fa-search-plus"></i> <span>Diagnosa</span></a></li>
    <div class="container"></div>
    
    <li><a class="{{ Request::is('riwayat') ? 'active' : '' }}" href="{{ route('riwayat') }}"><i class="fa fa-clock-o"></i> <span>Riwayat</span></a></li>
    <div class="container"></div>
    
    <li><a class="{{ Request::is('keterangan') ? 'active' : '' }}" href="{{ route('keterangan') }}"><i class="fa fa-commenting-o"></i> <span>Keterangan</span></a></li>
    <div class="container"></div>
    
    <li><a class="{{ Request::is('harga') ? 'active' : '' }}" href="{{ route('harga') }}"><i class="fa fa-bookmark-o"></i> <span>Info Harga</span></a></li>
    <div class="container"></div>
@endif

<li><a class="{{ Request::is('tentang') ? 'active' : '' }}" href="{{ route('tentang') }}"><i class="fa fa-info-circle"></i> <span>Tentang</span></a></li>
<div class="container"></div>
