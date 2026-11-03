<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NusaKasir - Data Penjualan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Daftar Transaksi NusaKasir</h1>
            <a href="{{ route('penjualan.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                + Tambah Transaksi
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4 p-4 bg-blue-50 border border-blue-200 rounded">
            <span class="text-gray-600 font-semibold">Total Omzet (Selesai):</span>
            <span class="text-xl font-bold text-blue-600">Rp {{ number_format($totalomzet, 2, ',', '.') }}</span>
        </div>

        <table class="w-full border-collapse border border-gray-200 text-left">
            <thead>
                <tr class="bg-gray-50 border-b">
                    <th class="p-3">Kode Transaksi</th>
                    <th class="p-3">Tanggal</th>
                    <th class="p-3">Pelanggan</th>
                    <th class="p-3">Produk</th>
                    <th class="p-3">Jumlah</th>
                    <th class="p-3">Total</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($penjualan as $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3 font-medium">{{ $item->kode_transaksi }}</td>
                        <td class="p-3">{{ $item->tanggal->format('d/m/Y') }}</td>
                        <td class="p-3">{{ $item->nama_pelanggan }}</td>
                        <td class="p-3">{{ $item->nama_produk }}</td>
                        <td class="p-3">{{ $item->jumlah }}</td>
                        <td class="p-3">Rp {{ number_format($item->total, 2, ',', '.') }}</td>
                        <td class="p-3">
                            <span class="px-2 py-1 rounded text-xs font-semibold
                                {{ $item->status == 'Selesai' ? 'bg-green-100 text-green-800' : ($item->status == 'Pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td class="p-3 flex space-x-2">
                            <a href="{{ route('penjualan.show', $item->id) }}" class="text-blue-600 hover:underline">Detail</a>
                            <a href="{{ route('penjualan.edit', $item->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                            <form action="{{ route('penjualan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="p-4 text-center text-gray-500">Belum ada data transaksi.</td>
                    </tr>
                @endempty
            </tbody>
        </table>
    </div>
</body>
</html>
