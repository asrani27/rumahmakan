<?php

namespace App\Http\Controllers;

use App\Models\HasilUji;
use App\Models\StatusUji;
use Illuminate\Http\Request;

class HasilUjiController extends Controller
{
    public function index()
    {
        $data = HasilUji::get();
        return view('admin.hasil_uji.index',compact('data'));
    }
    
    public function create()
    {
        $statusuji = StatusUji::get();
        return view('admin.hasil_uji.create',compact('statusuji'));
    }
    
    public function store(Request $req)
    {
        
        $pelanggan_id = StatusUji::find($req->status_uji_id)->pelanggan_id;
        $attr = $req->all();
        $attr['pelanggan_id'] = $pelanggan_id;
        
        HasilUji::create($attr);
        toastr()->success('Berhasil Di Simpan');
        return redirect('admin/hasil_uji');   
    }
    
    public function edit($id)
    {
        $data = HasilUji::find($id);
        $statusuji = StatusUji::get();
        return view('admin.hasil_uji.edit',compact('data','statusuji'));
    }
    
    public function update(Request $req, $id)
    {
        $pelanggan_id = StatusUji::find($req->status_uji_id)->pelanggan_id;
        $attr = $req->all();
        $attr['pelanggan_id'] = $pelanggan_id;

        HasilUji::find($id)->update($attr);
        toastr()->success('Berhasil Di Update');
        return redirect('admin/hasil_uji');   
    }
    
    public function destroy($id)
    {
        HasilUji::find($id)->delete();
        toastr()->success('Berhasil Di Hapus');
        return back();
    }
}
