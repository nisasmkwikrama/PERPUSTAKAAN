@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Data Peminjam</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('peminjam.create') }}" class="btn btn-primary mb-3">Tambah Peminjam</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjam as $index => $item)
                <tr>
                    <td>{{ $index + 1 + ($peminjam->currentPage() - 1) * $peminjam->perPage() }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->no_telp }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <a href="{{ route('peminjam.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('peminjam.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $peminjam->links() }} <!-- Untuk menampilkan pagination -->
</div>
@endsection
