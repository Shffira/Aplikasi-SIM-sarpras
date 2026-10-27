
@extends('layouts.app')

@section('title', 'Tambah Sarana')
@section('heading', 'Tambah Sarana')

@section('content')
<div class="glass-card page-content">
    <h4 class="mb-4">Tambah Data Sarana</h4>
    <form action="{{ route('sarana.store') }}" method="POST">
        @include('sarana._form')
    </form>
</div>
@endsection
