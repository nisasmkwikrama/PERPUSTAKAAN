<?php

namespace App\Http\Controllers;
use App\Models\Peminjam;
use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $peminjam = Peminjam::paginate(10);
        return view('TukangPinjem.index', compact('peminjam'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('TukangPinjem.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
        ],
        [
            'nama.required' => 'Nama harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'no_telp.required' => 'No. HP harus diisi',
            'email.required' => 'Email harus diisi',
        ]
        );

        Peminjam::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
        ]);

        return redirect()->route('peminjam.index')->with('success', 'Data peminjam berhasil ditambahkan');
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
        $peminjam = Peminjam::where('id',$id)->first();
        return view('TukangPinjem.edit', compact('peminjam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
        ]);

        Peminjam::where('id', $id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
        ]);
        return redirect()->route('peminjam.index')->with('success', 'Data peminjam berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Peminjam::where('id', $id)->delete();
        return redirect()->route('peminjam.index')->with('success', 'Data peminjam berhasil dihapus');
    }
}
