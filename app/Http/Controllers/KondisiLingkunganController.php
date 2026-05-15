<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KondisiLingkungan;

class KondisiLingkunganController extends Controller
{
    /**
     * Menampilkan semua data kondisi lingkungan
     */
    public function index()
    {
        $kondisi = KondisiLingkungan::latest()->get();

        return view('kondisi.index', compact('kondisi'));
    }

    /**
     * Form tambah kondisi
     */
    public function create()
    {
        return view('kondisi.create');
    }

    /**
     * Simpan data kondisi
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_kondisi' => 'required|unique:kondisi_lingkungan,nama_kondisi'
        ]);

        // Simpan data
        KondisiLingkungan::create([
            'nama_kondisi' => $request->nama_kondisi
        ]);

        return redirect('/kondisi-lingkungan')
            ->with('success', 'Kondisi lingkungan berhasil ditambahkan');
    }

    /**
     * Form edit kondisi
     */
    public function edit(string $id)
    {
        $kondisi = KondisiLingkungan::findOrFail($id);

        return view('kondisi.edit', compact('kondisi'));
    }

    /**
     * Update kondisi
     */
    public function update(Request $request, string $id)
    {
        $kondisi = KondisiLingkungan::findOrFail($id);

        // Validasi unique kecuali data sendiri
        $request->validate([
            'nama_kondisi' => 'required|unique:kondisi_lingkungan,nama_kondisi,' . $kondisi->id
        ]);

        // Update data
        $kondisi->update([
            'nama_kondisi' => $request->nama_kondisi
        ]);

        return redirect('/kondisi-lingkungan')
            ->with('success', 'Kondisi lingkungan berhasil diupdate');
    }

    /**
     * Hapus kondisi
     */
    public function destroy(string $id)
    {
        $kondisi = KondisiLingkungan::findOrFail($id);

        $kondisi->delete();

        return redirect('/kondisi-lingkungan')
            ->with('success', 'Kondisi lingkungan berhasil dihapus');
    }
}