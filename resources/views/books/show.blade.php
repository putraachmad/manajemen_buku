<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between gap-3">
            <div>
                <p class="text-xs font-medium text-slate-400">
                    BookSpace / Koleksi Buku / Detail
                </p>
                <h2 class="mt-1 text-2xl font-extrabold text-slate-800">
                    Detail Buku
                </h2>
            </div>

            <a href="{{ route('books.index') }}"
               class="rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-600 hover:bg-slate-50">
                ← Kembali
            </a>
        </div>
    </x-slot>

    <main class="min-h-screen bg-[#f6f8fc] px-4 py-8 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-5xl space-y-6">

            <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="bg-gradient-to-r from-indigo-950 via-blue-800 to-blue-600 p-7 text-white">
                    <p class="text-xs font-bold uppercase tracking-widest text-blue-200">
                        Book Details
                    </p>
                    <h1 class="mt-2 text-2xl font-extrabold md:text-3xl">
                        {{ $book->title }}
                    </h1>
                    <p class="mt-2 text-sm text-blue-100">
                        Informasi lengkap koleksi buku BookSpace.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-8 p-6 md:grid-cols-3 md:p-8">

                    {{-- COVER --}}
                    <div>
                        <div class="flex min-h-80 items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            @if($book->cover)
                                <img src="{{ asset('storage/'.$book->cover) }}"
                                     alt="{{ $book->title }}"
                                     class="max-h-96 max-w-full rounded-xl object-contain shadow-md">
                            @else
                                <div class="text-center text-slate-400">
                                    <div class="text-6xl">📚</div>
                                    <p class="mt-3 text-xs">Cover belum tersedia</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- BOOK INFORMATION --}}
                    <div class="space-y-6 md:col-span-2">

                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                Judul Buku
                            </p>
                            <h2 class="mt-2 text-xl font-extrabold text-slate-900">
                                {{ $book->title }}
                            </h2>
                        </div>

                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                            <div>
                                <p class="text-xs text-slate-400">Penulis</p>
                                <p class="mt-2 text-sm font-bold text-slate-800">
                                    {{ $book->author }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs text-slate-400">Kategori</p>
                                <p class="mt-2">
                                    <span class="rounded-lg bg-indigo-50 px-3 py-1.5 text-xs font-bold text-indigo-700">
                                        {{ $book->category->name ?? 'Tanpa kategori' }}
                                    </span>
                                </p>
                            </div>

                            <div>
                                <p class="text-xs text-slate-400">Penerbit</p>
                                <p class="mt-2 text-sm font-bold text-slate-800">
                                    {{ $book->publisher ?: 'Belum diisi' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs text-slate-400">Tahun Terbit</p>
                                <p class="mt-2 text-sm font-bold text-slate-800">
                                    {{ $book->publication_year ?: 'Belum diisi' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs text-slate-400">ISBN</p>
                                <p class="mt-2 text-sm font-bold text-slate-800">
                                    {{ $book->isbn ?: 'Tidak tersedia' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs text-slate-400">Jumlah Stok</p>
                                <p class="mt-2 text-sm font-bold text-slate-800">
                                    {{ number_format($book->stock, 0, ',', '.') }} eksemplar
                                </p>
                            </div>

                        </div>

                        <div>
                            <p class="text-xs text-slate-400">Status Ketersediaan</p>

                            <div class="mt-2">
                                @if($book->stock > 0)
                                    <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700">
                                        ● Tersedia
                                    </span>
                                @else
                                    <span class="rounded-full bg-red-50 px-3 py-1.5 text-xs font-bold text-red-700">
                                        ● Stok Habis
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                Deskripsi Buku
                            </p>
                            <p class="mt-2 whitespace-pre-line text-sm leading-7 text-slate-600">
                                {{ $book->description ?: 'Belum ada deskripsi buku.' }}
                            </p>
                        </div>

                        <div class="flex flex-wrap gap-3 border-t border-slate-100 pt-5">

                            @can('books.edit')
                                <a href="{{ route('books.edit', $book) }}"
                                   class="rounded-xl bg-blue-600 px-5 py-3 text-sm font-bold text-white hover:bg-blue-700">
                                    Edit Buku
                                </a>
                            @endcan

                            @can('books.delete')
                                <form method="POST"
                                      action="{{ route('books.destroy', $book) }}"
                                      onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="rounded-xl border border-red-200 bg-red-50 px-5 py-3 text-sm font-bold text-red-600 hover:bg-red-100">
                                        Hapus Buku
                                    </button>
                                </form>
                            @endcan

                        </div>

                    </div>

                </div>

            </section>

            <footer class="border-t border-slate-200 py-5 text-center text-xs text-slate-400">
                © {{ date('Y') }} BookSpace — Sistem Informasi Manajemen Buku.
            </footer>

        </div>
    </main>

</x-app-layout>
