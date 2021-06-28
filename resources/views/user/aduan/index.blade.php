@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <a href="/user/aduan/create" class="btn btn-primary"><strong>+ Tambah Pengaduan</strong></a><br/><br/>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Aduan Saya</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-sm">
            <thead>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Nama Pemohon</th>
              <th>Jenis Aduan</th>
              <th>Status</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
                @php
                    $no =1;
                @endphp
                @foreach ($data as $item)
                    <tr>
                    <td>{{$no++}}</td>
                    <td>{{\Carbon\Carbon::parse($item->created_at)->format('d M Y H:i:s')}}</td>
                    <td>{{$item->kustomer->nama}}</td>
                    <td>{{$item->jenis_aduan}}</td>
                    <td>
                      @if ($item->status == 1)
                          <span class="badge badge-secondary">Di Proses</span>
                      @else
                          <span class="badge badge-success">Di Respon</span>
                      @endif
                    </td>
                    <td>
                        <a href="/user/aduan/destroy/{{$item->id}}" class="btn btn-xs btn-danger"onclick="return confirm('Yakin Ingin Di hapus?');"><i class="fas fa-trash"></i> Delete</a>
                        
                        <a href="/user/aduan/respon/{{$item->id}}" class="btn btn-xs btn-success"><i class="fas fa-comment-alt"></i> Solusi</a>
                    </td>
                    </tr>
                @endforeach
            </tbody>
                
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
@endsection