<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjang';

    protected $primaryKey = 'id_keranjang';

    protected $fillable = [
        'id_user',
        'id_buku',
        'jumlah_buku',
        'durasi',
        'tanggal_mulai',
        'tanggal_selesai',
        'harga_total',
        'status'
    ];

    public $timestamps = false;

    // RELASI BUKU
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku', 'id_buku');
    }
}
