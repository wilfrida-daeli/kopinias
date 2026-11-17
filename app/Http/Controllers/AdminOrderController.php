<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Schema::hasTable('pesanan') ? DB::table('pesanan')->orderByDesc('tanggal')->get() : collect();

        return view('admin.pesanan.index', compact('orders'));
    }

    public function show($id)
    {
        if (! Schema::hasTable('pesanan')) {
            abort(404);
        }

        $order = DB::table('pesanan')->where('id', $id)->first();
        $details = Schema::hasTable('detail_pesanan') ? DB::table('detail_pesanan')->where('pesanan_id', $id)->get() : collect();

        return view('admin.pesanan.show', compact('order', 'details'));
    }

    public function cetak($id)
    {
        if (! Schema::hasTable('pesanan')) {
            abort(404);
        }

        $order = DB::table('pesanan')->where('id', $id)->first();
        $details = Schema::hasTable('detail_pesanan') ? DB::table('detail_pesanan')->where('pesanan_id', $id)->get() : collect();

        return view('admin.pesanan.cetak', compact('order', 'details'));
    }
}

