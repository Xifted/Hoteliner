<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//acc
Route::get('login', [AccountsController::class, 'login'])->name('login');
Route::post('actionlogin', [AccountsController::class, 'actionlogin'])->name('actionlogin');
Route::get('register', [AccountsController::class, 'register'])->name('register');
Route::post('register/action', [AccountsController::class, 'actionregister'])->name('actionregister');
Route::get('datadiri', [AccountsController::class, 'datadiri'])->name('datadiri');
Route::post('datadiri/action', [AccountsController::class, 'actiondatadiri'])->name('actiondatadiri');
Route::get('logout', [AccountsController::class, 'actionlogout'])->name('actionlogout');

//tamu
Route::get('', [HomeController::class, 'index']);
Route::get('rooms', [RoomsController::class, 'index']);
Route::get('rooms/reservasi/{id}', [RoomsController::class, 'reservasi'])->middleware('auth');


//admin
Route::get('admin-dashboard', [AdminController::class, 'index']);
Route::get('roomsedit', [RoomsController::class, 'edit']);