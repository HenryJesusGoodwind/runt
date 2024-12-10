<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'nama_produk',
        'stok',
        'harga_produk',
        'jumlah'
    ];

    public function detailTransaksi()
    {
        return $this->hasMany(Detail_Transaksi::class, 'id_produk');
    }
}
