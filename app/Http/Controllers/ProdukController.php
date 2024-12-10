<?php

namespace App\Http\Controllers;

use App\Models\Detail_Transaksi;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function topProducts(Request $request)
    {
        $year = $request->input('year', date('Y'));

        $topProducts = Detail_Transaksi::with('produk')
            ->selectRaw('id_produk, SUM(jumlah) as total_jumlah, SUM(jumlah * harga_satuan) as total_uang')
            ->whereHas('transaksi', function ($query) use ($year) {
                $query->whereYear('tgl_transaksi', $year);
            })
            ->groupBy('id_produk')
            ->orderByDesc('total_jumlah')
            ->take(5)
            ->get();

        return view('top_products', [
            'topProducts' => $topProducts,
            'year' => $year,
        ]);
    }
}
