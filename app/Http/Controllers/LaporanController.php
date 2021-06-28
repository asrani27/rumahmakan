<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use App\Models\Pegawai;
use App\Models\Kustomer;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class LaporanController extends Controller
{
    public function aduan()
    {
        return view('admin.lap_aduan');
    }
    public function pegawai()
    {
        return view('admin.lap_pegawai');
    }
    public function kustomer()
    {
        return view('admin.lap_kustomer');
    }
    public function solusi()
    {
        return view('admin.lap_solusi');
    }

    
    public function printaduan()
    {
        $data = Aduan::get();
        $pdf = PDF::loadView('admin.lap_aduan_pdf',compact('data'))->setPaper('legal','landscape');
        return $pdf->stream();
    }

    public function printpegawai()
    {
        $data = Pegawai::get();
        $pdf = PDF::loadView('admin.lap_pegawai_pdf',compact('data'))->setPaper('legal','landscape');
        return $pdf->stream();
    }
    public function printkustomer()
    {
        $data = Kustomer::get();
        $pdf = PDF::loadView('admin.lap_kustomer_pdf',compact('data'))->setPaper('legal','landscape');
        return $pdf->stream();
        return view('admin.lap_kustomer_pdf');
    }
    public function printsolusi()
    {
        $data = Aduan::get();
        $pdf = PDF::loadView('admin.lap_solusi_pdf',compact('data'))->setPaper('legal','landscape');
        return $pdf->stream();
    }
}
