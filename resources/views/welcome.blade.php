
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookSpace - Perpustakaan Digital</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}?v=2">
    <meta name="description" content="BookSpace adalah platform manajemen perpustakaan digital untuk menemukan dan menjelajahi koleksi buku.">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'DM Sans', sans-serif;
        }

        .heading-font {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .hero-grid {
            background-image: radial-gradient(#c7d2fe 1px, transparent 1px);
            background-size: 22px 22px;
        }

        .book-float {
            animation: float 5s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-white text-slate-800 antialiased">

    <!-- NAVBAR -->
    <header class="sticky top-0 z-50 border-b border-slate-100 bg-white/95 backdrop-blur">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 lg:px-8">

            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-indigo-600 text-xl font-bold text-white shadow-lg shadow-indigo-200">
                    B
                </div>

                <div>
                    <h1 class="heading-font text-xl font-extrabold tracking-tight text-slate-900">
                        Book<span class="text-indigo-600">Space.</span>
                    </h1>
                    <p class="text-[10px] font-semibold uppercase tracking-[2px] text-slate-400">
                        Digital Library
                    </p>
                </div>
            </a>

            <div class="hidden items-center gap-8 text-sm font-semibold text-slate-600 md:flex">
                <a href="#beranda" class="transition hover:text-indigo-600">Beranda</a>
                <a href="#tentang" class="transition hover:text-indigo-600">Tentang</a>
                <a href="#fitur" class="transition hover:text-indigo-600">Fitur</a>
                <a href="#kategori" class="transition hover:text-indigo-600">Kategori</a>
            </div>

            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="rounded-xl bg-indigo-600 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-indigo-200 transition hover:bg-indigo-700">
                        Dashboard →
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="hidden rounded-xl px-4 py-3 text-sm font-bold text-slate-700 transition hover:text-indigo-600 sm:inline-flex">
                        Masuk
                    </a>

                    <a href="{{ route('register') }}"
                       class="rounded-xl bg-indigo-600 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-indigo-200 transition hover:-translate-y-0.5 hover:bg-indigo-700">
                        Mulai Sekarang →
                    </a>
                @endauth
            </div>
        </nav>
    </header>


    <!-- HERO SECTION -->
    <section id="beranda" class="relative overflow-hidden bg-gradient-to-br from-indigo-50 via-white to-violet-50">

        <div class="absolute inset-0 hero-grid opacity-40"></div>

        <div class="relative mx-auto grid max-w-7xl items-center gap-14 px-5 py-20 lg:grid-cols-2 lg:px-8 lg:py-28">

            <div>
                <div class="mb-7 inline-flex items-center gap-2 rounded-full border border-indigo-100 bg-white px-4 py-2 text-xs font-bold text-indigo-700 shadow-sm">
                    <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                    PLATFORM PERPUSTAKAAN DIGITAL
                </div>

                <h2 class="heading-font max-w-2xl text-4xl font-extrabold leading-tight tracking-tight text-slate-900 sm:text-5xl lg:text-6xl">
                    Temukan Dunia Baru Melalui
                    <span class="text-indigo-600">Setiap Buku.</span>
                </h2>

                <p class="mt-7 max-w-xl text-base leading-8 text-slate-600">
                    Selamat datang di BookSpace. Platform perpustakaan digital
                    yang memudahkan mahasiswa dan dosen menjelajahi koleksi
                    buku, menemukan referensi, dan memperluas wawasan.
                </p>

                <div class="mt-9 flex flex-wrap gap-4">
                    <a href="{{ route('login') }}"
                       class="inline-flex items-center gap-3 rounded-xl bg-indigo-600 px-7 py-4 text-sm font-bold text-white shadow-xl shadow-indigo-200 transition hover:-translate-y-1 hover:bg-indigo-700">
                        Jelajahi Perpustakaan
                        <span>→</span>
                    </a>

                    <a href="#tentang"
                       class="inline-flex items-center rounded-xl border border-slate-200 bg-white px-7 py-4 text-sm font-bold text-slate-700 transition hover:border-indigo-300 hover:text-indigo-600">
                        Pelajari Lebih Lanjut
                    </a>
                </div>

                <div class="mt-12 flex items-center gap-4 border-t border-indigo-100 pt-7">
                    <div class="flex -space-x-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-white bg-indigo-100 text-sm">👨‍🎓</div>
                        <div class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-white bg-violet-100 text-sm">👩‍🎓</div>
                        <div class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-white bg-amber-100 text-sm">👨‍🏫</div>
                    </div>

                    <div>
                        <p class="text-sm font-bold text-slate-800">
                            Ruang belajar tanpa batas
                        </p>
                        <p class="text-xs text-slate-500">
                            Untuk mahasiswa dan tenaga pengajar
                        </p>
                    </div>
                </div>
            </div>


            <!-- ILUSTRASI HERO -->
            <div class="relative mx-auto w-full max-w-lg">

                <div class="absolute -right-5 -top-8 h-40 w-40 rounded-full bg-violet-200/60 blur-3xl"></div>
                <div class="absolute -bottom-8 -left-5 h-40 w-40 rounded-full bg-indigo-200/70 blur-3xl"></div>

                <div class="relative rounded-[2rem] border border-white bg-white/70 p-5 shadow-2xl shadow-indigo-100 backdrop-blur">
                    <div class="rounded-2xl bg-gradient-to-br from-indigo-700 to-violet-800 p-7 text-white">

                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold uppercase tracking-[3px] text-indigo-200">
                                Your Knowledge Space
                            </span>
                            <span class="rounded-full bg-white/15 px-3 py-1 text-xs">BookSpace</span>
                        </div>

                        <div class="mt-10">
                            <p class="text-sm text-indigo-200">Discover • Read • Grow</p>
                            <h3 class="heading-font mt-2 text-3xl font-extrabold leading-tight">
                                Knowledge is<br>your greatest asset.
                            </h3>
                        </div>

                        <div class="mt-10 flex items-end justify-center gap-3">

                            <div class="book-float flex h-44 w-28 rotate-[-8deg] flex-col justify-between rounded-lg bg-amber-300 p-3 text-slate-900 shadow-2xl">
                                <span class="text-xs font-extrabold">01 / BOOK</span>
                                <span class="text-4xl">📘</span>
                                <span class="text-xs font-extrabold">TECHNOLOGY</span>
                            </div>

                            <div class="book-float flex h-52 w-32 flex-col justify-between rounded-lg bg-white p-3 text-indigo-900 shadow-2xl" style="animation-delay: .5s">
                                <span class="text-xs font-extrabold">BOOKSPACE</span>
                                <span class="text-5xl">📚</span>
                                <span class="text-xs font-extrabold">KNOWLEDGE<br>FOR EVERYONE</span>
                            </div>

                            <div class="book-float flex h-40 w-28 rotate-[8deg] flex-col justify-between rounded-lg bg-emerald-300 p-3 text-slate-900 shadow-2xl" style="animation-delay: 1s">
                                <span class="text-xs font-extrabold">03 / BOOK</span>
                                <span class="text-4xl">📗</span>
                                <span class="text-xs font-extrabold">EDUCATION</span>
                            </div>

                        </div>
                    </div>

                    <div class="mt-4 grid grid-cols-2 gap-3">
                        <div class="rounded-xl bg-indigo-50 p-4">
                            <p class="text-xs text-slate-500">Learning Space</p>
                            <p class="mt-1 font-bold text-indigo-700">Explore More</p>
                        </div>
                        <div class="rounded-xl bg-violet-50 p-4">
                            <p class="text-xs text-slate-500">Your Knowledge</p>
                            <p class="mt-1 font-bold text-violet-700">Grow Every Day</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- STATISTIK -->
    <section class="relative z-10 mx-auto -mt-1 max-w-7xl px-5 lg:px-8">
        <div class="grid grid-cols-2 gap-4 rounded-3xl border border-slate-100 bg-white p-7 shadow-xl shadow-slate-200/50 lg:grid-cols-4 lg:p-9">

            <div class="text-center">
                <p class="heading-font text-3xl font-extrabold text-indigo-600">
                    {{ \App\Models\Book::count() }}+
                </p>
                <p class="mt-2 text-sm font-medium text-slate-500">Koleksi Buku</p>
            </div>

            <div class="text-center">
                <p class="heading-font text-3xl font-extrabold text-violet-600">
                    {{ \App\Models\Category::count() }}+
                </p>
                <p class="mt-2 text-sm font-medium text-slate-500">Kategori Buku</p>
            </div>

            <div class="text-center">
                <p class="heading-font text-3xl font-extrabold text-emerald-600">
                    {{ \App\Models\User::count() }}+
                </p>
                <p class="mt-2 text-sm font-medium text-slate-500">Pengguna</p>
            </div>

            <div class="text-center">
                <p class="heading-font text-3xl font-extrabold text-amber-500">
                    24/7
                </p>
                <p class="mt-2 text-sm font-medium text-slate-500">Akses Platform</p>
            </div>

        </div>
    </section>


    <!-- TENTANG -->
    <section id="tentang" class="mx-auto max-w-7xl px-5 py-24 lg:px-8">

        <div class="grid items-center gap-14 lg:grid-cols-2">

            <div>
                <div class="text-xs font-extrabold uppercase tracking-[3px] text-indigo-600">
                    Tentang BookSpace
                </div>

                <h2 class="heading-font mt-4 text-3xl font-extrabold leading-tight text-slate-900 sm:text-4xl">
                    Lebih dari Sekadar Tempat Menyimpan Buku.
                </h2>

                <p class="mt-6 leading-8 text-slate-600">
                    BookSpace hadir sebagai solusi pengelolaan perpustakaan
                    yang menghubungkan koleksi buku dengan kebutuhan belajar
                    mahasiswa dan dosen.
                </p>

                <p class="mt-4 leading-8 text-slate-600">
                    Dengan tampilan yang sederhana dan sistem yang terorganisasi,
                    pengguna dapat menemukan informasi buku dengan lebih mudah,
                    cepat, dan efisien.
                </p>

                <a href="{{ route('login') }}"
                   class="mt-8 inline-flex items-center gap-2 font-bold text-indigo-600 hover:text-indigo-800">
                    Mulai menjelajahi BookSpace <span>→</span>
                </a>
            </div>

            <div class="grid grid-cols-2 gap-4">

                <div class="rounded-3xl bg-indigo-600 p-7 text-white">
                    <div class="text-4xl">📚</div>
                    <h3 class="mt-8 text-lg font-bold">Koleksi Terorganisasi</h3>
                    <p class="mt-2 text-sm leading-6 text-indigo-100">
                        Buku dikelompokkan berdasarkan kategori.
                    </p>
                </div>

                <div class="mt-10 rounded-3xl bg-violet-100 p-7 text-violet-900">
                    <div class="text-4xl">🔎</div>
                    <h3 class="mt-8 text-lg font-bold">Pencarian Mudah</h3>
                    <p class="mt-2 text-sm leading-6 text-violet-700">
                        Temukan buku berdasarkan informasi yang tersedia.
                    </p>
                </div>

                <div class="rounded-3xl bg-emerald-100 p-7 text-emerald-900">
                    <div class="text-4xl">🎓</div>
                    <h3 class="mt-8 text-lg font-bold">Untuk Akademik</h3>
                    <p class="mt-2 text-sm leading-6 text-emerald-700">
                        Mendukung kegiatan belajar dan mengajar.
                    </p>
                </div>

                <div class="mt-10 rounded-3xl bg-amber-100 p-7 text-amber-900">
                    <div class="text-4xl">⚡</div>
                    <h3 class="mt-8 text-lg font-bold">Efisien</h3>
                    <p class="mt-2 text-sm leading-6 text-amber-700">
                        Akses informasi buku secara praktis.
                    </p>
                </div>

            </div>
        </div>
    </section>


    <!-- FITUR -->
    <section id="fitur" class="bg-slate-50 py-24">
        <div class="mx-auto max-w-7xl px-5 lg:px-8">

            <div class="mx-auto max-w-2xl text-center">
                <p class="text-xs font-extrabold uppercase tracking-[3px] text-indigo-600">
                    Fitur Platform
                </p>

                <h2 class="heading-font mt-4 text-3xl font-extrabold text-slate-900 sm:text-4xl">
                    Semua Kebutuhan Perpustakaan dalam Satu Platform
                </h2>

                <p class="mt-5 leading-7 text-slate-500">
                    BookSpace menyediakan fasilitas yang membantu pengelolaan
                    koleksi dan pengalaman pencarian buku.
                </p>
            </div>

            <div class="mt-14 grid gap-6 md:grid-cols-3">

                <div class="rounded-2xl border border-slate-100 bg-white p-8 shadow-sm transition hover:-translate-y-2 hover:shadow-xl">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-indigo-100 text-3xl">📖</div>
                    <h3 class="mt-6 text-xl font-bold text-slate-900">Katalog Buku</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-500">
                        Jelajahi informasi buku, penulis, penerbit, ISBN,
                        dan ketersediaan stok.
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-100 bg-white p-8 shadow-sm transition hover:-translate-y-2 hover:shadow-xl">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-violet-100 text-3xl">🗂️</div>
                    <h3 class="mt-6 text-xl font-bold text-slate-900">Manajemen Kategori</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-500">
                        Pengelompokan koleksi buku agar informasi
                        lebih terstruktur dan mudah ditemukan.
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-100 bg-white p-8 shadow-sm transition hover:-translate-y-2 hover:shadow-xl">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100 text-3xl">🔐</div>
                    <h3 class="mt-6 text-xl font-bold text-slate-900">Hak Akses Pengguna</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-500">
                        Pembagian akses Admin, Dosen, dan Mahasiswa
                        sesuai tanggung jawab masing-masing.
                    </p>
                </div>

            </div>
        </div>
    </section>


    <!-- KATEGORI -->
    <section id="kategori" class="mx-auto max-w-7xl px-5 py-24 lg:px-8">

        <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
            <div>
                <p class="text-xs font-extrabold uppercase tracking-[3px] text-indigo-600">
                    Jelajahi Koleksi
                </p>

                <h2 class="heading-font mt-3 text-3xl font-extrabold text-slate-900">
                    Beragam Kategori Buku
                </h2>

                <p class="mt-3 text-sm text-slate-500">
                    Temukan bidang pengetahuan yang ingin kamu pelajari.
                </p>
            </div>

            <a href="{{ route('login') }}"
               class="font-bold text-indigo-600 hover:text-indigo-800">
                Masuk untuk menjelajahi →
            </a>
        </div>

        <div class="mt-10 grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4">

            @php
                $categoryIcons = [
                    'Teknologi' => '💻',
                    'Pendidikan' => '🎓',
                    'Fiksi' => '📖',
                    'Nonfiksi' => '🧠',
                    'Sejarah' => '🏛️',
                    'Agama' => '🕌',
                    'Ekonomi' => '📈',
                ];
            @endphp

            @forelse (\App\Models\Category::orderBy('name')->take(8)->get() as $category)
                <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm transition hover:border-indigo-200 hover:shadow-lg">
                    <div class="text-3xl">
                        {{ $categoryIcons[$category->name] ?? '📚' }}
                    </div>

                    <h3 class="mt-4 font-bold text-slate-800">
                        {{ $category->name }}
                    </h3>

                    <p class="mt-2 line-clamp-2 text-xs leading-5 text-slate-500">
                        {{ $category->description ?: 'Jelajahi koleksi buku dalam kategori ini.' }}
                    </p>
                </div>
            @empty
                <div class="col-span-full rounded-2xl border border-dashed border-slate-300 p-10 text-center text-slate-500">
                    Kategori buku akan ditampilkan di sini.
                </div>
            @endforelse

        </div>
    </section>


    <!-- CTA -->
    <section class="px-5 pb-24 lg:px-8">
        <div class="relative mx-auto max-w-7xl overflow-hidden rounded-[2rem] bg-gradient-to-r from-indigo-700 to-violet-700 px-7 py-16 text-center text-white sm:px-14">

            <div class="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-white/10 blur-2xl"></div>
            <div class="absolute -bottom-24 -left-20 h-64 w-64 rounded-full bg-indigo-300/20 blur-2xl"></div>

            <div class="relative">
                <p class="text-xs font-bold uppercase tracking-[3px] text-indigo-200">
                    Start Your Journey
                </p>

                <h2 class="heading-font mx-auto mt-5 max-w-3xl text-3xl font-extrabold leading-tight sm:text-4xl">
                    Perjalanan Pengetahuanmu Dimulai dari Sini.
                </h2>

                <p class="mx-auto mt-5 max-w-xl text-sm leading-7 text-indigo-100">
                    Bergabunglah dengan BookSpace dan temukan pengalaman
                    menjelajahi perpustakaan yang lebih praktis.
                </p>

                <a href="{{ route('login') }}"
                   class="mt-9 inline-flex rounded-xl bg-white px-8 py-4 text-sm font-extrabold text-indigo-700 shadow-xl transition hover:-translate-y-1 hover:bg-indigo-50">
                    Masuk ke BookSpace →
                </a>
            </div>
        </div>
    </section>


    <!-- FOOTER -->
    <footer class="border-t border-slate-100 bg-slate-950 text-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-5 py-14 md:grid-cols-3 lg:px-8">

            <div>
                <h2 class="heading-font text-2xl font-extrabold">
                    Book<span class="text-indigo-400">Space.</span>
                </h2>

                <p class="mt-4 max-w-sm text-sm leading-7 text-slate-400">
                    Platform perpustakaan digital untuk mendukung
                    pengelolaan koleksi dan kebutuhan literasi akademik.
                </p>
            </div>

            <div>
                <h3 class="font-bold">Navigasi</h3>
                <div class="mt-5 flex flex-col gap-3 text-sm text-slate-400">
                    <a href="#beranda" class="hover:text-white">Beranda</a>
                    <a href="#tentang" class="hover:text-white">Tentang Kami</a>
                    <a href="#fitur" class="hover:text-white">Fitur</a>
                    <a href="#kategori" class="hover:text-white">Kategori</a>
                </div>
            </div>

            <div>
                <h3 class="font-bold">Akses Pengguna</h3>
                <div class="mt-5 flex flex-col gap-3 text-sm text-slate-400">
                    <a href="{{ route('login') }}" class="hover:text-white">Login</a>
                    <a href="{{ route('register') }}" class="hover:text-white">Registrasi</a>
                </div>
            </div>

        </div>

        <div class="border-t border-white/10">
            <div class="mx-auto flex max-w-7xl flex-col justify-between gap-3 px-5 py-6 text-xs text-slate-500 sm:flex-row lg:px-8">
                <p>© {{ date('Y') }} BookSpace. All rights reserved.</p>
                <p>Designed for Digital Library Management.</p>
            </div>
        </div>
    </footer>

</body>
</html>
