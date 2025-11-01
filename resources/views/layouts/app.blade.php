<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{ config('app.name') }} - @yield('title', 'Sistem Pakar Diagnosa Penyakit Ayam')</title>
    
    <link rel="icon" href="{{ asset('gambar/admin/favicon.png') }}">
    <link href="{{ asset('assets/css/font-awesome-4.2.0/font-awesome-4.2.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl-carousel/owl.carousel.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/css/owl-carousel/owl.theme.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/css/magnific-popup.css') }}" type="text/css" rel="stylesheet" media="all" />
    <link href="{{ asset('assets/css/font.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/css/fontello.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" href="{{ asset('assets/css/paging.css') }}" type="text/css" media="screen">
    <link rel="stylesheet" href="{{ asset('aset/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('aset/AdminLTE.css') }}">
    <link rel="stylesheet" href="{{ asset('aset/cinta.css') }}">
    <link rel="stylesheet" href="{{ asset('aset/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aset/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aset/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('aset/icheck/green.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    
    <script src="{{ asset('aset/jQuery-2.js') }}"></script>
    <script src="{{ asset('aset/bootstrap.js') }}"></script>
    <script src="{{ asset('aset/icheck/icheck.js') }}"></script>
    <script src="{{ asset('aset/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('aset/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('aset/Flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('aset/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('aset/Flot/jquery.flot.categories.js') }}"></script> 
    <script src="{{ asset('aset/app.js') }}"></script>
    
    @stack('styles')
</head>
<body id="pakarayam" class="hold-transition skin-purple-light sidebar-mini">
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="logo">
                <span class="logo-mini"><b><i class="fa fa-contao" aria-hidden="true"></i>XS</b></span>
                <span class="logo-lg"><b><i class="fa fa-contao" aria-hidden="true"></i>hirexs 1.0</b></span>
            </a>
            
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        @if(session('admin_username'))
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('gambar/admin/admin.png') }}" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ session('admin_nama') }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="{{ asset('gambar/admin/admin.png') }}" class="img-circle" alt="User Image">
                                    <p>
                                        Login sebagai {{ session('admin_username') }}
                                        <small>Pakar dari Chirexs 1.0</small>
                                    </p>
                                </li>
                                <li class="user-body">
                                    <a href="{{ route('bantuan') }}"><i class="fa fa-question-circle"></i> <span>Bantuan</span></a>
                                </li>
                                <li class="user-footer"> 
                                    <div class="pull-left">
                                        <a class="btn btn-default btn-flat" href="{{ route('tentang') }}">
                                            <i class="fa fa-info-circle"></i> <span>Tentang</span>
                                        </a>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-default btn-flat" href="{{ route('logout') }}" 
                                           onclick="return confirm('Anda yakin akan logout dari aplikasi?')">
                                            <i class="fa fa-sign-out"></i> <span>LogOut</span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li><a href="{{ route('bantuan') }}" data-toggle="tooltip" data-placement="bottom" title="Bantuan"><i class="fa fa-question-circle"></i> <span>Bantuan</span></a></li>
                        <li class="dropdown messages-menu">
                            <a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> <span>Login</span></a>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </header>
        
        <!-- Left side column -->
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu">
                    <li class="header">Menu</li>
                    @include('layouts.menu')
                </ul>
            </section>
        </aside>
        
        <!-- Content Wrapper -->
        <div class="content-wrapper" style="min-height: 310px;">
            <section class="content-header"></section>
            <section class="content">
                <div class="box">
                    <div class="box-body">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ session('success') }}
                        </div>
                        @endif
                        
                        @if(session('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ session('error') }}
                        </div>
                        @endif
                        
                        @yield('content')
                    </div>
                </div>
            </section>
        </div>
        
        <!-- Footer -->
        <footer class="main-footer">
            <button class="kontak ke-kanan" data-toggle="modal" data-target="#modalForm">
                <i class="fa fa-envelope-square"></i> Kontak Kami
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="modalForm" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content" style="max-width: 450px;">
                        <div class="modal-header mdl-kontak">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="text-ket"><i class="fa fa-envelope-square"></i> Kontak Kami</h4>
                        </div>
                        <div class="modal-body">
                            <p class="statusMsg"></p>
                            <form role="form" id="contactForm">
                                @csrf
                                <div class="form-group">
                                    <label for="masukkanNama">Nama:</label>
                                    <input type="text" class="form-control" id="masukkanNama" placeholder="Masukkan nama Anda"/>
                                </div>
                                <div class="form-group">
                                    <label for="masukkanEmail">Email:</label>
                                    <input type="email" class="form-control" id="masukkanEmail" placeholder="Masukkan email Anda"/>
                                </div>
                                <div class="form-group">
                                    <label for="masukkanPesan">Pesan:</label>
                                    <textarea class="form-control" id="masukkanPesan" placeholder="Masukkan pesan Anda" style="min-height: 80px;"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-maroon btn-flat" data-dismiss="modal">Keluar</button>
                            <button type="button" class="btn bg-olive btn-flat" onclick="kirimContactForm()">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <strong><div class="cinta">Copyright © 2017 - Made with <i class="fa fa-heart pulse"></i> by <a href="http://januriawan.github.io" target="_blank">Januriawan</a></div></strong>
        </footer>
        
        <div class="control-sidebar-bg" style="position: fixed; height: auto;"></div>
    </div>
    
    <script>
    function kirimContactForm() {
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var nama = $('#masukkanNama').val();
        var email = $('#masukkanEmail').val();
        var pesan = $('#masukkanPesan').val();
        
        if(nama.trim() == '' ) {
            alert('Masukkan nama Anda.');
            $('#masukkanNama').focus();
            return false;
        } else if(email.trim() == '' ) {
            alert('Masukkan email Anda.');
            $('#masukkanEmail').focus();
            return false;
        } else if(email.trim() != '' && !reg.test(email)) {
            alert('Masukkan email yang valid.');
            $('#masukkanEmail').focus();
            return false;
        } else if(pesan.trim() == '' ) {
            alert('Masukkan pesan Anda.');
            $('#masukkanPesan').focus();
            return false;
        } else {
            $.ajax({
                type: 'POST',
                url: '{{ route("kirim.form") }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    nama: nama,
                    email: email,
                    pesan: pesan
                },
                beforeSend: function () {
                    $('.modal-body').css('opacity', '.5');
                },
                success: function(response) {
                    if(response.status == 'ok') {
                        $('#masukkanNama').val('');
                        $('#masukkanEmail').val('');
                        $('#masukkanPesan').val('');
                        $('.statusMsg').html('<span style="color:green;">Terima kasih telah menghubungi kami.</span>');
                    } else {
                        $('.statusMsg').html('<span style="color:red;">Ada sedikit masalah, silakan coba lagi.</span>');
                    }
                    $('.modal-body').css('opacity', '');
                }
            });
        }
    }
    </script>
    
    @stack('scripts')
</body>
</html>
