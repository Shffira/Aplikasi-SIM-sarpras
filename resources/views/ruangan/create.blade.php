
@extends('layouts.app')
@section('title', 'Tambah Ruangan')
@section('heading', 'Tambah Ruangan')

@section('content')
<div class="glass-card page-content">
    <h4 class="mb-4">Tambah Ruangan</h4>

    <form action="{{ route('ruangan.store') }}" method="POST">
        @csrf
        @include('ruangan._form')
    </form>
</div>
@endsection
