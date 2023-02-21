<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas_tambahan;
use App\Models\Kamar;
use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoomsController extends Controller
{
    public function index()
    {
        $LKamar = Kamar::all();
        return view('tamu.rooms', [
            'LKamar' => $LKamar
        ]);
    }

    public function reservasi($id)
    {
        $idTamu = Auth::user()->id;
        $akun = DB::table('akun')
            ->join('tamu', 'akun.id', '=', 'tamu.id_akun')
            ->where('tamu.id_akun', '=', $idTamu)
            ->select('tamu.nama', 'tamu.alamat','tamu.gender', 'tamu.no_telp')
            ->get();
        $LKamar = Kamar::find($id);
        $daftarFasilitas = explode(';', $LKamar->id_fasilitas);
        $fasilitas = [];
        foreach ($daftarFasilitas as $f) {
            array_push($fasilitas, Fasilitas_tambahan::find($f));
        }

        return view('tamu.reservasi', [
            'LKamar' => $LKamar,
            'daftarFasilitas' => $fasilitas,
            'identitasTamu' => $akun[0]
        ]);
    }

    public function edit($id)
    {
        $LKamar = Kamar::find($id);
        return view('admin.roomsedit', [
            'LKamar' => $LKamar
        ]);
    }
}
