<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    public function index(Request $request)
    {
        $query = SuratMasuk::latest();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('no_surat', 'like', "%{$search}%")
                    ->orWhere('pengirim', 'like', "%{$search}%")
                    ->orWhere('perihal', 'like', "%{$search}%");
            });
        }

        $suratMasuk = $query->paginate(10);
        return view('surat-masuk.index', compact('suratMasuk'));
    }

    public function create()
    {
        return view('surat-masuk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_surat' => 'required|unique:surat_masuks',
            'pengirim' => 'required',
            'perihal' => 'required',
            'tanggal_terima' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,jpg,png|max:5120',
        ]);

        if ($request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('surat-masuk', 'public');
        }

        $validated['user_id'] = Auth::id();
        $validated['status'] = 'unread';

        SuratMasuk::create($validated);

        return redirect()->route('surat-masuk.index')->with('success', 'Surat Masuk berhasil dicatat');
    }
    public function show($id)
    {
        $surat = SuratMasuk::findOrFail($id);
        return view('surat-masuk.show', compact('surat'));
    }
    public function edit($id)
    {
        $surat = SuratMasuk::findOrFail($id);
        return view('surat-masuk.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $surat = SuratMasuk::findOrFail($id);
        
        $validated = $request->validate([
            'no_surat' => 'required|unique:surat_masuks,no_surat,'.$surat->id,
            'pengirim' => 'required',
            'perihal' => 'required',
            'tanggal_terima' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,jpg,png|max:5120',
        ]);

        if ($request->hasFile('file')) {
            if ($surat->file_path) {
                Storage::disk('public')->delete($surat->file_path);
            }
            $validated['file_path'] = $request->file('file')->store('surat-masuk', 'public');
        }

        $surat->update($validated);

        return redirect()->route('surat-masuk.index')->with('success', 'Surat Masuk berhasil diperbarui');
    }

    public function destroy($id)
    {
        $surat = SuratMasuk::findOrFail($id);
        
        if ($surat->file_path) {
            Storage::disk('public')->delete($surat->file_path);
        }
        
        $surat->delete();

        return redirect()->route('surat-masuk.index')->with('success', 'Surat Masuk berhasil dihapus');
    }
}
