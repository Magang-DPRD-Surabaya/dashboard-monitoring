<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendapatan;
use App\Models\MitraKerja;
use App\Models\TahunAnggaran;
use App\Models\StatusCapaian;
use App\Models\KondisiLingkungan;
use App\Helpers\ActivityLogHelper;

class PendapatanController extends Controller
{
    /**
     * Menampilkan semua data pendapatan
     */
    public function index(Request $request){
        //Ambil keyword pencarian
        $mitraId = $request->mitra_id;

        // Ambil filter tahun
        $tahunId = $request->tahun_id;

        // Ambil data beserta relasi
        $pendapatan = Pendapatan::with([

            'mitra',
            'tahun',
            'status',
            'kondisi'

        ])

        ->when($mitraId, function ($query) use ($mitraId) {
            $query->where('mitra_id', $mitraId);
        })

        ->when($tahunId, function ($query) use ($tahunId) {
            $query->where('tahun_id', $tahunId);
        })

        ->latest()

        ->paginate(10);

        $mitraList = MitraKerja::all();
        $tahunList = TahunAnggaran::all();

        // Tampilkan view
        return view(
            'pendapatan.index',
            compact('pendapatan', 'mitraList', 'tahunList')
        );
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
            'pemodalan' => 'required|numeric|min:0',
            'dividen' => 'required|numeric|min:0',
            'target' => 'required|numeric|min:0',
            'realisasi' => 'required|numeric|min:0',
            'kondisi_id' => 'required',
            'catatan' => 'nullable'
        ]);

        // Hitung persentase
        $persentase = $request->target > 0
            ? ($request->realisasi / $request->target) * 100
            : 0;

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
        $pendapatan = Pendapatan::create([

            // Relasi mitra kerja
            'mitra_id' => $request->mitra_id,

            // Relasi tahun anggaran
            'tahun_id' => $request->tahun_id,

            // User login yang input data
            'created_by' => auth()->id(),

            'pemodalan' => $request->pemodalan,

            // Data pendapatan
            'target' => $request->target,
            'realisasi' => $request->realisasi,

            // Persentase otomatis
            'persentase' => $persentase,

            'dividen' => $request->dividen,

            // Status otomatis
            'status_id' => $statusId,

            // Kondisi lingkungan
            'kondisi_id' => $request->kondisi_id,

            // Catatan tambahan
            'catatan' => $request->catatan,
        ]);

        /**
         * Simpan activity log
         */
        ActivityLogHelper::log(
            'create',
            'pendapatan',
            $pendapatan->id,
            'Menambahkan data pendapatan baru'
        );

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
            'pemodalan' => 'required|numeric|min:0',
            'target' => 'required|numeric|min:0',
            'realisasi' => 'required|numeric|min:0',
            'dividen' => 'required|numeric|min:0',
            'kondisi_id' => 'required',
            'catatan' => 'nullable'
        ]);

        // Hitung persentase ulang
        $persentase = $request->target > 0
            ? ($request->realisasi / $request->target) * 100
            : 0;

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
            'pemodalan' => $request->pemodalan,
            'target' => $request->target,
            'realisasi' => $request->realisasi,
            'persentase' => $persentase,
            'dividen' => $request->dividen,
            'status_id' => $statusId,
            'kondisi_id' => $request->kondisi_id,
            'catatan' => $request->catatan,
        ]);

        /**
         * Simpan activity log
         */
        ActivityLogHelper::log(
            'update',
            'pendapatan',
            $pendapatan->id,
            'Mengupdate data pendapatan'
        );

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

        /**
         * Simpan activity log
         */
        ActivityLogHelper::log(
            'delete',
            'pendapatan',
            $pendapatan->id,
            'Menghapus data pendapatan'
        );

        // Hapus data
        $pendapatan->delete();

        return redirect('/pendapatan')
            ->with('success', 'Data pendapatan berhasil dihapus');
    }
}