<?php

namespace App\Http\Controllers;

use App\Models\Detail_Transaksi;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{

    public function beliProduk()
    {
        $produk = Produk::all();
        return view('beli_produk', ['produk' => $produk]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|exists:produk,id_produk',
            'jumlah' => 'required|integer|min:1',
        ]);

        $produk = Produk::findOrFail($request->id_produk);

        if ($request->jumlah > $produk->stok) {
            return redirect()->back()->withErrors(['stok' => 'Stok tidak mencukupi.']);
        }

        $hargaTotal = $produk->harga_produk * $request->jumlah;


        $transaksi = Transaksi::create([
            'tgl_transaksi' => now(),
            'total_harga' => $hargaTotal,
        ]);


        Detail_Transaksi::create([
            'id_transaksi' => $transaksi->id,
            'id_produk' => $produk->id_produk,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $produk->harga_produk,
        ]);

        $produk->stok -= $request->jumlah;
        $produk->save();

        return redirect()->route('beli_produk')->with('success', 'Pembelian berhasil dicatat!');
    }
    public function history(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');
        $name = $request->input('name');

        $query = Detail_Transaksi::with(['produk', 'transaksi']);

        if ($month) {
            $query->whereHas('transaksi', function ($q) use ($month) {
                $q->whereMonth('tgl_transaksi', $month);
            });
        }

        if ($year) {
            $query->whereHas('transaksi', function ($q) use ($year) {
                $q->whereYear('tgl_transaksi', $year);
            });
        }

        if ($name) {
            $query->whereHas('produk', function ($q) use ($name) {
                $q->where('nama_produk', 'LIKE', "%$name%");
            });
        }

        $data = $query->get()->map(function ($detail) {
            return [
                'tanggal_transaksi' => $detail->transaksi->tgl_transaksi,
                'nama_produk' => $detail->produk->nama_produk,
                'jumlah' => $detail->jumlah,
                'harga_satuan' => $detail->harga_satuan,
                'harga_total' => $detail->jumlah * $detail->harga_satuan,
            ];
        });

        return view('history', [
            'data' => $data,
            'request' => $request->all(),
        ]);
    }

}
