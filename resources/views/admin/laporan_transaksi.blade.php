@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    
    <a href="/admin/transaksi/cetak" target="_blank" class="btn btn-danger"><strong><i class="fas fa-th"></i> Cetak</strong></a><br/><br/>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Laporan Transaksi</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-sm">
          <thead>
          <tr>
            <th>No</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Penghasilan</th>
          </tr>
          </thead>
          <tbody>
              @php
                  $no =1;
              @endphp
               @foreach ($data as $item)
                  <tr>
                  <td>{{$no++}}</td>
                  <td>{{$item->month}}</td>
                  <td>{{$item->year}}</td>
                  <td>{{number_format($item->total)}}</td>
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
@endsection