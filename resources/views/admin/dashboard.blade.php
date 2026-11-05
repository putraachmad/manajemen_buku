<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Control Center | BookSpace</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}?v=2">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-slate-50 font-sans antialiased text-slate-800">

@php
    $user = auth()->user();
    $initial = strtoupper(substr($user->name, 0, 1));
@endphp

<div x-data="{ sidebarOpen: false }" class="min-h-screen">

    {{-- MOBILE OVERLAY --}}
    <div
        x-cloak
        x-show="sidebarOpen"
        x-transition.opacity
        x-on:click="sidebarOpen = false"
        class="fixed inset-0 z-40 bg-slate-950/60 backdrop-blur-sm lg:hidden">
    </div>


    {{-- SIDEBAR --}}
    <aside
        x-bind:class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        class="fixed inset-y-0 left-0 z-50 flex w-72 flex-col bg-[#10182b] text-white transition-transform duration-300 lg:translate-x-0">

        {{-- BRAND --}}
        <div class="flex h-20 items-center gap-3 border-b border-white/10 px-6">

            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 shadow-lg shadow-blue-600/30">

                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor">
                    <path
                        d="M12 7.5C9.5 5.5 6 5.3 3 6.5v12c3-1.2 6.5-1 9 1m0-12c2.5-2 6-2.2 9-1v12c-3-1.2-6.5-1-9 1m0-12v12"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"/>
                </svg>

            </div>

            <div>
                <h1 class="text-base font-bold tracking-wide">
                    Book<span class="text-blue-400">Space</span>
                </h1>

                <p class="text-[10px] uppercase tracking-[0.2em] text-slate-400">
                    Management System
                </p>
            </div>

        </div>


        {{-- NAVIGATION --}}
        <div class="flex-1 overflow-y-auto px-4 py-7">

            <p class="mb-4 px-3 text-[10px] font-bold uppercase tracking-[0.2em] text-slate-500">
                Workspace
            </p>

            <nav class="space-y-2">

                {{-- DASHBOARD --}}
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 rounded-xl border border-blue-400/20 bg-blue-600/20 px-4 py-3 text-sm font-semibold text-blue-300 shadow-inner">

                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor">
                        <rect x="3" y="3" width="7" height="7" rx="1.5" stroke-width="1.8"/>
                        <rect x="14" y="3" width="7" height="5" rx="1.5" stroke-width="1.8"/>
                        <rect x="14" y="11" width="7" height="10" rx="1.5" stroke-width="1.8"/>
                        <rect x="3" y="13" width="7" height="8" rx="1.5" stroke-width="1.8"/>
                    </svg>

                    Dashboard

                    <span class="ml-auto h-2 w-2 rounded-full bg-blue-400"></span>
                </a>


                {{-- MANAJEMEN BUKU --}}
                <a href="{{ route('books.index') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm text-slate-400 transition hover:bg-white/5 hover:text-white">

                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor">
                        <path
                            d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v16H6.5A2.5 2.5 0 0 0 4 21V5.5Z"
                            stroke-width="1.8"
                            stroke-linejoin="round"/>

                        <path
                            d="M4 17a2.5 2.5 0 0 1 2.5-2.5H20M8 7h8M8 10h6"
                            stroke-width="1.8"
                            stroke-linecap="round"/>
                    </svg>

                    Manajemen Buku
                </a>


                {{-- KATEGORI --}}
                <a href="{{ route('categories.index') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm text-slate-400 transition hover:bg-white/5 hover:text-white">

                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor">

                        <path
                            d="M4 4h7v7H4zM14 4h6v7h-6zM4 14h7v6H4zM14 14h6v6h-6z"
                            stroke-width="1.8"
                            stroke-linejoin="round"/>
                    </svg>

                    Kategori Buku
                </a>


                {{-- PENGGUNA --}}
                <a href="#pengguna"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm text-slate-400 transition hover:bg-white/5 hover:text-white">

                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor">

                        <circle cx="9" cy="8" r="3.5" stroke-width="1.8"/>

                        <path
                            d="M2.5 20a6.5 6.5 0 0 1 13 0M16 5a3.5 3.5 0 0 1 0 7m1.5 2a5.5 5.5 0 0 1 4 6"
                            stroke-width="1.8"
                            stroke-linecap="round"/>
                    </svg>

                    Informasi Pengguna
                </a>


                {{-- AKTIVITAS --}}
                <a href="#aktivitas"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm text-slate-400 transition hover:bg-white/5 hover:text-white">

                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor">

                        <circle cx="12" cy="12" r="9" stroke-width="1.8"/>
                        <path d="M12 7v5l3 2" stroke-width="1.8" stroke-linecap="round"/>
                    </svg>

                    Riwayat Aktivitas
                </a>

            </nav>


            {{-- PREFERENCES --}}
            <p class="mb-4 mt-9 px-3 text-[10px] font-bold uppercase tracking-[0.2em] text-slate-500">
                Preferences
            </p>

            <nav class="space-y-2">

                <a href="{{ route('profile.edit') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm text-slate-400 transition hover:bg-white/5 hover:text-white">

                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor">

                        <circle cx="12" cy="12" r="3" stroke-width="1.8"/>

                        <path
                            d="m19.4 15 .1.1a1.8 1.8 0 0 1-2.5 2.5l-.1-.1a1.8 1.8 0 0 0-3 .9v.2a1.8 1.8 0 0 1-3.6 0v-.2a1.8 1.8 0 0 0-3-.9l-.1.1a1.8 1.8 0 0 1-2.5-2.5l.1-.1a1.8 1.8 0 0 0-.9-3h-.2a1.8 1.8 0 0 1 0-3.6h.2a1.8 1.8 0 0 0 .9-3l-.1-.1a1.8 1.8 0 0 1 2.5-2.5l.1.1a1.8 1.8 0 0 0 3-.9v-.2a1.8 1.8 0 0 1 3.6 0v.2a1.8 1.8 0 0 0 3 .9l.1-.1a1.8 1.8 0 0 1 2.5 2.5l-.1.1a1.8 1.8 0 0 0 .9 3h.2a1.8 1.8 0 0 1 0 3.6h-.2a1.8 1.8 0 0 0-.9 3Z"
                            stroke-width="1.3"
                            stroke-linejoin="round"/>
                    </svg>

                    Pengaturan Profil
                </a>

            </nav>

        </div>


        {{-- SIDEBAR USER --}}
        <div class="border-t border-white/10 p-4">

            <div class="mb-4 flex items-center gap-3 rounded-xl bg-white/5 p-3">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 font-bold text-white">
                    {{ $initial }}
                </div>

                <div class="min-w-0 flex-1">
                    <p class="truncate text-sm font-semibold">
                        {{ $user->name }}
                    </p>
                    <p class="text-xs text-blue-300">
                        Administrator
                    </p>
                </div>

                <span class="h-2 w-2 rounded-full bg-emerald-400"></span>

            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                    class="flex w-full items-center justify-center gap-2 rounded-xl border border-white/10 px-4 py-3 text-sm font-medium text-slate-400 transition hover:border-red-400/30 hover:bg-red-500/10 hover:text-red-300">

                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor">

                        <path
                            d="M10 17l5-5-5-5m5 5H3m9-9h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"/>
                    </svg>

                    Keluar dari Sistem
                </button>

            </form>

        </div>

    </aside>


    {{-- MAIN AREA --}}
    <div class="min-h-screen lg:pl-72">

        {{-- TOP NAVBAR --}}
        <header class="sticky top-0 z-30 border-b border-slate-200/80 bg-white/90 backdrop-blur-xl">

            <div class="flex h-20 items-center justify-between gap-4 px-5 md:px-8">

                <div class="flex items-center gap-3">

                    <button
                        x-on:click="sidebarOpen = !sidebarOpen"
                        class="rounded-xl border border-slate-200 p-2.5 text-slate-600 hover:bg-slate-100 lg:hidden">

                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor">

                            <path
                                d="M4 6h16M4 12h16M4 18h16"
                                stroke-width="2"
                                stroke-linecap="round"/>
                        </svg>

                    </button>

                    <div>
                        <div class="flex items-center gap-2 text-xs text-slate-400">
                            <span>Workspace</span>
                            <span>/</span>
                            <span class="font-semibold text-blue-600">Dashboard</span>
                        </div>

                        <h2 class="mt-1 text-lg font-bold tracking-tight text-slate-900">
                            Overview Dashboard
                        </h2>
                    </div>

                </div>


                {{-- SEARCH --}}
                <div class="flex items-center gap-3">

                    <form action="{{ route('books.index') }}"
                        method="GET"
                        class="hidden items-center gap-2 rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5 sm:flex">

                        <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor">

                            <circle cx="11" cy="11" r="7" stroke-width="1.8"/>
                            <path d="m16 16 4 4" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>

                        <input
                            type="text"
                            name="search"
                            placeholder="Cari buku..."
                            class="w-36 border-0 bg-transparent p-0 text-xs outline-none placeholder:text-slate-400 focus:ring-0 md:w-48">

                    </form>

                    <div class="hidden h-9 w-px bg-slate-200 sm:block"></div>

                    <div class="flex items-center gap-3">

                        <div class="hidden text-right sm:block">
                            <p class="text-sm font-bold text-slate-800">
                                {{ $user->name }}
                            </p>

                            <p class="text-[11px] text-slate-400">
                                Administrator
                            </p>
                        </div>

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 font-bold text-white shadow-md shadow-blue-500/20">
                            {{ $initial }}
                        </div>

                    </div>

                </div>

            </div>

        </header>


        {{-- CONTENT --}}
        <main class="mx-auto max-w-[1600px] space-y-8 p-5 md:p-8">


            {{-- HERO --}}
            <section class="relative isolate overflow-hidden rounded-[2rem] bg-gradient-to-br from-[#172554] via-[#1d4ed8] to-[#4f46e5] p-7 text-white shadow-xl shadow-blue-900/10 md:p-10">

                <div class="absolute -right-16 -top-24 -z-10 h-80 w-80 rounded-full border-[40px] border-white/5"></div>

                <div class="absolute -bottom-32 right-40 -z-10 h-64 w-64 rounded-full bg-cyan-300/10 blur-3xl"></div>

                <div class="relative flex flex-col justify-between gap-8 lg:flex-row lg:items-center">

                    <div class="max-w-2xl">

                        <div class="mb-5 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3 py-1.5 text-xs font-semibold text-blue-100 backdrop-blur">

                            <span class="h-2 w-2 rounded-full bg-emerald-400"></span>

                            ADMIN CONTROL CENTER

                        </div>

                        <p class="text-sm font-medium text-blue-100">
                            Selamat datang kembali,
                        </p>

                        <h1 class="mt-2 text-3xl font-extrabold tracking-tight md:text-4xl">
                            {{ $user->name }}<span class="text-cyan-300">.</span>
                        </h1>

                        <p class="mt-4 max-w-xl text-sm leading-7 text-blue-100 md:text-base">
                            Pantau dan kelola seluruh aktivitas perpustakaan dalam satu tempat.
                            Kelola koleksi, kategori, dan pengguna dengan lebih cepat dan efisien.
                        </p>

                        <div class="mt-7 flex flex-wrap gap-3">

                            <a href="{{ route('books.index') }}"
                                class="inline-flex items-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-bold text-blue-700 shadow-lg transition hover:-translate-y-0.5 hover:bg-blue-50">

                                Kelola Koleksi Buku

                                <svg class="h-4 w-4" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor">

                                    <path d="M5 12h14m-6-6 6 6-6 6"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                </svg>

                            </a>

                            <span class="inline-flex items-center rounded-xl border border-white/20 bg-white/10 px-5 py-3 text-sm font-medium text-white backdrop-blur">
                                {{ now()->format('d/m/Y') }}
                            </span>

                        </div>

                    </div>


                    <div class="hidden min-w-52 items-center justify-center lg:flex">

                        <div class="relative flex h-44 w-44 items-center justify-center rounded-[2.5rem] border border-white/20 bg-white/10 shadow-2xl backdrop-blur-xl">

                            <div class="absolute inset-3 rounded-[2rem] border border-white/10"></div>

                            <svg class="h-24 w-24 text-white" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor">

                                <path
                                    d="M12 7.5C9.5 5.5 6 5.3 3 6.5v12c3-1.2 6.5-1 9 1m0-12c2.5-2 6-2.2 9-1v12c-3-1.2-6.5-1-9 1m0-12v12"
                                    stroke-width="1.2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"/>

                                <path
                                    d="M7 9h2m-2 3h2m6-3h2m-2 3h2"
                                    stroke-width="1.2"
                                    stroke-linecap="round"/>

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
                            Analytics
                        </p>

                        <h2 class="mt-1 text-xl font-extrabold tracking-tight text-slate-900">
                            Ringkasan Sistem
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Gambaran umum data Manajemen Buku.
                        </p>
                    </div>

                    <span class="rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs font-medium text-slate-500">
                        Data terbaru
                    </span>

                </div>


                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">


                    {{-- TOTAL BUKU --}}
                    <div class="group relative overflow-hidden rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-blue-900/5">

                        <div class="absolute -right-7 -top-7 h-24 w-24 rounded-full bg-blue-50 transition group-hover:scale-150"></div>

                        <div class="relative flex items-start justify-between">

                            <div>
                                <p class="text-sm font-medium text-slate-500">
                                    Total Koleksi Buku
                                </p>

                                <h3 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900">
                                    {{ number_format($totalBooks, 0, ',', '.') }}
                                </h3>

                                <p class="mt-2 text-xs text-slate-400">
                                    Judul buku terdaftar
                                </p>
                            </div>

                            <div class="rounded-2xl bg-blue-50 p-3 text-blue-600">
                                <svg class="h-6 w-6" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor">

                                    <path
                                        d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v16H6.5A2.5 2.5 0 0 0 4 21V5.5Z"
                                        stroke-width="1.8"/>

                                    <path d="M4 17a2.5 2.5 0 0 1 2.5-2.5H20"
                                        stroke-width="1.8"/>
                                </svg>
                            </div>

                        </div>

                    </div>


                    {{-- TOTAL STOK --}}
                    <div class="group relative overflow-hidden rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-emerald-900/5">

                        <div class="absolute -right-7 -top-7 h-24 w-24 rounded-full bg-emerald-50 transition group-hover:scale-150"></div>

                        <div class="relative flex items-start justify-between">

                            <div>
                                <p class="text-sm font-medium text-slate-500">
                                    Total Stok Buku
                                </p>

                                <h3 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900">
                                    {{ number_format($totalStock, 0, ',', '.') }}
                                </h3>

                                <p class="mt-2 text-xs text-slate-400">
                                    Seluruh eksemplar
                                </p>
                            </div>

                            <div class="rounded-2xl bg-emerald-50 p-3 text-emerald-600">
                                <svg class="h-6 w-6" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor">

                                    <path d="m3 7 9-4 9 4-9 5-9-5Z"
                                        stroke-width="1.8"
                                        stroke-linejoin="round"/>

                                    <path d="m3 12 9 5 9-5M3 17l9 5 9-5"
                                        stroke-width="1.8"
                                        stroke-linejoin="round"/>
                                </svg>
                            </div>

                        </div>

                    </div>


                    {{-- KATEGORI --}}
                    <div class="group relative overflow-hidden rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-amber-900/5">

                        <div class="absolute -right-7 -top-7 h-24 w-24 rounded-full bg-amber-50 transition group-hover:scale-150"></div>

                        <div class="relative flex items-start justify-between">

                            <div>
                                <p class="text-sm font-medium text-slate-500">
                                    Kategori Buku
                                </p>

                                <h3 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900">
                                    {{ number_format($totalCategories, 0, ',', '.') }}
                                </h3>

                                <p class="mt-2 text-xs text-slate-400">
                                    Kategori tersedia
                                </p>
                            </div>

                            <div class="rounded-2xl bg-amber-50 p-3 text-amber-600">
                                <svg class="h-6 w-6" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor">

                                    <path
                                        d="M3 7a2 2 0 0 1 2-2h5l2 2h7a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7Z"
                                        stroke-width="1.8"
                                        stroke-linejoin="round"/>
                                </svg>
                            </div>

                        </div>

                    </div>


                    {{-- TOTAL PENGGUNA --}}
                    <div class="group relative overflow-hidden rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-violet-900/5">

                        <div class="absolute -right-7 -top-7 h-24 w-24 rounded-full bg-violet-50 transition group-hover:scale-150"></div>

                        <div class="relative flex items-start justify-between">

                            <div>
                                <p class="text-sm font-medium text-slate-500">
                                    Total Pengguna
                                </p>

                                <h3 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900">
                                    {{ number_format($totalUsers, 0, ',', '.') }}
                                </h3>

                                <p class="mt-2 text-xs text-slate-400">
                                    Akun terdaftar
                                </p>
                            </div>

                            <div class="rounded-2xl bg-violet-50 p-3 text-violet-600">
                                <svg class="h-6 w-6" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor">

                                    <circle cx="9" cy="8" r="3.5" stroke-width="1.8"/>

                                    <path
                                        d="M2.5 20a6.5 6.5 0 0 1 13 0M16 5a3.5 3.5 0 0 1 0 7m1.5 2a5.5 5.5 0 0 1 4 6"
                                        stroke-width="1.8"
                                        stroke-linecap="round"/>
                                </svg>
                            </div>

                        </div>

                    </div>

                </div>

            </section>


            {{-- QUICK ACTION --}}
            <section id="kategori">

                <div class="mb-5">
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-blue-600">
                        Quick Access
                    </p>

                    <h2 class="mt-1 text-xl font-extrabold tracking-tight text-slate-900">
                        Akses Cepat
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Pilih modul yang ingin kamu kelola.
                    </p>
                </div>


                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">


                    {{-- BUKU --}}
                    <a href="{{ route('books.index') }}"
                        class="group flex items-center gap-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg">

                        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-blue-50 text-blue-600 transition group-hover:bg-blue-600 group-hover:text-white">

                            <svg class="h-7 w-7" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor">

                                <path
                                    d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v16H6.5A2.5 2.5 0 0 0 4 21V5.5Z"
                                    stroke-width="1.8"/>

                                <path d="M4 17a2.5 2.5 0 0 1 2.5-2.5H20"
                                    stroke-width="1.8"/>
                            </svg>

                        </div>

                        <div class="min-w-0 flex-1">
                            <h3 class="font-bold text-slate-800">
                                Manajemen Buku
                            </h3>

                            <p class="mt-1 text-xs leading-5 text-slate-500">
                                Kelola koleksi dan data buku.
                            </p>
                        </div>

                        <span class="text-xl text-slate-300 transition group-hover:translate-x-1 group-hover:text-blue-600">
                            →
                        </span>

                    </a>


                    {{-- KATEGORI --}}
                    <a href="{{ route('categories.index') }}"
                        class="group flex items-center gap-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:border-violet-200 hover:shadow-lg">

                        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-violet-50 text-violet-600 transition group-hover:bg-violet-600 group-hover:text-white">

                            <svg class="h-7 w-7" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor">

                                <path
                                    d="M4 4h7v7H4zM14 4h6v7h-6zM4 14h7v6H4zM14 14h6v6h-6z"
                                    stroke-width="1.8"
                                    stroke-linejoin="round"/>
                            </svg>

                        </div>

                        <div class="min-w-0 flex-1">
                            <h3 class="font-bold text-slate-800">
                                Manajemen Kategori
                            </h3>

                            <p class="mt-1 text-xs leading-5 text-slate-500">
                                Kelola pengelompokan buku.
                            </p>
                        </div>

                        <span class="text-xl text-slate-300 transition group-hover:translate-x-1 group-hover:text-violet-600">
                            →
                        </span>

                    </a>


                    {{-- PENGGUNA --}}
                    <a href="#pengguna"
                        class="group flex items-center gap-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:border-emerald-200 hover:shadow-lg">

                        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600 transition group-hover:bg-emerald-600 group-hover:text-white">

                            <svg class="h-7 w-7" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor">

                                <circle cx="9" cy="8" r="3.5" stroke-width="1.8"/>

                                <path
                                    d="M2.5 20a6.5 6.5 0 0 1 13 0"
                                    stroke-width="1.8"/>
                            </svg>

                        </div>

                        <div class="min-w-0 flex-1">
                            <h3 class="font-bold text-slate-800">
                                Informasi Pengguna
                            </h3>

                            <p class="mt-1 text-xs leading-5 text-slate-500">
                                Lihat ringkasan akun terdaftar.
                            </p>
                        </div>

                        <span class="text-xl text-slate-300 transition group-hover:translate-x-1 group-hover:text-emerald-600">
                            →
                        </span>

                    </a>

                </div>

            </section>


            {{-- BOOK TABLE --}}
            <section id="buku"
                class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-100 p-6">

                    <div>
                        <h2 class="font-extrabold text-slate-900">
                            Koleksi Buku Terbaru
                        </h2>

                        <p class="mt-1 text-xs text-slate-500">
                            Lima koleksi buku terakhir yang ditambahkan.
                        </p>
                    </div>

                    <a href="{{ route('books.index') }}"
                        class="rounded-lg bg-blue-50 px-3 py-2 text-xs font-semibold text-blue-600 transition hover:bg-blue-100">
                        Lihat Semua Buku →
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
                                <th class="px-6 py-4">Status</th>
                            </tr>

                        </thead>


                        <tbody class="divide-y divide-slate-100">

                            @forelse($latestBooks as $index => $book)

                                <tr class="transition hover:bg-slate-50">

                                    <td class="px-6 py-4 text-slate-400">
                                        {{ $index + 1 }}
                                    </td>


                                    {{-- JUDUL --}}
                                    <td class="px-6 py-4">

                                        <div class="flex items-center gap-3">

                                            @if($book->cover)

                                                <img
                                                    src="{{ asset('storage/' . $book->cover) }}"
                                                    alt="{{ $book->title }}"
                                                    class="h-12 w-10 rounded-lg border border-slate-200 object-cover">

                                            @else

                                                <div class="flex h-12 w-10 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
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


                                    {{-- PENULIS --}}
                                    <td class="px-6 py-4 text-sm text-slate-600">
                                        {{ $book->author }}
                                    </td>


                                    {{-- KATEGORI --}}
                                    <td class="px-6 py-4 text-sm text-slate-600">
                                        {{ $book->category->name ?? 'Tanpa kategori' }}
                                    </td>


                                    {{-- STOK --}}
                                    <td class="px-6 py-4 font-bold text-slate-700">
                                        {{ number_format($book->stock, 0, ',', '.') }}
                                    </td>


                                    {{-- STATUS --}}
                                    <td class="px-6 py-4">

                                        @if($book->stock > 0)

                                            <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold text-emerald-700">
                                                Tersedia
                                            </span>

                                        @else

                                            <span class="rounded-full bg-red-50 px-3 py-1 text-xs font-bold text-red-700">
                                                Habis
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center">

                                        <div class="text-4xl">📚</div>

                                        <h3 class="mt-4 font-bold text-slate-700">
                                            Belum ada koleksi buku
                                        </h3>

                                        <p class="mt-1 text-xs text-slate-400">
                                            Buku akan muncul setelah ditambahkan ke database.
                                        </p>

                                        <a href="{{ route('books.create') }}"
                                            class="mt-4 inline-flex rounded-xl bg-blue-600 px-5 py-2.5 text-xs font-bold text-white hover:bg-blue-700">
                                            Tambah Buku
                                        </a>

                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </section>


            {{-- CATEGORY ANALYTICS --}}
            <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                <div class="mb-6 flex flex-wrap items-center justify-between gap-3">

                    <div>
                        <p class="text-xs font-bold uppercase tracking-widest text-blue-600">
                            Category Analytics
                        </p>

                        <h2 class="mt-1 text-lg font-extrabold text-slate-900">
                            Statistik Koleksi per Kategori
                        </h2>

                        <p class="mt-1 text-xs text-slate-500">
                            Lima kategori berdasarkan jumlah buku terbanyak.
                        </p>
                    </div>

                    <a href="{{ route('categories.index') }}"
                        class="text-xs font-bold text-blue-600 hover:text-blue-800">
                        Kelola Kategori →
                    </a>

                </div>


                <div class="space-y-5">

                    @forelse($categoryStats as $category)

                        <div>

                            <div class="mb-2 flex items-center justify-between gap-3">

                                <span class="text-sm font-semibold text-slate-700">
                                    {{ $category->name }}
                                </span>

                                <span class="text-xs font-bold text-blue-600">
                                    {{ $category->books_count }} buku
                                </span>

                            </div>

                            <div class="h-2.5 overflow-hidden rounded-full bg-slate-100">

                                <div
                                    class="h-full rounded-full bg-gradient-to-r from-blue-500 to-indigo-600"
                                    style="width: {{ $totalBooks > 0 ? ($category->books_count / $totalBooks) * 100 : 0 }}%">
                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="py-8 text-center">
                            <p class="text-sm text-slate-500">
                                Belum ada data kategori buku.
                            </p>
                        </div>

                    @endforelse

                </div>

            </section>


            {{-- SYSTEM INFORMATION --}}
            <section id="pengguna"
                class="grid grid-cols-1 gap-6 lg:grid-cols-2">

                {{-- USER INFORMATION --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>
                            <h2 class="font-extrabold text-slate-900">
                                Informasi Administrator
                            </h2>

                            <p class="mt-1 text-xs text-slate-500">
                                Informasi akun yang sedang aktif.
                            </p>
                        </div>

                        <div class="rounded-xl bg-blue-50 p-3 text-blue-600">
                            <svg class="h-6 w-6" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor">

                                <circle cx="12" cy="8" r="4" stroke-width="1.8"/>

                                <path d="M4 21a8 8 0 0 1 16 0"
                                    stroke-width="1.8"/>
                            </svg>
                        </div>

                    </div>


                    <div class="mt-7 space-y-5">

                        <div class="flex items-center justify-between gap-3">
                            <span class="text-xs text-slate-500">Nama Pengguna</span>
                            <span class="text-xs font-bold text-slate-800">
                                {{ $user->name }}
                            </span>
                        </div>

                        <div class="h-px bg-slate-100"></div>

                        <div class="flex items-center justify-between gap-3">
                            <span class="text-xs text-slate-500">Email</span>
                            <span class="break-all text-right text-xs font-bold text-slate-800">
                                {{ $user->email }}
                            </span>
                        </div>

                        <div class="h-px bg-slate-100"></div>

                        <div class="flex items-center justify-between gap-3">
                            <span class="text-xs text-slate-500">Hak Akses</span>
                            <span class="rounded-lg bg-blue-50 px-2.5 py-1 text-[11px] font-bold text-blue-700">
                                Admin
                            </span>
                        </div>

                        <div class="h-px bg-slate-100"></div>

                        <div class="flex items-center justify-between gap-3">
                            <span class="text-xs text-slate-500">Total Pengguna</span>
                            <span class="text-xs font-bold text-slate-800">
                                {{ number_format($totalUsers, 0, ',', '.') }} akun
                            </span>
                        </div>

                    </div>

                </div>


                {{-- SYSTEM INFO --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>
                            <h2 class="font-extrabold text-slate-900">
                                Informasi Sistem
                            </h2>

                            <p class="mt-1 text-xs text-slate-500">
                                Detail aplikasi saat ini.
                            </p>
                        </div>

                        <div class="rounded-xl bg-indigo-50 p-3 text-indigo-600">
                            <svg class="h-6 w-6" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor">

                                <rect x="3" y="4" width="18" height="16" rx="2"
                                    stroke-width="1.8"/>

                                <path d="M8 9h8M8 13h5"
                                    stroke-width="1.8"
                                    stroke-linecap="round"/>
                            </svg>
                        </div>

                    </div>


                    <div class="mt-7 space-y-5">

                        <div class="flex items-center justify-between gap-3">
                            <span class="text-xs text-slate-500">Nama Aplikasi</span>
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
                            <span class="text-xs text-slate-500">Total Buku</span>
                            <span class="text-xs font-bold text-slate-800">
                                {{ number_format($totalBooks, 0, ',', '.') }}
                            </span>
                        </div>

                        <div class="h-px bg-slate-100"></div>

                        <div class="flex items-center justify-between gap-3">
                            <span class="text-xs text-slate-500">Status Sistem</span>

                            <span class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-600">
                                <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                                Aktif
                            </span>
                        </div>

                    </div>

                </div>

            </section>


            {{-- ACTIVITY --}}
            <section id="aktivitas"
                class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                <div class="flex flex-wrap items-center justify-between gap-3">

                    <div>
                        <h2 class="font-extrabold text-slate-900">
                            Aktivitas Terbaru
                        </h2>

                        <p class="mt-1 text-xs text-slate-500">
                            Ringkasan kegiatan di dalam sistem.
                        </p>
                    </div>

                    <span class="rounded-lg bg-slate-100 px-3 py-2 text-xs font-medium text-slate-500">
                        Riwayat Aktivitas
                    </span>

                </div>


                <div class="flex flex-col items-center justify-center py-10 text-center">

                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">

                        <svg class="h-7 w-7" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor">

                            <circle cx="12" cy="12" r="9" stroke-width="1.7"/>
                            <path d="M12 7v5l3 2"
                                stroke-width="1.7"
                                stroke-linecap="round"/>
                        </svg>

                    </div>

                    <h3 class="mt-3 text-sm font-bold text-slate-700">
                        Belum ada aktivitas
                    </h3>

                    <p class="mt-1 text-xs text-slate-400">
                        Riwayat aktivitas akan tersedia setelah modul log aktivitas dibuat.
                    </p>

                </div>

            </section>


            {{-- FOOTER --}}
            <footer class="flex flex-col justify-between gap-2 border-t border-slate-200 py-6 text-xs text-slate-400 sm:flex-row">

                <p>
                    © {{ date('Y') }} BookSpace — Sistem Informasi Manajemen Buku.
                </p>

                <p>
                    Sistem Informasi Manajemen Buku.
                </p>

            </footer>

        </main>

    </div>

</div>

</body>
</html>
