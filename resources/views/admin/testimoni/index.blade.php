@extends('admin.layout')

@section('title', 'Kelola Testimoni')
@section('section-title', 'Testimoni')
@section('page-title', 'Daftar Testimoni')

@section('content')
    @if ($message = Session::get('success'))
        <div class="mb-6 rounded-lg bg-emerald-50 p-4 text-emerald-800">
            {{ $message }}
        </div>
    @endif

    <div class="grid gap-6 lg:grid-cols-3">
        @forelse($testimonials as $t)
            <article class="rounded-3xl border border-slate-200/10 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4 flex-1">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-100 text-2xl">💬</div>
                        <div>
                            <p class="font-semibold text-slate-900">{{ $t->nama }}</p>
                            <p class="text-sm text-slate-500">{{ str_repeat('⭐', $t->rating) }}</p>
                        </div>
                    </div>
                    @if ($t->disetujui)
                        <span class="inline-block rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-800">Disetujui</span>
                    @else
                        <span class="inline-block rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-800">Menunggu</span>
                    @endif
                </div>
                <p class="mt-4 text-slate-700">{{ $t->komentar }}</p>
                <p class="mt-3 text-xs text-slate-400">{{ $t->created_at->format('d M Y H:i') }}</p>
                <div class="mt-5 flex flex-wrap gap-2">
                    @if (!$t->disetujui)
                        <form method="POST" action="{{ route('admin.testimoni.approve', $t->id) }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="rounded-full bg-emerald-500 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-600 transition">Setujui</button>
                        </form>
                        <form method="POST" action="{{ route('admin.testimoni.reject', $t->id) }}" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus testimoni ini?')">
                            @csrf
                            <button type="submit" class="rounded-full bg-red-500 px-4 py-2 text-sm font-semibold text-white hover:bg-red-600 transition">Tolak</button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('admin.testimoni.reject', $t->id) }}" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus testimoni ini?')">
                            @csrf
                            <button type="submit" class="rounded-full bg-red-500 px-4 py-2 text-sm font-semibold text-white hover:bg-red-600 transition">Hapus</button>
                        </form>
                    @endif
                </div>
            </article>
        @empty
            <div class="rounded-3xl border border-slate-200/10 bg-white p-8 text-center text-slate-500 shadow-sm">Belum ada testimoni.</div>
        @endforelse
    </div>
@endsection