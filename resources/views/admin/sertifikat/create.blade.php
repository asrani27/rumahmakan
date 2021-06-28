@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Form Tambah Sertifikat Uji Lab</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="/admin/sertifikat">
              @csrf
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">ID Hasil Uji</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" name="hasil_uji_id" required>
                      <option value="">--Pilih--</option>
                      @foreach ($hasiluji as $item)
                      <option value="{{$item->id}}">HJ{{$item->id}}, Nama : {{$item->pelanggan->nama}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nomor Sertifikat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nomor_sertifikat" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="status" required>
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