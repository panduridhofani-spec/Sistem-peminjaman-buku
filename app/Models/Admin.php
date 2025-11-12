<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'id_admin';

    protected $fillable = ['nama_admin', 'username', 'password'];

    protected $hidden = ['password'];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'id_admin');
    }
}
