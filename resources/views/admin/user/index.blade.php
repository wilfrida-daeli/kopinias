@extends('admin.layout')

@section('title', 'Kelola User')
@section('section-title', 'User')
@section('page-title', 'Daftar User')

@section('content')
    <div class="mb-6 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <p class="text-sm text-slate-500">Kelola akun pelanggan dan admin.</p>
        </div>
        <a href="{{ route('admin.user.create') }}" class="inline-flex items-center rounded-full bg-amber-500 px-5 py-3 text-sm font-semibold text-black transition hover:bg-amber-400">Tambah User</a>
    </div>

    <div class="overflow-hidden rounded-3xl border border-slate-200/10 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-slate-200 text-sm text-slate-700">
            <thead class="bg-slate-50 text-slate-500">
                <tr>
                    <th class="px-6 py-4 text-left">ID User</th>
                    <th class="px-6 py-4 text-left">Nama</th>
                    <th class="px-6 py-4 text-left">Email</th>
                    <th class="px-6 py-4 text-left">Tanggal Daftar</th>
                    <th class="px-6 py-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 bg-white">
                @forelse($users as $u)
                    <tr>
                        <td class="px-6 py-4">{{ $u->id }}</td>
                        <td class="px-6 py-4 font-semibold text-slate-900">{{ $u->name }}</td>
                        <td class="px-6 py-4 text-slate-500">{{ $u->email }}</td>
                        <td class="px-6 py-4 text-slate-500">{{ $u->created_at->format('Y-m-d') }}</td>
                        <td class="px-6 py-4 text-slate-500">-</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-slate-400">Belum ada user.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection