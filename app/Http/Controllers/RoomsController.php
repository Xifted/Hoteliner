<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas_tambahan;
use App\Models\Kamar;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function index(){
        $LKamar = Kamar::all();
        return view('tamu.rooms', [
            'LKamar' => $LKamar
        ]);
    }

    public function reservasi($id){
        $LKamar = Kamar::find($id);
        $daftarFasilitas = explode(';', $LKamar->id_fasilitas) ;
        $fasilitas = [];
        foreach($daftarFasilitas as $f){
            array_push($fasilitas, Fasilitas_tambahan::find($f));
        }
        return view('tamu.reservasi', [
            'LKamar' => $LKamar,
            'daftarFasilitas' => $fasilitas
        ]);
    }

    public function edit($id){
        $LKamar = Kamar::find($id);
        return view('admin.roomsedit', [
            'LKamar' => $LKamar
        ]);
    }
}
