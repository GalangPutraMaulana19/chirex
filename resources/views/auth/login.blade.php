@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Login Administrator</h3>
            </div>
            
            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="box-body">
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" 
                               placeholder="Masukkan username" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" 
                               placeholder="Masukkan password" required>
                    </div>
                </div>
                
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fa fa-sign-in"></i> Login
                    </button>
                </div>
            </form>
        </div>
        
        <div class="text-center">
            <p>Username: <strong>admin</strong> | Password: <strong>admin</strong></p>
        </div>
    </div>
</div>
@endsection
