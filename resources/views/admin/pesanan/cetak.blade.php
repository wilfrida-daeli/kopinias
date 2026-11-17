<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Struk Pesanan #{{ $order->id ?? '' }}</title>
    <style>
        body { font-family: Arial, Helvetica, sans-serif; color:#000; padding:20px; }
        .receipt { max-width:380px; margin:0 auto; }
        h2 { text-align:center; margin-bottom:6px }
        .meta, .items, .total { width:100%; margin-top:10px }
        .items table { width:100%; border-collapse:collapse }
        .items td { padding:6px 0; border-bottom:1px dashed #ccc }
        .items .qty { text-align:right; width:40px }
        .items .price { text-align:right; width:90px }
        .total { text-align:right; margin-top:12px; font-size:1.1rem; font-weight:700 }
        .small { font-size:0.85rem; color:#555 }
        @media print { body { padding:0 } .no-print{ display:none } }
    </style>
</head>
<body>
    <div class="receipt">
        <h2>Nias Coffee</h2>
        <div class="small">Tanggal: {{ $order->tanggal ?? now() }}</div>
        <div class="small">No Pesanan: #{{ $order->id ?? '' }}</div>
        <div class="meta">
            <p class="small">Nama: {{ $order->nama ?? '-' }}</p>
            <p class="small">Nomor HP: {{ $order->nomor_hp ?? '-' }}</p>
            <p class="small">Alamat: {{ $order->alamat ?? '-' }}</p>
        </div>

        <div class="items">
            <table>
                @forelse($details as $d)
                    <tr>
                        <td>{{ $d->produk_id }}</td>
                        <td class="qty">x{{ $d->qty }}</td>
                        <td class="price">Rp{{ number_format($d->subtotal ?? 0,0,',','.') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="3">(Tidak ada item)</td></tr>
                @endforelse
            </table>
        </div>

        <div class="total">Total: Rp{{ number_format($order->total ?? 0,0,',','.') }}</div>

        <p class="small" style="margin-top:14px">Terima kasih telah berbelanja di Nias Coffee.</p>

        <div style="margin-top:12px; display:flex; gap:8px; justify-content:center" class="no-print">
            <button onclick="window.print()" style="padding:8px 12px; background:#111827; color:#fff; border:none; border-radius:6px;">Cetak</button>
            <a href="{{ route('admin.pesanan.index') }}" style="padding:8px 12px; background:#e5e7eb; color:#111827; border-radius:6px; text-decoration:none;">Kembali</a>
        </div>
    </div>
</body>
</html>