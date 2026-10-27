<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RuanganController extends Controller
{
    public function index()
    {
        $ruangan = Ruangan::latest()->paginate(10);
        return view('ruangan.index', compact('ruangan'));
    }

    public function create()
    {
        return view('ruangan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_ruangan' => 'required|string|max:50|unique:ruangan,kode_ruangan',
            'nama_ruangan' => 'required|string|max:100',
            'lokasi' => 'nullable|string|max:100',
        ]);

        Ruangan::create($data);

        return redirect()->route('ruangan.index')
            ->with('success', 'Ruangan berhasil ditambahkan.');
    }

    public function edit(Ruangan $ruangan)
    {
        return view('ruangan.edit', compact('ruangan'));
    }

    public function update(Request $request, Ruangan $ruangan)
    {
        $data = $request->validate([
            'kode_ruangan' => [
                'required', 'string', 'max:50',
                Rule::unique('ruangan', 'kode_ruangan')->ignore($ruangan->id),
            ],
            'nama_ruangan' => 'required|string|max:100',
            'lokasi' => 'nullable|string|max:100',
        ]);

        $ruangan->update($data);

        return redirect()->route('ruangan.index')
            ->with('success', 'Ruangan berhasil diperbarui.');
    }

    public function destroy(Ruangan $ruangan)
    {
        if ($ruangan->sarana()->exists() || $ruangan->laporanSarana()->exists()) {
            return back()->with('error', 'Ruangan masih digunakan oleh data sarana atau laporan.');
        }

        $ruangan->delete();

        return redirect()->route('ruangan.index')
            ->with('success', 'Ruangan berhasil dihapus.');
    }
}
