<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ktp extends Model
{
    use HasFactory;

    protected $table = 'ktp';
    protected $primaryKey = 'no_ktp';
    public $incrementing = false;

    protected $fillable = [
        'no_ktp', 'nama_user', 'alamat', 'status_validasi', 'id_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
