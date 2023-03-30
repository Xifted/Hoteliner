<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function listReservasi(){
        $reservasiOnly = DB::table('reservasi')->select('reservasi.*', 'tamu.nama')->join('tamu', 'reservasi.id_tamu', '=', 'tamu.id_tamu')->orderBy('reservasi.id_rsv')->get();
        $listReservasi = DB::table('reservasi')
                            ->select('reservasi.*', 'tamu.nama', 'detail_reservasi.*')
                            ->join('tamu', 'reservasi.id_tamu', '=', 'tamu.id_tamu')
                            ->join('detail_reservasi', 'reservasi.id_rsv', '=', 'detail_reservasi.id_rsv')
                            ->orderBy('reservasi.id_rsv')
                            ->get();
        // return dd($listReservasi);

        return view('admin.list-reservasi', [
            'rsvOnly' => $reservasiOnly,
            'listRsv' => $listReservasi,
        ]);
    }

    public function listTransaksi(){
        return view('admin.list-transaksi');
    }
}