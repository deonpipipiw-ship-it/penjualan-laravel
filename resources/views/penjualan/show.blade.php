<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NusaKasir - Detail Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Detail Transaksi</h1>

        <div class="space-y-4">
            <div class="flex justify-between border-b pb-2">
                <span class="text-gray-600 font-semibold">Kode Transaksi:</span>
                <span class="text-gray-900 font-bold">{{ $penjualan->kode_transaksi }}</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="text-gray-600 font-semibold">Tanggal:</span>
                <span class="text-gray-900">{{ $penjualan->tanggal->format('d/m/Y') }}</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="text-gray-600 font-semibold">Nama Pelanggan:</span>
                <span class="text-gray-900">{{ $penjualan->nama_pelanggan }}</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="text-gray-600 font-semibold">Nama Produk:</span>
                <span class="text-gray-900">{{ $penjualan->nama_produk }}</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="text-gray-600 font-semibold">Jumlah:</span>
                <span class="text-gray-900">{{ $penjualan->jumlah }}</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="text-gray-600 font-semibold">Harga Satuan:</span>
                <span class="text-gray-900">Rp {{ number_format($penjualan->harga_satuan, 2, ',', '.') }}</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="text-gray-600 font-semibold">Total:</span>
                <span class="text-blue-600 font-bold text-lg">Rp {{ number_format($penjualan->total, 2, ',', '.') }}</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="text-gray-600 font-semibold">Status:</span>
                <span class="px-2 py-1 rounded text-xs font-semibold
                    {{ $penjualan->status == 'Selesai' ? 'bg-green-100 text-green-800' : ($penjualan->status == 'Pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                    {{ $penjualan->status }}
                </span>
            </div>
            <div class="border-b pb-2">
                <span class="text-gray-600 font-semibold block mb-1">Catatan:</span>
                <p class="text-gray-900 bg-gray-50 p-3 rounded">{{ $penjualan->catatan ?? '-' }}</p>
            </div>
        </div>

        <div class="mt-6 flex space-x-3">
            <a href="{{ route('penjualan.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
            <a href="{{ route('penjualan.edit', $penjualan->id) }}" class="bg-yellow-600 text-white px-4 py-2 rounded">Edit</a>
        </div>
    </div>
</body>
</html>
