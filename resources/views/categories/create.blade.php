<x-app-layout>

    {{-- HEADER --}}
    <x-slot name="header">
        <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
            <div>
                <div class="flex items-center gap-2 text-xs text-slate-400">
                    <a href="{{ route('categories.index') }}" class="hover:text-blue-600">
                        Manajemen Kategori
                    </a>
                    <span>/</span>
                    <span class="font-semibold text-blue-600">Tambah Kategori</span>
                </div>

                <h2 class="mt-1 text-2xl font-extrabold text-slate-800">
                    Tambah Kategori Baru
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Buat kategori baru untuk mengelompokkan koleksi buku.
                </p>
            </div>

            <a href="{{ route('categories.index') }}"
               class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">
                <span>←</span>
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="min-h-screen bg-[#f6f8fc]">
        <main class="mx-auto max-w-5xl space-y-6 px-4 py-8 sm:px-6 lg:px-8">

            {{-- HERO --}}
            <section class="relative isolate overflow-hidden rounded-2xl bg-gradient-to-br from-indigo-950 via-blue-800 to-blue-600 p-7 text-white shadow-xl">
                <div class="absolute -right-12 -top-20 -z-10 h-64 w-64 rounded-full border-[35px] border-white/5"></div>

                <div class="relative flex items-center gap-4">
                    <div class="flex h-16 w-16 items-center justify-center rounded-2xl border border-white/20 bg-white/10">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M3 7a2 2 0 0 1 2-2h5l2 2h7a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7Z"
                                  stroke-width="1.7" stroke-linejoin="round"/>
                            <path d="M12 10v6m-3-3h6" stroke-width="1.7" stroke-linecap="round"/>
                        </svg>
                    </div>

                    <div>
                        <p class="text-xs font-bold uppercase tracking-widest text-blue-200">
                            Category Management
                        </p>

                        <h1 class="mt-1 text-xl font-extrabold md:text-2xl">
                            Buat Kategori Baru
                        </h1>

                        <p class="mt-1 text-sm text-blue-100">
                            Lengkapi informasi kategori buku Anda.
                        </p>
                    </div>
                </div>
            </section>

            {{-- VALIDATION ERRORS --}}
            @if($errors->any())
                <div class="rounded-xl border border-red-200 bg-red-50 p-5">
                    <h3 class="font-bold text-red-700">
                        Terdapat kesalahan pada formulir
                    </h3>

                    <ul class="mt-2 list-inside list-disc space-y-1 text-sm text-red-600">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- FORM --}}
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf

                <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <div class="border-b border-slate-100 p-6 md:p-8">
                        <div class="flex items-center gap-3">
                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M4 5h16M4 10h16M4 15h10M4 20h7"
                                          stroke-width="1.7" stroke-linecap="round"/>
                                </svg>
                            </div>

                            <div>
                                <h2 class="text-lg font-extrabold text-slate-900">
                                    Informasi Kategori
                                </h2>

                                <p class="text-xs text-slate-500">
                                    Masukkan nama dan deskripsi kategori.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6 p-6 md:p-8">

                        {{-- NAMA KATEGORI --}}
                        <div>
                            <label for="name" class="mb-2 block text-sm font-bold text-slate-700">
                                Nama Kategori
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name') }}"
                                placeholder="Contoh: Teknologi, Pendidikan, Fiksi"
                                maxlength="255"
                                required
                                autofocus
                                class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm placeholder:text-slate-400 focus:border-blue-500 focus:ring-blue-500">

                            @error('name')
                                <p class="mt-2 text-xs font-medium text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                            <p class="mt-2 text-xs text-slate-400">
                                Nama kategori harus unik dan maksimal 255 karakter.
                            </p>
                        </div>

                        {{-- DESKRIPSI --}}
                        <div>
                            <label for="description" class="mb-2 block text-sm font-bold text-slate-700">
                                Deskripsi Kategori
                                <span class="text-slate-400 font-normal">(Opsional)</span>
                            </label>

                            <textarea
                                name="description"
                                id="description"
                                rows="5"
                                placeholder="Jelaskan jenis buku yang termasuk dalam kategori ini..."
                                class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm placeholder:text-slate-400 focus:border-blue-500 focus:ring-blue-500">{{ old('description') }}</textarea>

                            @error('description')
                                <p class="mt-2 text-xs font-medium text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                            <p class="mt-2 text-xs text-slate-400">
                                Deskripsi membantu pengguna memahami kategori buku.
                            </p>
                        </div>

                    </div>

                    {{-- FORM ACTION --}}
                    <div class="flex flex-col-reverse justify-end gap-3 border-t border-slate-100 bg-slate-50/70 p-6 sm:flex-row md:px-8">

                        <a href="{{ route('categories.index') }}"
                           class="rounded-xl border border-slate-200 bg-white px-6 py-3 text-center text-sm font-semibold text-slate-600 transition hover:bg-slate-100">
                            Batal
                        </a>

                        <button type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-7 py-3 text-sm font-bold text-white shadow-lg shadow-blue-600/20 transition hover:-translate-y-0.5 hover:from-blue-700 hover:to-indigo-700">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M5 12h14m-7-7 7 7-7 7"
                                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Simpan Kategori
                        </button>

                    </div>

                </section>
            </form>

            {{-- INFORMATION --}}
            <section class="rounded-2xl border border-blue-100 bg-blue-50 p-5">
                <div class="flex items-start gap-3">
                    <span class="text-xl">💡</span>

                    <div>
                        <h3 class="text-sm font-bold text-blue-900">
                            Informasi
                        </h3>

                        <p class="mt-1 text-xs leading-6 text-blue-800">
                            Kategori yang berhasil ditambahkan akan langsung tersedia
                            pada pilihan kategori di formulir Tambah Buku dan Edit Buku.
                            Satu kategori dapat digunakan oleh banyak buku.
                        </p>
                    </div>
                </div>
            </section>

            <footer class="border-t border-slate-200 py-5 text-center text-xs text-slate-400">
                © {{ date('Y') }} BookSpace — Sistem Informasi Manajemen Buku.
            </footer>

        </main>
    </div>

</x-app-layout>
