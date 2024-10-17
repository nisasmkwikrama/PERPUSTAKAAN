<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $buku = Buku::paginate(10);
        return view('Bukudata.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Bukudata.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'jumlah_halaman' => 'required',
            'jenis' => 'required',
        ],
        [
            'judul.required' => 'Judul harus diisi',
            'penulis.required' => 'Penulis harus diisi',
            'jumlah_halaman.required' => 'jumlah_halaman harus diisi',
            'jenis.required' => 'Jenis harus diisi',
        ]
    );
    Buku::create([
        'judul' => $request->judul,
        'penulis' => $request->penulis,
        'jumlah_halaman' => $request->jumlah_halaman,
        'jenis' => $request->jenis,
    ]);

    return redirect()->route('buku.index')->with('success', 'Data buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $buku = Buku::where('id',$id)->first();
        return view('Bukudata.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'jumlah_halaman' => 'required',
            'jenis' => 'required',
        ]);
        Buku::where('id', $id)->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'jumlah_halaman' => $request->jumlah_halaman,
            'jenis' => $request->jenis,
        ]);
        return redirect()->route('buku.index')->with('success', 'Data buku berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Buku::where('id', $id)->delete();
        return redirect()->route('buku.index')->with('success', 'Data buku berhasil dihapus');
    }
}
