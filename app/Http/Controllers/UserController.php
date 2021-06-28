<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function aduan()
    {
        $kustomer_id = Auth::user()->kustomer->id;
        $data = Aduan::where('kustomer_id', $kustomer_id)->get();
        return view('user.aduan.index',compact('data'));
    }

    public function createAduan()
    {
        $kustomer = Auth::user()->kustomer;
        return view('user.aduan.create',compact('kustomer'));
    }

    public function editAduan($id)
    {
        $kustomer = Auth::user()->kustomer;
        $data = Aduan::find($id);
        return view('user.aduan.edit',compact('kustomer','data'));
    }

    public function updateProfil(Request $req)
    {
        $d = Auth::user()->kustomer;
        $d->nama   = $req->nama;
        $d->alamat = $req->alamat;
        $d->telp   = $req->telp;
        $d->email  = $req->email;
        $d->save();
        toastr()->success('Profil diupdate');
        return back();
    }

    public function storeAduan(Request $req)
    {
        $attr = $req->all();
        $attr['kustomer_id'] = Auth::user()->kustomer->id;
        $attr['status'] = 1;
        Aduan::create($attr);
        toastr()->success('Pengaduan berhasil Di Simpan');
        return redirect('/user/aduan');
    }

    public function destroyAduan($id)
    { 
        Aduan::find($id)->delete();
        toastr()->success('berhasil Di hapus');
        return back();
    }

    public function respon($id)
    {
        $data = Aduan::find($id);
        
        return view('user.aduan.respon',compact('data'));
    }
}
