<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipe_kamar extends Model
{
    protected $table = 'tipe_kamar';
    protected $primaryKey = 'id_tipe';
    use HasFactory;
}
