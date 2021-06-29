@extends('front.app')

@section('title')
Pilih Makanan Dan minuman
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <form method="post" action="/pesansekarang">
            @csrf
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-sm table-striped">
                        <thead>                  
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $no =1;
                            @endphp
                            @foreach ($makanan as $item)
                                
                            <tr>
                                <td>{{$no++}}</td>
                                <td><img src="/storage/{{$item->file}}" width="100"></td>
                                <td>{{$item->nama_makanan}}</td>
                                <td>{{number_format($item->harga)}}</td>
                                <td>
                                    <a href="/pesansekarang/{{$item->id}}/add" class="btn btn-sm btn-info">+1</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </form>
    </div>   
    <div class="col-md-4">
        <div class="card">
            <form method="post" action="/home/selesai">
                @csrf
            <div class="card-body">
                <strong>NAMA  : {{Auth::user()->name}}</strong><br/>
                <strong>MEJA NO : 
                    <select name="meja_id" required>
                        <option value="">-Pilih-</option>
                        @foreach ($meja as $item)
                        <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                    </select>
                </strong><br/>
                {{-- <input type="hidden" name="meja_id" value="{{$meja_id}}"> --}}
                <input type="hidden" name="nama_pembeli" value="{{Auth::user()->name}}">
                <input type="hidden" name="users_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="total" value="{{$sementara->sum('total')}}">
                DATA PESANAN : <br/>
                <table>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                    @php
                        $no =1;
                    @endphp
                    @foreach ($sementara as $item)
                        <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item->makanan->nama_makanan}}</td>
                        <td>{{number_format($item->harga)}}</td>
                        <td>{{number_format($item->jumlah)}}</td>
                        <td>{{number_format($item->jumlah * $item->harga)}}</td>
                        </tr>
                    @endforeach
                    <tfoot>
                        <th>
                            <td>SUBTOTAL :</td>
                            <td></td>
                            <td></td>
                            <td>{{number_format($sementara->sum('total'))}}</td>
                        </th>
                    </tfoot>
                </table> 
                <button type="submit" class="btn btn-sm btn-info btn-block">SELESAI</button>
                <a href="/home/batalkan" class="btn btn-sm btn-secondary btn-block">BATALKAN</a>
                <a href="/home" class="btn btn-sm btn-danger btn-block">KEMBALI</a>
            </div>
            </form>
        </div>
    </div> 
    <!-- /.col-md-6 -->
</div>
@endsection