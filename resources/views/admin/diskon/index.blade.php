@extends('admin.layout')

@section('title', 'Diskon')
@section('section-title', 'Diskon')
@section('page-title', 'Kelola Diskon')

@section('content')
    <div class="grid gap-6 lg:grid-cols-2">
        <div class="rounded-3xl border border-slate-200/10 bg-white p-6 shadow-sm">
            <p class="text-sm text-slate-500">Promosi saat ini</p>
            <h2 class="mt-3 text-2xl font-semibold text-slate-950">Diskon Spesial Minggu Ini</h2>
            <p class="mt-4 text-slate-600">Kelola potongan harga, kupon, dan paket promo yang tersedia untuk pelanggan.</p>
        </div>
        <div class="rounded-3xl border border-slate-200/10 bg-white p-6 shadow-sm">
            <p class="text-sm text-slate-500">Ringkasan diskon</p>
            <div class="mt-4 space-y-3">
                <div class="rounded-3xl bg-slate-50 p-4">
                    <p class="text-sm text-slate-500">Diskon Aktif</p>
                    <p class="mt-2 text-xl font-semibold text-slate-950">3 Promo</p>
                </div>
                <div class="rounded-3xl bg-slate-50 p-4">
                    <p class="text-sm text-slate-500">Total Penggunaan</p>
                    <p class="mt-2 text-xl font-semibold text-slate-950">1.248</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 overflow-hidden rounded-3xl border border-slate-200/10 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-slate-200 text-sm text-slate-700">
            <thead class="bg-slate-50 text-slate-500">
                <tr>
                    <th class="px-6 py-4 text-left">Kode Diskon</th>
                    <th class="px-6 py-4 text-left">Persen</th>
                    <th class="px-6 py-4 text-left">Status</th>
                    <th class="px-6 py-4 text-left">Kedaluwarsa</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 bg-white">
                <tr>
                    <td class="px-6 py-4 font-semibold text-slate-900">COFFEE20</td>
                    <td class="px-6 py-4 text-amber-500">20%</td>
                    <td class="px-6 py-4 text-emerald-600">Aktif</td>
                    <td class="px-6 py-4">31 Jul 2026</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 font-semibold text-slate-900">TAKEAWAY15</td>
                    <td class="px-6 py-4 text-amber-500">15%</td>
                    <td class="px-6 py-4 text-slate-500">Berakhir</td>
                    <td class="px-6 py-4">12 Jun 2026</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 font-semibold text-slate-900">DELIVERY10</td>
                    <td class="px-6 py-4 text-amber-500">10%</td>
                    <td class="px-6 py-4 text-emerald-600">Aktif</td>
                    <td class="px-6 py-4">05 Jul 2026</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection