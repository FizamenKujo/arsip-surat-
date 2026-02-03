<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return view('dashboard.admin', [
                'total_surat_masuk' => SuratMasuk::count(),
                'total_surat_keluar' => SuratKeluar::count(),
                'total_petugas' => User::where('role', 'petugas')->count(),
                'recent_users' => User::latest()->take(5)->get(),
            ]);
        } else {
            return view('dashboard.member', [
                'user' => $user,
                'my_surat_masuk' => SuratMasuk::where('user_id', $user->id)->count(),
                'my_surat_keluar' => SuratKeluar::where('user_id', $user->id)->count(),
                'total_arsip' => SuratMasuk::count() + SuratKeluar::count(),
            ]);
        }
    }
}
