<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TahunAnggaran;

class TahunAnggaranController extends Controller
{
    /**
     * Menampilkan semua data tahun anggaran
     */
    public function index()
    {
        // Ambil semua data tahun terbaru
        $tahun = TahunAnggaran::latest()->get();

        return view('tahun.index', compact('tahun'));
    }

    /**
     * Menampilkan form tambah tahun
     */
    public function create()
    {
        return view('tahun.create');
    }

    /**
     * Menyimpan data tahun baru
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'tahun' => 'required|unique:tahun_anggaran,tahun'
        ]);

        // Simpan data
        TahunAnggaran::create([
            'tahun' => $request->tahun
        ]);

        return redirect('/tahun-anggaran')
            ->with('success', 'Tahun anggaran berhasil ditambahkan');
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
        $tahun = TahunAnggaran::findOrFail($id);

        return view('tahun.edit', compact('tahun'));
    }

    /**
     * Update data tahun
     */
    public function update(Request $request, string $id)
    {
        // Cari data
        $tahun = TahunAnggaran::findOrFail($id);

        // Validasi unique kecuali data sendiri
        $request->validate([
            'tahun' => 'required|unique:tahun_anggaran,tahun,' . $tahun->id
        ]);

        // Update data
        $tahun->update([
            'tahun' => $request->tahun
        ]);

        return redirect('/tahun-anggaran')
            ->with('success', 'Tahun anggaran berhasil diupdate');
    }

    /**
     * Hapus data tahun
     */
    public function destroy(string $id)
    {
        // Cari data
        $tahun = TahunAnggaran::findOrFail($id);

        // Hapus data
        $tahun->delete();

        return redirect('/tahun-anggaran')
            ->with('success', 'Tahun anggaran berhasil dihapus');
    }
}
