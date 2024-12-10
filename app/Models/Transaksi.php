<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'tgl_transaksi',
        'total_harga',
    ];

    public function transaksiProduk()
    {
        return $this->hasMany(Detail_Transaksi::class, 'id_transaksi');
    }
}
