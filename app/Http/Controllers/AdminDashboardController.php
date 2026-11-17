<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalProduk = Schema::hasTable('produk') ? DB::table('produk')->count() : 0;
        $totalPesanan = Schema::hasTable('pesanan') ? DB::table('pesanan')->count() : 0;
        $totalUser = Schema::hasTable('users') ? DB::table('users')->count() : 0;
        $totalTestimoni = Schema::hasTable('testimoni') ? DB::table('testimoni')->count() : 0;

        // Total penjualan hari ini (if pesanan table has 'total' and 'tanggal')
        $today = now()->toDateString();
        $totalPenjualanHariIni = 0;
        if (Schema::hasTable('pesanan')) {
            try {
                $totalPenjualanHariIni = DB::table('pesanan')->where('tanggal', $today)->sum('total');
            } catch (\Throwable $e) {
                $totalPenjualanHariIni = 0;
            }
        }

        // Produk terlaris (if detail_pesanan exists)
        $produkTerlaris = [];
        if (Schema::hasTable('detail_pesanan')) {
            try {
                $produkTerlaris = DB::table('detail_pesanan')
                    ->select('produk_id', DB::raw('SUM(qty) as total_qty'))
                    ->groupBy('produk_id')
                    ->orderByDesc('total_qty')
                    ->limit(5)
                    ->get();
            } catch (\Throwable $e) {
                $produkTerlaris = [];
            }
        }

        // Pesanan terbaru
        $pesananTerbaru = [];
        if (Schema::hasTable('pesanan')) {
            try {
                $pesananTerbaru = DB::table('pesanan')->orderByDesc('tanggal')->limit(5)->get();
            } catch (\Throwable $e) {
                $pesananTerbaru = [];
            }
        }

        // Grafik penjualan bulanan: build last 6 months labels and sums if possible
        $labels = [];
        $data = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i)->format('Y-m');
            $labels[] = now()->subMonths($i)->format('M Y');
            if (Schema::hasTable('pesanan')) {
                try {
                    $sum = DB::table('pesanan')
                        ->whereRaw("DATE_FORMAT(tanggal, '%Y-%m') = ?", [$month])
                        ->sum('total');
                } catch (\Throwable $e) {
                    $sum = 0;
                }
            } else {
                $sum = 0;
            }
            $data[] = $sum;
        }

        return view('admin.dashboard', compact(
            'totalProduk', 'totalPesanan', 'totalUser', 'totalTestimoni', 'totalPenjualanHariIni',
            'produkTerlaris', 'pesananTerbaru', 'labels', 'data'
        ));
    }

    public function salesData(Request $request)
    {
        $labels = [];
        $data = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i)->format('Y-m');
            $labels[] = now()->subMonths($i)->format('M Y');
            if (Schema::hasTable('pesanan')) {
                try {
                    $sum = DB::table('pesanan')
                        ->whereRaw("DATE_FORMAT(tanggal, '%Y-%m') = ?", [$month])
                        ->sum('total');
                } catch (\Throwable $e) {
                    $sum = 0;
                }
            } else {
                $sum = 0;
            }
            $data[] = (float) $sum;
        }

        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);
    }
}
