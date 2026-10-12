<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LaraPress | Blog Maghfiroh Lisabiliana</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-slate-50 text-slate-800">

    {{-- ===== NAVBAR ===== --}}
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between">
            <a href="/" class="flex items-center gap-2">
                <span class="w-9 h-9 rounded-full bg-pink-600 text-white font-bold flex items-center justify-center">M</span>
                <span class="leading-tight">
                    <span class="block text-lg font-extrabold text-pink-700">LaraPress</span>
                    <span class="block text-xs text-slate-500">by Maghfiroh</span>
                </span>
            </a>

            <div class="flex items-center gap-5 text-sm font-medium">
                <a href="/" class="hidden sm:block text-pink-700 font-semibold">Beranda</a>
                <a href="#tentang" class="hidden sm:block text-slate-600 hover:text-pink-700">Tentang Saya</a>
                <a href="#kontak" class="hidden sm:block text-slate-600 hover:text-pink-700">Kontak</a>

                @auth
                    <a href="{{ route('dashboard') }}"
                       class="px-4 py-2 rounded-full bg-pink-600 text-white hover:bg-pink-700">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-slate-600 hover:text-pink-700">Masuk</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="px-4 py-2 rounded-full bg-pink-600 text-white hover:bg-pink-700">Daftar</a>
                    @endif
                @endauth
            </div>
        </div>
    </nav>

    {{-- ===== HERO ===== --}}
    <header class="bg-gradient-to-br from-pink-500 via-pink-600 to-slate-800 text-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-20 grid md:grid-cols-2 gap-10 items-center">
            <div>
                <p class="text-pink-100 text-sm font-medium">Blog pribadi Maghfiroh Lisabiliana</p>
                <h1 class="mt-3 text-4xl sm:text-5xl font-extrabold leading-tight">
                    Tempat Berbagi Cerita dan Ilmu Web
                </h1>
                <p class="mt-4 text-pink-50 max-w-md">
                    Catatan belajar Laravel, teknologi, dan pengembangan web yang ditulis langsung oleh Maghfiroh.
                </p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="#artikel" class="px-6 py-3 rounded-full bg-white text-pink-700 font-semibold hover:bg-pink-50">Baca Artikel</a>
                    @guest
                        <a href="{{ route('register') }}" class="px-6 py-3 rounded-full border border-white/60 hover:bg-white/10">Gabung Sekarang</a>
                    @endguest
                </div>
            </div>

            <div class="hidden md:flex justify-center">
                <div class="w-64 h-64 rounded-3xl bg-white/10 border border-white/20 flex flex-col items-center justify-center rotate-3">
                    <span class="text-7xl font-extrabold">M</span>
                    <span class="mt-2 text-sm text-pink-100">Maghfiroh Lisabiliana</span>
                </div>
            </div>
        </div>
    </header>

    {{-- ===== ARTIKEL ===== --}}
    <main id="artikel" class="max-w-6xl mx-auto px-4 sm:px-6 py-14">
        <div class="flex items-end justify-between mb-8">
            <h2 class="text-2xl font-bold text-slate-900">Tulisan Terbaru</h2>
            <span class="text-sm text-slate-500">3 artikel</span>
        </div>

        @php
            $artikel = [
                ['kategori' => 'Teknologi', 'warna' => 'bg-pink-100 text-pink-700', 'judul' => 'Lorem Ipsum Dolor Sit Amet',
                 'isi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.'],
                ['kategori' => 'Laravel', 'warna' => 'bg-sky-100 text-sky-700', 'judul' => 'Consectetur Adipiscing Elit',
                 'isi' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.'],
                ['kategori' => 'Web Dev', 'warna' => 'bg-amber-100 text-amber-700', 'judul' => 'Duis Aute Irure Dolor',
                 'isi' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.'],
            ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($artikel as $i => $a)
                <article class="bg-white rounded-xl border border-slate-200 overflow-hidden hover:border-pink-400 transition">
                    <div class="h-36 bg-slate-200 flex items-center justify-center text-slate-500 text-sm">
                        Gambar Artikel {{ $i + 1 }}
                    </div>
                    <div class="p-5">
                        <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold {{ $a['warna'] }}">{{ $a['kategori'] }}</span>
                        <h3 class="mt-3 text-lg font-bold text-slate-900">{{ $a['judul'] }}</h3>
                        <p class="mt-2 text-sm text-slate-600">{{ $a['isi'] }}</p>
                        <p class="mt-4 text-xs text-slate-400">Ditulis oleh Maghfiroh</p>
                    </div>
                </article>
            @endforeach
        </div>
    </main>

    {{-- ===== TENTANG ===== --}}
    <section id="tentang" class="bg-white border-y border-slate-200">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 py-12 text-center">
            <h2 class="text-2xl font-bold text-slate-900">Tentang Saya</h2>
            <p class="mt-3 text-slate-600">
                Halo, saya Maghfiroh Lisabiliana. Blog ini saya buat sebagai bagian dari praktikum
                Pemrograman Berbasis Web menggunakan Laravel.
            </p>
        </div>
    </section>

    {{-- ===== FOOTER ===== --}}
    <footer id="kontak" class="bg-slate-800 text-slate-300">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-8 text-center text-sm">
            &copy; {{ date('Y') }} LaraPress. Dibuat oleh <span class="font-semibold text-white">Maghfiroh Lisabiliana</span>.
        </div>
    </footer>

</body>
</html>