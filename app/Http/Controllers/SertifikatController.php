<?php

namespace App\Http\Controllers;

use App\Models\HasilUji;
use App\Models\StatusUji;
use App\Models\Sertifikat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class SertifikatController extends Controller
{
    public function index()
    {
        $data = Sertifikat::get();
        return view('admin.sertifikat.index',compact('data'));
    }
    
    public function create()
    {
        $hasiluji = HasilUji::get();
        return view('admin.sertifikat.create',compact('hasiluji'));
    }
    
    public function store(Request $req)
    {
        
        $pelanggan_id = HasilUji::find($req->hasil_uji_id)->pelanggan_id;
        $attr = $req->all();
        $attr['pelanggan_id'] = $pelanggan_id;
        
        Sertifikat::create($attr);
        toastr()->success('Berhasil Di Simpan');
        return redirect('admin/sertifikat');   
    }
    
    public function edit($id)
    {
        $data = Sertifikat::find($id);
        $hasiluji = HasilUji::get();
        return view('admin.sertifikat.edit',compact('data','hasiluji'));
    }
    
    public function update(Request $req, $id)
    {
        $pelanggan_id = HasilUji::find($req->hasil_uji_id)->pelanggan_id;
        $attr = $req->all();
        $attr['pelanggan_id'] = $pelanggan_id;

        Sertifikat::find($id)->update($attr);
        toastr()->success('Berhasil Di Update');
        return redirect('admin/sertifikat');   
    }
    
    public function destroy($id)
    {
        Sertifikat::find($id)->delete();
        toastr()->success('Berhasil Di Hapus');
        return back();
    }

    public function sertifikat($id)
    {
        $data = Sertifikat::find($id);
        $pdf = PDF::loadView('admin.sertifikat.sertifikat',compact('data'))->setPaper('legal','landscape');
        return $pdf->stream();
    }
}
