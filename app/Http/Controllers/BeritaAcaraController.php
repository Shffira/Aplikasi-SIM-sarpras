<?php

namespace App\Http\Controllers;

use App\Models\BeritaAcara;
use App\Models\Sarana;
use Illuminate\Http\Request;

class BeritaAcaraController extends Controller
{
    public function index()
    {
        $beritaAcara = BeritaAcara::with(['pembuat', 'sarana'])
            ->latest()
            ->paginate(10);

        return view('berita-acara.index', compact('beritaAcara'));
    }

    public function create()
    {
        $sarana = Sarana::all();

        return view('berita-acara.create', compact('sarana'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_berita_acara' => 'required|string|max:100|unique:berita_acara,no_berita_acara',
            'sarana_id' => 'required|exists:sarana,id',
            'jenis_tindakan' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        $validated['user_pembuat_id'] = auth()->id();

        BeritaAcara::create($validated);

        return redirect()->route('berita-acara.index')
            ->with('success', 'Berita acara berhasil ditambahkan.');
    }

    public function show(BeritaAcara $beritaAcara)
    {
        $beritaAcara->load(['pembuat', 'sarana']);

        return view('berita-acara.show', compact('beritaAcara'));
    }

    public function edit(BeritaAcara $beritaAcara)
    {
        $sarana = Sarana::all();

        return view('berita-acara.edit', compact(
            'beritaAcara',
            'sarana'
        ));
    }

    public function update(Request $request, BeritaAcara $beritaAcara)
    {
        $validated = $request->validate([
            'no_berita_acara' => 'required|string|max:100|unique:berita_acara,no_berita_acara,' . $beritaAcara->id,
            'sarana_id' => 'required|exists:sarana,id',
            'jenis_tindakan' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        $beritaAcara->update($validated);

        return redirect()->route('berita-acara.index')
            ->with('success', 'Berita acara berhasil diperbarui.');
    }

    public function destroy(BeritaAcara $beritaAcara)
    {
        $beritaAcara->delete();

        return redirect()->route('berita-acara.index')
            ->with('success', 'Berita acara berhasil dihapus.');
    }
}