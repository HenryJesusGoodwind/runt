<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beli Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold text-center mb-6">Beli Produk</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white shadow-md rounded p-6">
            <form action="{{ route('transaksi.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="id_produk" class="block text-sm font-medium text-gray-700">Pilih Produk</label>
                    <select name="id_produk" id="id_produk" class="mt-1 block w-full p-2 border border-gray-300 rounded">
                        <option value="">-- Pilih Produk --</option>
                        @foreach($produk as $item)
                            <option value="{{ $item->id_produk }}">
                                {{ $item->nama_produk }} - Rp{{ number_format($item->harga_produk, 0, ',', '.') }} (Stok: {{ $item->stok }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah</label>
                    <input
                        type="number"
                        name="jumlah"
                        id="jumlah"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded"
                        min="1"
                    />
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Beli
                </button>
            </form>
        </div>
    </div>
</body>
</html>
