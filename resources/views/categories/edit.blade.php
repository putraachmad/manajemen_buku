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
                    <span class="font-semibold text-blue-600">Edit Kategori</span>
                </div>

                <h2 class="mt-1 text-2xl font-extrabold text-slate-800">
                    Edit Kategori Buku
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Perbarui informasi kategori yang tersimpan.
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
                            <path d="m14 5 5 5M4 20l4.5-1 10-10a2.1 2.1 0 0 0-3-3l-10 10L4 20Z"
                                  stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>

                    <div>
                        <p class="text-xs font-bold uppercase tracking-widest text-blue-200">
                            Category Management
                        </p>

                        <h1 class="mt-1 text-xl font-extrabold md:text-2xl">
                            Perbarui Kategori
                        </h1>

                        <p class="mt-1 text-sm text-blue-100">
                            {{ $category->name }}
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

            {{-- CURRENT CATEGORY INFORMATION --}}
            <section class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <p class="text-xs text-slate-400">ID Kategori</p>

                    <h3 class="mt-2 text-2xl font-extrabold text-slate-900">
                        #{{ $category->id }}
                    </h3>

                    <p class="mt-1 text-xs text-slate-500">
                        Identitas kategori dalam database.
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <p class="text-xs text-slate-400">Buku yang Menggunakan Kategori</p>

                    <h3 class="mt-2 text-2xl font-extrabold text-slate-900">
                        {{ $category->books()->count() }}
                    </h3>

                    <p class="mt-1 text-xs text-slate-500">
                        Jumlah buku yang terhubung ke kategori ini.
                    </p>
                </div>

            </section>

            {{-- FORM EDIT --}}
            <form action="{{ route('categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')

                <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <div class="border-b border-slate-100 p-6 md:p-8">
                        <div class="flex items-center gap-3">
                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="m14 5 5 5M4 20l4.5-1 10-10a2.1 2.1 0 0 0-3-3l-10 10L4 20Z"
                                          stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>

                            <div>
                                <h2 class="text-lg font-extrabold text-slate-900">
                                    Edit Informasi Kategori
                                </h2>

                                <p class="text-xs text-slate-500">
                                    Pastikan informasi yang diperbarui sudah benar.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6 p-6 md:p-8">

                        {{-- NAMA --}}
                        <div>
                            <label for="name" class="mb-2 block text-sm font-bold text-slate-700">
                                Nama Kategori
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', $category->name) }}"
                                placeholder="Masukkan nama kategori"
                                maxlength="255"
                                required
                                autofocus
                                class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500">

                            @error('name')
                                <p class="mt-2 text-xs font-medium text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                            <p class="mt-2 text-xs text-slate-400">
                                Nama kategori harus unik.
                            </p>
                        </div>

                        {{-- DESKRIPSI --}}
                        <div>
                            <label for="description" class="mb-2 block text-sm font-bold text-slate-700">
                                Deskripsi Kategori
                                <span class="font-normal text-slate-400">(Opsional)</span>
                            </label>

                            <textarea
                                name="description"
                                id="description"
                                rows="5"
                                placeholder="Tuliskan deskripsi kategori..."
                                class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description', $category->description) }}</textarea>

                            @error('description')
                                <p class="mt-2 text-xs font-medium text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
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

                            Simpan Perubahan
                        </button>

                    </div>

                </section>
            </form>

            {{-- INFORMATION --}}
            <section class="rounded-2xl border border-amber-100 bg-amber-50 p-5">
                <div class="flex items-start gap-3">
                    <span class="text-xl">⚠️</span>

                    <div>
                        <h3 class="text-sm font-bold text-amber-900">
                            Perhatian
                        </h3>

                        <p class="mt-1 text-xs leading-6 text-amber-800">
                            Mengubah nama atau deskripsi kategori tidak akan menghapus
                            buku yang sudah terhubung. Buku-buku tersebut tetap memakai
                            kategori yang sama, hanya informasi kategorinya yang diperbarui.
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
