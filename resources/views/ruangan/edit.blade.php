
@extends('layouts.app')
@section('title', 'Edit Ruangan')
@section('heading', 'Edit Ruangan')

@section('content')
<div class="glass-card page-content">
    <h4 class="mb-4">Edit Ruangan</h4>

    <form action="{{ route('ruangan.update', $ruangan) }}" method="POST">
        @csrf
        @method('PUT')
        @include('ruangan._form')
    </form>
</div>
@endsection
