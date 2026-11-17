<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Nias Coffee | Home</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            body {
                background: radial-gradient(circle at top, rgba(255, 200, 120, 0.12), transparent 35%),
                    linear-gradient(180deg, #0f0a05 0%, #231507 48%, #0b0602 100%);
            }
            .glass-card {
                background: rgba(255, 255, 255, 0.07);
                backdrop-filter: blur(18px);
                -webkit-backdrop-filter: blur(18px);
            }
            .hero-image {
                background-image: url('https://images.unsplash.com/photo-1511920170033-f8396924c348?auto=format&fit=crop&w=1600&q=80');
                background-size: cover;
                background-position: center;
            }
            .star { color: #f9c74f; }
            .product-badge { background: rgba(255,255,255,.08); }
        </style>
    </head>
    <body class="text-white font-sans antialiased">
        <header class="fixed inset-x-0 top-0 z-50 border-b border-white/10 bg-black/60 backdrop-blur-md">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4 lg:px-8">
                <a href="#home" class="flex items-center gap-3 text-lg font-bold text-amber-100">
                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-amber-700/20 text-amber-200">☕</span>
                    Nias Coffee
                </a>
                <nav class="hidden items-center gap-6 text-sm lg:flex">
                    <a href="#home" class="transition hover:text-amber-200">Home</a>
                    <a href="#about" class="transition hover:text-amber-200">About</a>
                    <a href="#menu-kopi" class="transition hover:text-amber-200">Menu Kopi</a>
                    <a href="#testimoni" class="transition hover:text-amber-200">Testimoni</a>
                    <a href="#contact" class="transition hover:text-amber-200">Contact</a>
                    <a href="/login" class="rounded-full border border-amber-200/40 px-4 py-2 text-amber-100 transition hover:border-amber-300">Login</a>
                    <a href="/register" class="rounded-full bg-amber-500 px-4 py-2 text-black transition hover:bg-amber-400">Register</a>
                </nav>
            </div>
        </header>

        <main class="space-y-24 pt-28 pb-16">
            @if(session('success') || session('error'))
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    @if(session('success'))
                        <div class="mb-4 rounded-lg bg-emerald-600/90 px-4 py-3 text-sm font-medium text-white">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="mb-4 rounded-lg bg-rose-600/90 px-4 py-3 text-sm font-medium text-white">{{ session('error') }}</div>
                    @endif
                </div>
            @endif
            <section id="home" class="relative overflow-hidden">
                <div class="hero-image absolute inset-0 opacity-80"></div>
                <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/35 to-black"></div>
                <div class="relative mx-auto grid max-w-7xl gap-12 px-6 lg:grid-cols-[1.2fr_0.8fr] lg:px-8">
                    <div class="flex min-h-[560px] flex-col justify-center gap-8 py-16">
                        <div class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-xs uppercase tracking-[0.3em] text-amber-100/90">Banner Kopi Nias</div>
                        <div class="max-w-xl space-y-6">
                            <p class="text-sm uppercase tracking-[0.24em] text-amber-200/80">Kopi Nias, Cita Rasa dari Pulau Para Leluhur</p>
                            <h1 class="text-4xl font-semibold leading-tight text-white sm:text-5xl">Nikmati kehangatan secangkir kopi asli Nias yang diracik dari biji kopi pilihan.</h1>
                            <p class="max-w-xl text-base text-slate-200/85">Setiap tegukan menghadirkan aroma khas dan cita rasa autentik yang membawa Anda lebih dekat dengan kekayaan budaya Pulau Nias.</p>
                            <div class="flex flex-wrap gap-4">
                                <a href="#menu-kopi" class="inline-flex items-center justify-center rounded-full bg-amber-500 px-8 py-3 font-semibold text-black shadow-lg shadow-amber-500/20 transition hover:bg-amber-400">Pesan Sekarang</a>
                                <a href="#menu-kopi" class="inline-flex items-center justify-center rounded-full border border-white/20 px-8 py-3 text-white transition hover:border-amber-200">Lihat Menu</a>
                            </div>
                        </div>
                    </div>
                    <div class="glass-card rounded-[32px] border border-white/10 p-8 shadow-2xl shadow-black/40">
                        <div class="mb-8 flex items-center justify-between">
                            <div>
                                <p class="text-sm uppercase tracking-[0.32em] text-amber-200/80">Member Login</p>
                                <h2 class="mt-3 text-2xl font-semibold text-white">Masuk untuk pesan sekarang</h2>
                            </div>
                        </div>
                        <form class="space-y-5">
                            <label class="block text-sm text-slate-200/80">
                                <span class="mb-2 inline-flex items-center gap-2 text-white/90"><span>📧</span> Email</span>
                                <input type="email" placeholder="Enter your email" class="mt-1 w-full rounded-3xl border border-white/10 bg-black/40 px-4 py-3 text-white placeholder:text-slate-400 focus:border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-300/20" />
                            </label>
                            <label class="block text-sm text-slate-200/80">
                                <span class="mb-2 inline-flex items-center gap-2 text-white/90"><span>🔒</span> Password</span>
                                <input type="password" placeholder="Enter your password" class="mt-1 w-full rounded-3xl border border-white/10 bg-black/40 px-4 py-3 text-white placeholder:text-slate-400 focus:border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-300/20" />
                            </label>
                            <div class="flex items-center justify-between text-sm text-slate-300/90">
                                <label class="flex items-center gap-2"><input type="checkbox" class="h-4 w-4 rounded border-white/20 bg-black/40 text-amber-400" /> Remember me</label>
                                <a href="#contact" class="text-amber-200 hover:text-amber-100">Forgot Password?</a>
                            </div>
                            <button class="w-full rounded-full bg-amber-500 px-6 py-3 text-sm font-semibold text-black transition hover:bg-amber-400">Login</button>
                            <p class="text-center text-sm text-slate-300/80">Not a member? <a href="/register" class="text-amber-200 hover:text-amber-100">Sign up now</a></p>
                        </form>
                    </div>
                </div>
            </section>

            <section class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid gap-6 lg:grid-cols-3">
                    <article class="rounded-3xl border border-white/10 bg-white/5 p-6 text-center shadow-xl shadow-black/20">
                        <p class="text-sm uppercase tracking-[0.22em] text-amber-200/80">Promo kopi terbaru</p>
                        <h3 class="mt-4 text-2xl font-semibold text-white">Diskon 20% untuk menu spesial</h3>
                        <p class="mt-3 text-slate-200/80">Nikmati promo kopi terbaru dan paket combo terbaik dari barista kami.</p>
                    </article>
                    <article class="rounded-3xl border border-white/10 bg-white/5 p-6 shadow-xl shadow-black/20">
                        <p class="text-sm uppercase tracking-[0.22em] text-amber-200/80">Produk unggulan</p>
                        <h3 class="mt-4 text-2xl font-semibold text-white">Kopi Espresso dan Latte</h3>
                        <p class="mt-3 text-slate-200/80">Pilihan kopi unggulan yang dibuat dari biji kopi pilihan dan teknik seduh terbaik.</p>
                    </article>
                    <article class="rounded-3xl border border-white/10 bg-white/5 p-6 shadow-xl shadow-black/20">
                        <p class="text-sm uppercase tracking-[0.22em] text-amber-200/80">Layanan cepat</p>
                        <h3 class="mt-4 text-2xl font-semibold text-white">Pesan online sekarang</h3>
                        <p class="mt-3 text-slate-200/80">Klik tombol pesan sekarang, pilih menu, dan nikmati kopi hangat langsung di meja Anda.</p>
                    </article>
                </div>
            </section>

            <section id="about" class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid gap-12 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
                    <div class="space-y-6">
                        <p class="text-sm uppercase tracking-[0.22em] text-amber-200/80">About</p>
                        <h2 class="text-3xl font-semibold text-white">Sejarah, visi, dan profil usaha Nias Coffee</h2>
                        <p class="text-slate-200/85">Nias Coffee didirikan dengan tujuan menghadirkan pengalaman kopi premium dengan suasana nyaman dan layanan ramah. Kami fokus pada kualitas biji kopi, teknik penyajian, dan pelayanan yang konsisten.</p>
                    </div>
                    <div class="grid gap-6 lg:grid-cols-2">
                        <div class="rounded-3xl border border-white/10 bg-white/5 p-6 shadow-xl shadow-black/20">
                            <h3 class="text-xl font-semibold text-white">Visi</h3>
                            <p class="mt-3 text-slate-200/80">Menjadi destinasi coffee shop terbaik dengan rasa otentik dan pelayanan modern.</p>
                        </div>
                        <div class="rounded-3xl border border-white/10 bg-white/5 p-6 shadow-xl shadow-black/20">
                            <h3 class="text-xl font-semibold text-white">Misi</h3>
                            <p class="mt-3 text-slate-200/80">Menyajikan kopi berkualitas, membangun komunitas pelanggan setia, dan mendukung budaya kopi lokal.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="menu-kopi" class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mb-10 flex flex-wrap items-end justify-between gap-4">
                    <div>
                        <p class="text-sm uppercase tracking-[0.22em] text-amber-200/80">Menu Kopi</p>
                        <h2 class="mt-3 text-3xl font-semibold text-white">Menu kopi favorit kami</h2>
                    </div>
                    <a href="#contact" class="rounded-full bg-amber-500 px-5 py-3 text-sm font-semibold text-black transition hover:bg-amber-400">Lihat semua produk</a>
                </div>

                <div class="grid gap-6 lg:grid-cols-3">
                    @if(isset($products) && $products->count())
                        @foreach($products as $product)
                            <article class="rounded-[32px] border border-white/10 bg-white/5 p-6 shadow-2xl shadow-black/20">
                                <div class="aspect-[4/3] overflow-hidden rounded-3xl bg-slate-900">
                                    @php $img = $product->gambar ? asset($product->gambar) : 'https://images.unsplash.com/photo-1511920170033-f8396924c348?auto=format&fit=crop&w=800&q=80'; @endphp
                                    <img src="{{ $img }}" alt="{{ $product->nama_produk }}" class="h-full w-full object-cover" />
                                </div>
                                <div class="mt-5">
                                    <p class="text-sm uppercase tracking-[0.22em] text-amber-200/80">{{ $product->kategori ?? 'Kopi' }}</p>
                                    <h3 class="mt-3 text-2xl font-semibold text-white">{{ $product->nama_produk }}</h3>
                                    <p class="mt-3 text-slate-200/80">{{ $product->deskripsi }}</p>
                                    <div class="mt-5 flex items-center justify-between text-white">
                                        <span class="text-xl font-semibold">Rp{{ number_format($product->harga,0,',','.') }}</span>
                                        <button type="button" onclick="toggleOrderForm({{ $product->id }})" class="rounded-full bg-amber-500 px-5 py-2 text-sm font-semibold text-black transition hover:bg-amber-400">Beli</button>
                                    </div>

                                    <div id="order-form-{{ $product->id }}" class="mt-6 hidden rounded-3xl border border-amber-500/20 bg-slate-950/80 p-5">
                                        <form method="POST" action="{{ route('pesan.store') }}" class="space-y-4">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" id="qty-{{ $product->id }}" name="qty" value="1">

                                            <div class="grid gap-4 sm:grid-cols-2">
                                                <label class="block text-sm text-slate-200">
                                                    <span class="mb-2 block text-white">Nama</span>
                                                    <input type="text" name="nama" required class="mt-1 w-full rounded-3xl border border-slate-700 bg-slate-900 px-4 py-3 text-white placeholder:text-slate-500 focus:border-amber-400 focus:outline-none" placeholder="Nama Anda">
                                                </label>
                                                <label class="block text-sm text-slate-200">
                                                    <span class="mb-2 block text-white">Nomor HP</span>
                                                    <input type="text" name="nomor_hp" required class="mt-1 w-full rounded-3xl border border-slate-700 bg-slate-900 px-4 py-3 text-white placeholder:text-slate-500 focus:border-amber-400 focus:outline-none" placeholder="08xxxxxxx">
                                                </label>
                                            </div>

                                            <div class="flex items-center gap-3">
                                                <span class="text-sm text-slate-200">Jumlah</span>
                                                <button type="button" onclick="updateQty({{ $product->id }}, -1)" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-slate-700 bg-slate-900 text-white">-</button>
                                                <input id="qty-display-{{ $product->id }}" type="text" value="1" readonly class="w-16 rounded-3xl border border-slate-700 bg-slate-900 px-3 py-3 text-center text-white" />
                                                <button type="button" onclick="updateQty({{ $product->id }}, 1)" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-slate-700 bg-slate-900 text-white">+</button>
                                            </div>

                                            <div class="flex flex-wrap gap-3">
                                                <button type="submit" class="rounded-full bg-amber-500 px-5 py-3 text-sm font-semibold text-black transition hover:bg-amber-400">Pesan</button>
                                                <button type="button" onclick="toggleOrderForm({{ $product->id }})" class="rounded-full border border-slate-700 px-5 py-3 text-sm font-semibold text-slate-200 transition hover:border-amber-400">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    @else
                        <div class="col-span-3 text-center text-slate-300">Belum ada produk. Silakan tambahkan produk melalui panel admin.</div>
                    @endif
                </div>
            </section>

            <section class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="overflow-hidden rounded-[32px] border border-white/10 bg-white/5 p-6 shadow-2xl shadow-black/20 lg:p-10">
                    <div class="mb-8 flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
                        <div>
                            <p class="text-sm uppercase tracking-[0.22em] text-amber-200/80">Menu Kopi</p>
                            <h2 class="mt-3 text-3xl font-semibold text-white">Daftar kopi lengkap</h2>
                        </div>
                        <span class="rounded-full bg-amber-500 px-4 py-2 text-sm font-semibold text-black">Telusuri sekarang</span>
                    </div>
                    <div class="overflow-x-auto rounded-3xl border border-white/10 bg-black/20">
                        <table class="min-w-full text-left text-sm text-slate-200">
                            <thead class="border-b border-white/10 bg-white/5 text-slate-300">
                                <tr>
                                    <th class="px-6 py-4">Gambar</th>
                                    <th class="px-6 py-4">Nama Kopi</th>
                                    <th class="px-6 py-4">Deskripsi</th>
                                    <th class="px-6 py-4">Harga</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/10">
                                @if(isset($products) && $products->count())
                                    @foreach($products as $p)
                                        <tr>
                                            <td class="px-6 py-5">
                                                @if($p->gambar)
                                                    <img src="{{ asset($p->gambar) }}" alt="{{ $p->nama_produk }}" class="h-12 w-12 rounded-2xl object-cover" />
                                                @else
                                                    <span class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-500/15 text-sm">{{ \Illuminate\Support\Str::limit($p->nama_produk,3) }}</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-5 font-semibold text-white">{{ $p->nama_produk }}</td>
                                            <td class="px-6 py-5 text-slate-300">{{ $p->deskripsi }}</td>
                                            <td class="px-6 py-5 text-amber-200">Rp{{ number_format($p->harga,0,',','.') }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="px-6 py-5 text-center text-slate-300">Belum ada produk.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <section id="testimoni" class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mb-10 space-y-4">
                    <p class="text-sm uppercase tracking-[0.22em] text-amber-200/80">Testimoni</p>
                    <h2 class="text-3xl font-semibold text-white">Apa kata pelanggan kami</h2>
                </div>
                <div class="mb-12 rounded-[32px] border border-white/10 bg-white/5 p-8 shadow-2xl shadow-black/20">
                    <h3 class="text-2xl font-semibold text-white mb-6">Bagikan pengalaman Anda</h3>
                    <form method="POST" action="{{ route('testimoni.store') }}" class="space-y-5">
                        @csrf
                        <div class="grid gap-4 sm:grid-cols-2">
                            <label class="block text-sm text-slate-200/80">
                                <span class="mb-2 block text-white">Nama Anda</span>
                                <input type="text" name="nama" required class="mt-1 w-full rounded-3xl border border-white/10 bg-black/40 px-4 py-3 text-white placeholder:text-slate-400 focus:border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-300/20" placeholder="Nama lengkap" />
                            </label>
                            <label class="block text-sm text-slate-200/80">
                                <span class="mb-2 block text-white">Rating</span>
                                <select name="rating" required class="mt-1 w-full rounded-3xl border border-white/10 bg-black/40 px-4 py-3 text-white focus:border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-300/20">
                                    <option value="5">⭐⭐⭐⭐⭐ Sangat Puas (5 bintang)</option>
                                    <option value="4">⭐⭐⭐⭐ Puas (4 bintang)</option>
                                    <option value="3">⭐⭐⭐ Cukup Puas (3 bintang)</option>
                                    <option value="2">⭐⭐ Kurang Puas (2 bintang)</option>
                                    <option value="1">⭐ Tidak Puas (1 bintang)</option>
                                </select>
                            </label>
                        </div>
                        <label class="block text-sm text-slate-200/80">
                            <span class="mb-2 block text-white">Komentar / Testimoni</span>
                            <textarea name="komentar" rows="4" required placeholder="Bagikan pengalaman Anda bersama Nias Coffee..." class="mt-1 w-full rounded-3xl border border-white/10 bg-black/40 px-4 py-3 text-white placeholder:text-slate-400 focus:border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-300/20"></textarea>
                        </label>
                        <p class="text-sm text-slate-400">*Testimoni Anda akan ditampilkan di halaman ini setelah disetujui oleh admin</p>
                        <button type="submit" class="rounded-full bg-amber-500 px-8 py-3 font-semibold text-black transition hover:bg-amber-400">Kirim Testimoni</button>
                    </form>
                </div>

                <div class="mb-12">
                    <h3 class="text-xl font-semibold text-white mb-6">Testimoni dari Pelanggan</h3>
                    @if(isset($approvedTestimonials) && $approvedTestimonials->count() > 0)
                        <div class="grid gap-6 lg:grid-cols-3">
                            @foreach($approvedTestimonials as $t)
                                <article class="rounded-[32px] border border-white/10 bg-white/5 p-6 shadow-xl shadow-black/20">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-500/20 text-xl">👤</div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-white">{{ $t->nama }}</h3>
                                            <p class="text-sm text-amber-300">{{ str_repeat('★', $t->rating) }}{{ str_repeat('☆', 5 - $t->rating) }}</p>
                                        </div>
                                    </div>
                                    <p class="text-slate-200/80">{{ $t->komentar }}</p>
                                </article>
                            @endforeach
                        </div>
                    @else
                        <div class="rounded-[32px] border border-white/10 bg-white/5 p-8 text-center text-slate-300">
                            <p>Belum ada testimoni dari pelanggan. Jadilah yang pertama berbagi pengalaman Anda!</p>
                        </div>
                    @endif
                </div>
            </section>

            <section id="contact" class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid gap-12 lg:grid-cols-[0.95fr_1.05fr] lg:items-start">
                    <div class="rounded-[32px] border border-white/10 bg-white/5 p-8 shadow-2xl shadow-black/20">
                        <p class="text-sm uppercase tracking-[0.22em] text-amber-200/80">Contact</p>
                        <h2 class="mt-4 text-3xl font-semibold text-white">Hubungi Nias Coffee</h2>
                        <div class="mt-8 space-y-5 text-slate-200/85">
                            <div><strong class="text-white">Alamat:</strong> Jl. Kopi Nias No. 12, Medan</div>
                            <div><strong class="text-white">WhatsApp:</strong> +62 812-3456-7890</div>
                            <div><strong class="text-white">Email:</strong> info@coffeenias.com</div>
                        </div>
                        <div class="mt-10 rounded-3xl border border-white/10 bg-black/30 p-5">
                            <p class="text-sm uppercase tracking-[0.22em] text-amber-200/80">Google Maps</p>
                            <div class="mt-4 overflow-hidden rounded-3xl border border-white/10">
                                <iframe class="h-72 w-full" loading="lazy" src="https://maps.google.com/maps?q=coffee%20shop&t=&z=14&ie=UTF8&iwloc=&output=embed"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-[32px] border border-white/10 bg-white/5 p-8 shadow-2xl shadow-black/20">
                        <p class="text-sm uppercase tracking-[0.22em] text-amber-200/80">Kirim Pesan</p>
                        <h3 class="mt-3 text-2xl font-semibold text-white">Form Kirim Pesan</h3>
                        <p class="mt-3 text-sm text-slate-400">Pesan yang Anda kirim akan diteruskan ke email admin: <span class="font-semibold text-amber-200">framenow23@gmail.com</span>.</p>
                        <form method="POST" action="{{ route('contact.send') }}" class="mt-8 space-y-5">
                            @csrf
                            <label class="block text-sm text-slate-200/80">
                                <span class="mb-2 block text-white">Nama</span>
                                <input name="nama" type="text" placeholder="Nama lengkap" required class="mt-1 w-full rounded-3xl border border-white/10 bg-black/40 px-4 py-3 text-white placeholder:text-slate-400 focus:border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-300/20" />
                            </label>
                            <label class="block text-sm text-slate-200/80">
                                <span class="mb-2 block text-white">Email</span>
                                <input name="email" type="email" placeholder="Email Anda" required class="mt-1 w-full rounded-3xl border border-white/10 bg-black/40 px-4 py-3 text-white placeholder:text-slate-400 focus:border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-300/20" />
                            </label>
                            <label class="block text-sm text-slate-200/80">
                                <span class="mb-2 block text-white">Pesan</span>
                                <textarea name="pesan" rows="5" placeholder="Tulis pesan anda..." required class="mt-1 w-full rounded-3xl border border-white/10 bg-black/40 px-4 py-3 text-white placeholder:text-slate-400 focus:border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-300/20"></textarea>
                            </label>
                            <button type="submit" class="w-full rounded-full bg-amber-500 px-6 py-3 text-sm font-semibold text-black transition hover:bg-amber-400">Kirim Pesan</button>
                        </form>
                    </div>
                </div>
            </section>

        </main>

        <footer class="bg-slate-950 border-t border-white/10 text-slate-200">
            <div class="mx-auto grid max-w-7xl gap-10 px-6 py-10 lg:grid-cols-[1.2fr_0.8fr_0.8fr_0.8fr] lg:px-8">
                <div>
                    <h3 class="text-xl font-semibold text-white">☕ Nias Coffee</h3>
                    <p class="mt-3 text-slate-400">Toko online terpercaya sejak tahun 2026.</p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-white">Navigasi</h3>
                    <ul class="mt-4 space-y-3 text-sm text-slate-300">
                        <li><a href="#about" class="hover:text-amber-200">Tentang Kami</a></li>
                        <li><a href="#menu-kopi" class="hover:text-amber-200">Produk Kami</a></li>
                        <li><a href="#contact" class="hover:text-amber-200">Cara Order</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-white">Kontak Kami</h3>
                    <ul class="mt-4 space-y-3 text-sm text-slate-300">
                        <li>WhatsApp: <a href="https://wa.me/6281234567890" class="text-amber-200 hover:text-amber-100">0812-3456-7890</a></li>
                        <li>Email: <a href="mailto:cs@coffeenias.com" class="text-amber-200 hover:text-amber-100">cs@coffeenias.com</a></li>
                        <li>Alamat: Nias</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-white">Ikuti Kami</h3>
                    <div class="mt-4 flex items-center gap-3 text-slate-300">
                        <a href="https://www.instagram.com/niascoffee" target="_blank" rel="noreferrer noopener" aria-label="Instagram" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-white/10 bg-white/5 text-amber-200 transition hover:bg-amber-500/15 hover:text-amber-100">
                            <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor" aria-hidden="true">
                                <path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2Zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5A4.25 4.25 0 0 0 7.75 20.5h8.5a4.25 4.25 0 0 0 4.25-4.25v-8.5A4.25 4.25 0 0 0 16.25 3.5h-8.5Zm8.75 2a1 1 0 1 1 0 2 1 1 0 0 1 0-2ZM12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10Zm0 1.5a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Z" />
                            </svg>
                        </a>
                        <a href="https://wa.me/6281234567890" target="_blank" rel="noreferrer noopener" aria-label="WhatsApp" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-white/10 bg-white/5 text-amber-200 transition hover:bg-amber-500/15 hover:text-amber-100">
                            <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor" aria-hidden="true">
                                <path d="M17.604 14.223c-.315-.159-1.865-.922-2.155-1.026-.29-.104-.502-.159-.714.159-.211.318-.82 1.026-1.005 1.238-.185.212-.369.238-.684.08-.315-.159-1.331-.491-2.536-1.562-.938-.837-1.572-1.872-1.757-2.189-.185-.318-.02-.49.139-.648.144-.143.315-.371.473-.557.159-.185.21-.318.315-.53.104-.212.052-.398-.026-.557-.078-.159-.714-1.721-.98-2.356-.257-.604-.52-.522-.714-.522-.185 0-.398-.026-.61-.026s-.56.078-.853.398c-.293.318-1.119 1.093-1.119 2.656 0 1.562.98 3.082 1.118 3.294.139.212 1.963 3.004 4.753 4.21 2.79 1.206 2.79.804 3.294.753.503-.052 1.624-.663 1.85-1.303.227-.64.227-1.186.159-1.303-.067-.116-.278-.186-.592-.345z"/>
                                <path d="M20.447 3.552C18.224 1.346 15.226 0 12.009 0 5.507 0 .155 5.352.155 11.854c0 2.087.548 4.124 1.586 5.924L.019 24l6.351-1.968c1.731.942 3.683 1.44 5.639 1.44h.006c6.502 0 11.854-5.352 11.854-11.854 0-3.171-1.232-6.156-3.472-8.386zM12.009 21.88c-1.761 0-3.491-.472-5.004-1.367l-.359-.213-3.717 1.152 1.173-3.593-.231-.368c-.942-1.499-1.438-3.226-1.438-4.996 0-5.392 4.39-9.782 9.782-9.782 2.605 0 5.052 1.014 6.89 2.852 1.838 1.837 2.852 4.285 2.852 6.89 0 5.391-4.39 9.782-9.782 9.782z"/>
                            </svg>
                        </a>
                        <a href="#" aria-label="Facebook" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-white/10 bg-white/5 text-amber-200 transition hover:bg-amber-500/15 hover:text-amber-100">
                            <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor" aria-hidden="true">
                                <path d="M22 12.07C22 6.48 17.52 2 12 2S2 6.48 2 12.07C2 17.1 5.66 21.5 10.47 22v-7.01H7.9v-2.92h2.57V9.79c0-2.55 1.52-3.96 3.85-3.96 1.12 0 2.3.2 2.3.2v2.52h-1.29c-1.27 0-1.67.79-1.67 1.6v1.92h2.85l-.46 2.92h-2.39V22C18.34 21.5 22 17.1 22 12.07Z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-white/10 px-6 pb-10 lg:px-8">
                <div class="mx-auto flex flex-col items-center justify-between gap-4 pt-8 text-sm text-slate-400 lg:flex-row lg:max-w-7xl">
                    <div class="text-center lg:text-left">Logo-Logo Metode Pembayaran: <span class="font-semibold text-white">BCA | Mandiri | Dana | QRIS</span></div>
                    <div class="text-center text-slate-400 lg:text-right">© 2026 Nias Coffee. All Rights Reserved.</div>
                </div>
            </div>
        </footer>

        <script>
            function toggleOrderForm(id) {
                const form = document.getElementById('order-form-' + id);
                if (!form) return;
                form.classList.toggle('hidden');
                if (!form.classList.contains('hidden')) {
                    const qty = document.getElementById('qty-' + id);
                    const qtyDisplay = document.getElementById('qty-display-' + id);
                    if (qty) qty.value = 1;
                    if (qtyDisplay) qtyDisplay.value = 1;
                }
            }

            function updateQty(id, delta) {
                const qtyInput = document.getElementById('qty-' + id);
                const qtyDisplay = document.getElementById('qty-display-' + id);
                if (!qtyInput || !qtyDisplay) return;
                let current = parseInt(qtyInput.value) || 1;
                current += delta;
                if (current < 1) current = 1;
                qtyInput.value = current;
                qtyDisplay.value = current;
            }
        </script>
    </body>
</html>
