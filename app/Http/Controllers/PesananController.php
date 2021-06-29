<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Models\Makanan;
use App\Models\Sementara;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function createPelanggan()
    {
        $meja = Meja::where('status', 0)->get();
        return view('pelanggan',compact('meja'));
    }

    public function storepelanggan(Request $req)
    {
        DB::beginTransaction();

        try {
            //Simpan Transaksi
            // $attr = $req->all();
            // $attr['nama_pembeli'] = $req->nama;
            // $attr['total'] = 0;
            // Transaksi::create($attr);
            
            //Ubah status meja menjadi di pesan
            Meja::find($req->meja_id)->update([
                'status' => 1,
                'users_id' => Auth::user()->id,
            ]);
            DB::commit();
            $nomor_meja = Meja::find($req->meja_id)->nama;
            $meja_id =$req->meja_id;
            $makanan = Makanan::get();
            $sementara = Sementara::where('users_id', Auth::user()->id)->get();
            return view('pesanan_pelanggan',compact('makanan','sementara','nomor_meja','meja_id'));
        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }
    }

    public function pesananPelanggan()
    {
        // $makanan = Makanan::get();
        // $sementara = Sementara::where('users_id', Auth::user()->id)->get();
        $data = Transaksi::where('users_id', Auth::user()->id)->get();
        return view('daftar_pelanggan',compact('data'));
    }

    public function loginPelanggan()
    {
        if (Auth::check())
        {
            return redirect('/home');
        }
        else
        {
            return view('login_pelanggan');
        }
    }

    public function dataPesananPelanggan()
    {
        // dd('d');
        // $nomor_meja = Meja::find($req->meja_id)->nama;
        // $meja_id =$req->meja_id;
        $meja = Meja::where('status',0)->get();
        $makanan = Makanan::get();
        $sementara = Sementara::where('users_id', Auth::user()->id)->get();
        return view('pesanan_pelanggan',compact('makanan','sementara','meja'));
    }

    public function batalkan()
    {
        //Hapus pesanan meja
        // Auth::user()->meja->update([
        //     'users_id' => null,
        //     'status' => 0
        // ]);

        Sementara::where('users_id', Auth::user()->id)->get()->map(function($item){
            $item->delete();
            return $item;
        });
        return redirect('/home');
    }

    public function storeMakanan($id)
    {
        
        $attr['users_id'] = Auth::user()->id;
        $attr['makanan_id'] = $id;
        $attr['harga'] = Makanan::find($id)->harga;
        $attr['jumlah'] = 1;
        $check = Sementara::where('users_id', Auth::user()->id)->where('makanan_id', $id)->first();
        if($check == null){
            Sementara::create($attr);
            return back();
        }else{
            $check->jumlah = $check->jumlah + 1;
            $check->save();
            return back();
        }
        
    }

    public function selesaiPesan(Request $req)
    {
        $pesanan = Sementara::where('users_id', $req->users_id)->get()->map(function($item){
            $item->total = $item->jumlah * $item->harga;
            return $item;
        });
        
        DB::beginTransaction();
        
        try {
            $t = new Transaksi;
            $t->meja_id      = $req->meja_id;
            $t->users_id     = $req->users_id;
            $t->nama_pembeli = $req->nama_pembeli;
            $t->total        = $pesanan->sum('total');
            $t->save();

            $pesanan->map(function($item)use($t){
                $dt = new DetailTransaksi;
                $dt->transaksi_id = $t->id;
                $dt->makanan_id   = $item->makanan_id;
                $dt->harga        = $item->harga;
                $dt->jumlah       = $item->jumlah;
                $dt->save();
                return $item;
            });

            $pesanan->map(function($item){
                $item->delete();
                return $item;
            });
            
            Meja::find($req->meja_id)->update([
                'status' => 1,
                'users_id' => Auth::user()->id,
            ]);
            
            
            DB::commit();

            return redirect('/home');
        } catch (\Exception $e) {
            
            DB::rollback();
            toastr()->error('Sistem Error');
            return back();
        }
    }

    public function dataPesanan()
    {
        $check = Transaksi::where('users_id', Auth::user()->id)->where('status_bayar',0)->first();
        if($check == null){
            $data = null;
        }else{
            $data = $check->detailTransaksi->map(function($item){
                $item->total = $item->harga * $item->jumlah;
                return $item;
            });
        }

        $dnomor_meja = Transaksi::where('users_id', Auth::user()->id)->where('status_bayar',0)->first();
        if($dnomor_meja == null){
            $nomor_meja = null;
        }else{
            $nomor_meja = $dnomor_meja->meja->nama;
        }
        return view('pesanan_pelanggan_selesai',compact('data','nomor_meja'));
    }
}
