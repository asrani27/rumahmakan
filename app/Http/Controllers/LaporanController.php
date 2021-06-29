<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Aduan;
use App\Models\Pegawai;
use App\Models\Kustomer;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class LaporanController extends Controller
{
    public function index()
    {
        $data = Transaksi::where('status_bayar', 1)->selectRaw('year(created_at) year, monthname(created_at) month, sum(total) total')
        ->groupBy('year','month')->orderBy('year', 'desc')->get();
        
        return view('admin.laporan_transaksi',compact('data'));
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

    
    public function cetak()
    {
        $data = Transaksi::where('status_bayar', 1)->selectRaw('year(created_at) year, monthname(created_at) month, sum(total) total')
        ->groupBy('year','month')->orderBy('year', 'desc')->get();
        $pdf = PDF::loadView('admin.transaksi_pdf',compact('data'))->setPaper('legal','landscape');
        return $pdf->stream();
    }
}
