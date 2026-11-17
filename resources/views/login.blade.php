<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Login | Nias Coffee</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="min-h-screen bg-[#0b0602] text-white">
        <div class="mx-auto flex min-h-screen max-w-4xl items-center justify-center px-6 py-12">
            <div class="w-full rounded-[32px] border border-white/10 bg-white/5 p-8 shadow-2xl shadow-black/30 backdrop-blur-xl">
                <div class="mb-8 text-center">
                    <p class="text-sm uppercase tracking-[0.32em] text-amber-200/80">Login User</p>
                    <h1 class="mt-3 text-3xl font-semibold">Masuk ke akun Anda</h1>
                </div>

                @if(session('error'))
                    <div class="mb-6 rounded-3xl bg-red-500/10 p-4 text-sm text-red-100">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="/login" class="space-y-6">
                    @csrf
                    <label class="block text-sm text-slate-200/80">
                        <span class="mb-2 block text-white">Email</span>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" class="mt-1 w-full rounded-3xl border border-white/10 bg-black/40 px-4 py-3 text-white focus:border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-300/20" required autofocus />
                        @error('email')<p class="mt-2 text-sm text-red-200">{{ $message }}</p>@enderror
                    </label>
                    <label class="block text-sm text-slate-200/80">
                        <span class="mb-2 block text-white">Password</span>
                        <input type="password" name="password" placeholder="Masukkan password" class="mt-1 w-full rounded-3xl border border-white/10 bg-black/40 px-4 py-3 text-white focus:border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-300/20" required />
                        @error('password')<p class="mt-2 text-sm text-red-200">{{ $message }}</p>@enderror
                    </label>
                    <div class="flex items-center justify-between text-sm text-slate-300">
                        <label class="flex items-center gap-2"><input type="checkbox" name="remember" class="h-4 w-4 rounded border-white/20 bg-black/40 text-amber-400" /> Remember me</label>
                    </div>
                    <button class="w-full rounded-full bg-amber-500 px-6 py-3 text-sm font-semibold text-black transition hover:bg-amber-400">Login</button>
                </form>
                <p class="mt-6 text-center text-sm text-slate-300">Belum punya akun? <a href="/register" class="text-amber-200 hover:text-amber-100">Daftar sekarang</a></p>
            </div>
        </div>
    </body>
</html>
