<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;

    protected $table = 'tamu';
    public $timestamps = false;

    protected $fillable = ['id_akun','nama','tgl_lahir','alamat','no_telp'];
}
