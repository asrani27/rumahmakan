<?php

namespace App\Http\Controllers;

use App\Models\PesanUji;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PesanUjiController extends Controller
{
    public function index()
    {
        $data = PesanUji::get();
        return view('admin.pesanuji.index',compact('data'));
    }
    
    public function create()
    {
        $pelanggan = Pelanggan::get();
        return view('admin.pesanuji.create',compact('pelanggan'));
    }
    
    public function store(Request $req)
    {
        PesanUji::create($req->all());
        toastr()->success('Berhasil Di Simpan');
        return redirect('admin/pesan_uji');   
    }
    
    public function edit($id)
    {
        $pelanggan = Pelanggan::get();
        $data = PesanUji::find($id);
        return view('admin.pesanuji.edit',compact('data','pelanggan'));
    }
    
    public function update(Request $req, $id)
    {
        PesanUji::find($id)->update($req->all());
        toastr()->success('Berhasil Di Update');
        return redirect('admin/pesan_uji');   
    }
    
    public function destroy($id)
    {
        PesanUji::find($id)->delete();
        toastr()->success('Berhasil Di Hapus');
        return back();
    }
}
