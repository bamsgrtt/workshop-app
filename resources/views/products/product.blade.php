<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eLEKTRONIK - Detail Produk</title>
    <script src="https://jsdelivr.net"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    <div class="max-w-6xl mx-auto px-4 py-8">
   

        @foreach ($products as  $product)
        
       
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-white p-6 rounded-2xl shadow-sm">
            
            <!-- Kolom Kiri: Gambar Produk -->
            <div class="flex items-center justify-center bg-gray-100 rounded-xl p-4 min-h-[300px]">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="max-w-full h-auto object-contain rounded-lg">
                @else
                    <!-- Placeholder jika gambar kosong -->
                    <div class="text-center text-gray-400">
                        <span class="text-5xl">💻</span>
                        <p class="mt-2 text-sm">Tidak ada gambar</p>
                    </div>
                @endif
            </div>

            <!-- Kolom Kanan: Informasi Produk -->
            <div>
                <!-- Brand & Nama -->
                <span class="text-xs font-semibold tracking-wider text-blue-600 uppercase">{{ $product->brand }}</span>
                <h1 class="text-3xl font-bold text-gray-900 mt-1 mb-2">{{ $product->name }}</h1>
                
                <!-- Kategori & Stok -->
                <div class="flex items-center gap-3 mb-6">
                    <span class="bg-gray-200 text-gray-700 text-xs px-2.5 py-1 rounded-full font-medium">
                        {{ $product->category->name ?? 'Kategori Umum' }}
                    </span>
                    @if($product->stock > 0)
                        <span class="text-xs text-green-700 font-semibold bg-green-50 px-2.5 py-1 rounded-full">
                            Stok: {{ $product->stock }} unit
                        </span>
                    @else
                        <span class="text-xs text-red-700 font-semibold bg-red-50 px-2.5 py-1 rounded-full">
                            Stok Habis
                        </span>
                    @endif
                </div>

                <!-- Harga (Format Rupiah) -->
                <div class="bg-gray-50 p-4 rounded-xl mb-6">
                    <p class="text-sm text-gray-500">Harga</p>
                    <p class="text-3xl font-extrabold text-blue-600">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>
                </div>

                <!-- Deskripsi -->
                <div class="mb-6">
                    <h2 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-2">Deskripsi Produk</h2>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        {{ $product->description ?? 'Tidak ada deskripsi untuk produk ini.' }}
                    </p>
                </div>

                <!-- Spesifikasi Teknis (Hanya muncul jika kolom tidak kosong/nullable) -->
                @if($product->processor || $product->ram || $product->storage || $product->display || $product->graphics || $product->battery)
                <div class="border-t border-gray-100 pt-6">
                    <h2 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-3">Spesifikasi Teknis</h2>
                    
                    <div class="bg-gray-50 rounded-xl overflow-hidden text-sm">
                        <table class="w-full text-left border-collapse">
                            <tbody>
                                @if($product->processor)
                                <tr class="border-b border-gray-200/50">
                                    <td class="px-4 py-2.5 font-medium text-gray-500 w-1/3">Prosesor</td>
                                    <td class="px-4 py-2.5 text-gray-900">{{ $product->processor }}</td>
                                </tr>
                                @endif

                                @if($product->ram)
                                <tr class="border-b border-gray-200/50">
                                    <td class="px-4 py-2.5 font-medium text-gray-500">RAM</td>
                                    <td class="px-4 py-2.5 text-gray-900">{{ $product->ram }}</td>
                                </tr>
                                @endif

                                @if($product->storage)
                                <tr class="border-b border-gray-200/50">
                                    <td class="px-4 py-2.5 font-medium text-gray-500">Penyimpanan</td>
                                    <td class="px-4 py-2.5 text-gray-900">{{ $product->storage }}</td>
                                </tr>
                                @endif

                                @if($product->display)
                                <tr class="border-b border-gray-200/50">
                                    <td class="px-4 py-2.5 font-medium text-gray-500">Layar</td>
                                    <td class="px-4 py-2.5 text-gray-900">{{ $product->display }}</td>
                                </tr>
                                @endif

                                @if($product->graphics)
                                <tr class="border-b border-gray-200/50">
                                    <td class="px-4 py-2.5 font-medium text-gray-500">Kartu Grafis</td>
                                    <td class="px-4 py-2.5 text-gray-900">{{ $product->graphics }}</td>
                                </tr>
                                @endif

                                @if($product->battery)
                                <tr>
                                    <td class="px-4 py-2.5 font-medium text-gray-500">Baterai</td>
                                    <td class="px-4 py-2.5 text-gray-900">{{ $product->battery }}</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif

            </div>
        </div>
         @endforeach
    </div>

</body>
</html>
