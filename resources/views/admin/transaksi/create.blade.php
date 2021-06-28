@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Form Tambah Pembayaran Uji Lab</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="/admin/pembayaran">
              @csrf
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Uji Lab</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" name="pesan_uji_id" required>
                      <option value="">--Pilih Pesan Uji Lab--</option>
                      @foreach ($pesanuji as $item)
                      <option value="{{$item->id}}">Pengujian : {{$item->jenis}} - Nama : {{$item->pelanggan->nama}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nomor Rekening</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="rekening" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Rekening</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_rekening" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tanggal Transfer</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggal_transfer" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jumlah Bayar</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="jumlah" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Keterangan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="keterangan" required>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Simpan</button>
              </div>
              <!-- /.card-footer -->
            </form>
        </div>
    </div>
</div>
@endsection