<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    // Dashboard umum
    public function index(): View
    {
        return view('dashboard', $this->dashboardData());
    }

    // Dashboard khusus Dosen
    public function dosen(): View
    {
        return view('dosen.dashboard', $this->dashboardData());
    }

    // Dashboard khusus Mahasiswa
    public function mahasiswa(): View
    {
        return view('mahasiswa.dashboard', $this->dashboardData());
    }

    // Data bersama untuk seluruh dashboard
    private function dashboardData(): array
    {
        $totalBooks = Book::count();

        $totalStock = (int) Book::sum('stock');

        $totalCategories = Category::count();

        $totalUsers = User::count();

        $latestBooks = Book::with('category')
            ->latest()
            ->take(6)
            ->get();

        $categoryStats = Category::withCount('books')
            ->orderByDesc('books_count')
            ->orderBy('name')
            ->take(5)
            ->get();

        return compact(
            'totalBooks',
            'totalStock',
            'totalCategories',
            'totalUsers',
            'latestBooks',
            'categoryStats'
        );
    }
}
