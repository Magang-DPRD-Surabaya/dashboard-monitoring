<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusCapaian;

class StatusCapaianController extends Controller
{
    /**
     * Menampilkan semua data status
     */
    public function index()
    {
        $status = StatusCapaian::latest()->get();

        return view('status.index', compact('status'));
    }

    /**
     * Form tambah status
     */
    public function create()
    {
        return view('status.create');
    }

    /**
     * Simpan data status
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_status' => 'required|unique:status_capaian,nama_status'
        ]);

        // Simpan data
        StatusCapaian::create([
            'nama_status' => $request->nama_status
        ]);

        return redirect('/status-capaian')
            ->with('success', 'Status capaian berhasil ditambahkan');
    }

    /**
     * Form edit status
     */
    public function edit(string $id)
    {
        $status = StatusCapaian::findOrFail($id);

        return view('status.edit', compact('status'));
    }

    /**
     * Update status
     */
    public function update(Request $request, string $id)
    {
        $status = StatusCapaian::findOrFail($id);

        // Validasi unique kecuali data sendiri
        $request->validate([
            'nama_status' => 'required|unique:status_capaian,nama_status,' . $status->id
        ]);

        // Update data
        $status->update([
            'nama_status' => $request->nama_status
        ]);

        return redirect('/status-capaian')
            ->with('success', 'Status capaian berhasil diupdate');
    }

    /**
     * Hapus status
     */
    public function destroy(string $id)
    {
        $status = StatusCapaian::findOrFail($id);

        $status->delete();

        return redirect('/status-capaian')
            ->with('success', 'Status capaian berhasil dihapus');
    }
}