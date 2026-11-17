@extends('admin.layout')

@section('title', 'Tambah User')
@section('section-title', 'User')
@section('page-title', 'Tambah User Baru')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <div>
            <p class="text-sm text-slate-500">Buat akun baru untuk pelanggan atau admin.</p>
        </div>
        <a href="{{ route('admin.user.index') }}" class="inline-flex items-center rounded-full border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-50">Kembali</a>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-3xl border border-emerald-200 bg-emerald-50 p-4 text-slate-800">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="mb-6 rounded-3xl border border-red-200 bg-red-50 p-4 text-slate-800">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="rounded-3xl border border-slate-200/10 bg-white p-6 shadow-sm max-w-2xl">
        <form action="{{ route('admin.user.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-slate-700">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900" required />
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900" required />
            </div>
            <div class="grid gap-4 lg:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-slate-700">Password</label>
                    <input type="password" name="password" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900" required />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Role</label>
                    <select name="role" class="mt-2 w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <button type="submit" class="inline-flex items-center rounded-full bg-amber-500 px-6 py-3 text-sm font-semibold text-black">Simpan</button>
                <a href="{{ route('admin.user.index') }}" class="text-sm text-slate-500">Batal</a>
            </div>
        </form>
    </div>
@endsection
