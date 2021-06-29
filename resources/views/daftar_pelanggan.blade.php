@extends('front.app')

@section('title')
Daftar Riwayat Pemesanan, Nama Pelayan : {{Auth::user()->name}}
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <a href="/home/pesansekarang/" class="btn btn-sm btn-info">Tambah Pemesanan</a><br/><br/>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-sm table-striped">
                        <thead>                  
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Tanggal</th>
                            <th>Nomor Meja</th>
                            <th>Detail Pesanan</th>
                            <th>Total</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $no =1;
                            @endphp
                            @foreach ($data as $item)
                                
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{\Carbon\Carbon::parse($item->created_at)->format('d M Y')}}</td>
                                <td>{{$item->meja->nama}}</td>
                                <td>
                                    <table>
                                    @foreach($item->detailTransaksi as $item2)
                                    <tr>
                                        <td>{{$item2->makanan->nama_makanan}}</td>
                                        <td>{{number_format($item2->harga)}}</td>
                                        <td>{{$item2->jumlah}}</td>
                                    </tr>    
                                    @endforeach
                                    </table>
                                </td>
                                <td>{{number_format($item->detailTransaksi->map(function($item){
                                    $item->total = $item->harga * $item->jumlah;
                                    return $item;
                                })->sum('total')) }}</td>
                                <td>
                                    @if ($item->status_bayar == 0)
                                        Belum Bayar
                                    @else
                                        Lunas
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </form>
    </div>   
    
    <!-- /.col-md-6 -->
</div>
@endsection