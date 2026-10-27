
@extends('layouts.app')

@section('title', 'Berita Acara')
@section('heading', 'Berita Acara')

@section('content')
<div class="glass-card page-content">
    <h4 class="mb-4">Daftar Berita Acara</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Tanggal</th>
                    <th>Sarana</th>
                    <th>Jenis Tindakan</th>
                    <th>Keterangan</th>
                    <th>Pembuat</th>
                </tr>
            </thead>
            <tbody>
                @forelse($beritaAcara as $item)
                    <tr>
                        <td>{{ $item->no_berita_acara }}</td>
                        <td>{{ $item->tanggal->format('d/m/Y') }}</td>
                        <td>{{ $item->sarana->nama_sarana }}</td>
                        <td>{{ ucfirst($item->jenis_tindakan) }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>{{ $item->pembuat->name }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            Belum ada berita acara.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $beritaAcara->links() }}
</div>
@endsection
