<?php

namespace App\Http\Controllers;

use App\Models\StatusUji;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class StatusUjiController extends Controller
{
    public function index()
    {
        $data = StatusUji::get();
        return view('admin.status_uji.index',compact('data'));
    }
    
    public function create()
    {
        $pembayaran = Pembayaran::get();
        return view('admin.status_uji.create',compact('pembayaran'));
    }
    
    public function store(Request $req)
    {
        
        $pelanggan_id = Pembayaran::find($req->pembayaran_id)->pelanggan_id;
        $attr = $req->all();
        $attr['pelanggan_id'] = $pelanggan_id;
        
        StatusUji::create($attr);
        toastr()->success('Berhasil Di Simpan');
        return redirect('admin/status_uji');   
    }
    
    public function edit($id)
    {
        $data = StatusUji::find($id);
        $pembayaran = Pembayaran::get();
        return view('admin.status_uji.edit',compact('data','pembayaran'));
    }
    
    public function update(Request $req, $id)
    {
        $pelanggan_id = Pembayaran::find($req->pembayaran_id)->pelanggan_id;
        $attr = $req->all();
        $attr['pelanggan_id'] = $pelanggan_id;

        StatusUji::find($id)->update($attr);
        toastr()->success('Berhasil Di Update');
        return redirect('admin/status_uji');   
    }
    
    public function destroy($id)
    {
        StatusUji::find($id)->delete();
        toastr()->success('Berhasil Di Hapus');
        return back();
    }
}
