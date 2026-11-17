@extends('admin.layout')

@section('title', 'Kelola Produk')
@section('section-title', 'Produk')
@section('page-title', 'Kelola Produk')

@section('content')
    <div class="mb-6 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <p class="text-sm text-slate-500">Daftar produk yang tersedia di toko.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="inline-flex items-center rounded-full bg-amber-500 px-5 py-3 text-sm font-semibold text-black transition hover:bg-amber-400">Tambah Produk</a>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-3xl border border-emerald-200 bg-emerald-50 p-4 text-slate-800">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-3xl border border-slate-200/10 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-slate-200 text-sm text-slate-700">
            <thead class="bg-slate-50 text-slate-500">
                <tr>
                    <th class="px-6 py-4 text-left">ID</th>
                    <th class="px-6 py-4 text-left">Nama Produk</th>
                    <th class="px-6 py-4 text-left">Kategori</th>
                    <th class="px-6 py-4 text-left">Harga</th>
                    <th class="px-6 py-4 text-left">Stok</th>
                    <th class="px-6 py-4 text-left">Gambar</th>
                        <th class="px-6 py-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 bg-white">
                @forelse($products as $product)
                    <tr>
                        <td class="px-6 py-4">{{ $product->id }}</td>
                        <td class="px-6 py-4 font-semibold text-slate-900">{{ $product->nama_produk }}</td>
                        <td class="px-6 py-4 text-slate-500">{{ $product->kategori ?? '-' }}</td>
                        <td class="px-6 py-4 text-amber-500">Rp{{ number_format($product->harga, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 text-slate-500">{{ $product->stok }}</td>
                        <td class="px-6 py-4">
                            @if($product->gambar)
                                <img src="{{ asset($product->gambar) }}" alt="{{ $product->nama_produk }}" class="h-16 w-16 rounded-2xl object-cover" />
                            @else
                                <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs text-slate-500">Tidak ada</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="rounded-full border border-amber-500 px-3 py-1 text-sm text-amber-500 hover:bg-amber-50">Edit</a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Hapus produk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-full bg-rose-500 px-3 py-1 text-sm text-white hover:bg-rose-600">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-slate-400">Belum ada produk. Silakan tambahkan produk baru.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection