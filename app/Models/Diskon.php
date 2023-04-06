<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    use HasFactory;

    protected $table = 'diskon';
    protected $primaryKey = 'id_diskon';

    protected $fillable = ['id_diskon','value', 'nama_diskon', 'deskripsi', 'tgl_diskon', 'tgl_expired'];
    public $timestamps = false;
}
