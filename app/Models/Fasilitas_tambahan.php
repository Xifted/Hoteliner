<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas_tambahan extends Model
{
    use HasFactory;

    protected $table = 'fasilitas_tambahan';

    protected $primaryKey = 'id_fasilitas';
}
