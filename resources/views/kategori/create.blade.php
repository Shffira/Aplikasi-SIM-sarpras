
@extends('layouts.app')
@section('title', 'Tambah Kategori')
@section('heading', 'Tambah Kategori')

@section('content')
<div class="glass-card page-content">
    <h4 class="mb-4">Tambah Kategori Sarana</h4>

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        @include('kategori._form')
    </form>
</div>
@endsection
