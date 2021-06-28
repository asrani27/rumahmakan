@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <a href="/admin/transaksi" class="btn btn-info"><strong><i class="fas fa-sync-alt"></i> Refresh</strong></a><br/><br/>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Transaksi</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-sm">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Nomor Meja</th>
              <th>Data Pesanan</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
                @php
                    $no =1;
                @endphp
                @foreach ($meja as $item)
                    <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->user == null ? '-':$item->user->name}}</td>
                    <td>{{$item->nama}}</td>
                    <td>
                      @if (count($item->transaksi->where('status_bayar',0)) == 0)
                          -
                      @else
                          <table>
                            <tr>
                              <th>Nama</th>
                              <th>Harga</th>
                              <th>Jumlah</th>
                              <th>Subtotal</th>
                            </tr>
                            @foreach ($item->transaksi->first()->detailTransaksi as $item2)
                            <tr>
                              <td>{{$item2->makanan->nama_makanan}}</td>
                              <td>{{$item2->harga}}</td>
                              <td>{{$item2->jumlah}}</td>
                              <td>{{$item2->jumlah * $item2->harga}}</td>
                            </tr>
                            @endforeach
                          </table>
                      @endif
                    </td>
                    <td>
                      <form action="/admin/transaksi/{{$item->id}}" method="post">
                        @csrf
                        @method('delete')
                        <a href="/admin/transaksi/{{$item->id}}/bayar" class="btn btn-xs btn-success"><i class="fas fa-money-bill"></i> Bayar</a>   
                      </form>
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