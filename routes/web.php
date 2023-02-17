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

Route::get('', [HomeController::class, 'index']);
Route::get('rooms', [RoomsController::class, 'index']);
Route::get('roomsedit', [RoomsController::class, 'edit']);
Route::get('rooms/reservasi/{id}', [RoomsController::class, 'reservasi']);
Route::get('admin-dashboard', [AdminController::class, 'index']);
Route::get('login', [AccountsController::class, 'login']);