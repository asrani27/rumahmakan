<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    
    public function index()
    {
        $data = Makanan::get();
        return view('admin.makanan.index',compact('data'));
    }
    
    public function create()
    {
        return view('admin.makanan.create');
    }
    
    public function store(Request $req)
    {
        if($req->hasFile('file'))
        {
            $filename = $req->file->getClientOriginalName();
            $filename = date('d-m-Y-').rand(1,9999).$filename;                        
            $req->file->storeAs('/public',$filename);
        }else{
            $filename = null;
        }      
        
        $attr = $req->all();
        $attr['file'] = $filename;

        Makanan::create($attr);
        toastr()->success('Berhasil Di Simpan');
        return redirect('admin/makanan');   
    }
    
    public function edit($id)
    {
        $data = Makanan::find($id);
        return view('admin.makanan.edit',compact('data'));
    }
    
    public function update(Request $req, $id)
    {
        if($req->hasFile('file'))
        {
            $filename = $req->file->getClientOriginalName();
            $filename = date('d-m-Y-').rand(1,9999).$filename;                        
            $req->file->storeAs('/public',$filename);
        }else{
            $filename = Makanan::find($id)->foto;
        }      
        
        $attr = $req->all();
        $attr['file'] = $filename;

        Makanan::find($id)->update($attr);
        toastr()->success('Berhasil Di Update');
        return redirect('admin/makanan');   
    }
    
    public function destroy($id)
    {
        Makanan::find($id)->delete();
        toastr()->success('Berhasil Di Hapus');
        return back();
    }
}
