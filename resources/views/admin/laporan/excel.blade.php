<table>
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>No Pesanan</th>
            <th>Pembeli</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @forelse($rows as $r)
            <tr>
                <td>{{ $r->tanggal }}</td>
                <td>{{ $r->id }}</td>
                <td>{{ $r->nama ?? '-' }}</td>
                <td>{{ $r->total ?? 0 }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Tidak ada data.</td>
            </tr>
        @endforelse
    </tbody>
</table>