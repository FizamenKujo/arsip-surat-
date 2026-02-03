<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'petugas');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nip', 'like', "%{$search}%")
                    ->orWhere('name', 'like', "%{$search}%");
            });
        }

        $petugas = $query->latest()->paginate(10);
        return view('petugas.index', compact('petugas'));
    }

    public function create()
    {
        return view('petugas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|string|unique:users',
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $validated['role'] = 'petugas';
        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil ditambahkan');
    }

    public function edit(User $petugas)
    {
        return view('petugas.edit', compact('petugas'));
    }

    public function update(Request $request, User $petugas)
    {
        $validated = $request->validate([
            'nip' => 'required|string|unique:users,nip,' . $petugas->id,
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $petugas->id,
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        }

        $petugas->update($validated);

        return redirect()->route('petugas.index')->with('success', 'Data petugas diperbarui');
    }

    public function destroy(User $petugas)
    {
        $petugas->delete();
        return redirect()->route('petugas.index')->with('success', 'Petugas dihapus');
    }
}
