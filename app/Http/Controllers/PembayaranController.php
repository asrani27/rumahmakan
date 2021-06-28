<?php

namespace App\Http\Controllers;

use App\Models\PesanUji;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $data = Pembayaran::get();
        return view('admin.pembayaran.index',compact('data'));
    }
    
    public function create()
    {
        $pesanuji = PesanUji::get();
        return view('admin.pembayaran.create',compact('pesanuji'));
    }
    
    public function store(Request $req)
    {
        
        $pelanggan_id = PesanUji::find($req->pesan_uji_id)->pelanggan_id;
        $attr = $req->all();
        $attr['pelanggan_id'] = $pelanggan_id;
        
        Pembayaran::create($attr);
        toastr()->success('Berhasil Di Simpan');
        return redirect('admin/pembayaran');   
    }
    
    public function edit($id)
    {
        $data = Pembayaran::find($id);
        $pesanuji = PesanUji::get();
        return view('admin.pembayaran.edit',compact('data','pesanuji'));
    }
    
    public function update(Request $req, $id)
    {
        $pelanggan_id = PesanUji::find($req->pesan_uji_id)->pelanggan_id;
        $attr = $req->all();
        $attr['pelanggan_id'] = $pelanggan_id;

        Pembayaran::find($id)->update($attr);
        toastr()->success('Berhasil Di Update');
        return redirect('admin/pembayaran');   
    }
    
    public function destroy($id)
    {
        Pembayaran::find($id)->delete();
        toastr()->success('Berhasil Di Hapus');
        return back();
    }
}
