@extends('front.app')

@section('title')
Masukkan Nama Anda Dan Pilih Meja Yang Tersedia
@endsection

@section('content')
    
<div class="row">
    <div class="col-lg-12">
        <form method="post" action="/pesansekarang">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">NAMA PELANGGAN</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="nama" value="{{Auth::user()->name}}" readonly>
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">MEJA YANG TERSEDIA</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="meja_id">
                                <option value="">-Pilih-</option>
                                @foreach ($meja as $item)
                                    <option value="{{$item->id}}">MEJA-{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                <p class="card-text">
                    <button type="submit" class="btn btn-primary btn-block"><strong>PESAN MEJA</strong></button>
                    
                    <a href="/logout" class="btn btn-secondary btn-block"><strong>KELUAR</strong></a>
                </p>
                </div>
            </div><!-- /.card -->
        </form>
    </div>    
    <!-- /.col-md-6 -->
</div>
@endsection