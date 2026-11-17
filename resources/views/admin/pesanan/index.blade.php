@extends('admin.layout')

@section('title', 'Kelola Pesanan')
@section('section-title', 'Pesanan')
@section('page-title', 'Daftar Pesanan')

@section('content')
    <div class="overflow-hidden rounded-3xl border border-slate-200/10 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-slate-200 text-sm text-slate-700">
            <thead class="bg-slate-50 text-slate-500">
                <tr>
                    <th class="px-6 py-4 text-left">No Pesanan</th>
                    <th class="px-6 py-4 text-left">Nama Pembeli</th>
                    <th class="px-6 py-4 text-left">Tanggal</th>
                    <th class="px-6 py-4 text-left">Jumlah Produk</th>
                    <th class="px-6 py-4 text-left">Total Bayar</th>
                    <th class="px-6 py-4 text-left">Status</th>
                    <th class="px-6 py-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 bg-white">
                @forelse($orders as $o)
                    <tr>
                        <td class="px-6 py-4">{{ $o->id }}</td>
                        <td class="px-6 py-4">{{ $o->nama ?? $o->user_id ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $o->tanggal ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $o->jumlah_produk ?? '-' }}</td>
                        <td class="px-6 py-4">Rp{{ number_format($o->total ?? 0,0,',','.') }}</td>
                        <td class="px-6 py-4">{{ $o->status ?? 'Pending' }}</td>
                        <td class="px-6 py-4"><a href="{{ route('admin.pesanan.show', $o->id) }}" class="text-amber-500 hover:underline">Detail</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-10 text-center text-slate-400">Belum ada pesanan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection