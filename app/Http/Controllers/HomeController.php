<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // pastikan model User ada

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua data user, atau buat data dummy jika belum ada user
        $users = User::all(); 
        // Atau untuk testing:
        // $users = collect([
        //     (object)['name' => 'Riski', 'email' => 'riski@mail.com'],
        //     (object)['name' => 'Dani', 'email' => 'dani@mail.com'],
        // ]);

        // Kirim data ke view index.blade.php
        return view('index', compact('users'));
    }
}
