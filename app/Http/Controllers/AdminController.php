<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Diskon;
use App\Models\Kamar;
use App\Models\Reservasi;
use App\Models\Tipe_kamar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        $idAdmin = Auth::guard('admin')->user()->id_admin;
        $reservasiHarian = DB::table('reservasi')
            ->whereDay('tgl_rsv', Carbon::now()->day)
            ->count();
        $pendapatanHarian = DB::table('reservasi')
            ->join('detail_reservasi', 'reservasi.id_rsv', '=', 'detail_reservasi.id_rsv')
            ->leftJoin('diskon', 'reservasi.id_diskon', '=', 'diskon.id_diskon')
            ->whereDay('tgl_rsv', Carbon::now()->day)
            ->select(DB::raw('SUM(CASE WHEN IFNULL(diskon.value, 0) = 0 THEN detail_reservasi.harga ELSE detail_reservasi.harga * diskon.value / 100 END) AS total_pendapatan'))
            ->get();
        $pendapatan = DB::table('reservasi')
            ->join('detail_reservasi', 'reservasi.id_rsv', '=', 'detail_reservasi.id_rsv')
            ->leftJoin('diskon', 'reservasi.id_diskon', '=', 'diskon.id_diskon')
            ->select(DB::raw('YEAR(reservasi.tgl_rsv) AS tahun, MONTHNAME(reservasi.tgl_rsv) AS bulan, COUNT(reservasi.id_rsv) AS total_reservasi,SUM(CASE WHEN IFNULL(diskon.value, 0) = 0 THEN detail_reservasi.harga ELSE detail_reservasi.harga * diskon.value / 100 END) AS total_pendapatan'))
            ->groupBy(DB::raw('YEAR(reservasi.tgl_rsv), MONTHNAME(reservasi.tgl_rsv)'))
            ->orderBy(DB::raw('YEAR(reservasi.tgl_rsv), MONTHNAME(reservasi.tgl_rsv)'))
            ->get();


        $labels = $pendapatan->pluck('bulan');
        $data = $pendapatan->pluck('total_pendapatan');
        // return dd($pendapatanHarian);

        return view('admin.dashboard', [
            'id_admin' => $idAdmin,
            'reservasi_harian' => $reservasiHarian,
            'pendapatan_harian' => $pendapatanHarian
        ], compact('labels', 'data'));
    }

    public function listReservasi()
    {
        $idAdmin = Auth::guard('admin')->user()->id_admin;
        $reservasiOnly = DB::table('reservasi')->select('reservasi.*', 'tamu.nama')->join('tamu', 'reservasi.id_tamu', '=', 'tamu.id_tamu')->orderBy('reservasi.id_rsv')->get();
        $listReservasi = DB::table('reservasi')
            ->select('reservasi.*', 'tamu.nama', 'detail_reservasi.*')
            ->join('tamu', 'reservasi.id_tamu', '=', 'tamu.id_tamu')
            ->join('detail_reservasi', 'reservasi.id_rsv', '=', 'detail_reservasi.id_rsv')
            ->where('reservasi.id_rsv', '=', $_GET['id_rsv'] ?? null)
            // ->groupBy('reservasi.id_rsv', 'reservasi.id_tamu', 'reservasi.id_diskon', 'reservasi.tgl_rsv', 'reservasi.booking_code', 'detail_reservasi.id_rsv', 'detail_reservasi.id_kamar', 'detail_reservasi.tgl_in', 'detail_reservasi.tgl_out', 'detail_reservasi.harga', 'tamu.nama')
            ->orderBy('reservasi.id_rsv')
            ->get();
        // return dd($listReservasi);

        return view('admin.list-reservasi', [
            'id_admin' => $idAdmin,
            'rsvOnly' => $reservasiOnly,
            'listRsv' => $listReservasi,
        ]);
    }

    // public function detailReservasi($id){
    //     $listReservasi = DB::table('detail_reservasi')
    //                         ->select('detail_reservasi.*')
    //                         // ->groupBy('reservasi.id_rsv', 'reservasi.id_tamu', 'reservasi.id_diskon', 'reservasi.tgl_rsv', 'reservasi.booking_code', 'detail_reservasi.id_rsv', 'detail_reservasi.id_kamar', 'detail_reservasi.tgl_in', 'detail_reservasi.tgl_out', 'detail_reservasi.harga', 'tamu.nama')
    //                         ->where('id_rsv', '=', $id)
    //                         ->orderBy('detail_reservasi.id_rsv')
    //                         ->get();
    //     return view('admin.list-reservasi', [
    //         'listRsv' => $listReservasi,
    //     ]);
    // }

    public function listTransaksi()
    {
        $idAdmin = Auth::guard('admin')->user()->id_admin;
        $listTransaksi = DB::table('transaksi')->select('transaksi.*', DB::raw('SUM(CASE WHEN IFNULL(diskon.value, 0) = 0 THEN detail_reservasi.harga ELSE detail_reservasi.harga * diskon.value / 100 END) AS total_harga'))->join('reservasi', 'transaksi.id_rsv', '=', 'reservasi.id_rsv')->leftJoin('diskon', 'reservasi.id_diskon', '=', 'diskon.id_diskon')->join('detail_reservasi', 'reservasi.id_rsv', '=', 'detail_reservasi.id_rsv')->groupBy('transaksi.id_transaksi', 'transaksi.id_rsv', 'transaksi.status_pembayaran', 'transaksi.pdf_url', 'transaksi.order_id', 'transaksi.payment_code', 'transaksi.payment_type', 'transaksi.tgl_transaksi', 'transaksi.no_rekening_tamu')->orderBy('tgl_transaksi', 'desc')->get();
        // return dd($listTransaksi);
        return view('admin.list-transaksi', [
            'id_admin' => $idAdmin,
            'list_transaksi' => $listTransaksi
        ]);
    }
    public function listDiskon()
    {
        $idDiskon = $_GET['id_diskon'] ?? null;

        $idAdmin = Auth::guard('admin')->user()->id_admin;
        $listDiskon = DB::table('diskon')->select('*')->get();
        $itemDiskon = DB::table('diskon')->select('*')->where('id_diskon', '=', $idDiskon)->get();

        return view('admin.list-diskon', [
            'id_admin' => $idAdmin,
            'list_diskon' => $listDiskon,
            'item_diskon' => $itemDiskon
        ]);
    }
    public function actionDiskon(Request $request)
    {
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

    public function actionEditDiskon(Request $request, $id)
    {
        DB::table('diskon')->where('id_diskon', '=', $id)->update([
            'nama_diskon' => $request->input('namaDiskon'),
            'deskripsi' => $request->input('deskripsiDiskon'),
            'tgl_expired' => $request->input('tglExpired'),
            'updated_at' => now()
        ]);

        return redirect('/admin-dashboard/listdiskon');
    }

    public function rooms(){
        $idKamar = $_GET['id_kamar'] ?? null;
        $tipeKamar = Tipe_kamar::all();
        $itemKamar = DB::table('kamar')->select('kamar.*', 'tipe_kamar.deskripsi AS desc')->where('id_kamar', '=', $idKamar)->join('tipe_kamar', 'kamar.id_tipe', '=', 'tipe_kamar.id_tipe')->get();
        $LTipe = DB::table('kamar')->select('kamar.id_kamar', 'kamar.nama AS namaKamar', 'kamar.status AS statusKamar', 'tipe_kamar.*')->join('tipe_kamar', 'kamar.id_tipe', '=', 'tipe_kamar.id_tipe')->get();
        // return dd($LTipe);
        return view('admin.rooms-edit', [
            'LTipe' => $LTipe,
            'item_kamar' => $itemKamar,
            'tipe_kamar'=> $tipeKamar
        ]);
    }

    public function roomsAdd(Request $request){
        DB::table('kamar')->insert([
            'id_tipe' => $request->input('tipeKamar'),
            'nama' => $request->input('namaKamar'),
            'deskripsi' => $request->input('deskripsiKamar'),
            'status' => $request->input('statusKamar')
        ]);

        return redirect('/admin-dashboard/rooms-edit');
    }

    public function roomsEdit(Request $request, $id){
        DB::table('kamar')->where('id_kamar', '=', $id)->join('tipe_kamar', 'kamar.id_tipe', '=', 'tipe_kamar.id_tipe')->update([
            'kamar.nama' => $request->input('namaKamar'),
            'tipe_kamar.deskripsi' => $request->input('deskripsiKamar'),
            'kamar.status' => $request->input('statusKamar'),
        ]);
        
        return redirect('/admin-dashboard/rooms-edit');
    }

    public function profile($id)
    {
        $idAdmin = Auth::guard('admin')->user()->id_admin;
        $dataAdmin = Admin::find($id);

        return view('admin.profile', [
            'id_admin' => $idAdmin,
            'data_admin' => $dataAdmin,
        ]);
    }
}
