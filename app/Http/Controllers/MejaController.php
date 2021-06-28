<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    public function index()
    {
        $data = Meja::get();
        return view('admin.meja.index',compact('data'));
    }
    
    public function create()
    {
        return view('admin.meja.create');
    }
    
    public function store(Request $req)
    {
        Meja::create($req->all());
        toastr()->success('Berhasil Di Simpan');
        return redirect('admin/meja');   
    }
    
    public function edit($id)
    {
        $data = Meja::find($id);
        return view('admin.meja.edit',compact('data'));
    }
    
    public function update(Request $req, $id)
    {
        Meja::find($id)->update($req->all());
        toastr()->success('Berhasil Di Update');
        return redirect('admin/meja');   
    }
    
    public function destroy($id)
    {
        Meja::find($id)->delete();
        toastr()->success('Berhasil Di Hapus');
        return back();
    }
}
