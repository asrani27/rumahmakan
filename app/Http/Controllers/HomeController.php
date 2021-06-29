<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Models\Aduan;
use App\Models\Makanan;
use App\Models\Sementara;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('kasir')){
            return view('admin.home');
        }else{
            $user = Auth::user();
            //$transaksi = Transaksi::where('users_id', Auth::user()->id)->where('status_bayar',0)->get();
            
                 $data = Transaksi::where('users_id', Auth::user()->id)->get();
            return view('daftar_pelanggan',compact('data'));
            // if($user->meja != null){
            //     $makanan = Makanan::get();
            //     $sementara = Sementara::get()->map(function($item){
            //         $item->total = $item->jumlah * $item->harga;
            //         return $item;
            //     });
            //     return view('pesanan_pelanggan',compact('makanan','sementara'));
            // }else{
            //     $meja = Meja::where('status', 0)->get();
            //     return view('pelanggan',compact('user','meja'));
            // }
        }
    }
}
