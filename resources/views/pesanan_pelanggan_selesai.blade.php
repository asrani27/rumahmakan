@extends('front.app')

@section('title')
Daftar Makanan Dan Minuman Yang Telah Di Pesan
@endsection 

@section('content')
<div class="row">
    <div class="col-lg-12">]
        @if ($data==null)
        <a href="/home" class="btn btn-sm btn-info">KEMBALI KE HOME</a>
        @else
            
        <form method="post" action="/pesansekarang">
            @csrf
            <div class="card">
                <div class="card-body">
                    <strong>
                    NAMA : {{strtoupper(Auth::user()->name)}}<br/>
                    NOMOR MEJA : {{$nomor_meja}}<br/>
                    </strong>
                    DATA YANG DI PESAN
                    <table class="table table-bordered table-sm table-striped">
                        <thead>                  
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $no =1;
                            @endphp
                            @foreach ($data as $item)
                                
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->makanan->nama_makanan}}</td>
                                <td>{{number_format($item->harga)}}</td>
                                <td>{{$item->jumlah}}</td>
                                <td>{{number_format($item->jumlah * $item->harga)}}</td>                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>TOTAL</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>{{number_format($data->sum('total'))}}</th>
                            </tr>
                        </tfoot>
                      </table>
                </div>
            </div>
        </form>
        @endif
    </div>   
</div>
@endsection