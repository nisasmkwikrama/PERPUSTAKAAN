@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-4">Edit Peminjam</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('peminjam.update', $peminjam->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="form-group mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Peminjam" value="{{ old('nama', $peminjam->nama) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat" value="{{ old('alamat', $peminjam->alamat) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="no_telp">No HP</label>
                    <input type="number" name="no_telp" id="no_telp" class="form-control" placeholder="Masukkan No HP" value="{{ old('no_telp', $peminjam->no_telp) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email" value="{{ old('email', $peminjam->email) }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Peminjam</button>
                <a href="{{ route('peminjam.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
