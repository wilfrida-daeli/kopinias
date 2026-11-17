@extends('admin.layout')

@section('title', 'Tambah Produk')
@section('section-title', 'Produk')
@section('page-title', 'Tambah Produk Baru')

@section('content')
    <div class="mb-6 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <p class="text-sm text-slate-500">Isi form untuk menambahkan barang baru ke katalog.</p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="inline-flex items-center rounded-full border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-50">Kembali ke Daftar</a>
    </div>

    @if($errors->any())
        <div class="mb-6 rounded-3xl border border-red-200 bg-red-50 p-4 text-sm text-slate-800">
            <p class="font-semibold">Terjadi kesalahan:</p>
            <ul class="mt-3 list-disc space-y-1 pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="rounded-3xl border border-slate-200/10 bg-white p-6 shadow-sm">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">Nama Produk</label>
                <input type="text" name="nama_produk" value="{{ old('nama_produk') }}" class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 outline-none transition focus:border-amber-400" />
            </div>
            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">Kategori</label>
                <input type="text" name="kategori" value="{{ old('kategori') }}" class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 outline-none transition focus:border-amber-400" />
            </div>
            <div class="grid gap-6 lg:grid-cols-2">
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Harga</label>
                    <input type="number" name="harga" value="{{ old('harga') }}" class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 outline-none transition focus:border-amber-400" />
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Stok</label>
                    <input type="number" name="stok" value="{{ old('stok') }}" class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 outline-none transition focus:border-amber-400" />
                </div>
            </div>
            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">Deskripsi</label>
                <textarea name="deskripsi" rows="4" class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 outline-none transition focus:border-amber-400">{{ old('deskripsi') }}</textarea>
            </div>
            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">Upload Gambar</label>
                <input type="file" name="gambar" accept="image/png,image/jpeg,image/jpg" class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 outline-none transition focus:border-amber-400" />
                <p class="mt-2 text-sm text-slate-500">Format JPG, PNG, JPEG. Maksimal 2MB.</p>
            </div>
            <button type="submit" class="inline-flex items-center justify-center rounded-full bg-amber-500 px-6 py-3 text-sm font-semibold text-black transition hover:bg-amber-400">Simpan Produk</button>
        </form>
    </div>
@endsection