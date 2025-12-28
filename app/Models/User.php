<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
 
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nama_user', 'email', 'password', 'no_hp', 'alamat'
    ];

    protected $hidden = ['password'];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'id_user');
    }

    public function ktp()
    {
        return $this->hasOne(Ktp::class, 'id_user');
    }
}

