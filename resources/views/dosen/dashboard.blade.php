<x-app-layout>

    @php
        $user = auth()->user();
    @endphp

    {{-- HEADER --}}
    <x-slot name="header">
        <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
            <div>
                <div class="flex items-center gap-2 text-xs text-slate-400">
                    <span>BookSpace</span>
                    <span>/</span>
                    <span class="font-semibold text-emerald-600">Dashboard Dosen</span>
                </div>

                <h2 class="mt-1 text-2xl font-extrabold text-slate-800">
                    Dashboard Dosen
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Pusat informasi dan pengelolaan referensi akademik.
                </p>
            </div>

            <span class="inline-flex items-center gap-2 self-start rounded-full bg-emerald-100 px-4 py-2 text-xs font-bold text-emerald-700 ring-1 ring-emerald-200 sm:self-center">
                <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                DOSEN
            </span>
        </div>
    </x-slot>

    <main class="min-h-screen space-y-8 bg-[#f6f8fc] px-4 py-8 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-[1500px] space-y-8">

            {{-- HERO --}}
            <section class="relative isolate overflow-hidden rounded-[2rem] bg-gradient-to-br from-emerald-950 via-emerald-800 to-teal-600 p-7 text-white shadow-xl shadow-emerald-900/10 md:p-10">

                <div class="absolute -right-16 -top-20 -z-10 h-72 w-72 rounded-full border-[40px] border-white/5"></div>
                <div class="absolute -bottom-24 right-1/3 -z-10 h-64 w-64 rounded-full bg-teal-300/10 blur-3xl"></div>

                <div class="relative flex flex-col justify-between gap-7 lg:flex-row lg:items-center">

                    <div class="max-w-2xl">
                        <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3 py-1.5 text-xs font-semibold text-emerald-100">
                            <span class="h-2 w-2 rounded-full bg-emerald-300"></span>
                            FACULTY WORKSPACE
                        </span>

                        <p class="mt-6 text-sm text-emerald-100">
                            Selamat datang kembali,
                        </p>

                        <h1 class="mt-2 text-3xl font-extrabold tracking-tight md:text-4xl">
                            {{ $user->name }}<span class="text-teal-300">.</span>
                        </h1>

                        <p class="mt-4 max-w-xl text-sm leading-7 text-emerald-100 md:text-base">
                            Kelola referensi akademik dan bantu memperkaya koleksi
                            buku. Anda dapat melihat, menambahkan, serta memperbarui
                            informasi buku sesuai hak akses Dosen.
                        </p>

                        <div class="mt-7 flex flex-wrap gap-3">

                            @can('books.create')
                                <a href="{{ route('books.create') }}"
                                    class="inline-flex items-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-bold text-emerald-800 shadow-lg transition hover:-translate-y-0.5 hover:bg-emerald-50">
                                    <span class="text-lg">+</span>
                                    Tambah Buku
                                </a>
                            @endcan

                            <a href="{{ route('books.index') }}"
                                class="rounded-xl border border-white/20 bg-white/10 px-5 py-3 text-sm font-semibold text-white backdrop-blur transition hover:bg-white/20">
                                Jelajahi Katalog
                            </a>

                        </div>
                    </div>

                    <div class="hidden items-center justify-center lg:flex">
                        <div class="flex h-44 w-44 items-center justify-center rounded-[2.5rem] border border-white/20 bg-white/10 shadow-2xl backdrop-blur-xl">
                            <svg class="h-24 w-24 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M12 7.5C9.5 5.5 6 5.3 3 6.5v12c3-1.2 6.5-1 9 1m0-12c2.5-2 6-2.2 9-1v12c-3-1.2-6.5-1-9 1m0-12v12"
                                    stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7 9h2m-2 3h2m6-3h2m-2 3h2"
                                    stroke-width="1.3" stroke-linecap="round"/>
                            </svg>
                        </div>
                    </div>

                </div>
            </section>


            {{-- STATISTIK --}}
            <section>
                <div class="mb-5">
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-emerald-600">
                        Academic Overview
                    </p>

                    <h2 class="mt-1 text-xl font-extrabold text-slate-900">
                        Ringkasan Koleksi
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Data koleksi buku yang tersimpan dalam sistem.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">

                    {{-- TOTAL BUKU --}}
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-slate-500">Total Buku</p>
                                <h3 class="mt-3 text-3xl font-extrabold text-slate-900">
                                    {{ number_format($totalBooks, 0, ',', '.') }}
                                </h3>
                                <p class="mt-2 text-xs text-slate-400">Judul terdaftar</p>
                            </div>

                            <div class="rounded-2xl bg-blue-50 p-4 text-blue-600">
                                <span class="text-2xl">📚</span>
                            </div>
                        </div>
                    </div>

                    {{-- TOTAL STOK --}}
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-slate-500">Total Stok</p>
                                <h3 class="mt-3 text-3xl font-extrabold text-slate-900">
                                    {{ number_format($totalStock, 0, ',', '.') }}
                                </h3>
                                <p class="mt-2 text-xs text-slate-400">Seluruh eksemplar</p>
                            </div>

                            <div class="rounded-2xl bg-emerald-50 p-4 text-emerald-600">
                                <span class="text-2xl">📦</span>
                            </div>
                        </div>
                    </div>

                    {{-- KATEGORI --}}
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-slate-500">Kategori</p>
                                <h3 class="mt-3 text-3xl font-extrabold text-slate-900">
                                    {{ number_format($totalCategories, 0, ',', '.') }}
                                </h3>
                                <p class="mt-2 text-xs text-slate-400">Kategori tersedia</p>
                            </div>

                            <div class="rounded-2xl bg-amber-50 p-4 text-amber-600">
                                <span class="text-2xl">🗂️</span>
                            </div>
                        </div>
                    </div>

                    {{-- PENGGUNA --}}
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-slate-500">Pengguna</p>
                                <h3 class="mt-3 text-3xl font-extrabold text-slate-900">
                                    {{ number_format($totalUsers, 0, ',', '.') }}
                                </h3>
                                <p class="mt-2 text-xs text-slate-400">Akun terdaftar</p>
                            </div>

                            <div class="rounded-2xl bg-violet-50 p-4 text-violet-600">
                                <span class="text-2xl">👥</span>
                            </div>
                        </div>
                    </div>

                </div>
            </section>


            {{-- AKSES CEPAT --}}
            <section>
                <div class="mb-5">
                    <h2 class="text-xl font-extrabold text-slate-900">
                        Akses Cepat
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Fitur yang tersedia untuk akun Dosen.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-5 md:grid-cols-3">

                    <a href="{{ route('books.index') }}"
                        class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-50 text-2xl transition group-hover:bg-blue-600 group-hover:text-white">
                            📖
                        </div>

                        <h3 class="mt-5 font-bold text-slate-800">
                            Katalog Buku
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Lihat dan cari seluruh koleksi buku.
                        </p>

                        <span class="mt-5 inline-block text-sm font-bold text-blue-600">
                            Buka Katalog →
                        </span>
                    </a>

                    @can('books.create')
                        <a href="{{ route('books.create') }}"
                            class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-emerald-200 hover:shadow-lg">

                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50 text-2xl transition group-hover:bg-emerald-600 group-hover:text-white">
                                ➕
                            </div>

                            <h3 class="mt-5 font-bold text-slate-800">
                                Tambah Buku
                            </h3>

                            <p class="mt-2 text-sm leading-6 text-slate-500">
                                Masukkan koleksi baru ke dalam database.
                            </p>

                            <span class="mt-5 inline-block text-sm font-bold text-emerald-600">
                                Tambahkan Buku →
                            </span>
                        </a>
                    @endcan

                    <a href="{{ route('profile.edit') }}"
                        class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-violet-200 hover:shadow-lg">

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-violet-50 text-2xl transition group-hover:bg-violet-600 group-hover:text-white">
                            👤
                        </div>

                        <h3 class="mt-5 font-bold text-slate-800">
                            Profil Saya
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Perbarui identitas dan keamanan akun.
                        </p>

                        <span class="mt-5 inline-block text-sm font-bold text-violet-600">
                            Pengaturan Profil →
                        </span>
                    </a>

                </div>
            </section>


            {{-- BUKU TERBARU --}}
            <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-100 p-6">

                    <div>
                        <h2 class="text-lg font-extrabold text-slate-900">
                            Koleksi Buku Terbaru
                        </h2>

                        <p class="mt-1 text-xs text-slate-500">
                            Buku yang baru ditambahkan ke sistem.
                        </p>
                    </div>

                    <a href="{{ route('books.index') }}"
                        class="rounded-lg bg-blue-50 px-3 py-2 text-xs font-bold text-blue-600 hover:bg-blue-100">
                        Lihat Semua →
                    </a>

                </div>

                <div class="overflow-x-auto">
                    <table class="w-full whitespace-nowrap text-left text-sm">

                        <thead class="bg-slate-50 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                            <tr>
                                <th class="px-6 py-4">No.</th>
                                <th class="px-6 py-4">Judul Buku</th>
                                <th class="px-6 py-4">Penulis</th>
                                <th class="px-6 py-4">Kategori</th>
                                <th class="px-6 py-4">Stok</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100">

                            @forelse($latestBooks as $index => $book)

                                <tr class="transition hover:bg-slate-50">

                                    <td class="px-6 py-4 text-slate-400">
                                        {{ $index + 1 }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            @if($book->cover)
                                                <img
                                                    src="{{ asset('storage/'.$book->cover) }}"
                                                    alt="{{ $book->title }}"
                                                    class="h-12 w-10 rounded-lg border object-cover">
                                            @else
                                                <div class="flex h-12 w-10 items-center justify-center rounded-lg bg-blue-50">
                                                    📚
                                                </div>
                                            @endif

                                            <div>
                                                <p class="max-w-xs truncate font-bold text-slate-800">
                                                    {{ $book->title }}
                                                </p>
                                                <p class="text-xs text-slate-500">
                                                    {{ $book->publication_year ?? 'Tahun tidak tersedia' }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 text-slate-600">
                                        {{ $book->author }}
                                    </td>

                                    <td class="px-6 py-4 text-slate-600">
                                        {{ $book->category->name ?? 'Tanpa kategori' }}
                                    </td>

                                    <td class="px-6 py-4 font-bold text-slate-700">
                                        {{ $book->stock }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('books.show', $book) }}"
                                                class="rounded-lg border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-600 hover:bg-blue-50 hover:text-blue-600">
                                                Detail
                                            </a>

                                            @can('books.edit')
                                                <a href="{{ route('books.edit', $book) }}"
                                                    class="rounded-lg border border-amber-200 bg-amber-50 px-3 py-2 text-xs font-semibold text-amber-700 hover:bg-amber-100">
                                                    Edit
                                                </a>
                                            @endcan
                                        </div>
                                    </td>

                                </tr>

                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-sm text-slate-400">
                                        Belum ada buku yang terdaftar.
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>

            </section>


            {{-- CATEGORY OVERVIEW --}}
            <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                <div class="mb-6">
                    <p class="text-xs font-bold uppercase tracking-widest text-emerald-600">
                        Category Overview
                    </p>

                    <h2 class="mt-1 text-lg font-extrabold text-slate-900">
                        Koleksi Berdasarkan Kategori
                    </h2>
                </div>

                <div class="space-y-5">

                    @forelse($categoryStats as $category)
                        <div>
                            <div class="mb-2 flex justify-between gap-3">
                                <span class="text-sm font-semibold text-slate-700">
                                    {{ $category->name }}
                                </span>

                                <span class="text-xs font-bold text-emerald-600">
                                    {{ $category->books_count }} buku
                                </span>
                            </div>

                            <div class="h-2.5 overflow-hidden rounded-full bg-slate-100">
                                <div
                                    class="h-full rounded-full bg-gradient-to-r from-emerald-500 to-teal-500"
                                    style="width: {{ $totalBooks > 0 ? ($category->books_count / $totalBooks) * 100 : 0 }}%">
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="py-6 text-center text-sm text-slate-400">
                            Belum ada kategori.
                        </p>
                    @endforelse

                </div>

            </section>


            {{-- FOOTER --}}
            <footer class="border-t border-slate-200 py-6 text-center text-xs text-slate-400">
                © {{ date('Y') }} BookSpace — Dosen Workspace.
            </footer>

        </div>
    </main>

</x-app-layout>
