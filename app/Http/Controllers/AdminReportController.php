<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AdminReportController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');

        $query = Schema::hasTable('pesanan') ? DB::table('pesanan') : null;

        $totalTransactions = 0;
        $totalProductsSold = 0;
        $totalRevenue = 0;

        if ($query) {
            if ($from) {
                $query = $query->where('tanggal', '>=', $from);
            }
            if ($to) {
                $query = $query->where('tanggal', '<=', $to);
            }

            $totalTransactions = (clone $query)->count();
            $totalRevenue = (clone $query)->sum('total');
            if (Schema::hasTable('detail_pesanan')) {
                $totalProductsSold = DB::table('detail_pesanan')->whereBetween('created_at', [$from ?? '1970-01-01', $to ?? now()->toDateString()])->sum('qty');
            }
        }

        return view('admin.laporan.index', compact('totalTransactions', 'totalProductsSold', 'totalRevenue', 'from', 'to'));
    }

    public function exportPdf(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $rows = $this->buildRows($from, $to);
        $totalTransactions = $rows->count();
        $totalRevenue = $rows->sum('total');
        $totalProductsSold = Schema::hasTable('detail_pesanan') ? DB::table('detail_pesanan')->whereBetween('created_at', [$from ?? '1970-01-01', $to ?? now()->toDateString()])->sum('qty') : 0;
        
        // Render view ke HTML string
        $html = View::make('admin.laporan.pdf', compact('rows', 'totalTransactions', 'totalRevenue', 'totalProductsSold', 'from', 'to'))->render();
        
        // Return sebagai download dengan header attachment
        $filename = 'laporan-penjualan-' . now()->format('YmdHis') . '.html';
        return response($html, 200, [
            'Content-Type' => 'text/html; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename=' . $filename,
        ]);
    }

    public function exportExcel(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $rows = $this->buildRows($from, $to);
            $filename = 'laporan-penjualan-' . now()->format('YmdHis') . '.csv';
            $csv = $this->buildCsv($rows);
            return response($csv, 200, [
                'Content-Type' => 'text/csv; charset=UTF-8',
                'Content-Disposition' => 'attachment; filename=' . $filename,
            ]);
    }

    protected function buildRows($from, $to)
    {
        if (! Schema::hasTable('pesanan')) {
            return collect();
        }

        return DB::table('pesanan')
            ->when($from, fn($q) => $q->where('tanggal', '>=', $from))
            ->when($to, fn($q) => $q->where('tanggal', '<=', $to))
            ->orderByDesc('tanggal')
            ->get();
    }

    protected function buildCsv($rows)
    {
        $headers = ['Tanggal', 'No Pesanan', 'Pembeli', 'Total'];
        $csv = implode(',', $headers) . "\n";
        foreach ($rows as $row) {
            $csv .= sprintf("%s,%s,%s,%s\n",
                $row->tanggal,
                $row->id,
                '"' . str_replace('"', '""', ($row->nama ?? '-')) . '"',
                $row->total
            );
        }
        return $csv;
    }
}
