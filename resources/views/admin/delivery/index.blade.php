@extends('admin.layout')

@section('title', 'Transaksi Delivery')
@section('section-title', 'Transaksi Delivery')
@section('page-title', 'Transaksi Delivery')

@section('content')
    <div class="grid gap-6 lg:grid-cols-3">
        <div class="rounded-3xl border border-slate-200/10 bg-white p-6 shadow-sm">
            <p class="text-sm text-slate-500">Pesanan Delivery</p>
            <p class="mt-4 text-3xl font-semibold text-slate-950">42</p>
        </div>
        <div class="rounded-3xl border border-slate-200/10 bg-white p-6 shadow-sm">
            <p class="text-sm text-slate-500">Pesanan Dalam Pengiriman</p>
            <p class="mt-4 text-3xl font-semibold text-slate-950">7</p>
        </div>
        <div class="rounded-3xl border border-slate-200/10 bg-white p-6 shadow-sm">
            <p class="text-sm text-slate-500">Pendapatan Delivery</p>
            <p class="mt-4 text-3xl font-semibold text-amber-500">Rp8.450.000</p>
        </div>
    </div>

    <div class="mt-8 overflow-hidden rounded-3xl border border-slate-200/10 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-slate-200 text-sm text-slate-700">
            <thead class="bg-slate-50 text-slate-500">
                <tr>
                    <th class="px-6 py-4 text-left">No Pesanan</th>
                    <th class="px-6 py-4 text-left">Nama</th>
                    <th class="px-6 py-4 text-left">Alamat</th>
                    <th class="px-6 py-4 text-left">Total</th>
                    <th class="px-6 py-4 text-left">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 bg-white">
                <tr>
                    <td class="px-6 py-4">#1024</td>
                    <td class="px-6 py-4">Nina</td>
                    <td class="px-6 py-4">Jl. Merdeka No. 19</td>
                    <td class="px-6 py-4">Rp145.000</td>
                    <td class="px-6 py-4 text-amber-600">Sedang Dikirim</td>
                </tr>
                <tr>
                    <td class="px-6 py-4">#1027</td>
                    <td class="px-6 py-4">Rudi</td>
                    <td class="px-6 py-4">Jl. Setia Budi No. 3</td>
                    <td class="px-6 py-4">Rp120.000</td>
                    <td class="px-6 py-4 text-emerald-600">Dikirim</td>
                </tr>
                <tr>
                    <td class="px-6 py-4">#1032</td>
                    <td class="px-6 py-4">Tika</td>
                    <td class="px-6 py-4">Jl. Sisingamangaraja 45</td>
                    <td class="px-6 py-4">Rp90.000</td>
                    <td class="px-6 py-4 text-slate-500">Menunggu Driver</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection