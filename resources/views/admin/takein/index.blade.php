@extends('admin.layout')

@section('title', 'Transaksi Take In')
@section('section-title', 'Transaksi Take In')
@section('page-title', 'Transaksi Take In')

@section('content')
    <div class="grid gap-6 lg:grid-cols-3">
        <div class="rounded-3xl border border-slate-200/10 bg-white p-6 shadow-sm">
            <p class="text-sm text-slate-500">Pesanan Take In</p>
            <p class="mt-4 text-3xl font-semibold text-slate-950">28</p>
        </div>
        <div class="rounded-3xl border border-slate-200/10 bg-white p-6 shadow-sm">
            <p class="text-sm text-slate-500">Pesanan Diproses</p>
            <p class="mt-4 text-3xl font-semibold text-slate-950">12</p>
        </div>
        <div class="rounded-3xl border border-slate-200/10 bg-white p-6 shadow-sm">
            <p class="text-sm text-slate-500">Pendapatan Take In</p>
            <p class="mt-4 text-3xl font-semibold text-amber-500">Rp6.750.000</p>
        </div>
    </div>

    <div class="mt-8 overflow-hidden rounded-3xl border border-slate-200/10 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-slate-200 text-sm text-slate-700">
            <thead class="bg-slate-50 text-slate-500">
                <tr>
                    <th class="px-6 py-4 text-left">No Pesanan</th>
                    <th class="px-6 py-4 text-left">Nama</th>
                    <th class="px-6 py-4 text-left">Waktu Order</th>
                    <th class="px-6 py-4 text-left">Total</th>
                    <th class="px-6 py-4 text-left">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 bg-white">
                <tr>
                    <td class="px-6 py-4">#2078</td>
                    <td class="px-6 py-4">Bambang Ahmad</td>
                    <td class="px-6 py-4">2022-06-14 18:58:50</td>
                    <td class="px-6 py-4">Rp52.250</td>
                    <td class="px-6 py-4 text-slate-500">Menunggu</td>
                </tr>
                <tr>
                    <td class="px-6 py-4">#2080</td>
                    <td class="px-6 py-4">Lita Pujianti</td>
                    <td class="px-6 py-4">2022-07-04 14:33:59</td>
                    <td class="px-6 py-4">Rp15.000</td>
                    <td class="px-6 py-4 text-emerald-600">Selesai</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection