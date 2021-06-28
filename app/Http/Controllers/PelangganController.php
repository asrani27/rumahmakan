<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $data = Pelanggan::get();
        return view('admin.pelanggan.index',compact('data'));
    }
    
    public function create()
    {
        return view('admin.pelanggan.create');
    }
    
    public function store(Request $req)
    {
        Pelanggan::create($req->all());
        toastr()->success('Berhasil Di Simpan');
        return redirect('admin/pelanggan');   
    }
    
    public function edit($id)
    {
        $data = Pelanggan::find($id);
        return view('admin.pelanggan.edit',compact('data'));
    }
    
    public function update(Request $req, $id)
    {
        Pelanggan::find($id)->update($req->all());
        toastr()->success('Berhasil Di Update');
        return redirect('admin/pelanggan');   
    }
    
    public function destroy($id)
    {
        Pelanggan::find($id)->delete();
        toastr()->success('Berhasil Di Hapus');
        return back();
    }
}
