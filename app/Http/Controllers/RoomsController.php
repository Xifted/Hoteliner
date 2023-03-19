<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Reservasi;
use App\Models\Tamu;
use App\Models\Tipe_kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class RoomsController extends Controller
{
    public function index()
    {
        $LTipe = Tipe_kamar::all();

        // $tipeKamar = Tipe_kamar::find($id);
        return view('tamu.rooms', [
            'LKamar' => $LTipe,
            // 'tipeKamarPerId' => $tipeKamar
        ]);
    }

    public function prosesReservasi()
    {
        $id_tamu = Auth::user()->id_tamu;
        $namaTamu = Auth::user()->nama;
        if ($namaTamu == null || $namaTamu == "") {
            return redirect('/datadiri');
        } else {
            Reservasi::create([
                'id_tamu' => $id_tamu,
                'booking_code' => Str::uuid()->toString()
            ]);
            $id_rsv = DB::table('reservasi')->orderBy('id_rsv', 'desc')->limit(1)->get('id_rsv');
            
            return redirect('rooms/detailreservasi/' . $id_rsv[0]->id_rsv);
        }
    }

    public function detailReservasi($id)
    {
        if (Auth::check()) {
            $reservasi = Reservasi::find($id);

            return view('tamu.reservasi', [
                'reservasi' => $reservasi
            ]);
        } else {
            return redirect('/login');
        }
    }

    public function edit($id)
    {
        $LKamar = Kamar::find($id);
        return view('admin.roomsedit', [
            'LKamar' => $LKamar
        ]);
    }

    public function copy()
    {
        return view('tamu.copy');
    }
}
