<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MitraKerja;

class MitraKerjaController extends Controller
{
    /**
     * Menampilkan semua data mitra kerja
     */
    public function index()
    {
        // Mengambil semua data mitra kerja
        $mitra = MitraKerja::latest()->get();

        // Mengirim data ke view
        return view('mitra.index', compact('mitra'));
    }

    /**
     * Menampilkan form tambah mitra
     */
    public function create()
    {
        return view('mitra.create');
    }

    /**
     * Menyimpan data mitra baru
     */
    public function store(Request $request)
    {
        // Validasi input form
        $request->validate([
            'nama_mitra' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'nullable'
        ]);

        // Simpan data ke database
        MitraKerja::create([
            'nama_mitra' => $request->nama_mitra,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
        ]);

        // Redirect kembali ke halaman index
        return redirect('/mitra-kerja')
            ->with('success', 'Data mitra berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Menampilkan form edit
     */
    public function edit(string $id)
    {
        // Cari data berdasarkan id
        $mitra = MitraKerja::findOrFail($id);

        return view('mitra.edit', compact('mitra'));
    }

    /**
     * Update data mitra
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'nama_mitra' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'nullable'
        ]);

        // Cari data
        $mitra = MitraKerja::findOrFail($id);

        // Update data
        $mitra->update([
            'nama_mitra' => $request->nama_mitra,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/mitra-kerja')
            ->with('success', 'Data mitra berhasil diupdate');
    }

    /**
     * Hapus data mitra
     */
    public function destroy(string $id)
    {
        // Cari data
        $mitra = MitraKerja::findOrFail($id);

        // Hapus data
        $mitra->delete();

        return redirect('/mitra-kerja')
            ->with('success', 'Data mitra berhasil dihapus');
    }
}
