<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use App\Models\Solusi;
use Illuminate\Http\Request;

class AduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Aduan::orderBy('id','DESC')->get();
        return view('admin.aduan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Aduan::find($id)->delete();
        toastr()->success('berhasil Di Hapus');
        return back();
    }

    public function solusi($id)
    {
        $data = Aduan::find($id);
        $solusi = Solusi::where('aduan_id', $data->id)->first();
        return view('admin.aduan.respon',compact('data','solusi'));
    }

    public function deleteSolusi($id)
    {
        $s = Solusi::where('aduan_id', $id)->first();
        $s->delete();
        toastr()->success('berhasil Di Hapus');
        return back();
        
    }
    public function storeSolusi(Request $req, $id)
    {
        $n = new Solusi;
        $n->isi = $req->isi;
        $n->aduan_id = $req->aduan_id;
        $n->save();

        Aduan::find($id)->update([
            'status' => 2,
        ]);
        toastr()->success('berhasil Di Respon');
        return redirect('/admin/aduan');
    }
}
