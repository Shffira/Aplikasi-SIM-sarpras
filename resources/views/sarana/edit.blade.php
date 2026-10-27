
@extends('layouts.app')

@section('title', 'Edit Sarana')
@section('heading', 'Edit Sarana')

@section('content')
<div class="glass-card page-content">
    <h4 class="mb-4">Edit Data Sarana</h4>
    <form action="{{ route('sarana.update', $sarana) }}" method="POST">
        @method('PUT')
        @include('sarana._form')
    </form>
</div>
@endsection
