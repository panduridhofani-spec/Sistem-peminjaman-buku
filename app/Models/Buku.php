<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $primaryKey = 'id_buku';

    protected $fillable = [
        'judul', 'penulis', 'penerbit', 'kategori', 'stok', 'gambar'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'id_buku');
    }
}
