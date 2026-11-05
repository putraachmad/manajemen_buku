<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
            <div>
                <div class="flex items-center gap-2 text-xs text-slate-400">
                    <a href="{{ route('books.index') }}" class="hover:text-blue-600">
                        Manajemen Buku
                    </a>
                    <span>/</span>
                    <span class="font-semibold text-blue-600">Edit Buku</span>
                </div>

                <h2 class="mt-1 text-2xl font-extrabold text-slate-800">
                    Edit Informasi Buku
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Perbarui informasi koleksi buku.
                </p>
            </div>

            <a href="{{ route('books.index') }}"
               class="rounded-xl border border-slate-200 bg-white px-5 py-3 text-center text-sm font-semibold text-slate-600 hover:bg-slate-50">
                ← Kembali
            </a>
        </div>
    </x-slot>

    <main class="min-h-screen bg-[#f6f8fc] px-4 py-8 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-6xl space-y-6">

            {{-- HERO --}}
            <section class="rounded-2xl bg-gradient-to-r from-indigo-950 via-blue-800 to-blue-600 p-7 text-white shadow-xl">
                <span class="text-xs font-bold uppercase tracking-widest text-blue-200">
                    Book Management
                </span>
                <h1 class="mt-3 text-2xl font-extrabold">
                    Perbarui Data Buku
                </h1>
                <p class="mt-2 text-sm text-blue-100">
                    {{ $book->title }}
                </p>
            </section>

            {{-- VALIDATION --}}
            @if($errors->any())
                <div class="rounded-xl border border-red-200 bg-red-50 p-5 text-sm text-red-700">
                    <p class="font-bold">Periksa kembali formulir:</p>
                    <ul class="mt-2 list-inside list-disc">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('books.update', $book) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

                    {{-- DATA BUKU --}}
                    <section class="space-y-5 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm lg:col-span-2">

                        <div class="border-b border-slate-100 pb-5">
                            <h2 class="text-lg font-extrabold text-slate-900">
                                Informasi Buku
                            </h2>
                            <p class="mt-1 text-sm text-slate-500">
                                Perbarui informasi identitas buku.
                            </p>
                        </div>

                        {{-- JUDUL --}}
                        <div>
                            <label for="title" class="mb-2 block text-sm font-bold text-slate-700">
                                Judul Buku *
                            </label>
                            <input type="text" name="title" id="title"
                                value="{{ old('title', $book->title) }}"
                                maxlength="255" required
                                class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('title')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- PENULIS --}}
                        <div>
                            <label for="author" class="mb-2 block text-sm font-bold text-slate-700">
                                Penulis *
                            </label>
                            <input type="text" name="author" id="author"
                                value="{{ old('author', $book->author) }}"
                                maxlength="255" required
                                class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('author')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- KATEGORI --}}
                        <div>
                            <label for="category_id" class="mb-2 block text-sm font-bold text-slate-700">
                                Kategori *
                            </label>
                            <select name="category_id" id="category_id" required
                                class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @selected(old('category_id', $book->category_id) == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- PENERBIT DAN TAHUN --}}
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                            <div>
                                <label for="publisher" class="mb-2 block text-sm font-bold text-slate-700">
                                    Penerbit
                                </label>
                                <input type="text" name="publisher" id="publisher"
                                    value="{{ old('publisher', $book->publisher) }}"
                                    maxlength="255"
                                    class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500">
                                @error('publisher')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="publication_year" class="mb-2 block text-sm font-bold text-slate-700">
                                    Tahun Terbit
                                </label>
                                <input type="number" name="publication_year" id="publication_year"
                                    value="{{ old('publication_year', $book->publication_year) }}"
                                    min="1000" max="{{ now()->year }}"
                                    class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500">
                                @error('publication_year')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- ISBN --}}
                        <div>
                            <label for="isbn" class="mb-2 block text-sm font-bold text-slate-700">
                                ISBN
                            </label>
                            <input type="text" name="isbn" id="isbn"
                                value="{{ old('isbn', $book->isbn) }}"
                                maxlength="50"
                                class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('isbn')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- STOK --}}
                        <div>
                            <label for="stock" class="mb-2 block text-sm font-bold text-slate-700">
                                Jumlah Stok *
                            </label>
                            <input type="number" name="stock" id="stock"
                                value="{{ old('stock', $book->stock) }}"
                                min="0" max="1000000" required
                                class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('stock')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- DESKRIPSI --}}
                        <div>
                            <label for="description" class="mb-2 block text-sm font-bold text-slate-700">
                                Deskripsi
                            </label>
                            <textarea name="description" id="description" rows="5"
                                class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description', $book->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </section>

                    {{-- COVER --}}
                    <aside class="space-y-5">

                        <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                            <h2 class="font-extrabold text-slate-900">
                                Cover Buku
                            </h2>
                            <p class="mt-1 text-xs text-slate-500">
                                Ganti sampul apabila diperlukan.
                            </p>

                            <div class="mt-5 flex min-h-64 items-center justify-center rounded-xl border-2 border-dashed border-slate-200 bg-slate-50 p-4">
                                <img id="coverPreview"
                                    src="{{ $book->cover ? asset('storage/'.$book->cover) : '' }}"
                                    alt="Cover buku"
                                    class="{{ $book->cover ? '' : 'hidden' }} max-h-72 max-w-full rounded-xl object-contain shadow-md">

                                <div id="coverPlaceholder"
                                    class="{{ $book->cover ? 'hidden' : '' }} text-center text-slate-400">
                                    <div class="text-4xl">📚</div>
                                    <p class="mt-2 text-xs">Belum ada cover buku</p>
                                </div>
                            </div>

                            <label for="cover" class="mt-5 block text-sm font-bold text-slate-700">
                                Unggah Cover Baru
                            </label>

                            <input type="file" name="cover" id="cover"
                                accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                                class="mt-3 block w-full text-xs text-slate-600 file:mr-3 file:rounded-lg file:border-0 file:bg-blue-600 file:px-4 file:py-3 file:font-semibold file:text-white">

                            @error('cover')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror

                            <p class="mt-2 text-xs text-slate-400">
                                JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB. Kosongkan jika ingin mempertahankan cover lama.
                            </p>
                        </section>

                        <section class="rounded-2xl border border-blue-100 bg-blue-50 p-5">
                            <h3 class="text-sm font-bold text-blue-900">
                                Informasi
                            </h3>
                            <p class="mt-2 text-xs leading-6 text-blue-800">
                                Mengganti cover akan mengganti file cover sebelumnya.
                                Jika tidak memilih gambar baru, cover lama tetap digunakan.
                            </p>
                        </section>

                    </aside>

                </div>

                {{-- ACTION --}}
                <div class="mt-6 flex flex-col-reverse justify-end gap-3 rounded-2xl border border-slate-200 bg-white p-5 sm:flex-row">

                    <a href="{{ route('books.index') }}"
                       class="rounded-xl border border-slate-200 px-6 py-3 text-center text-sm font-semibold text-slate-600 hover:bg-slate-50">
                        Batal
                    </a>

                    <button type="submit"
                        class="rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-7 py-3 text-sm font-bold text-white shadow-lg shadow-blue-600/20 hover:from-blue-700 hover:to-indigo-700">
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const input = document.getElementById('cover');
            const preview = document.getElementById('coverPreview');
            const placeholder = document.getElementById('coverPlaceholder');

            input.addEventListener('change', function () {
                const file = this.files[0];

                if (!file) return;

                const allowed = ['image/jpeg', 'image/png', 'image/webp'];

                if (!allowed.includes(file.type)) {
                    alert('Format gambar harus JPG, JPEG, PNG, atau WEBP.');
                    this.value = '';
                    return;
                }

                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran gambar maksimal 2 MB.');
                    this.value = '';
                    return;
                }

                const imageUrl = URL.createObjectURL(file);
                preview.src = imageUrl;
                preview.classList.remove('hidden');
                placeholder.classList.add('hidden');
            });
        });
    </script>

</x-app-layout>
