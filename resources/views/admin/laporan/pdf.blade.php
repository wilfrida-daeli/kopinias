<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Penjualan</title>
    <style>
        body { font-family: sans-serif; color: #222; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h1 { margin: 0; }
        .summary { margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; font-size: 12px; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background: #f3f3f3; }
        .text-right { text-align: right; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Laporan Penjualan</h1>
        <p>Tanggal: {{ $from ?? 'Semua' }} s/d {{ $to ?? 'Sekarang' }}</p>
    </div>
    <div class="summary">
        <p>Total Transaksi: {{ $totalTransactions }}</p>
        <p>Total Produk Terjual: {{ $totalProductsSold }}</p>
        <p>Total Pendapatan: Rp{{ number_format($totalRevenue,0,',','.') }}</p>
    </div>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>No Pesanan</th>
                <th>Pembeli</th>
                <th class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rows as $r)
                <tr>
                    <td>{{ $r->tanggal }}</td>
                    <td>{{ $r->id }}</td>
                    <td>{{ $r->nama ?? '-' }}</td>
                    <td class="text-right">Rp{{ number_format($r->total ?? 0,0,',','.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align:center;">Tidak ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>