<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Akun extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'akun';
    protected $primaryKey = 'id_user';
    public $timestamps = false;

    protected $fillable = ['username','password','email'];
}
