
@extends('layouts.app')
@section('title', 'Edit Kategori')
@section('heading', 'Edit Kategori')

@section('content')
<div class="glass-card page-content">
    <h4 class="mb-4">Edit Kategori Sarana</h4>

    <form action="{{ route('kategori.update', $kategori) }}" method="POST">
        @csrf
        @method('PUT')
        @include('kategori._form')
    </form>
</div>
@endsection
