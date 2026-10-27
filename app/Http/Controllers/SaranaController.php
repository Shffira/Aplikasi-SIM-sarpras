<?php

namespace App\Http\Controllers;

use App\Models\Sarana;
use App\Models\KategoriSarana;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SaranaController extends Controller
{
    public function index()
    {
        $sarana = Sarana::with(['kategori', 'ruangan'])
            ->latest()
            ->paginate(10);

        return view('sarana.index', compact('sarana'));
    }

    public function create()
    {
        $kategori = KategoriSarana::all();
        $ruangan = Ruangan::all();

        return view('sarana.create', compact('kategori', 'ruangan'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_sarana' => ['required', 'string', 'max:50', 'unique:sarana,kode_sarana'],
            'nama_sarana' => ['required', 'string', 'max:150'],
            'kategori_id' => ['required', 'exists:kategori_sarana,id'],
            'ruangan_id' => ['required', 'exists:ruangan,id'],
            'kondisi' => ['required', Rule::in(['baik', 'rusak_ringan', 'rusak_berat'])],
            'status_perbaikan' => ['required', Rule::in(['normal', 'dalam_perbaikan'])],
            'jumlah' => ['required', 'integer', 'min:1'],
        ]);

        Sarana::create($data);

        return redirect()->route('sarana.index')
            ->with('success', 'Data sarana berhasil ditambahkan.');
    }

    public function edit(Sarana $sarana)
    {
        $kategori = KategoriSarana::all();
        $ruangan = Ruangan::all();

        return view('sarana.edit', compact('sarana', 'kategori', 'ruangan'));
    }

    public function update(Request $request, Sarana $sarana)
    {
        $data = $request->validate([
            'kode_sarana' => [
                'required', 'string', 'max:50',
                Rule::unique('sarana', 'kode_sarana')->ignore($sarana->id),
            ],
            'nama_sarana' => ['required', 'string', 'max:150'],
            'kategori_id' => ['required', 'exists:kategori_sarana,id'],
            'ruangan_id' => ['required', 'exists:ruangan,id'],
            'kondisi' => ['required', Rule::in(['baik', 'rusak_ringan', 'rusak_berat'])],
            'status_perbaikan' => ['required', Rule::in(['normal', 'dalam_perbaikan'])],
            'jumlah' => ['required', 'integer', 'min:1'],
        ]);

        $sarana->update($data);

        return redirect()->route('sarana.index')
            ->with('success', 'Data sarana berhasil diperbarui.');
    }

    public function destroy(Sarana $sarana)
    {
        if ($sarana->laporanSarana()->exists() || $sarana->beritaAcara()->exists()) {
            return back()->with('error', 'Sarana memiliki riwayat laporan atau berita acara sehingga tidak dapat dihapus.');
        }

        $sarana->delete();

        return redirect()->route('sarana.index')
            ->with('success', 'Data sarana berhasil dihapus.');
    }
}
