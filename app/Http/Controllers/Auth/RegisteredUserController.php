<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Menampilkan halaman registrasi.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Memproses registrasi pengguna baru.
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi data registrasi
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:' . User::class,
            ],
            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults(),
            ],
        ]);

        // 2. Menyimpan akun pengguna ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 3. Memberikan role Mahasiswa secara otomatis
        $user->assignRole('Mahasiswa');

        // 4. Menjalankan event registrasi
        event(new Registered($user));

        // 5. Login otomatis setelah registrasi
        Auth::login($user);

        // 6. Memperbarui session
        $request->session()->regenerate();

        // 7. Mengarahkan pengguna ke dashboard Mahasiswa
        return redirect()->route('mahasiswa.dashboard');
    }
}
