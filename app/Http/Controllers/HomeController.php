<?php

namespace App\Http\Controllers;

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
        $listReservasi = DB::table('reservasi')->select('*')->where('id_tamu', '=', $dataTamu->id_tamu)->orderBy('tgl_rsv', 'desc')->get();
        // return dd($listReservasi);

        return view('tamu.profile', [
            'dataTamu' => $dataTamu,
            'listReservasi' => $listReservasi
        ]);
    }
}
