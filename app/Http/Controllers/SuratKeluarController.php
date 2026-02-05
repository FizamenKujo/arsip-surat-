<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    public function index(Request $request)
    {
        $query = SuratKeluar::latest();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('no_surat', 'like', "%{$search}%")
                    ->orWhere('tujuan', 'like', "%{$search}%")
                    ->orWhere('perihal', 'like', "%{$search}%");
            });
        }

        $suratKeluar = $query->paginate(10);
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
            'file' => 'nullable|file|mimes:pdf,jpg,png|max:5120',
        ]);

        if ($request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('surat-keluar', 'public');
        }

        $validated['user_id'] = Auth::id();
        $validated['status'] = 'draft';

        SuratKeluar::create($validated);

        return redirect()->route('surat-keluar.index')->with('success', 'Surat Keluar berhasil dicatat');
    }
    public function show($id)
    {
        $surat = SuratKeluar::findOrFail($id);
        return view('surat-keluar.show', compact('surat'));
    }
    public function edit($id)
    {
        $surat = SuratKeluar::findOrFail($id);
        return view('surat-keluar.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $surat = SuratKeluar::findOrFail($id);
        
        $validated = $request->validate([
            'no_surat' => 'required|unique:surat_keluars,no_surat,'.$surat->id,
            'tujuan' => 'required',
            'perihal' => 'required',
            'tanggal_surat' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,jpg,png|max:5120',
        ]);

        if ($request->hasFile('file')) {
            if ($surat->file_path) {
                Storage::disk('public')->delete($surat->file_path);
            }
            $validated['file_path'] = $request->file('file')->store('surat-keluar', 'public');
        }

        $surat->update($validated);

        return redirect()->route('surat-keluar.index')->with('success', 'Surat Keluar berhasil diperbarui');
    }

    public function destroy($id)
    {
        $surat = SuratKeluar::findOrFail($id);
        
        if ($surat->file_path) {
            Storage::disk('public')->delete($surat->file_path);
        }
        
        $surat->delete();

        return redirect()->route('surat-keluar.index')->with('success', 'Surat Keluar berhasil dihapus');
    }
}
