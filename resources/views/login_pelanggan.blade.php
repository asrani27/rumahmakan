@extends('front.app')

@section('title')
Masukkan Username Dan Password Anda..
@endsection

@section('content')
    
<div class="row">
    <div class="col-lg-12">
        
            <form method="post" action="/login">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">USERNAME</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="username" placeholder="username" required>
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">PASSWORD</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputEmail3" name="password" placeholder="password" required>
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-block btn-success">LogIn</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <div class="card">
                <div class="card-body">
                <p class="card-text">
                    <a href="/register_pelanggan" class="btn btn-primary btn-block"><strong>Klik Disini Untuk Daftar</strong></a>
                    
                    <a href="/" class="btn btn-secondary btn-block"><strong>KEMBALI</strong></a>
                </p>
                </div>
            </div><!-- /.card -->
    </div>    
    <!-- /.col-md-6 -->
</div>
@endsection