<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    
    protected $table = 'reservasi';
    protected $primaryKey = 'id_rsv';
    public $timestamps = false;

    protected $fillable = ['id_tamu','booking_code'];
}
