@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
    <a href="/admin/transaksi" class="btn btn-secondary"><strong><i class="fas fa-sync-alt"></i> Kembali</strong></a><br/><br/>
    </div>
</div>
<div class="row">
    <div class="col-8">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Detail Transaksi</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-sm">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama makanan</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
                @php
                    $no =1;
                @endphp
                @foreach ($detail as $item)
                    <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->makanan->nama_makanan}}</td>
                    <td>{{number_format($item->harga)}}</td>
                    <td>{{$item->jumlah}}</td>
                    <td>{{number_format($item->jumlah * $item->harga)}}</td>
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
    
    <div class="col-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Detail Pembayaran</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="post" action="/admin/pembayaran/transaksi/{{$data->id}}">
                @csrf
            <div class="form-group">
                <label>NAMA : {{strtoupper($data->user->name)}}, </label>
                <label>NOMOR MEJA : {{strtoupper($data->meja->nama)}}</label>
            </div>
            <div class="form-group">
                <label>TOTAL BAYAR</label>
                
                <input type="text" class="form-control" value="{{number_format($data->total)}}" readonly>
                <input type="hidden" class="form-control" name="total" value="{{$data->total}}" readonly>
            </div>
            <div class="form-group">
                <label>DI BAYAR</label>
                <input type="text" class="form-control" name="bayar" required>
                <input type="hidden" class="form-control" name="transaksi_id" value="{{$data->id}}" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-block btn-success">SIMPAN</button>
            </div>
            </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->
@endsection