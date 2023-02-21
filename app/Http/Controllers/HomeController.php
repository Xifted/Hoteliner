<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $LKamar = Kamar::all();
        return view('tamu.index', [
            'LKamar' => $LKamar
        ]);
    }
}
