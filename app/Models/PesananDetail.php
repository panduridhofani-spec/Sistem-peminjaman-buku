<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    protected $table = 'pesanan_detail';

    protected $fillable = [
        'id_pesanan',
        'id_buku',
        'jumlah',
        'harga'
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class,'id_buku','id_buku');
    }

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class,'id_pesanan','id_pesanan');
    }
}
