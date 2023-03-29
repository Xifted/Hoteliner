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
        $KQty = DB::table('kamar')->select(array('id_tipe', DB::raw('COUNT(id_tipe) AS maxQty')))->where('status', '=', 'Tersedia')->groupBy('id_tipe')->get();

        $RoomAvailability = [];

        foreach ($KQty as $Qty) {
            $RoomAvailability[$Qty->id_tipe] = $Qty->maxQty;
        }
        // return var_dump($RoomAvailability);
        return view('tamu.rooms', [
            'LTipe' => $LTipe,
            'KQty' => $RoomAvailability
        ]);
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table tipe sesuai pencarian data
        $LTipe = DB::table('tipe_kamar')
            ->where('nama', 'like', "%" . $cari . "%")
            ->paginate();
        
        $KQty = DB::table('kamar')->select(array('id_tipe', DB::raw('COUNT(id_tipe) AS maxQty')))->where('status', '=', 'Tersedia')->groupBy('id_tipe')->get();

        $RoomAvailability = [];

        foreach ($KQty as $Qty) {
            $RoomAvailability[$Qty->id_tipe] = $Qty->maxQty;
        }

        return view('tamu.rooms', [
            'LTipe' => $LTipe,
            'KQty' => $RoomAvailability
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
