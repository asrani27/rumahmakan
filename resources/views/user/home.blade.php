@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{count($countAduan)}}</h3>

          <p>Aduan Saya</p>
        </div>
        <div class="icon">
          <i class="fas fa-comment-alt"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-6 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>0<sup style="font-size: 20px"></sup></h3>

          <p>Solusi</p>
        </div>
        <div class="icon">
            <i class="fas fa-users"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        
      <div class="card">
        <form class="form-horizontal" method="post" action="/user/profil">
          @csrf
          <div class="card-body">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <strong>PROFIL</strong>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama" value="{{$kustomer->nama}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="alamat" value="{{$kustomer->alamat}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">No HP</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="telp" value="{{$kustomer->telp}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">E-mail</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="email" value="{{$kustomer->email}}">
              </div>
            </div>
            
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-info">Update Profil</button>
          </div>
          <!-- /.card-footer -->
        </form>
      </div>
    </div>
</div>
@endsection