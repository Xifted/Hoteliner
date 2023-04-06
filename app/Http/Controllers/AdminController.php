<?php

namespace App\Http\Controllers;

use App\Models\Diskon;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function listReservasi(){
        $reservasiOnly = DB::table('reservasi')->select('reservasi.*', 'tamu.nama')->join('tamu', 'reservasi.id_tamu', '=', 'tamu.id_tamu')->orderBy('reservasi.id_rsv')->get();
        $listReservasi = DB::table('reservasi')
                            ->select('reservasi.*', 'tamu.nama', 'detail_reservasi.*')
                            ->join('tamu', 'reservasi.id_tamu', '=', 'tamu.id_tamu')
                            ->join('detail_reservasi', 'reservasi.id_rsv', '=', 'detail_reservasi.id_rsv')
                            ->orderBy('reservasi.id_rsv')
                            ->get();
        // return dd($listReservasi);

        return view('admin.list-reservasi', [
            'rsvOnly' => $reservasiOnly,
            'listRsv' => $listReservasi,
        ]);
    }

    public function listTransaksi(){
        $listTransaksi = DB::table('transaksi')->select('*')->orderBy('tgl_transaksi', 'desc')->get();
        // return dd($listTransaksi);
        return view('admin.list-transaksi', [
            'list_transaksi' => $listTransaksi
        ]);
    }
    public function listDiskon(){
        $listDiskon = Diskon::all();

        return view('admin.list-diskon', [
            'list_diskon' => $listDiskon
        ]);
    }
    public function actionDiskon(Request $request){
        Diskon::create([
            'id_diskon' => Str::uuid()->toString(),
            'value' => $request->input('valueDiskon'),
            'nama_diskon' => $request->input('namaDiskon'),
            'deskripsi' => $request->input('deskripsiDiskon'),
            'tgl_diskon' => $request->input('tglDiskon'),
            'tgl_expired' => $request->input('tglExpired'),
        ]);

        return redirect('/admin-dashboard/listdiskon');
    }
}