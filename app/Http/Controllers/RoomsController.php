<?php

namespace App\Http\Controllers;

use App\Models\Detail_Reservasi;
use App\Models\Kamar;
use App\Models\Reservasi;
use App\Models\Tamu;
use App\Models\Tipe_kamar;
use App\Models\Transaksi;
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

        $LTipe = DB::table('kamar')->select('id_kamar', 'kamar.nama AS namaKamar', 'tipe_kamar.*')->where('kamar.status', '=', 'tersedia')->join('tipe_kamar', 'kamar.id_tipe', '=', 'tipe_kamar.id_tipe')
            ->where('tipe_kamar.nama', 'like', "%" . $cari . "%")
            ->get();
        // $LTipe = DB::table('tipe_kamar')
        //     ->where('nama', 'like', "%" . $cari . "%")
        //     ->paginate();

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

    public function transaksi(Request $request, $id)
    {
        $idRsv = $id;
        // return dd($idRsv);
        $listDetail = DB::table('detail_reservasi')->select('detail_reservasi.*', 'kamar.nama as namaKamar', 'tipe_kamar.nama as namaTipe', 'tipe_kamar.img_url as imgKamar')->where('id_rsv', '=', $id)->join('kamar', 'detail_reservasi.id_kamar', '=', 'kamar.id_kamar')->join('tipe_kamar', 'kamar.id_tipe', '=', 'tipe_kamar.id_tipe')->get();
        // return dd($listDetail);
        $arrayDetails = [];

        foreach ($listDetail as $item) {
            array_push($arrayDetails,[
                'id' => $item->id_rsv,
                'price' => $item->harga,
                'name' => $item->namaTipe . " - " . $item->namaKamar,
                'quantity' => 1
            ]);
        }
        // return dd($listDetail);
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                // 'gross_amount' => 10000,
            ),
            'item_details' => $arrayDetails,

            'customer_details' => array(
                'first_name' => Auth::user()->nama,
                'last_name' => 'Hermawan',
                'email' => 'Vin@example.com',
                'phone' => '08111222333',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('tamu.transaksi', [
            'listDetail' => $listDetail,
            'id_rsv' => $idRsv,
            'snap_token' => $snapToken
        ]);
    }

    public function transaksiAction($id, Request $request)
    {
        $idUser = Auth::user()->id_tamu;
        $transaksiJson = json_decode($request->get('json'));
        // return dd($transaksiJson);
        $bayar = new Transaksi();
        $bayar->id_transaksi = $transaksiJson->transaction_id;
        $bayar->id_rsv = $id;
        $bayar->payment_type = $transaksiJson->payment_type;
        $bayar->tgl_transaksi = $transaksiJson->transaction_time;
        $bayar->status_pembayaran = $transaksiJson->transaction_status;
        $bayar->total_harga = $transaksiJson->gross_amount;
        $bayar->payment_code = $transaksiJson->payment_code ?? 0;
        $bayar->order_id = $transaksiJson->order_id;
        $bayar->pdf_url = $transaksiJson->pdf_url ?? 0;
        return $bayar->save() ? redirect(url('/profile/' . $idUser))->with('alert-success', 'Trasaksi Berhasil') : redirect(url('/profile/' . $idUser))->with('alert-failed', 'Transaksi Gagal');
    }

    public function edit($id)
    {
        $LKamar = Kamar::find($id);
        // DB::table('tamu')->create()->if()
        return view('admin.roomsedit', [
            'LKamar' => $LKamar
        ]);
    }
}
