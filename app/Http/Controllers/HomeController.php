<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Tipe_kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $LKamar = Tipe_kamar::all();
        return view('tamu.index', [
            'LKamar' => $LKamar
        ]);
    }
}
