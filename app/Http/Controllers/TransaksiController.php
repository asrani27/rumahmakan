<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Models\Transaksi;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class TransaksiController extends Controller
{
    public function index()
    {
        //$data = Transaksi::orderBy('status_bayar', 'ASC')->get();
        $riwayat = Transaksi::where('status_bayar', 1)->orderBy('created_at', 'DESC')->paginate(10);
        $meja = Meja::get();
        return view('admin.transaksi.index',compact('meja','riwayat'));
    }

    public function nota($id)
    {
        $data = Transaksi::find($id);
        $pdf = PDF::loadView('admin.transaksi.nota',compact('data'))->setPaper(array(20,-30,309.4488,435.433), 'portrait');
        return $pdf->stream();

    }
    public function bayar($id)
    {
        $checkTransaksi = Transaksi::where('meja_id', $id)->where('status_bayar',0)->first();
        if($checkTransaksi == null){
            toastr()->error('Meja ini Tidak ada Pesanan');
            return back();
        }else{
            $data = $checkTransaksi;
            $detail = $data->detailTransaksi->map(function($item){
                $item->total = $item->harga * $item->jumlah;
                return $item;
            });
            
        //dd($detail);
            return view('admin.transaksi.bayar',compact('data','detail'));
        }
    }

    public function storeBayar(Request $req)
    {
        if((int)$req->total > (int)$req->bayar)
        {
            toastr()->error('Kurang Pembayaran');
            return back();
        }else{
        
            DB::beginTransaction();

            try {
                $kembalian = (int)$req->bayar - (int)$req->total;
                //Simpan Pembayaran
                $p = new Pembayaran;
                $p->transaksi_id = $req->transaksi_id;
                $p->total = $req->total;
                $p->bayar = $req->bayar;
                $p->kembalian = $kembalian;
                $p->save();

                //kosongkan meja
                Transaksi::find($req->transaksi_id)->meja->update([
                    'status' => 0,
                    'users_id' => null
                ]);

                //ubah status bayar
                Transaksi::find($req->transaksi_id)->update([
                    'status_bayar' => 1
                ]);
                
                DB::commit();
                toastr()->success('Kembalian : Rp.,'.$kembalian);
                return redirect('/admin/transaksi');
            } catch (\Exception $e) {
                
                DB::rollback();
                toastr()->error('Sistem Error');
                return back();
            }

        }
    }
}
