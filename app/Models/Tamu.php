<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Tamu extends Authenticatable
{
    use HasFactory, Notifiable;
    
    protected $table = 'tamu';
    protected $primaryKey = 'id_tamu';
    public $timestamps = false;

    protected $fillable = ['username','password','email','nama','tgl_lahir','gender','alamat','no_telp'];
}
