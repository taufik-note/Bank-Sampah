<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GuestLoginController extends Controller
{
    public function login()
    {
        // Email khusus untuk user guest
        $guestEmail = 'guest@example.com';

        // Cari user guest di database
        $guest = User::where('email', $guestEmail)->first();

        if (!$guest) {
            // Jika belum ada, buat user guest baru
            $guest = User::create([
                'name' => 'Guest User',
                'email' => $guestEmail,
                'password' => bcrypt(bin2hex(random_bytes(16))), // password acak
                // Jika ada kolom role, isi role guest
            ]);
        }

        // Login pakai user guest tersebut
        Auth::login($guest);

        // Redirect ke dashboard atau halaman tujuan
        return redirect()->route('dashboard');
    }
}
