@extends('admin.layout')

@section('title', 'Dashboard Admin')
@section('section-title', 'Informasi Status Order Take In')
@section('page-title', 'Dashboard')

@section('content')
    <div class="grid gap-6 lg:grid-cols-3">
        <div class="rounded-3xl border border-slate-200/10 bg-white shadow-sm p-6">
            <p class="text-sm text-slate-500">Total Produk</p>
            <p class="mt-4 text-3xl font-semibold text-slate-950">{{ $totalProduk }}</p>
        </div>
        <div class="rounded-3xl border border-slate-200/10 bg-white shadow-sm p-6">
            <p class="text-sm text-slate-500">Total Pesanan</p>
            <p class="mt-4 text-3xl font-semibold text-slate-950">{{ $totalPesanan }}</p>
        </div>
        <div class="rounded-3xl border border-slate-200/10 bg-white shadow-sm p-6">
            <p class="text-sm text-slate-500">Total User</p>
            <p class="mt-4 text-3xl font-semibold text-slate-950">{{ $totalUser }}</p>
        </div>
        <div class="rounded-3xl border border-slate-200/10 bg-white shadow-sm p-6 lg:col-span-2">
            <p class="text-sm text-slate-500">Total Testimoni</p>
            <p class="mt-4 text-3xl font-semibold text-slate-950">{{ $totalTestimoni }}</p>
        </div>
        <div class="rounded-3xl border border-slate-200/10 bg-white shadow-sm p-6 lg:col-span-1">
            <p class="text-sm text-slate-500">Total Penjualan Hari Ini</p>
            <p class="mt-4 text-3xl font-semibold text-slate-950">Rp{{ number_format($totalPenjualanHariIni, 0, ',', '.') }}</p>
        </div>
    </div>

    <div class="mt-8 grid gap-6 lg:grid-cols-2">
        <div class="rounded-3xl border border-slate-200/10 bg-white shadow-sm p-6">
            <p class="text-sm text-slate-500">Grafik Penjualan Bulanan</p>
            <canvas id="salesChart" class="mt-6 w-full"></canvas>
        </div>
        <div class="rounded-3xl border border-slate-200/10 bg-white shadow-sm p-6">
            <p class="text-sm text-slate-500">Produk Terlaris</p>
            <ul class="mt-6 space-y-3">
                @forelse($produkTerlaris as $p)
                    <li class="flex items-center justify-between rounded-2xl bg-slate-50 p-4">
                        <span class="text-slate-700">Produk ID: {{ $p->produk_id }}</span>
                        <span class="font-semibold text-amber-500">{{ $p->total_qty }} pcs</span>
                    </li>
                @empty
                    <li class="text-slate-400">Belum ada data produk terlaris.</li>
                @endforelse
            </ul>
        </div>
    </div>

    <div class="mt-8">
        <p class="text-sm font-semibold uppercase tracking-[0.24em] text-slate-500">Pesanan Terbaru</p>
        <div class="mt-4 overflow-hidden rounded-3xl border border-slate-200/10 bg-white shadow-sm">
            <table class="min-w-full text-left text-sm text-slate-700">
                <thead class="bg-slate-100 text-slate-500">
                    <tr>
                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">Nama</th>
                        <th class="px-6 py-4">Tanggal</th>
                        <th class="px-6 py-4">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    @forelse($pesananTerbaru as $o)
                        <tr>
                            <td class="px-6 py-4">{{ $o->id }}</td>
                            <td class="px-6 py-4">{{ $o->user_id ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $o->tanggal ?? '-' }}</td>
                            <td class="px-6 py-4">Rp{{ number_format($o->total ?? 0, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-slate-400">Belum ada pesanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const initialLabels = {!! json_encode($labels) !!};
        const initialData = {!! json_encode($data) !!};

        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: initialLabels,
                datasets: [{
                    label: 'Pendapatan',
                    data: initialData,
                    borderColor: '#f59e0b',
                    backgroundColor: 'rgba(245,158,11,0.18)',
                    tension: 0.4,
                    fill: true,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) { return 'Rp' + Number(value).toLocaleString(); }
                        }
                    }
                }
            }
        });

        // Poll endpoint for updates and refresh chart when data changes
        const salesDataUrl = "{{ route('admin.sales.data') }}";

        async function fetchSalesData() {
            try {
                const res = await fetch(salesDataUrl, { headers: { 'Accept': 'application/json' } });
                if (!res.ok) return;
                const json = await res.json();
                // simple comparison to avoid unnecessary updates
                const changed = JSON.stringify(json.data) !== JSON.stringify(salesChart.data.datasets[0].data) || JSON.stringify(json.labels) !== JSON.stringify(salesChart.data.labels);
                if (changed) {
                    salesChart.data.labels = json.labels;
                    salesChart.data.datasets[0].data = json.data;
                    salesChart.update();
                }
            } catch (e) {
                console.error('Failed fetching sales data', e);
            }
        }

        // Poll every 7 seconds
        setInterval(fetchSalesData, 7000);
        // Also fetch immediately in case there are new sales after page load
        fetchSalesData();
    </script>
@endsection