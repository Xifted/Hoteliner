<?php

namespace App\Http\Controllers;

use App\Models\Detail_Reservasi;
use App\Models\Kamar;
use App\Models\Tamu;
use App\Models\Tipe_kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $LKamar = Tipe_kamar::all();
        return view('tamu.index', [
            'LKamar' => $LKamar
        ]);
    }
    public function profile($id){
        $dataTamu = Tamu::find($id);
        $listReservasi = DB::table('reservasi')->select('reservasi.*', 'transaksi.status_pembayaran', 'transaksi.pdf_url', 'transaksi.total_harga')->join('transaksi', 'reservasi.id_rsv', '=', 'transaksi.id_rsv')->where('reservasi.id_tamu', '=', $dataTamu->id_tamu)->orderBy('reservasi.tgl_rsv', 'desc')->get();
        // return dd($listReservasi);

        return view('tamu.profile', [
            'dataTamu' => $dataTamu,
            'listReservasi' => $listReservasi
        ]);
    }

    public function showDetailReservasi($id){
        $idUser = Auth::user()->id_tamu;
        $idRsv = $id;
        $detailReservasi = DB::table('detail_reservasi')->select('detail_reservasi.*', 'kamar.nama as nama_kamar', 'tipe_kamar.nama as nama_tipe')->join('kamar', 'detail_reservasi.id_kamar', '=', 'kamar.id_kamar')->join('tipe_kamar', 'kamar.id_tipe', '=', 'tipe_kamar.id_tipe')->where('id_rsv', '=', $idRsv)->get();
        // return dd($detailReservasi);

        return view('tamu.showReservasi', [
            'detail_reservasi' => $detailReservasi,
            'id_user' => $idUser,
            'id_rsv' => $idRsv
        ]);
    }
}
