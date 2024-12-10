<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Pembelian</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold text-center mb-6">History Pembelian Produk</h1>

        <!-- Form Filter -->
        <form method="GET" action="{{ route('history') }}" class="flex gap-4 mb-6">
            <input 
                type="text" 
                name="name" 
                value="{{ $request['name'] ?? '' }}" 
                placeholder="Nama Produk" 
                class="p-2 border rounded w-1/3"
            />
            <input 
                type="number" 
                name="month" 
                value="{{ $request['month'] ?? '' }}" 
                placeholder="Bulan (1-12)" 
                class="p-2 border rounded w-1/3"
            />
            <input 
                type="number" 
                name="year" 
                value="{{ $request['year'] ?? '' }}" 
                placeholder="Tahun (YYYY)" 
                class="p-2 border rounded w-1/3"
            />
            <button 
                type="submit" 
                class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600"
            >
                Filter
            </button>
        </form>

        <!-- Tabel Data -->
        <div class="bg-white shadow-md rounded p-4">
            @if(count($data) > 0)
                <table class="table-auto w-full border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-200 p-2">Tanggal Transaksi</th>
                            <th class="border border-gray-200 p-2">Nama Produk</th>
                            <th class="border border-gray-200 p-2">Jumlah</th>
                            <th class="border border-gray-200 p-2">Harga Satuan</th>
                            <th class="border border-gray-200 p-2">Harga Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td class="border border-gray-200 p-2">{{ $item['tanggal_transaksi'] }}</td>
                                <td class="border border-gray-200 p-2">{{ $item['nama_produk'] }}</td>
                                <td class="border border-gray-200 p-2 text-center">{{ $item['jumlah'] }}</td>
                                <td class="border border-gray-200 p-2 text-right">
                                    Rp{{ number_format($item['harga_satuan'], 0, ',', '.') }}
                                </td>
                                <td class="border border-gray-200 p-2 text-right">
                                    Rp{{ number_format($item['harga_total'], 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center text-gray-500">Tidak ada data untuk filter yang dipilih.</p>
            @endif
        </div>
    </div>
</body>
</html>
