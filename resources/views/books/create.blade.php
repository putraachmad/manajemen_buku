
<x-app-layout>

    {{-- HEADER --}}
    <x-slot name="header">
        <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
            <div>
                <div class="flex items-center gap-2 text-xs text-slate-400">
                    <a href="{{ route('books.index') }}" class="hover:text-blue-600">
                        Koleksi Buku
                    </a>
                    <span>/</span>
                    <span class="font-semibold text-blue-600">Tambah Buku</span>
                </div>

                <h2 class="mt-1 text-2xl font-extrabold tracking-tight text-slate-800">
                    Tambah Buku Baru
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Lengkapi informasi buku untuk menambah koleksi.
                </p>
            </div>

            <a href="{{ route('books.index') }}"
               class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="m15 18-6-6 6-6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="min-h-screen bg-[#f6f8fc]">
        <main class="mx-auto max-w-6xl space-y-6 px-4 py-8 sm:px-6 lg:px-8">

            {{-- HERO --}}
            <section class="relative isolate overflow-hidden rounded-2xl bg-gradient-to-r from-indigo-950 via-blue-800 to-blue-600 p-6 text-white shadow-lg md:p-8">
                <div class="absolute -right-10 -top-20 -z-10 h-64 w-64 rounded-full border-[35px] border-white/5"></div>

                <div class="relative flex items-center gap-4">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl border border-white/20 bg-white/10">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M12 5v14m-7-7h14" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </div>

                    <div>
                        <p class="text-xs font-bold uppercase tracking-widest text-blue-200">
                            Book Management
                        </p>
                        <h1 class="mt-1 text-xl font-extrabold md:text-2xl">
                            Tambahkan Koleksi Buku
                        </h1>
                        <p class="mt-1 text-sm text-blue-100">
                            Masukkan data buku dengan lengkap dan benar.
                        </p>
                    </div>
                </div>
            </section>

            {{-- VALIDATION ERRORS --}}
            @if($errors->any())
                <div class="rounded-xl border border-red-200 bg-red-50 p-5">
                    <div class="font-bold text-red-700">
                        Terdapat kesalahan pada formulir:
                    </div>

                    <ul class="mt-2 list-inside list-disc space-y-1 text-sm text-red-600">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- FORM --}}
            <form action="{{ route('books.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

                    {{-- DATA BUKU --}}
                    <div class="space-y-6 lg:col-span-2">

                        <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">

                            <div class="mb-7 border-b border-slate-100 pb-5">
                                <h2 class="text-lg font-extrabold text-slate-900">
                                    Informasi Buku
                                </h2>
                                <p class="mt-1 text-sm text-slate-500">
                                    Informasi utama mengenai identitas buku.
                                </p>
                            </div>

                            <div class="space-y-5">

                                {{-- JUDUL --}}
                                <div>
                                    <label for="title" class="mb-2 block text-sm font-semibold text-slate-700">
                                        Judul Buku <span class="text-red-500">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        id="title"
                                        name="title"
                                        value="{{ old('title') }}"
                                        placeholder="Contoh: Dasar-Dasar Pemrograman Python"
                                        required
                                        maxlength="255"
                                        class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500">

                                    @error('title')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- PENULIS --}}
                                <div>
                                    <label for="author" class="mb-2 block text-sm font-semibold text-slate-700">
                                        Nama Penulis <span class="text-red-500">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        id="author"
                                        name="author"
                                        value="{{ old('author') }}"
                                        placeholder="Masukkan nama penulis"
                                        required
                                        maxlength="255"
                                        class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500">

                                    @error('author')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- KATEGORI --}}
                                <div>
                                    <label for="category_id" class="mb-2 block text-sm font-semibold text-slate-700">
                                        Kategori Buku <span class="text-red-500">*</span>
                                    </label>

                                    <select
                                        id="category_id"
                                        name="category_id"
                                        required
                                        class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500">

                                        <option value="">-- Pilih Kategori Buku --</option>

                                        @foreach($categories as $category)
                                            <option
                                                value="{{ $category->id }}"
                                                @selected(old('category_id') == $category->id)>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach

                                    </select>

                                    @error('category_id')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror

                                    @if($categories->isEmpty())
                                        <p class="mt-2 text-xs text-red-600">
                                            Belum ada kategori. Tambahkan kategori terlebih dahulu.
                                        </p>
                                    @endif
                                </div>

                                {{-- PENERBIT DAN TAHUN --}}
                                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                                    <div>
                                        <label for="publisher" class="mb-2 block text-sm font-semibold text-slate-700">
                                            Penerbit
                                        </label>

                                        <input
                                            type="text"
                                            id="publisher"
                                            name="publisher"
                                            value="{{ old('publisher') }}"
                                            placeholder="Nama penerbit"
                                            maxlength="255"
                                            class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500">

                                        @error('publisher')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="publication_year" class="mb-2 block text-sm font-semibold text-slate-700">
                                            Tahun Terbit
                                        </label>

                                        <input
                                            type="number"
                                            id="publication_year"
                                            name="publication_year"
                                            value="{{ old('publication_year') }}"
                                            min="1000"
                                            max="{{ now()->year }}"
                                            placeholder="Contoh: 2025"
                                            class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500">

                                        @error('publication_year')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>

                                {{-- ISBN --}}
                                <div>
                                    <label for="isbn" class="mb-2 block text-sm font-semibold text-slate-700">
                                        ISBN
                                    </label>

                                    <input
                                        type="text"
                                        id="isbn"
                                        name="isbn"
                                        value="{{ old('isbn') }}"
                                        maxlength="50"
                                        placeholder="Masukkan nomor ISBN buku"
                                        class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500">

                                    @error('isbn')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror

                                    <p class="mt-1 text-xs text-slate-400">
                                        Kosongkan apabila buku tidak memiliki ISBN.
                                    </p>
                                </div>

                                {{-- STOK --}}
                                <div>
                                    <label for="stock" class="mb-2 block text-sm font-semibold text-slate-700">
                                        Jumlah Stok <span class="text-red-500">*</span>
                                    </label>

                                    <input
                                        type="number"
                                        id="stock"
                                        name="stock"
                                        value="{{ old('stock', 0) }}"
                                        min="0"
                                        max="1000000"
                                        required
                                        class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500">

                                    @error('stock')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- DESKRIPSI --}}
                                <div>
                                    <label for="description" class="mb-2 block text-sm font-semibold text-slate-700">
                                        Deskripsi Buku
                                    </label>

                                    <textarea
                                        id="description"
                                        name="description"
                                        rows="5"
                                        placeholder="Tuliskan ringkasan atau deskripsi buku..."
                                        class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description') }}</textarea>

                                    @error('description')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                        </section>

                    </div>

                    {{-- COVER BOOK --}}
                    <div class="space-y-6">

                        <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                            <h2 class="text-lg font-extrabold text-slate-900">
                                Cover Buku
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                Unggah gambar sampul buku.
                            </p>

                            {{-- PREVIEW --}}
                            <div class="mt-6 flex min-h-64 items-center justify-center overflow-hidden rounded-2xl border-2 border-dashed border-slate-200 bg-slate-50 p-4">

                                <div id="coverPlaceholder" class="text-center">
                                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-2xl bg-blue-50 text-blue-600">
                                        <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v16H6.5A2.5 2.5 0 0 0 4 21V5.5Z" stroke-width="1.5"/>
                                        </svg>
                                    </div>

                                    <p class="mt-4 text-sm font-semibold text-slate-600">
                                        Preview Cover Buku
                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">
                                        Gambar akan tampil di sini.
                                    </p>
                                </div>

                                <img
                                    id="coverPreview"
                                    src=""
                                    alt="Preview Cover"
                                    class="hidden max-h-72 max-w-full rounded-xl object-contain shadow-md">

                            </div>

                            {{-- INPUT COVER --}}
                            <div class="mt-5">

                                <label for="cover" class="block text-sm font-semibold text-slate-700">
                                    Pilih Gambar Cover
                                </label>

                                <input
                                    type="file"
                                    id="cover"
                                    name="cover"
                                    accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                                    class="mt-3 block w-full cursor-pointer rounded-xl border border-slate-200 bg-white text-xs text-slate-600 file:mr-3 file:border-0 file:bg-blue-600 file:px-4 file:py-3 file:text-xs file:font-semibold file:text-white hover:file:bg-blue-700">

                                @error('cover')
                                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                @enderror

                                <p class="mt-2 text-xs leading-5 text-slate-400">
                                    Format JPG, JPEG, PNG, atau WEBP. Ukuran maksimal 2 MB.
                                </p>

                            </div>

                        </section>

                        {{-- INFORMATION --}}
                        <section class="rounded-2xl border border-blue-100 bg-blue-50 p-5">

                            <div class="flex items-center gap-2">
                                <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="9" stroke-width="1.8"/>
                                    <path d="M12 11v5m0-8h.01" stroke-width="1.8" stroke-linecap="round"/>
                                </svg>

                                <h3 class="text-sm font-bold text-blue-900">
                                    Petunjuk Pengisian
                                </h3>
                            </div>

                            <ul class="mt-3 space-y-2 text-xs leading-5 text-blue-800">
                                <li>• Isi judul dan penulis buku dengan benar.</li>
                                <li>• Pilih kategori yang sesuai.</li>
                                <li>• Pastikan stok buku tidak bernilai negatif.</li>
                                <li>• Cover bersifat opsional.</li>
                                <li>• Periksa kembali data sebelum menyimpan.</li>
                            </ul>

                        </section>

                    </div>

                </div>

                {{-- BUTTON ACTION --}}
                <section class="mt-6 flex flex-col-reverse justify-end gap-3 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:flex-row">

                    <a href="{{ route('books.index') }}"
                       class="rounded-xl border border-slate-200 px-6 py-3 text-center text-sm font-semibold text-slate-600 transition hover:bg-slate-50">
                        Batal
                    </a>

                    <button
                        type="submit"
                        @disabled($categories->isEmpty())
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-7 py-3 text-sm font-bold text-white shadow-lg shadow-blue-600/20 transition hover:-translate-y-0.5 hover:from-blue-700 hover:to-indigo-700 disabled:cursor-not-allowed disabled:opacity-50">

                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M5 12h14m-7-7 7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                        Simpan Data Buku
                    </button>

                </section>

            </form>

            {{-- FOOTER --}}
            <footer class="border-t border-slate-200 py-5 text-center text-xs text-slate-400">
                © {{ date('Y') }} BookSpace — Sistem Informasi Manajemen Buku.
            </footer>

        </main>
    </div>

    {{-- COVER PREVIEW --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const coverInput = document.getElementById('cover');
            const coverPreview = document.getElementById('coverPreview');
            const coverPlaceholder = document.getElementById('coverPlaceholder');

            if (!coverInput || !coverPreview || !coverPlaceholder) {
                return;
            }

            coverInput.addEventListener('change', function (event) {
                const file = event.target.files[0];

                if (!file) {
                    coverPreview.src = '';
                    coverPreview.classList.add('hidden');
                    coverPlaceholder.classList.remove('hidden');
                    return;
                }

                const allowedTypes = [
                    'image/jpeg',
                    'image/png',
                    'image/webp'
                ];

                if (!allowedTypes.includes(file.type)) {
                    alert('Format gambar harus JPG, JPEG, PNG, atau WEBP.');
                    coverInput.value = '';
                    return;
                }

                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran gambar maksimal 2 MB.');
                    coverInput.value = '';
                    return;
                }

                const imageUrl = URL.createObjectURL(file);

                coverPreview.src = imageUrl;
                coverPreview.classList.remove('hidden');
                coverPlaceholder.classList.add('hidden');
            });
        });
    </script>

</x-app-layout>
