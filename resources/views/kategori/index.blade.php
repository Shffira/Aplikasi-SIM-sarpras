
@extends('layouts.app')
@section('title', 'Kategori Sarana')
@section('heading', 'Kategori Sarana')

@section('content')
<div class="glass-card page-content">
    <div class="d-flex justify-content-between mb-4">
        <h4>Daftar Kategori</h4>
        <a href="{{ route('kategori.create') }}" class="btn btn-success">
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
            <thead><tr><th>Nama Kategori</th><th>Deskripsi</th><th>Aksi</th></tr></thead>
            <tbody>
            @forelse($kategori as $item)
                <tr>
                    <td>{{ $item->nama_kategori }}</td>
                    <td>{{ $item->deskripsi ?: '-' }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('kategori.edit', $item) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form method="POST" action="{{ route('kategori.destroy', $item) }}" onsubmit="return confirm('Hapus kategori ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="text-center">Belum ada kategori.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{ $kategori->links() }}
</div>
@endsection
