<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top 5 Best-Selling Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold text-center mb-6">Top 5 Best-Selling Products</h1>

        <form method="GET" action="{{ route('top_products') }}" class="flex justify-center gap-4 mb-6">
            <input 
                type="number" 
                name="year" 
                value="{{ $year }}" 
                placeholder="Year (YYYY)" 
                class="p-2 border rounded"
            />
            <button 
                type="submit" 
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
            >
                Filter
            </button>
        </form>

        <div class="bg-white shadow-md rounded p-4">
            @if(count($topProducts) > 0)
                <table class="table-auto w-full border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-200 p-2">Nama Produk</th>
                            <th class="border border-gray-200 p-2">Jumlah Terjual</th>
                            <th class="border border-gray-200 p-2">Total Pendapatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($topProducts as $product)
                            <tr>
                                <td class="border border-gray-200 p-2">{{ $product->produk->nama_produk }}</td>
                                <td class="border border-gray-200 p-2 text-center">{{ $product->total_jumlah }}</td>
                                <td class="border border-gray-200 p-2 text-right">
                                    Rp{{ number_format($product->total_uang, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center text-gray-500">No data available for the selected year.</p>
            @endif
        </div>
    </div>
</body>
</html>
