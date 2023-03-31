<?php

namespace App\Http\Controllers;

use App\Models\Detail_Reservasi;
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
        $LTipe = DB::table('kamar')->select('id_kamar', 'kamar.nama AS namaKamar', 'tipe_kamar.*')->where('kamar.status', '=', 'tersedia')->join('tipe_kamar', 'kamar.id_tipe', '=', 'tipe_kamar.id_tipe')->get();
        $KQty = DB::table('kamar')->select(array('id_tipe', DB::raw('COUNT(id_tipe) AS maxQty')))->where('status', '=', 'Tersedia')->groupBy('id_tipe')->get();
        $RoomAvailability = [];
        // return dd($KQty);

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

    public function detailReservasiSubmit(Request $request)
    {
        $details = json_decode($request->input('details'));
        $insertData = [];

        foreach ($details as $detail) {
            array_push(
                $insertData,
                [
                    'id_rsv' => $detail->idRsv,
                    'id_kamar' => $detail->id,
                    'tgl_in' => $detail->checkIn,
                    'tgl_out' => $detail->checkOut,
                    'harga' => $detail->hargaKamar,
                    // 'created_at' => now(),
                    // 'updated_at' => now(),
                ]
            );
        }

        DB::table('detail_reservasi')->insert($insertData);

        return response()->json(['message' => 'Detail reservasi berhasil disimpan.']);
    }

    public function transaksi()
    {
        $listDetail = DB::table('detail_reservasi')->where('id_rsv', '=', '26')->get();
        return dd($listDetail);

        return view('tamu.transaksi');
        // // Set your Merchant Server Key
        // \Midtrans\Config::$serverKey = 'YOUR_SERVER_KEY';
        // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        // \Midtrans\Config::$isProduction = false;
        // // Set sanitization on (default)
        // \Midtrans\Config::$isSanitized = true;
        // // Set 3DS transaction for credit card to true
        // \Midtrans\Config::$is3ds = true;

        // $params = array(
        //     'transaction_details' => array(
        //         'order_id' => rand(),
        //         'gross_amount' => 10000,
        //     ),
        //     'customer_details' => array(
        //         'first_name' => 'budi',
        //         'last_name' => 'pratama',
        //         'email' => 'budi.pra@example.com',
        //         'phone' => '08111222333',
        //     ),
        // );

        // $snapToken = \Midtrans\Snap::getSnapToken($params);
    }

    public function edit($id)
    {
        $LKamar = Kamar::find($id);
        return view('admin.roomsedit', [
            'LKamar' => $LKamar
        ]);
    }
}
