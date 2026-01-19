<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_user',
        'penerima',
        'alamat_lengkap',
        'kelurahan',
        'kecamatan',
        'kode_pos',
        'telepon',
        'is_default'
    ];

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'id_user',
            'id_user'
        );
    }
}
