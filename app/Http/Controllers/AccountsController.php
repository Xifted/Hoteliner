<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;

class AccountsController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/');
        } else {
            return view('tamu.login');
        }
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ];


        if (Auth::Attempt($data)) {
            return redirect()->intended('/');
        } else {
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/login');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function register()
    {
        return view('tamu.register.register');
    }

    public function actionregister(Request $request)
    {
        $akun = Tamu::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email
        ]);
        
        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('/login');
    }

    public function datadiri()
    {
        if (Auth::check()) {
            return view('tamu.register.datadiri');
        } else {
            return redirect('/login');
        }
    }

    public function actiondatadiri(Request $request)
    {
        $id_akun = Auth::user()->id_tamu;
        // return var_dump($id_akun);
        $tamu = DB::table('tamu')
            ->where('id_tamu', '=', $id_akun)
            ->update([
                'nama' => $request->nama,
                'tgl_lahir' => $request->tgl_lahir,
                'gender' => $request->gender,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp
            ]);
        
        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('/login');
    }

    public function loginAdmin()
    {
        if (Auth::check()) {
            return redirect('/admin-dashboard');
        } else {
            return view('admin.adminlogin');
        }
    }

    public function actionLoginAdmin(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ];
        // return dd($data);


        if (Auth::guard('admin')->attempt($data)) {
            return redirect('/admin-dashboard');
        } else {
            return back()->withErrors([
                'username' => 'Username atau password salah.',
            ]);
        }
    }

    public function logoutAdmin()
    {
        Auth::logout();
        return redirect('/admin-dashboard/login');
    }
}
