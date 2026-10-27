
@extends('layouts.app')

@section('title', 'Dashboard Murid')
@section('heading', 'Dashboard Murid')

@section('content')
<div class="page-content glass-card">
    <h4>Selamat datang, {{ auth()->user()->name }}!</h4>
    <p class="text-secondary">Ringkasan pengelolaan sarana dan prasarana sekolah.</p>

    <div class="row g-3 mt-3">
        @foreach([
            ['Total Sarana', '{{ $totalLaporanSaya }}', 'bi-box-seam'],
            ['Sarana Rusak', '{{ $laporanMenunggu }}', 'bi-tools'],
            ['Dalam Perbaikan', '{{ $laporanDalamPerbaikan }}', 'bi-clock-history'],
            ['Laporan Masuk', '{{ $laporanSelesai }}', 'bi-clipboard-data']
        ] as $stat)
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="glass-card stat-card">
                    <div class="stat-icon mb-3">
                        <i class="bi {{ $stat[2] }}"></i>
                    </div>
                    <div class="text-secondary small">{{ $stat[0] }}</div>
                    <h2 class="fw-bold mt-2">{{ $stat[1] }}</h2>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
