<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ManajemenRute;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rute_id',
        'jumlah_penumpang',
        'nama_penumpang',
        'no_hp',
        'total_harga',
        'status_pembayaran',
        'bukti_pembayaran',
        'kode_invoice'
    ];

    public function rute()
{
    return $this->belongsTo(ManajemenRute::class, 'rute_id');
}
}
