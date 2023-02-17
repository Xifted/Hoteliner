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
}
