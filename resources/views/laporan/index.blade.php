
@extends('layouts.app')
@section('title', 'Laporan Kerusakan')
@section('heading', 'Laporan Kerusakan')

@section('content')
<div class="glass-card page-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Daftar Laporan</h4>

        @if(auth()->user()->role === 'murid')
            <a href="{{ route('laporan.create') }}" class="btn btn-success">
                <i class="bi bi-plus-lg"></i> Buat Laporan
            </a>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Pelapor</th>
                    <th>Sarana</th>
                    <th>Ruangan</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    @if(in_array(auth()->user()->role, ['admin', 'petugas_sarpras']))
                        <th>Ubah Status</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($laporan as $item)
                    <tr>
                        <td>{{ $item->tanggal_laporan->format('d/m/Y') }}</td>
                        <td>{{ $item->murid->name }}</td>
                        <td>{{ $item->sarana->nama_sarana }}</td>
                        <td>{{ $item->ruangan->nama_ruangan }}</td>
                        <td>{{ $item->deskripsi_kerusakan }}</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $item->status)) }}</td>

                        @if(in_array(auth()->user()->role, ['admin', 'petugas_sarpras']))
                            <td>
                                <form action="{{ route('laporan.status', $item) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="form-select form-select-sm mb-2">
                                        @foreach(['pending', 'dalam_perbaikan', 'selesai', 'ditolak'] as $status)
                                            <option value="{{ $status }}" @selected($item->status === $status)>
                                                {{ ucfirst(str_replace('_', ' ', $status)) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-sm btn-success">Simpan</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center">Belum ada laporan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $laporan->links() }}
</div>
@endsection
