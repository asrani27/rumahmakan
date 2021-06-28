@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Update pengaduan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="/user/aduan/edit/{{$data->id}}">
              @csrf
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <strong>IDENTITAS PEMOHON</strong>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$kustomer->nama}}" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$kustomer->alamat}}" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">No HP</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$kustomer->telp}}" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">E-mail</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$kustomer->email}}" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tanggal</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggal" value="{{$data->tanggal}}">
                  </div>
                </div>

                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <strong>IDENTITAS KIRIMAN</strong>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">No Kiriman</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="no_kiriman" value="{{$data->no_kiriman}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Produk</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="kode_produk" value="{{$data->kode_produk}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Berat </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="berat" value="{{$data->berat}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Isi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="isi" value="{{$data->isi}}">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <strong>IDENTITAS PENGIRIM</strong>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama pengirim</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_pengirim" value="{{$data->nama_pengirim}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Alamat Pengirim</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="alamat_pengirim" value="{{$data->alamat_pengirim}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">No HP Pengirim</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="telp_pengirim" value="{{$data->telp_pengirim}}">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <strong>ISI PENGADUAN</strong>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jenis Aduan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="jenis_aduan" value="{{$data->jenis_aduan}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Isi Aduan</label>
                  <div class="col-sm-10">
                    <textarea name="isi_aduan" class="form-control">{{$data->isi_aduan}}</textarea>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Update Pengaduan</button>
              </div>
              <!-- /.card-footer -->
            </form>
        </div>
    </div>
</div>
@endsection