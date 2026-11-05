
<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
            <div>
                <div class="flex items-center gap-2 text-xs text-slate-400">
                    <span>BookSpace</span>
                    <span>/</span>
                    <span class="font-semibold text-blue-600">Manajemen Buku</span>
                </div>

                <h2 class="mt-1 text-2xl font-extrabold tracking-tight text-slate-800">
                    Koleksi Buku
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Kelola dan telusuri seluruh koleksi buku.
                </p>
            </div>

            @can('books.create')
                <a href="{{ route('books.create') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-blue-600/20 transition hover:-translate-y-0.5 hover:bg-blue-700">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M12 5v14m-7-7h14" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    Tambah Buku
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="min-h-screen bg-[#f6f8fc]">
        <main class="mx-auto max-w-[1500px] space-y-6 px-4 py-8 sm:px-6 lg:px-8">

            {{-- SUCCESS MESSAGE --}}
            @if(session('success'))
                <div class="flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-700">
                    <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="m5 12 4 4L19 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            {{-- ERROR MESSAGE --}}
            @if(session('error'))
                <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                    {{ session('error') }}
                </div>
            @endif

            {{-- INTRO --}}
            <section class="relative isolate overflow-hidden rounded-2xl bg-gradient-to-br from-indigo-950 via-blue-800 to-blue-600 p-6 text-white shadow-xl md:p-8">
                <div class="absolute -right-10 -top-20 -z-10 h-64 w-64 rounded-full border-[35px] border-white/5"></div>

                <div class="relative flex flex-col justify-between gap-5 sm:flex-row sm:items-center">
                    <div>
                        <span class="rounded-full border border-white/20 bg-white/10 px-3 py-1.5 text-[10px] font-bold tracking-widest text-blue-100">
                            LIBRARY COLLECTION
                        </span>

                        <h1 class="mt-4 text-2xl font-extrabold md:text-3xl">
                            Jelajahi Koleksi Buku
                        </h1>

                        <p class="mt-2 max-w-xl text-sm leading-6 text-blue-100">
                            Temukan informasi buku berdasarkan judul, penulis, ISBN, maupun kategori.
                        </p>
                    </div>

                    <div class="flex h-20 w-20 shrink-0 items-center justify-center rounded-2xl border border-white/20 bg-white/10">
                        <svg class="h-11 w-11" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v16H6.5A2.5 2.5 0 0 0 4 21V5.5Z" stroke-width="1.5"/>
                            <path d="M4 17a2.5 2.5 0 0 1 2.5-2.5H20" stroke-width="1.5"/>
                        </svg>
                    </div>
                </div>
            </section>

            {{-- SUMMARY --}}
            <section class="grid grid-cols-1 gap-4 sm:grid-cols-3">

                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <p class="text-sm text-slate-500">Hasil Pencarian</p>
                    <p class="mt-2 text-3xl font-extrabold text-slate-900">
                        {{ number_format($books->total(), 0, ',', '.') }}
                    </p>
                    <p class="mt-1 text-xs text-slate-400">Buku ditemukan</p>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <p class="text-sm text-slate-500">Halaman Saat Ini</p>
                    <p class="mt-2 text-3xl font-extrabold text-slate-900">
                        {{ $books->currentPage() }}
                    </p>
                    <p class="mt-1 text-xs text-slate-400">
                        Dari {{ $books->lastPage() }} halaman
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <p class="text-sm text-slate-500">Jumlah Ditampilkan</p>
                    <p class="mt-2 text-3xl font-extrabold text-slate-900">
                        {{ $books->count() }}
                    </p>
                    <p class="mt-1 text-xs text-slate-400">Buku pada halaman ini</p>
                </div>

            </section>

            {{-- TABLE --}}
            <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                {{-- TABLE HEADER --}}
                <div class="border-b border-slate-100 p-5 md:p-6">
                    <div class="flex flex-col justify-between gap-4 lg:flex-row lg:items-center">

                        <div>
                            <h2 class="text-lg font-extrabold text-slate-900">
                                Data Koleksi Buku
                            </h2>
                            <p class="mt-1 text-xs text-slate-500">
                                Daftar buku yang tersimpan dalam database.
                            </p>
                        </div>

                        {{-- SEARCH --}}
                        <form action="{{ route('books.index') }}" method="GET"
                              class="flex w-full flex-col gap-2 sm:flex-row lg:w-auto">

                            <div class="relative flex-1">
                                <svg class="absolute left-3 top-3 h-4 w-4 text-slate-400"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <circle cx="11" cy="11" r="7" stroke-width="1.8"/>
                                    <path d="m16 16 4 4" stroke-width="1.8" stroke-linecap="round"/>
                                </svg>

                                <input
                                    type="text"
                                    name="search"
                                    value="{{ request('search') }}"
                                    placeholder="Cari judul, penulis, ISBN..."
                                    class="w-full rounded-xl border-slate-200 py-2.5 pl-10 pr-4 text-sm focus:border-blue-500 focus:ring-blue-500 sm:w-80">
                            </div>

                            <button type="submit"
                                class="rounded-xl bg-slate-900 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
                                Cari
                            </button>

                            @if(request('search'))
                                <a href="{{ route('books.index') }}"
                                   class="rounded-xl border border-slate-200 px-4 py-2.5 text-center text-sm font-semibold text-slate-600 hover:bg-slate-50">
                                    Reset
                                </a>
                            @endif

                        </form>

                    </div>
                </div>

                {{-- TABLE CONTENT --}}
                <div class="overflow-x-auto">

                    <table class="w-full whitespace-nowrap text-left text-sm">

                        <thead class="bg-slate-50 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                            <tr>
                                <th class="px-5 py-4">No.</th>
                                <th class="px-5 py-4">Informasi Buku</th>
                                <th class="px-5 py-4">Kategori</th>
                                <th class="px-5 py-4">ISBN</th>
                                <th class="px-5 py-4">Stok</th>
                                <th class="px-5 py-4">Status</th>
                                <th class="px-5 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100">

                            @forelse($books as $index => $book)

                                <tr class="transition hover:bg-slate-50/80">

                                    <td class="px-5 py-4 text-slate-400">
                                        {{ $books->firstItem() + $index }}
                                    </td>

                                    {{-- BOOK INFORMATION --}}
                                    <td class="px-5 py-4">
                                        <div class="flex items-center gap-3">

                                            @if($book->cover)
                                                <img
                                                    src="{{ asset('storage/' . $book->cover) }}"
                                                    alt="{{ $book->title }}"
                                                    class="h-14 w-11 rounded-lg border border-slate-200 object-cover">
                                            @else
                                                <div class="flex h-14 w-11 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v16H6.5A2.5 2.5 0 0 0 4 21V5.5Z" stroke-width="1.5"/>
                                                    </svg>
                                                </div>
                                            @endif

                                            <div class="min-w-0">
                                                <p class="max-w-xs truncate font-bold text-slate-800">
                                                    {{ $book->title }}
                                                </p>

                                                <p class="mt-1 text-xs text-slate-500">
                                                    {{ $book->author }}
                                                </p>

                                                <p class="mt-1 text-[10px] text-slate-400">
                                                    {{ $book->publisher ?: 'Penerbit belum diisi' }}
                                                </p>
                                            </div>

                                        </div>
                                    </td>

                                    {{-- CATEGORY --}}
                                    <td class="px-5 py-4">
                                        <span class="rounded-lg bg-indigo-50 px-3 py-1.5 text-xs font-semibold text-indigo-700">
                                            {{ $book->category->name ?? 'Tanpa kategori' }}
                                        </span>
                                    </td>

                                    {{-- ISBN --}}
                                    <td class="px-5 py-4 text-xs text-slate-500">
                                        {{ $book->isbn ?: '—' }}
                                    </td>

                                    {{-- STOCK --}}
                                    <td class="px-5 py-4">
                                        <span class="font-bold text-slate-800">
                                            {{ number_format($book->stock, 0, ',', '.') }}
                                        </span>
                                    </td>

                                    {{-- STATUS --}}
                                    <td class="px-5 py-4">
                                        @if($book->stock > 0)
                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1.5 text-[11px] font-bold text-emerald-700">
                                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                                Tersedia
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-3 py-1.5 text-[11px] font-bold text-red-700">
                                                <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                                Habis
                                            </span>
                                        @endif
                                    </td>

                                    {{-- ACTION --}}
                                    <td class="px-5 py-4">
                                        <div class="flex items-center justify-center gap-2">

                                            {{-- DETAIL --}}
                                            @can('books.view')
                                                <a href="{{ route('books.show', $book) }}"
                                                   title="Lihat detail"
                                                   class="rounded-lg border border-slate-200 p-2 text-slate-500 transition hover:border-blue-200 hover:bg-blue-50 hover:text-blue-600">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z" stroke-width="1.7"/>
                                                        <circle cx="12" cy="12" r="3" stroke-width="1.7"/>
                                                    </svg>
                                                </a>
                                            @endcan

                                            {{-- EDIT --}}
                                            @can('books.edit')
                                                <a href="{{ route('books.edit', $book) }}"
                                                   title="Edit buku"
                                                   class="rounded-lg border border-slate-200 p-2 text-slate-500 transition hover:border-amber-200 hover:bg-amber-50 hover:text-amber-600">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path d="m14 5 5 5M4 20l4.5-1 10-10a2.1 2.1 0 0 0-3-3l-10 10L4 20Z"
                                                            stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </a>
                                            @endcan

                                            {{-- DELETE --}}
                                            @can('books.delete')
                                                <form method="POST"
                                                      action="{{ route('books.destroy', $book) }}"
                                                      onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                        title="Hapus buku"
                                                        class="rounded-lg border border-slate-200 p-2 text-slate-500 transition hover:border-red-200 hover:bg-red-50 hover:text-red-600">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path d="M4 7h16M10 11v6m4-6v6M5 7l1 14h12l1-14M9 7V4h6v3"
                                                                stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endcan

                                        </div>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="7" class="px-6 py-16 text-center">

                                        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-slate-100 text-slate-400">
                                            <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v16H6.5A2.5 2.5 0 0 0 4 21V5.5Z" stroke-width="1.5"/>
                                                <path d="M4 17a2.5 2.5 0 0 1 2.5-2.5H20" stroke-width="1.5"/>
                                            </svg>
                                        </div>

                                        <h3 class="mt-5 font-bold text-slate-700">
                                            {{ request('search') ? 'Buku tidak ditemukan' : 'Belum ada koleksi buku' }}
                                        </h3>

                                        <p class="mt-2 text-xs text-slate-400">
                                            {{ request('search') ? 'Coba gunakan kata kunci pencarian lain.' : 'Silakan tambahkan buku untuk mulai mengisi koleksi.' }}
                                        </p>

                                        @can('books.create')
                                            @if(!request('search'))
                                                <a href="{{ route('books.create') }}"
                                                   class="mt-5 inline-flex rounded-xl bg-blue-600 px-5 py-3 text-sm font-bold text-white transition hover:bg-blue-700">
                                                    + Tambah Buku Pertama
                                                </a>
                                            @endif
                                        @endcan

                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                {{-- PAGINATION --}}
                @if($books->hasPages())
                    <div class="border-t border-slate-100 p-5">
                        {{ $books->links() }}
                    </div>
                @endif

                <div class="border-t border-slate-100 px-6 py-4 text-xs text-slate-400">
                    Menampilkan {{ $books->firstItem() ?? 0 }}–{{ $books->lastItem() ?? 0 }}
                    dari {{ $books->total() }} buku.
                </div>

            </section>

            {{-- FOOTER --}}
            <footer class="border-t border-slate-200 py-5 text-center text-xs text-slate-400">
                © {{ date('Y') }} BookSpace — Sistem Informasi Manajemen Buku.
            </footer>

        </main>
    </div>

</x-app-layout>
