@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Form Edit status Uji Lab</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="/admin/hasil_uji/{{$data->id}}">
              @csrf
              @method('PUT')
              <div class="card-body">
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">ID Status Uji</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" name="status_uji_id" required>
                      <option value="">--Pilih--</option>
                      @foreach ($statusuji as $item)
                      <option value="{{$item->id}}" {{$data->status_uji_id == $item->id ? 'selected':''}}>SJ{{$item->id}}, Nama : {{$item->pelanggan->nama}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tanggal Uji</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggal_uji" value="{{$data->tanggal_uji}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Waktu Pengujian</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="waktu_uji"  value="{{$data->waktu_uji}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Hasil Pengujian</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="hasil_pengujian"  value="{{$data->hasil_pengujian}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Keterangan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="keterangan"  value="{{$data->keterangan}}">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Update</button>
              </div>
              <!-- /.card-footer -->
            </form>
        </div>
    </div>
</div>
@endsection