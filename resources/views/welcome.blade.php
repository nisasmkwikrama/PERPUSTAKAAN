@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-4">Selamat Datang di Perpustakaan</h1>
            <p class="lead mb-4">Platform untuk mengelola data buku dan peminjam dengan mudah dan efisien.</p>

            <a href="{{ route('buku.index') }}" class="btn btn-primary btn-lg mt-2">Lihat Data Buku</a>
            <a href="{{ route('peminjam.index') }}" class="btn btn-success btn-lg mt-2">Lihat Data Peminjam</a>
        </div>
    </div>
</div>
@endsection
