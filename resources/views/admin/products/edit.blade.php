@extends('admin.layout')

@section('title', 'Edit Produk')
@section('section-title', 'Produk')
@section('page-title', 'Edit Produk')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.products.index') }}" class="inline-flex items-center rounded-full border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700">Kembali</a>
    </div>

    <div class="rounded-3xl border border-slate-200/10 bg-white p-6 shadow-sm">
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm text-slate-700">Nama Produk</label>
                <input type="text" name="nama_produk" value="{{ old('nama_produk', $product->nama_produk) }}" class="mt-2 w-full rounded-md border px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm text-slate-700">Kategori</label>
                <input type="text" name="kategori" value="{{ old('kategori', $product->kategori) }}" class="mt-2 w-full rounded-md border px-3 py-2">
            </div>

            <div class="grid gap-4 sm:grid-cols-3">
                <div>
                    <label class="block text-sm text-slate-700">Harga</label>
                    <input type="number" name="harga" value="{{ old('harga', $product->harga) }}" class="mt-2 w-full rounded-md border px-3 py-2" required>
                </div>
                <div>
                    <label class="block text-sm text-slate-700">Stok</label>
                    <input type="number" name="stok" value="{{ old('stok', $product->stok) }}" class="mt-2 w-full rounded-md border px-3 py-2" required>
                </div>
                <div>
                    <label class="block text-sm text-slate-700">Gambar</label>
                    <input type="file" name="gambar" class="mt-2 w-full rounded-md border px-3 py-2">
                    @if($product->gambar)
                        <img src="{{ asset($product->gambar) }}" alt="current" class="mt-3 h-24 w-24 rounded-md object-cover" />
                    @endif
                </div>
            </div>

            <div>
                <label class="block text-sm text-slate-700">Deskripsi</label>
                <textarea name="deskripsi" rows="4" class="mt-2 w-full rounded-md border px-3 py-2">{{ old('deskripsi', $product->deskripsi) }}</textarea>
            </div>

            <div class="flex items-center gap-3">
                <button class="rounded-full bg-amber-500 px-5 py-2 text-sm font-semibold text-black">Simpan Perubahan</button>
                <a href="{{ route('admin.products.index') }}" class="text-sm text-slate-500 hover:underline">Batal</a>
            </div>
        </form>
    </div>
@endsection
