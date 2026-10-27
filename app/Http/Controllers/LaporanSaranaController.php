<?php

namespace App\Http\Controllers;

use App\Models\LaporanSarana;
use App\Models\Sarana;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LaporanSaranaController extends Controller
{
    // Murid melihat laporan miliknya; petugas/admin melihat semua.
    public function index()
    {
        $user = auth()->user();

        $query = LaporanSarana::with(['murid', 'sarana', 'ruangan'])
            ->latest();

        if ($user->role === 'murid') {
            $query->where('murid_id', $user->id);
        }

        $laporan = $query->paginate(10);

        return view('laporan.index', compact('laporan'));
    }

    public function create()
    {
        $sarana = Sarana::with('ruangan')->get();
        $ruangan = Ruangan::all();

        return view('laporan.create', compact('sarana', 'ruangan'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'sarana_id' => ['required', 'exists:sarana,id'],
            'ruangan_id' => ['required', 'exists:ruangan,id'],
            'deskripsi_kerusakan' => ['required', 'string'],
            'foto' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')
                ->store('laporan-kerusakan', 'public');
        }

        $data['murid_id'] = auth()->id();
        $data['status'] = 'pending';
        $data['tanggal_laporan'] = now();

        LaporanSarana::create($data);

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan kerusakan berhasil dikirim.');
    }

    public function updateStatus(Request $request, LaporanSarana $laporan)
    {
        $data = $request->validate([
            'status' => [
                'required',
                Rule::in(['pending', 'dalam_perbaikan', 'selesai', 'ditolak']),
            ],
        ]);

        $laporan->update($data);

        return back()->with('success', 'Status laporan berhasil diperbarui.');
    }
}
