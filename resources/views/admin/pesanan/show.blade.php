@extends('admin.layout')

@section('title', 'Detail Pesanan')
@section('section-title', 'Pesanan')
@section('page-title', 'Detail Pesanan #' . ($order->id ?? ''))

@section('content')
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-sm text-slate-500">Informasi lengkap pesanan dan detail produk.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.pesanan.index') }}" class="inline-flex items-center rounded-full border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Kembali ke Pesanan</a>
            <a href="{{ route('admin.pesanan.cetak', $order->id) }}" target="_blank" rel="noopener" class="inline-flex items-center rounded-full bg-amber-500 px-4 py-2 text-sm font-semibold text-black hover:bg-amber-400">Cetak Struk</a>
        </div>
            <div>
                <p class="text-sm text-slate-500">Nama</p>
                <p class="mt-2 font-semibold text-slate-900">{{ $order->nama ?? '-' }}</p>
            </div>
            <div>
                <p class="text-sm text-slate-500">Nomor HP</p>
                <p class="mt-2 font-semibold text-slate-900">{{ $order->nomor_hp ?? '-' }}</p>
            </div>
            <div>
                <p class="text-sm text-slate-500">Tanggal</p>
                <p class="mt-2 font-semibold text-slate-900">{{ $order->tanggal ?? '-' }}</p>
            </div>
        </div>

        <div class="mt-6 rounded-3xl bg-slate-50 p-5">
            <p class="text-sm text-slate-500">Alamat</p>
            <p class="mt-2 text-slate-900">{{ $order->alamat ?? '-' }}</p>
        </div>

        <div class="mt-6">
            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-slate-500">Daftar Produk</p>
            <ul class="mt-4 space-y-3">
                @forelse($details as $d)
                    <li class="rounded-3xl border border-slate-200/80 bg-white p-4 shadow-sm">
                        <div class="flex flex-wrap items-center justify-between gap-3 text-slate-700">
                            <span class="font-semibold">Produk ID: {{ $d->produk_id }}</span>
                            <span class="text-amber-500">Qty: {{ $d->qty }}</span>
                        </div>
                        <p class="mt-2 text-slate-500">Subtotal: Rp{{ number_format($d->subtotal ?? 0,0,',','.') }}</p>
                    </li>
                @empty
                    <li class="text-slate-400">Tidak ada detail pesanan.</li>
                @endforelse
            </ul>
        </div>

        <div class="mt-6 rounded-3xl border border-slate-200/10 bg-slate-50 p-5">
            <p class="text-sm text-slate-500">Total Bayar</p>
            <p class="mt-2 text-3xl font-semibold text-slate-950">Rp{{ number_format($order->total ?? 0,0,',','.') }}</p>
        </div>
    </div>
@endsection
