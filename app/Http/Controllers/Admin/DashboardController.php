<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalBooks = Book::count();

        $totalStock = (int) Book::sum('stock');

        $totalCategories = Category::count();

        $totalUsers = User::count();

        $latestBooks = Book::with('category')
            ->latest()
            ->take(5)
            ->get();

        $categoryStats = Category::withCount('books')
            ->orderByDesc('books_count')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalBooks',
            'totalStock',
            'totalCategories',
            'totalUsers',
            'latestBooks',
            'categoryStats'
        ));
    }
}
