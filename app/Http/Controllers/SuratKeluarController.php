<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $suratKeluar = SuratKeluar::latest()->paginate(10);
        return view('surat-keluar.index', compact('suratKeluar'));
    }

    public function create()
    {
        return view('surat-keluar.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_surat' => 'required|unique:surat_keluars',
            'tujuan' => 'required',
            'perihal' => 'required',
            'tanggal_surat' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('surat-keluar');
        }

        $validated['user_id'] = Auth::id();
        $validated['status'] = 'draft';

        SuratKeluar::create($validated);

        return redirect()->route('surat-keluar.index')->with('success', 'Surat Keluar berhasil dicatat');
    }
}
