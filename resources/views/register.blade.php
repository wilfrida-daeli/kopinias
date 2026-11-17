<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Register | Nias Coffee</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="min-h-screen bg-[#0b0602] text-white">
        <div class="mx-auto flex min-h-screen max-w-4xl items-center justify-center px-6 py-12">
            <div class="w-full rounded-[32px] border border-white/10 bg-white/5 p-8 shadow-2xl shadow-black/30 backdrop-blur-xl">
                <div class="mb-8 text-center">
                    <p class="text-sm uppercase tracking-[0.32em] text-amber-200/80">Register User</p>
                    <h1 class="mt-3 text-3xl font-semibold">Buat akun baru</h1>
                </div>
                <form class="space-y-6">
                    <label class="block text-sm text-slate-200/80">
                        <span class="mb-2 block text-white">Nama</span>
                        <input type="text" placeholder="Nama lengkap" class="mt-1 w-full rounded-3xl border border-white/10 bg-black/40 px-4 py-3 text-white focus:border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-300/20" />
                    </label>
                    <label class="block text-sm text-slate-200/80">
                        <span class="mb-2 block text-white">Email</span>
                        <input type="email" placeholder="name@example.com" class="mt-1 w-full rounded-3xl border border-white/10 bg-black/40 px-4 py-3 text-white focus:border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-300/20" />
                    </label>
                    <label class="block text-sm text-slate-200/80">
                        <span class="mb-2 block text-white">Password</span>
                        <input type="password" placeholder="Buat password" class="mt-1 w-full rounded-3xl border border-white/10 bg-black/40 px-4 py-3 text-white focus:border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-300/20" />
                    </label>
                    <button class="w-full rounded-full bg-amber-500 px-6 py-3 text-sm font-semibold text-black transition hover:bg-amber-400">Register</button>
                </form>
                <p class="mt-6 text-center text-sm text-slate-300">Sudah punya akun? <a href="/login" class="text-amber-200 hover:text-amber-100">Masuk sekarang</a></p>
            </div>
        </div>
    </body>
</html>
