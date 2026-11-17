<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Admin') | Nias Coffee</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">
    <div class="lg:flex lg:min-h-screen">
        <aside class="hidden lg:flex lg:w-72 flex-col bg-slate-950 text-slate-100">
            <div class="flex h-20 items-center border-b border-slate-800 px-6">
                <div>
                    <p class="text-sm uppercase tracking-[0.32em] text-amber-300/80">Admin</p>
                    <h1 class="text-2xl font-semibold">Nias Coffee</h1>
                </div>
            </div>

            <div class="flex-1 overflow-y-auto px-4 py-6">
                @php
                    $active = fn($route) => request()->routeIs($route) ? 'bg-slate-800 text-amber-300' : 'text-slate-300 hover:bg-slate-800 hover:text-white';
                @endphp
                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="group flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium transition {{ $active('admin.dashboard') }}">
                        <span>📊</span>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.user.index') }}" class="group flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium transition {{ $active('admin.user.index') }}">
                        <span>👤</span>
                        User
                    </a>
                    <a href="{{ route('admin.produk.index') }}" class="group flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium transition {{ $active('admin.produk.index') }}">
                        <span>🍵</span>
                        Produk
                    </a>
                    <a href="{{ route('admin.diskon.index') }}" class="group flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium transition {{ $active('admin.diskon.index') }}">
                        <span>🏷️</span>
                        Diskon
                    </a>
                    <a href="{{ route('admin.delivery.index') }}" class="group flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium transition {{ $active('admin.delivery.index') }}">
                        <span>🚚</span>
                        Transaksi Delivery
                    </a>
                    <a href="{{ route('admin.takein.index') }}" class="group flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium transition {{ $active('admin.takein.index') }}">
                        <span>🛍️</span>
                        Transaksi Take In
                    </a>
                    <a href="{{ route('admin.pesanan.index') }}" class="group flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium transition {{ $active('admin.pesanan.index') }}">
                        <span>🧾</span>
                        Pesanan
                    </a>
                    <a href="{{ route('admin.testimoni.index') }}" class="group flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium transition {{ $active('admin.testimoni.index') }}">
                        <span>💬</span>
                        Testimoni
                    </a>
                    <a href="{{ route('admin.laporan.index') }}" class="group flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium transition {{ $active('admin.laporan.index') }}">
                        <span>📈</span>
                        Laporan
                    </a>
                </nav>
            </div>

            <div class="border-t border-slate-800 px-4 py-5">
                <p class="text-xs uppercase tracking-[0.28em] text-slate-500">Help</p>
                <div class="mt-4 space-y-3 text-sm text-slate-300">
                    <p>Support</p>
                    <p>Privacy</p>
                </div>
                <a href="{{ route('admin.logout') }}" class="mt-5 flex items-center gap-3 rounded-2xl bg-red-600/10 px-4 py-3 text-sm font-medium text-red-200 transition hover:bg-red-600/20">
                    <span>⏻</span>
                    Logout
                </a>
            </div>
        </aside>

        <div class="flex-1">
            <header class="sticky top-0 z-20 border-b border-slate-200/80 bg-white/95 backdrop-blur-lg">
                <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
                    <div class="flex items-center gap-3">
                        <button class="lg:hidden rounded-2xl border border-slate-200 bg-white p-2 text-slate-700 shadow-sm">☰</button>
                        <div class="text-sm text-slate-500">Selamat datang di panel admin</div>
                    </div>
                    <div class="flex-1">
                        <div class="relative max-w-md">
                            <span class="pointer-events-none absolute inset-y-0 left-4 inline-flex items-center text-slate-400">🔍</span>
                            <input type="search" placeholder="Search..." class="w-full rounded-full border border-slate-200 bg-slate-50 py-2.5 pl-12 pr-4 text-sm text-slate-700 shadow-sm outline-none transition focus:border-amber-400 focus:ring-2 focus:ring-amber-200" />
                        </div>
                    </div>
                    <div class="hidden items-center gap-3 md:flex">
                        <span class="rounded-full bg-amber-500 px-4 py-2 text-sm font-semibold text-black">Admin</span>
                    </div>
                </div>
            </header>

            <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
                <div class="mb-8">
                    <p class="text-sm uppercase tracking-[0.28em] text-amber-500/80">@yield('section-title', 'Dashboard')</p>
                    <h1 class="mt-3 text-3xl font-semibold text-slate-950">@yield('page-title', 'Welcome Admin')</h1>
                </div>

                @yield('content')
            </main>
        </div>
    </div>

    @yield('scripts')
</body>
</html>
