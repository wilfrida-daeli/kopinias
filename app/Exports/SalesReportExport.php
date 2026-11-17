<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\FromView;

class SalesReportExport implements FromView
{
    protected $from;
    protected $to;

    public function __construct($from = null, $to = null)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function view(): View
    {
        $rows = collect();
        if (Schema::hasTable('pesanan')) {
            $rows = DB::table('pesanan')
                ->when($this->from, fn($q) => $q->where('tanggal', '>=', $this->from))
                ->when($this->to, fn($q) => $q->where('tanggal', '<=', $this->to))
                ->orderByDesc('tanggal')
                ->get();
        }

        return view('admin.laporan.excel', [
            'rows' => $rows,
            'from' => $this->from,
            'to' => $this->to,
        ]);
    }
}