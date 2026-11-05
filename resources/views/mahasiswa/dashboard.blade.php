<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-1">
            <h2 class="text-2xl font-bold text-gray-800">
                Dashboard Mahasiswa
            </h2>
            <p class="text-sm text-gray-500">
                Selamat datang di BookSpace, pusat informasi koleksi buku.
            </p>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gray-50 py-8">
        <div class="mx-auto max-w-7xl space-y-8 px-4 sm:px-6 lg:px-8">

            <!-- Hero -->
            <div class="overflow-hidden rounded-3xl bg-gradient-to-r from-indigo-700 via-violet-700 to-purple-600 p-8 text-white shadow-lg">
                <div class="flex flex-col justify-between gap-6 md:flex-row md:items-center">
                    <div>
                        <p class="text-sm font-medium text-indigo-100">
                            STUDENT LIBRARY PORTAL
                        </p>

                        <h1 class="mt-3 text-3xl font-bold">
                            Halo, {{ Auth::user()->name }}!
                        </h1>

                        <p class="mt-3 max-w-xl text-sm leading-6 text-indigo-100">
                            Temukan buku menarik, jelajahi berbagai kategori,
                            dan perluas wawasanmu melalui koleksi BookSpace.
                        </p>

                        <a href="{{ route('books.index') }}"
                           class="mt-6 inline-flex rounded-xl bg-white px-5 py-3 text-sm font-bold text-indigo-700 shadow transition hover:bg-indigo-50">
                            Jelajahi Koleksi Buku →
                        </a>
                    </div>

                    <div class="hidden text-8xl opacity-30 md:block">
                        📚
                    </div>
                </div>
            </div>

            <!-- Statistik -->
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">

                <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
                    <p class="text-sm text-gray-500">Total Buku</p>
                    <h3 class="mt-3 text-3xl font-bold text-indigo-700">
                        {{ number_format($totalBooks) }}
                    </h3>
                    <p class="mt-2 text-xs text-gray-400">Judul buku tersedia</p>
                </div>

                <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
                    <p class="text-sm text-gray-500">Total Stok</p>
                    <h3 class="mt-3 text-3xl font-bold text-emerald-600">
                        {{ number_format($totalStock) }}
                    </h3>
                    <p class="mt-2 text-xs text-gray-400">Jumlah seluruh eksemplar</p>
                </div>

                <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
                    <p class="text-sm text-gray-500">Kategori Buku</p>
                    <h3 class="mt-3 text-3xl font-bold text-violet-600">
                        {{ number_format($totalCategories) }}
                    </h3>
                    <p class="mt-2 text-xs text-gray-400">Kategori tersedia</p>
                </div>

                <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
                    <p class="text-sm text-gray-500">Pengguna</p>
                    <h3 class="mt-3 text-3xl font-bold text-amber-600">
                        {{ number_format($totalUsers) }}
                    </h3>
                    <p class="mt-2 text-xs text-gray-400">Pengguna BookSpace</p>
                </div>

            </div>

            <!-- Pencarian -->
            <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
                <h3 class="text-lg font-bold text-gray-800">
                    Temukan Buku Favoritmu
                </h3>

                <p class="mt-1 text-sm text-gray-500">
                    Cari berdasarkan judul, penulis, ISBN, atau kategori.
                </p>

                <form action="{{ route('books.index') }}" method="GET"
                      class="mt-5 flex flex-col gap-3 sm:flex-row">

                    <input type="text"
                           name="search"
                           placeholder="Masukkan judul atau nama penulis..."
                           class="w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500">

                    <button type="submit"
                            class="rounded-xl bg-indigo-600 px-7 py-3 font-semibold text-white transition hover:bg-indigo-700">
                        Cari Buku
                    </button>
                </form>
            </div>

            <!-- Buku Terbaru -->
            <div class="space-y-5">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">
                            Buku Terbaru
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Koleksi buku yang baru ditambahkan.
                        </p>
                    </div>

                    <a href="{{ route('books.index') }}"
                       class="text-sm font-semibold text-indigo-600 hover:text-indigo-800">
                        Lihat Semua →
                    </a>
                </div>

                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">

                    @forelse ($latestBooks as $book)
                        <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-md">

                            <div class="flex h-48 items-center justify-center bg-gray-100">
                                @if ($book->cover)
                                    <img src="{{ asset('storage/' . $book->cover) }}"
                                         alt="{{ $book->title }}"
                                         class="h-full w-full object-cover">
                                @else
                                    <span class="text-6xl">📖</span>
                                @endif
                            </div>

                            <div class="p-5">
                                <p class="text-xs font-semibold uppercase tracking-wide text-indigo-600">
                                    {{ $book->category->name ?? 'Tanpa Kategori' }}
                                </p>

                                <h4 class="mt-2 line-clamp-2 text-lg font-bold text-gray-800">
                                    {{ $book->title }}
                                </h4>

                                <p class="mt-1 text-sm text-gray-500">
                                    {{ $book->author }}
                                </p>

                                <div class="mt-4 flex items-center justify-between">
                                    @if ($book->stock > 0)
                                        <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                                            Stok tersedia
                                        </span>
                                    @else
                                        <span class="rounded-full bg-red-50 px-3 py-1 text-xs font-semibold text-red-700">
                                            Stok habis
                                        </span>
                                    @endif

                                    <a href="{{ route('books.show', $book) }}"
                                       class="text-sm font-semibold text-indigo-600 hover:text-indigo-800">
                                        Detail →
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full rounded-2xl border border-dashed border-gray-300 bg-white p-10 text-center">
                            <div class="text-5xl">📚</div>
                            <h4 class="mt-4 font-bold text-gray-800">
                                Belum Ada Buku
                            </h4>
                            <p class="mt-2 text-sm text-gray-500">
                                Koleksi buku akan ditampilkan di sini setelah ditambahkan oleh Admin atau Dosen.
                            </p>
                        </div>
                    @endforelse

                </div>
            </div>

            <!-- Kategori -->
            <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
                <div class="mb-5">
                    <h3 class="text-xl font-bold text-gray-800">
                        Kategori Populer
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Jelajahi koleksi berdasarkan kategori.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-5">
                    @forelse ($categoryStats as $category)
                        <a href="{{ route('books.index', ['search' => $category->name]) }}"
                           class="rounded-xl border border-gray-100 bg-gray-50 p-4 transition hover:border-indigo-300 hover:bg-indigo-50">
                            <div class="text-2xl">📁</div>

                            <h4 class="mt-3 font-bold text-gray-800">
                                {{ $category->name }}
                            </h4>

                            <p class="mt-1 text-xs text-gray-500">
                                {{ $category->books_count }} buku
                            </p>
                        </a>
                    @empty
                        <p class="text-sm text-gray-500">
                            Belum ada kategori.
                        </p>
                    @endforelse
                </div>
            </div>

            <!-- Informasi Hak Akses -->
            <div class="rounded-2xl border border-indigo-100 bg-indigo-50 p-6">
                <div class="flex items-start gap-4">
                    <div class="text-3xl">🎓</div>

                    <div>
                        <h3 class="font-bold text-indigo-900">
                            Portal Mahasiswa
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-indigo-800">
                            Kamu dapat melihat katalog dan detail buku yang tersedia.
                            Pengelolaan data buku dan kategori dilakukan oleh pengguna
                            yang memiliki hak akses khusus.
                        </p>
                    </div>
                </div>
            </div>

            <div class="pb-4 text-center text-xs text-gray-400">
                © {{ date('Y') }} BookSpace. Student Library Portal.
            </div>

        </div>
    </div>
</x-app-layout>
