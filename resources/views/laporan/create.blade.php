
@extends('layouts.app')
@section('title', 'Buat Laporan')
@section('heading', 'Buat Laporan Kerusakan')

@section('content')
<div class="glass-card page-content">
    <h4 class="mb-4">Form Laporan Kerusakan</h4>

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

    <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Sarana</label>
            <select name="sarana_id" class="form-select" required>
                <option value="">Pilih sarana</option>
                @foreach($sarana as $item)
                    <option value="{{ $item->id }}" @selected(old('sarana_id') == $item->id)>
                        {{ $item->nama_sarana }} — {{ $item->ruangan->nama_ruangan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Ruangan</label>
            <select name="ruangan_id" class="form-select" required>
                <option value="">Pilih ruangan</option>
                @foreach($ruangan as $item)
                    <option value="{{ $item->id }}" @selected(old('ruangan_id') == $item->id)>
                        {{ $item->nama_ruangan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi Kerusakan</label>
            <textarea name="deskripsi_kerusakan" class="form-control" rows="4" required>{{ old('deskripsi_kerusakan') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto Kerusakan (opsional, maks. 2 MB)</label>
            <input type="file" name="foto" class="form-control" accept="image/*">
        </div>

        <button class="btn btn-success">Kirim Laporan</button>
        <a href="{{ route('laporan.index') }}" class="btn btn-light">Batal</a>
    </form>
</div>
@endsection
