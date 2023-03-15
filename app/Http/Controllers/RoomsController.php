<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas_tambahan;
use App\Models\Kamar;
use App\Models\Tamu;
use App\Models\Tipe_kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoomsController extends Controller
{
    public function index()
    {
        $LKamar = Tipe_kamar::all();
        return view('tamu.rooms', [
            'LKamar' => $LKamar
        ]);
    }

    public function reservasi($id)
    {
        $idTamu = Auth::user()->id;
        $listTipeKamar = Kamar::find($id);

        return view('tamu.reservasi', [
            'LKamar' => $listTipeKamar,
            'identitasTamu' => $idTamu[0]
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
