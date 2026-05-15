<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendapatan;
use App\Models\MitraKerja;
use App\Models\TahunAnggaran;
use App\Models\StatusCapaian;
use App\Models\KondisiLingkungan;

class PendapatanController extends Controller
{
    /**
     * Menampilkan semua data pendapatan
     */
    public function index()
    {
        // Ambil data beserta relasi
        $pendapatan = Pendapatan::with([
            'mitra',
            'tahun',
            'status',
            'kondisi'
        ])->latest()->get();

        return view('pendapatan.index', compact('pendapatan'));
    }

    /**
     * Form tambah pendapatan
     */
    public function create()
    {
        // Ambil master data untuk dropdown
        $mitra = MitraKerja::all();
        $tahun = TahunAnggaran::all();
        $kondisi = KondisiLingkungan::all();

        return view('pendapatan.create', compact(
            'mitra',
            'tahun',
            'kondisi'
        ));
    }

    /**
     * Simpan data pendapatan
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'mitra_id' => 'required',
            'tahun_id' => 'required|unique:pendapatan,tahun_id,NULL,id,mitra_id,' . $request->mitra_id,
            'target' => 'required|numeric',
            'realisasi' => 'required|numeric',
            'kondisi_id' => 'required',
            'catatan' => 'nullable'
        ]);

        // Hitung persentase
        $persentase = ($request->realisasi / $request->target) * 100;

        /**
         * Menentukan status otomatis
         * berdasarkan persentase
         */
        if ($persentase >= 80) {

            // Status: Baik
            $statusId = StatusCapaian::where(
                'nama_status',
                'Baik'
            )->first()->id;

        } elseif ($persentase >= 50) {

            // Status: Perlu Perhatian
            $statusId = StatusCapaian::where(
                'nama_status',
                'Perlu Perhatian'
            )->first()->id;

        } else {

            // Status: Perlu Evaluasi
            $statusId = StatusCapaian::where(
                'nama_status',
                'Perlu Evaluasi'
            )->first()->id;
        }

        // Simpan data
        Pendapatan::create([

            // Relasi mitra kerja
            'mitra_id' => $request->mitra_id,

            // Relasi tahun anggaran
            'tahun_id' => $request->tahun_id,

            // User login yang input data
            'created_by' => auth()->id(),

            // Data pendapatan
            'target' => $request->target,
            'realisasi' => $request->realisasi,

            // Persentase otomatis
            'persentase' => $persentase,

            // Status otomatis
            'status_id' => $statusId,

            // Kondisi lingkungan
            'kondisi_id' => $request->kondisi_id,

            // Catatan tambahan
            'catatan' => $request->catatan,
        ]);

        return redirect('/pendapatan')
            ->with('success', 'Data pendapatan berhasil ditambahkan');
    }

    /**
     * Form edit pendapatan
     */
    public function edit(string $id)
    {
        // Cari data pendapatan
        $pendapatan = Pendapatan::findOrFail($id);

        // Master data dropdown
        $mitra = MitraKerja::all();
        $tahun = TahunAnggaran::all();
        $kondisi = KondisiLingkungan::all();

        return view('pendapatan.edit', compact(
            'pendapatan',
            'mitra',
            'tahun',
            'kondisi'
        ));
    }

    /**
     * Update data pendapatan
     */
    public function update(Request $request, string $id)
    {
        // Cari data
        $pendapatan = Pendapatan::findOrFail($id);

        // Validasi
        $request->validate([
            'mitra_id' => 'required',
            'tahun_id' => 'required|unique:pendapatan,tahun_id,' .
                $pendapatan->id .
                 ',id,mitra_id,' .
                $request->mitra_id,
            'target' => 'required|numeric',
            'realisasi' => 'required|numeric',
            'kondisi_id' => 'required',
            'catatan' => 'nullable'
        ]);

        // Hitung persentase ulang
        $persentase = ($request->realisasi / $request->target) * 100;

        /**
         * Status otomatis
         */
        if ($persentase >= 80) {

            $statusId = StatusCapaian::where(
                'nama_status',
                'Baik'
            )->first()->id;

        } elseif ($persentase >= 50) {

            $statusId = StatusCapaian::where(
                'nama_status',
                'Perlu Perhatian'
            )->first()->id;

        } else {

            $statusId = StatusCapaian::where(
                'nama_status',
                'Perlu Evaluasi'
            )->first()->id;
        }

        // Update data
        $pendapatan->update([

            'mitra_id' => $request->mitra_id,
            'tahun_id' => $request->tahun_id,

            'target' => $request->target,
            'realisasi' => $request->realisasi,

            'persentase' => $persentase,

            'status_id' => $statusId,

            'kondisi_id' => $request->kondisi_id,

            'catatan' => $request->catatan,
        ]);

        return redirect('/pendapatan')
            ->with('success', 'Data pendapatan berhasil diupdate');
    }

    /**
     * Hapus data pendapatan
     */
    public function destroy(string $id)
    {
        // Cari data
        $pendapatan = Pendapatan::findOrFail($id);

        // Hapus data
        $pendapatan->delete();

        return redirect('/pendapatan')
            ->with('success', 'Data pendapatan berhasil dihapus');
    }
}