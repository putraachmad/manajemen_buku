<x-app-layout>

    {{-- HEADER --}}
    <x-slot name="header">
        <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
            <div>
                <div class="flex items-center gap-2 text-xs text-slate-400">
                    <span>BookSpace</span>
                    <span>/</span>
                    <span class="font-semibold text-blue-600">Kategori Buku</span>
                </div>

                <h2 class="mt-1 text-2xl font-extrabold text-slate-800">
                    Manajemen Kategori
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Kelola pengelompokan koleksi buku.
                </p>
            </div>

            <a href="{{ route('categories.create') }}"
               class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-blue-600/20 transition hover:-translate-y-0.5 hover:bg-blue-700">
                <span class="text-lg">+</span>
                Tambah Kategori
            </a>
        </div>
    </x-slot>

    <div class="min-h-screen bg-[#f6f8fc]">
        <main class="mx-auto max-w-[1400px] space-y-6 px-4 py-8 sm:px-6 lg:px-8">

            {{-- FLASH MESSAGE --}}
            @if(session('success'))
                <div class="flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm font-medium text-emerald-700">
                    <span class="text-lg">✓</span>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="flex items-center gap-3 rounded-xl border border-red-200 bg-red-50 p-4 text-sm font-medium text-red-700">
                    <span class="text-lg">!</span>
                    {{ session('error') }}
                </div>
            @endif

            {{-- HERO --}}
            <section class="relative isolate overflow-hidden rounded-2xl bg-gradient-to-br from-indigo-950 via-blue-800 to-blue-600 p-7 text-white shadow-xl">
                <div class="absolute -right-12 -top-20 -z-10 h-64 w-64 rounded-full border-[35px] border-white/5"></div>

                <div class="relative flex flex-col justify-between gap-5 sm:flex-row sm:items-center">
                    <div>
                        <span class="rounded-full border border-white/20 bg-white/10 px-3 py-1.5 text-[10px] font-bold tracking-widest text-blue-100">
                            CATEGORY MANAGEMENT
                        </span>

                        <h1 class="mt-4 text-2xl font-extrabold md:text-3xl">
                            Kelola Kategori Buku
                        </h1>

                        <p class="mt-2 max-w-xl text-sm leading-6 text-blue-100">
                            Atur kategori untuk mempermudah pengelompokan,
                            pencarian, dan pengelolaan koleksi buku.
                        </p>
                    </div>

                    <div class="flex h-20 w-20 shrink-0 items-center justify-center rounded-2xl border border-white/20 bg-white/10">
                        <svg class="h-11 w-11" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M3 7a2 2 0 0 1 2-2h5l2 2h7a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7Z"
                                  stroke-width="1.6" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
            </section>

            {{-- SUMMARY --}}
            <section class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-slate-500">Total Kategori</p>
                            <h3 class="mt-3 text-3xl font-extrabold text-slate-900">
                                {{ number_format($categories->total(), 0, ',', '.') }}
                            </h3>
                            <p class="mt-2 text-xs text-slate-400">
                                Kategori tersimpan dalam database
                            </p>
                        </div>

                        <div class="rounded-2xl bg-blue-50 p-4 text-blue-600">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M3 7a2 2 0 0 1 2-2h5l2 2h7a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7Z"
                                      stroke-width="1.7" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-slate-500">Buku pada Halaman Ini</p>
                            <h3 class="mt-3 text-3xl font-extrabold text-slate-900">
                                {{ number_format($categories->sum('books_count'), 0, ',', '.') }}
                            </h3>
                            <p class="mt-2 text-xs text-slate-400">
                                Jumlah buku dari kategori yang ditampilkan
                            </p>
                        </div>

                        <div class="rounded-2xl bg-emerald-50 p-4 text-emerald-600">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v16H6.5A2.5 2.5 0 0 0 4 21V5.5Z"
                                      stroke-width="1.7"/>
                            </svg>
                        </div>
                    </div>
                </div>

            </section>

            {{-- CATEGORY TABLE --}}
            <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-100 p-6">
                    <div>
                        <h2 class="text-lg font-extrabold text-slate-900">
                            Daftar Kategori
                        </h2>
                        <p class="mt-1 text-xs text-slate-500">
                            Seluruh kategori yang terdaftar di BookSpace.
                        </p>
                    </div>

                    <span class="rounded-lg bg-blue-50 px-3 py-2 text-xs font-bold text-blue-700">
                        {{ $categories->total() }} Kategori
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full whitespace-nowrap text-left text-sm">

                        <thead class="bg-slate-50 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                            <tr>
                                <th class="px-6 py-4">No.</th>
                                <th class="px-6 py-4">Nama Kategori</th>
                                <th class="px-6 py-4">Deskripsi</th>
                                <th class="px-6 py-4">Jumlah Buku</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100">

                            @forelse($categories as $index => $category)

                                <tr class="transition hover:bg-slate-50">

                                    <td class="px-6 py-5 text-slate-400">
                                        {{ $categories->firstItem() + $index }}
                                    </td>

                                    <td class="px-6 py-5">
                                        <div class="flex items-center gap-3">
                                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path d="M3 7a2 2 0 0 1 2-2h5l2 2h7a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7Z"
                                                          stroke-width="1.7" stroke-linejoin="round"/>
                                                </svg>
                                            </div>

                                            <div>
                                                <p class="font-bold text-slate-800">
                                                    {{ $category->name }}
                                                </p>
                                                <p class="mt-1 text-[10px] text-slate-400">
                                                    ID: {{ $category->id }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="max-w-sm whitespace-normal px-6 py-5 text-xs leading-5 text-slate-500">
                                        {{ $category->description ?: 'Belum ada deskripsi.' }}
                                    </td>

                                    <td class="px-6 py-5">
                                        <span class="rounded-lg bg-indigo-50 px-3 py-1.5 text-xs font-bold text-indigo-700">
                                            {{ $category->books_count }} Buku
                                        </span>
                                    </td>

                                    <td class="px-6 py-5">
                                        <div class="flex items-center justify-center gap-2">

                                            <a href="{{ route('categories.edit', $category) }}"
                                               title="Edit kategori"
                                               class="rounded-lg border border-slate-200 p-2 text-slate-500 transition hover:border-amber-200 hover:bg-amber-50 hover:text-amber-600">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path d="m14 5 5 5M4 20l4.5-1 10-10a2.1 2.1 0 0 0-3-3l-10 10L4 20Z"
                                                          stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </a>

                                            <form method="POST"
                                                  action="{{ route('categories.destroy', $category) }}"
                                                  onsubmit="return confirm('Yakin ingin menghapus kategori {{ $category->name }}?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    title="Hapus kategori"
                                                    @disabled($category->books_count > 0)
                                                    class="rounded-lg border border-slate-200 p-2 text-slate-500 transition hover:border-red-200 hover:bg-red-50 hover:text-red-600 disabled:cursor-not-allowed disabled:opacity-30">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path d="M4 7h16M10 11v6m4-6v6M5 7l1 14h12l1-14M9 7V4h6v3"
                                                              stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </button>
                                            </form>

                                        </div>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="5" class="px-6 py-16 text-center">
                                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path d="M3 7a2 2 0 0 1 2-2h5l2 2h7a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7Z"
                                                      stroke-width="1.6"/>
                                            </svg>
                                        </div>

                                        <h3 class="mt-4 font-bold text-slate-700">
                                            Belum ada kategori
                                        </h3>

                                        <p class="mt-1 text-xs text-slate-400">
                                            Silakan tambahkan kategori buku terlebih dahulu.
                                        </p>

                                        <a href="{{ route('categories.create') }}"
                                           class="mt-5 inline-flex rounded-xl bg-blue-600 px-5 py-3 text-sm font-bold text-white hover:bg-blue-700">
                                            + Tambah Kategori
                                        </a>
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>
                    </table>
                </div>

                @if($categories->hasPages())
                    <div class="border-t border-slate-100 p-5">
                        {{ $categories->links() }}
                    </div>
                @endif

                <div class="border-t border-slate-100 px-6 py-4 text-xs text-slate-400">
                    Menampilkan {{ $categories->firstItem() ?? 0 }}–{{ $categories->lastItem() ?? 0 }}
                    dari {{ $categories->total() }} kategori.
                </div>

            </section>

            {{-- FOOTER --}}
            <footer class="border-t border-slate-200 py-5 text-center text-xs text-slate-400">
                © {{ date('Y') }} BookSpace — Sistem Informasi Manajemen Buku.
            </footer>

        </main>
    </div>

</x-app-layout>
