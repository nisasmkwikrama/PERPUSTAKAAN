{{-- resources/views/Bukudata/edit.blade.php --}}
@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-4">Edit Buku</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('buku.update', $buku->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="form-group mb-3">
                    <label for="judul">Judul Buku</label>
                    <input type="text" name="judul" id="judul" class="form-control" value="{{ $buku->judul }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="penulis">Penulis</label>
                    <input type="text" name="penulis" id="penulis" class="form-control" value="{{ $buku->penulis }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="Jumlah_Halaman">Jumlah Halaman</label>
                    <input type="number" name="jumlah_halaman" id="jumlah_halaman" class="form-control" value="{{ $buku->jumlah_halaman }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="jenis">Jenis Buku</label>
                    <select name="jenis" id="jenis" class="form-control" required value="{{ $buku->jenis }}">
                        <option value="">-- Pilih Jenis Buku --</option>
                        <option value="Fantasi" {{ old('jenis') == 'Fantasi' ? 'selected' : '' }}>Fantasi</option>
                        <option value="Fiksi" {{ old('jenis') == 'Fiksi' ? 'selected' : '' }}>Fiksi</option>
                        <option value="Non Fiksi" {{ old('jenis') == 'Non Fiksi' ? 'selected' : '' }}>Non-Fiksi</option>
                        <option value="Komik" {{ old('jenis') == 'Komik' ? 'selected' : '' }}>Komik</option>
                        <option value="Ilmiah" {{ old('jenis') == 'Ilmiah' ? 'selected' : '' }}>Ilmiah</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Buku</button>
                <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
