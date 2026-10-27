
@extends('layouts.app')

@section('title', 'Data Sarana')
@section('heading', 'Data Sarana')

@section('content')
<div class="glass-card page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <h4 class="mb-1">Inventaris Sarana</h4>
            <p class="text-secondary mb-0">Kelola inventaris fasilitas sekolah.</p>
        </div>
        <a href="{{ route('sarana.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Tambah Sarana
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            Periksa kembali data yang dimasukkan.
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Sarana</th>
                    <th>Kategori</th>
                    <th>Ruangan</th>
                    <th>Kondisi</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sarana as $item)
                    <tr>
                        <td>{{ $item->kode_sarana }}</td>
                        <td>{{ $item->nama_sarana }}</td>
                        <td>{{ $item->kategori->nama_kategori }}</td>
                        <td>{{ $item->ruangan->nama_ruangan }}</td>
                        <td>{{ str_replace('_', ' ', ucfirst($item->kondisi)) }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>
                            <a href="{{ route('sarana.edit', $item) }}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('sarana.destroy', $item) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Hapus data sarana ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-secondary py-4">
                            Belum ada data sarana.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $sarana->links() }}
</div>
@endsection
