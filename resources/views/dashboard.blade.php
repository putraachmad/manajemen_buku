
<x-app-layout>

    @php
        $user = auth()->user();

        $role = $user->getRoleNames()->first() ?? 'Belum memiliki role';

        $roleStyle = match ($role) {
            'Admin' => 'bg-indigo-100 text-indigo-700 ring-indigo-200',
            'Dosen' => 'bg-emerald-100 text-emerald-700 ring-emerald-200',
            'Mahasiswa' => 'bg-amber-100 text-amber-700 ring-amber-200',
            default => 'bg-slate-100 text-slate-600 ring-slate-200',
        };

        $totalUsers = \App\Models\User::count();
    @endphp

    {{-- HEADER --}}
    <x-slot name="header">
        <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
            <div>
                <div class="flex items-center gap-2 text-xs font-medium text-slate-400">
                    <span>BookSpace</span>
                    <span>/</span>
                    <span class="text-blue-600">Dashboard</span>
                </div>

                <h2 class="mt-1 text-2xl font-extrabold tracking-tight text-slate-800">
                    Dashboard Overview
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Pusat informasi Sistem Manajemen Buku
                </p>
            </div>

            <div class="flex items-center gap-3">
                <span class="inline-flex items-center gap-2 rounded-full px-4 py-2 text-xs font-bold ring-1 {{ $roleStyle }}">
                    <span class="h-2 w-2 rounded-full bg-current"></span>
                    {{ $role }}
                </span>

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-blue-600 to-indigo-600 font-bold text-white shadow-md shadow-blue-500/20">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
            </div>
        </div>
    </x-slot>

    <div class="min-h-screen bg-[#f6f8fc]">

        <main class="mx-auto max-w-[1500px] space-y-8 px-4 py-8 sm:px-6 lg:px-8">

            {{-- HERO SECTION --}}
            <section class="relative isolate overflow-hidden rounded-[2rem] bg-gradient-to-br from-indigo-950 via-blue-800 to-blue-600 p-7 text-white shadow-xl shadow-blue-900/10 md:p-10">

                <div class="absolute -right-20 -top-24 -z-10 h-80 w-80 rounded-full border-[45px] border-white/5"></div>

                <div class="absolute -bottom-32 right-1/3 -z-10 h-72 w-72 rounded-full bg-cyan-400/10 blur-3xl"></div>

                <div class="relative flex flex-col justify-between gap-8 lg:flex-row lg:items-center">

                    <div class="max-w-2xl">

                        <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 text-xs font-semibold text-blue-100 backdrop-blur">
                            <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                            SISTEM INFORMASI MANAJEMEN BUKU
                        </div>

                        <p class="mt-6 text-sm font-medium text-blue-200">
                            Selamat datang kembali,
                        </p>

                        <h1 class="mt-2 text-3xl font-extrabold tracking-tight md:text-4xl">
                            {{ $user->name }}<span class="text-cyan-300">.</span>
                        </h1>

                        <p class="mt-4 max-w-xl text-sm leading-7 text-blue-100 md:text-base">
                            Selamat datang di BookSpace. Nikmati kemudahan mengakses
                            informasi, menjelajahi koleksi buku, dan mengelola aktivitas
                            sesuai dengan hak akses akun Anda.
                        </p>

                        <div class="mt-7 flex flex-wrap items-center gap-3">

                            <a href="#menu-utama"
                                class="inline-flex items-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-bold text-blue-700 shadow-lg transition hover:-translate-y-1 hover:bg-blue-50">
                                Jelajahi Menu
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M5 12h14m-6-6 6 6-6 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>

                            <a href="{{ route('profile.edit') }}"
                                class="rounded-xl border border-white/20 bg-white/10 px-5 py-3 text-sm font-semibold text-white backdrop-blur transition hover:bg-white/20">
                                Profil Saya
                            </a>

                        </div>
                    </div>

                    <div class="hidden items-center justify-center lg:flex">
                        <div class="relative flex h-48 w-48 items-center justify-center rounded-[2.5rem] border border-white/20 bg-white/10 shadow-2xl backdrop-blur-xl">

                            <div class="absolute inset-3 rounded-[2rem] border border-white/10"></div>

                            <svg class="h-28 w-28 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M12 7.5C9.5 5.5 6 5.3 3 6.5v12c3-1.2 6.5-1 9 1m0-12c2.5-2 6-2.2 9-1v12c-3-1.2-6.5-1-9 1m0-12v12"
                                    stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7 9h2m-2 3h2m6-3h2m-2 3h2"
                                    stroke-width="1.3" stroke-linecap="round"/>
                            </svg>

                        </div>
                    </div>

                </div>
            </section>


            {{-- STATISTICS --}}
            <section>

                <div class="mb-5 flex flex-wrap items-end justify-between gap-3">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-blue-600">
                            Overview
                        </p>

                        <h2 class="mt-1 text-xl font-extrabold text-slate-900">
                            Ringkasan Sistem
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Informasi umum koleksi dan pengguna BookSpace.
                        </p>
                    </div>

                    <span class="rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs font-medium text-slate-500">
                        {{ now()->format('d M Y') }}
                    </span>
                </div>


                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">

                    {{-- TOTAL BUKU --}}
                    <div class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">

                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-slate-500">
                                    Total Koleksi Buku
                                </p>

                                <h3 class="mt-3 text-3xl font-extrabold text-slate-900">
                                    0
                                </h3>

                                <p class="mt-2 text-xs text-slate-400">
                                    Judul buku terdaftar
                                </p>
                            </div>

                            <div class="rounded-2xl bg-blue-50 p-4 text-blue-600 transition group-hover:bg-blue-600 group-hover:text-white">
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v16H6.5A2.5 2.5 0 0 0 4 21V5.5Z" stroke-width="1.8"/>
                                    <path d="M4 17a2.5 2.5 0 0 1 2.5-2.5H20" stroke-width="1.8"/>
                                </svg>
                            </div>
                        </div>

                    </div>


                    {{-- TOTAL STOK --}}
                    <div class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">

                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-slate-500">
                                    Total Stok
                                </p>

                                <h3 class="mt-3 text-3xl font-extrabold text-slate-900">
                                    0
                                </h3>

                                <p class="mt-2 text-xs text-slate-400">
                                    Seluruh eksemplar
                                </p>
                            </div>

                            <div class="rounded-2xl bg-emerald-50 p-4 text-emerald-600 transition group-hover:bg-emerald-600 group-hover:text-white">
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="m3 7 9-4 9 4-9 5-9-5Z" stroke-width="1.8" stroke-linejoin="round"/>
                                    <path d="m3 12 9 5 9-5M3 17l9 5 9-5" stroke-width="1.8" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>

                    </div>


                    {{-- KATEGORI --}}
                    <div class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">

                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-slate-500">
                                    Kategori Buku
                                </p>

                                <h3 class="mt-3 text-3xl font-extrabold text-slate-900">
                                    0
                                </h3>

                                <p class="mt-2 text-xs text-slate-400">
                                    Kategori tersedia
                                </p>
                            </div>

                            <div class="rounded-2xl bg-amber-50 p-4 text-amber-600 transition group-hover:bg-amber-500 group-hover:text-white">
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M3 7a2 2 0 0 1 2-2h5l2 2h7a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7Z" stroke-width="1.8" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>

                    </div>


                    {{-- PENGGUNA --}}
                    <div class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">

                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-slate-500">
                                    Total Pengguna
                                </p>

                                <h3 class="mt-3 text-3xl font-extrabold text-slate-900">
                                    {{ $totalUsers }}
                                </h3>

                                <p class="mt-2 text-xs text-slate-400">
                                    Akun terdaftar
                                </p>
                            </div>

                            <div class="rounded-2xl bg-violet-50 p-4 text-violet-600 transition group-hover:bg-violet-600 group-hover:text-white">
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <circle cx="9" cy="8" r="3.5" stroke-width="1.8"/>
                                    <path d="M2.5 20a6.5 6.5 0 0 1 13 0M16 5a3.5 3.5 0 0 1 0 7m1.5 2a5.5 5.5 0 0 1 4 6" stroke-width="1.8" stroke-linecap="round"/>
                                </svg>
                            </div>
                        </div>

                    </div>

                </div>

            </section>


            {{-- MENU UTAMA --}}
            <section id="menu-utama">

                <div class="mb-5">
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-blue-600">
                        Quick Access
                    </p>

                    <h2 class="mt-1 text-xl font-extrabold text-slate-900">
                        Menu Utama
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Pilih fitur sesuai hak akses akun Anda.
                    </p>
                </div>


                <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-3">


                    {{-- MENU ADMIN --}}
                    @if($user->hasRole('Admin'))

                        <a href="{{ route('admin.dashboard') }}"
                           class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-blue-200 hover:shadow-xl">

                            <div class="flex items-center justify-between">
                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-50 text-blue-600 transition group-hover:bg-blue-600 group-hover:text-white">
                                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v16H6.5A2.5 2.5 0 0 0 4 21V5.5Z" stroke-width="1.8"/>
                                    </svg>
                                </div>

                                <span class="text-xl text-slate-300 transition group-hover:translate-x-1 group-hover:text-blue-600">→</span>
                            </div>

                            <h3 class="mt-5 text-base font-bold text-slate-800">
                                Dashboard Administrator
                            </h3>

                            <p class="mt-2 text-sm leading-6 text-slate-500">
                                Masuk ke pusat kontrol untuk mengelola seluruh sistem Manajemen Buku.
                            </p>

                            <span class="mt-5 inline-flex rounded-lg bg-blue-50 px-3 py-2 text-xs font-bold text-blue-700">
                                Hak akses Admin
                            </span>

                        </a>

                        <div class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">

                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-violet-50 text-violet-600">
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <circle cx="9" cy="8" r="3.5" stroke-width="1.8"/>
                                    <path d="M2.5 20a6.5 6.5 0 0 1 13 0" stroke-width="1.8"/>
                                </svg>
                            </div>

                            <h3 class="mt-5 text-base font-bold text-slate-800">
                                Manajemen Pengguna
                            </h3>

                            <p class="mt-2 text-sm leading-6 text-slate-500">
                                Pengelolaan akun, role, dan hak akses pengguna.
                            </p>

                            <span class="mt-5 inline-flex rounded-lg bg-violet-50 px-3 py-2 text-xs font-bold text-violet-700">
                                Khusus Administrator
                            </span>

                        </div>

                    @endif


                    {{-- MENU DOSEN --}}
                    @if($user->hasRole('Dosen'))

                        <div class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">

                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M3 5.5 12 2l9 3.5-9 4-9-4ZM3 10l9 4 9-4M3 15l9 4 9-4" stroke-width="1.8" stroke-linejoin="round"/>
                                </svg>
                            </div>

                            <h3 class="mt-5 text-base font-bold text-slate-800">
                                Referensi Akademik
                            </h3>

                            <p class="mt-2 text-sm leading-6 text-slate-500">
                                Akses koleksi buku untuk mendukung kegiatan pembelajaran.
                            </p>

                            <span class="mt-5 inline-flex rounded-lg bg-emerald-50 px-3 py-2 text-xs font-bold text-emerald-700">
                                Akses Dosen
                            </span>

                        </div>

                    @endif


                    {{-- MENU MAHASISWA --}}
                    @if($user->hasRole('Mahasiswa'))

                        <div class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">

                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-amber-50 text-amber-600">
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <circle cx="10" cy="10" r="6" stroke-width="1.8"/>
                                    <path d="m14.5 14.5 6 6M7 10h6M10 7v6" stroke-width="1.8" stroke-linecap="round"/>
                                </svg>
                            </div>

                            <h3 class="mt-5 text-base font-bold text-slate-800">
                                Referensi Belajar
                            </h3>

                            <p class="mt-2 text-sm leading-6 text-slate-500">
                                Temukan koleksi buku untuk menunjang kegiatan perkuliahan.
                            </p>

                            <span class="mt-5 inline-flex rounded-lg bg-amber-50 px-3 py-2 text-xs font-bold text-amber-700">
                                Akses Mahasiswa
                            </span>

                        </div>

                    @endif


                    {{-- KATALOG BUKU --}}
                    @if($user->hasAnyRole(['Admin', 'Dosen', 'Mahasiswa']))

                        <div class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-indigo-200 hover:shadow-xl">

                            <div class="flex items-center justify-between">

                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-indigo-50 text-indigo-600 transition group-hover:bg-indigo-600 group-hover:text-white">
                                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <circle cx="10" cy="10" r="7" stroke-width="1.8"/>
                                        <path d="m15 15 6 6" stroke-width="1.8" stroke-linecap="round"/>
                                    </svg>
                                </div>

                                <span class="rounded-full bg-emerald-50 px-3 py-1 text-[10px] font-bold text-emerald-600">
                                    ALL USERS
                                </span>

                            </div>

                            <h3 class="mt-5 text-base font-bold text-slate-800">
                                Katalog Buku
                            </h3>

                            <p class="mt-2 text-sm leading-6 text-slate-500">
                                Lihat dan temukan koleksi buku yang tersedia dalam sistem.
                            </p>

                            <span class="mt-5 inline-flex rounded-lg bg-indigo-50 px-3 py-2 text-xs font-bold text-indigo-700">
                                Dapat diakses
                            </span>

                        </div>

                    @endif


                    {{-- PROFIL --}}
                    <a href="{{ route('profile.edit') }}"
                       class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-slate-300 hover:shadow-xl">

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-600 transition group-hover:bg-slate-800 group-hover:text-white">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <circle cx="12" cy="8" r="4" stroke-width="1.8"/>
                                <path d="M4 21a8 8 0 0 1 16 0" stroke-width="1.8" stroke-linecap="round"/>
                            </svg>
                        </div>

                        <h3 class="mt-5 text-base font-bold text-slate-800">
                            Profil Saya
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Kelola informasi akun dan keamanan profil Anda.
                        </p>

                        <span class="mt-5 inline-flex rounded-lg bg-slate-100 px-3 py-2 text-xs font-bold text-slate-600">
                            Pengaturan Akun
                        </span>

                    </a>

                </div>

            </section>


            {{-- BOTTOM SECTION --}}
            <section class="grid grid-cols-1 gap-6 lg:grid-cols-3">

                {{-- ACCOUNT INFORMATION --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm lg:col-span-2">

                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="font-extrabold text-slate-900">
                                Informasi Akun
                            </h2>

                            <p class="mt-1 text-xs text-slate-500">
                                Identitas pengguna yang sedang login.
                            </p>
                        </div>

                        <span class="rounded-xl bg-blue-50 p-3 text-blue-600">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <circle cx="12" cy="8" r="3.5" stroke-width="1.8"/>
                                <path d="M4 21a8 8 0 0 1 16 0" stroke-width="1.8"/>
                            </svg>
                        </span>
                    </div>

                    <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2">

                        <div class="rounded-xl bg-slate-50 p-4">
                            <p class="text-xs text-slate-400">Nama Pengguna</p>
                            <p class="mt-2 break-words text-sm font-bold text-slate-800">
                                {{ $user->name }}
                            </p>
                        </div>

                        <div class="rounded-xl bg-slate-50 p-4">
                            <p class="text-xs text-slate-400">Alamat Email</p>
                            <p class="mt-2 break-all text-sm font-bold text-slate-800">
                                {{ $user->email }}
                            </p>
                        </div>

                        <div class="rounded-xl bg-slate-50 p-4">
                            <p class="text-xs text-slate-400">Role Pengguna</p>
                            <p class="mt-2 text-sm font-bold text-slate-800">
                                {{ $role }}
                            </p>
                        </div>

                        <div class="rounded-xl bg-slate-50 p-4">
                            <p class="text-xs text-slate-400">Status Akun</p>
                            <p class="mt-2 inline-flex items-center gap-2 text-sm font-bold text-emerald-600">
                                <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                                Aktif
                            </p>
                        </div>

                    </div>

                    <div class="mt-5">
                        <a href="{{ route('profile.edit') }}"
                           class="inline-flex items-center gap-2 text-sm font-bold text-blue-600 transition hover:text-blue-800">
                            Perbarui Profil
                            <span>→</span>
                        </a>
                    </div>

                </div>


                {{-- SYSTEM INFORMATION --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                    <h2 class="font-extrabold text-slate-900">
                        Informasi Sistem
                    </h2>

                    <p class="mt-1 text-xs text-slate-500">
                        Detail aplikasi BookSpace.
                    </p>

                    <div class="mt-6 space-y-5">

                        <div class="flex items-center justify-between gap-3">
                            <span class="text-xs text-slate-500">Aplikasi</span>
                            <span class="text-xs font-bold text-slate-800">
                                BookSpace
                            </span>
                        </div>

                        <div class="h-px bg-slate-100"></div>

                        <div class="flex items-center justify-between gap-3">
                            <span class="text-xs text-slate-500">Aplikasi</span>
                            <span class="text-xs font-bold text-slate-800">
                                manajemen-buku
                            </span>
                        </div>

                        <div class="h-px bg-slate-100"></div>

                        <div class="flex items-center justify-between gap-3">
                            <span class="text-xs text-slate-500">Versi Sistem</span>
                            <span class="text-xs font-bold text-slate-800">
                                1.0.0
                            </span>
                        </div>

                        <div class="h-px bg-slate-100"></div>

                        <div class="flex items-center justify-between gap-3">
                            <span class="text-xs text-slate-500">Status</span>

                            <span class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-600">
                                <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                                Online
                            </span>
                        </div>

                    </div>

                </div>

            </section>


            {{-- FOOTER --}}
            <footer class="flex flex-col justify-between gap-2 border-t border-slate-200 py-6 text-center text-xs text-slate-400 sm:flex-row sm:text-left">

                <p>
                    © {{ date('Y') }} BookSpace.
                    Sistem Informasi Manajemen Buku.
                </p>

                <p>
                    Sistem Informasi Manajemen Buku.
                </p>

            </footer>

        </main>
    </div>

</x-app-layout>
