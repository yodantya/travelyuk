<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManajemenRute extends Model
{
    use HasFactory;
    protected $fillable = [
        'kota_asal',
        'kota_tujuan',
        'tanggal_berangkat',
        'jam_berangkat',
        'harga',
        'jumlah_kursi'
    ];

    public function pesanans()
    {
        return $this->hasMany(Pesanan::class, 'rute_id', 'id');
    }
}
