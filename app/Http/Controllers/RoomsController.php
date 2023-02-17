<?php

namespace App\Http\Controllers;

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
        return view('tamu.reservasi', [
            'LKamar' => $LKamar
        ]);
    }

    public function edit($id){
        $LKamar = Kamar::find($id);
        return view('admin.roomsedit', [
            'LKamar' => $LKamar
        ]);
    }
}
