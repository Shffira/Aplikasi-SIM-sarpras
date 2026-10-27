
@extends('layouts.app')
@section('title', 'Data Ruangan')
@section('heading', 'Data Ruangan')

@section('content')
<div class="glass-card page-content">
    <div class="d-flex justify-content-between mb-4">
        <h4>Daftar Ruangan</h4>
        <a href="{{ route('ruangan.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Tambah
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead><tr><th>Kode</th><th>Nama Ruangan</th><th>Lokasi</th><th>Aksi</th></tr></thead>
            <tbody>
            @forelse($ruangan as $item)
                <tr>
                    <td>{{ $item->kode_ruangan }}</td>
                    <td>{{ $item->nama_ruangan }}</td>
                    <td>{{ $item->lokasi ?: '-' }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('ruangan.edit', $item) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form method="POST" action="{{ route('ruangan.destroy', $item) }}" onsubmit="return confirm('Hapus ruangan ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">Belum ada ruangan.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{ $ruangan->links() }}
</div>
@endsection
