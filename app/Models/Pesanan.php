<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PesananDetail;


class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';
    protected $primaryKey = 'id_pesanan';

    protected $fillable = [
        'id_user',
        'id_address',
        'total_harga',
        'status',
        'expired_at' // 🔥 WAJIB ADA
    ];
    protected $casts = [
        'expired_at' => 'datetime'
    ];

    /* RELASI USER */
    public function user()
    {
        return $this->belongsTo(User::class,'id_user','id_user');
    }

    /* RELASI DETAIL */
    public function detail()
    {
        return $this->hasMany(PesananDetail::class,'id_pesanan','id_pesanan');
    }
}
