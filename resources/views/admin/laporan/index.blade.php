@extends('admin.layout')

@section('title', 'Laporan Penjualan')
@section('section-title', 'Laporan')
@section('page-title', 'Laporan Penjualan')

@section('content')
    <form method="GET" class="grid gap-4 md:grid-cols-[1.4fr_1.4fr_0.8fr]">
        <div>
            <label class="text-sm font-medium text-slate-600">Tanggal Awal</label>
            <input type="date" name="from" value="{{ $from ?? '' }}" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 outline-none transition focus:border-amber-400" />
        </div>
        <div>
            <label class="text-sm font-medium text-slate-600">Tanggal Akhir</label>
            <input type="date" name="to" value="{{ $to ?? '' }}" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 outline-none transition focus:border-amber-400" />
        </div>
        <div class="flex items-end">
            <button class="w-full rounded-3xl bg-amber-500 px-6 py-3 text-sm font-semibold text-black transition hover:bg-amber-400">Filter</button>
        </div>
    </form>

    <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-end">
        <a href="{{ route('admin.laporan.export_pdf', ['from' => $from, 'to' => $to]) }}" class="inline-flex items-center rounded-full border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Download PDF</a>
        <a href="{{ route('admin.laporan.export_excel', ['from' => $from, 'to' => $to]) }}" class="inline-flex items-center rounded-full bg-amber-500 px-5 py-3 text-sm font-semibold text-black transition hover:bg-amber-400">Download Excel</a>
    </div>

    <div class="mt-8 grid gap-6 lg:grid-cols-3">
        <div class="rounded-3xl border border-slate-200/10 bg-white p-6 shadow-sm">
            <p class="text-sm text-slate-500">Total Transaksi</p>
            <p class="mt-4 text-3xl font-semibold text-slate-950">{{ $totalTransactions }}</p>
        </div>
        <div class="rounded-3xl border border-slate-200/10 bg-white p-6 shadow-sm">
            <p class="text-sm text-slate-500">Total Produk Terjual</p>
            <p class="mt-4 text-3xl font-semibold text-slate-950">{{ $totalProductsSold }}</p>
        </div>
        <div class="rounded-3xl border border-slate-200/10 bg-white p-6 shadow-sm">
            <p class="text-sm text-slate-500">Total Pendapatan</p>
            <p class="mt-4 text-3xl font-semibold text-slate-950">Rp{{ number_format($totalRevenue,0,',','.') }}</p>
        </div>
    </div>

    <div class="mt-8 overflow-hidden rounded-3xl border border-slate-200/10 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-slate-200 text-sm text-slate-700">
            <thead class="bg-slate-50 text-slate-500">
                <tr>
                    <th class="px-6 py-4 text-left">Tanggal</th>
                    <th class="px-6 py-4 text-left">No Pesanan</th>
                    <th class="px-6 py-4 text-left">Pembeli</th>
                    <th class="px-6 py-4 text-left">Total</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 bg-white">
                @if (Schema::hasTable('pesanan'))
                    @php
                        $rows = DB::table('pesanan')
                            ->when($from, function($q) use($from) { return $q->where('tanggal', '>=', $from); })
                            ->when($to, function($q) use($to) { return $q->where('tanggal', '<=', $to); })
                            ->get();
                    @endphp
                    @forelse($rows as $r)
                        <tr>
                            <td class="px-6 py-4">{{ $r->tanggal }}</td>
                            <td class="px-6 py-4">{{ $r->id }}</td>
                            <td class="px-6 py-4">{{ $r->nama ?? '-' }}</td>
                            <td class="px-6 py-4">Rp{{ number_format($r->total ?? 0,0,',','.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-slate-400">Tidak ada data.</td>
                        </tr>
                    @endforelse
                @else
                    <tr>
                        <td colspan="4" class="px-6 py-10 text-center text-slate-400">Tabel `pesanan` tidak tersedia.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
