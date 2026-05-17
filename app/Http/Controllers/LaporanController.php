<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import model
use App\Models\Pendapatan;
use App\Models\TahunAnggaran;

// Import PDF
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    /**
     * Download laporan PDF
     */
    public function download(Request $request)
    {
        /**
         * Ambil tahun filter
         */
        $tahunId = $request->tahun_id;

        /**
         * Query pendapatan
         */
        $query = Pendapatan::with([
            'mitra',
            'tahun',
            'status',
            'kondisi'
        ]);

        /**
         * Filter tahun jika dipilih
         */
        if ($tahunId) {

            $query->where('tahun_id', $tahunId);
        }

        /**
         * Ambil data pendapatan
         */
        $pendapatan = $query->get();

        /**
         * Total target
         */
        $totalTarget = $query->sum('target');

        /**
         * Total realisasi
         */
        $totalRealisasi = $query->sum('realisasi');

        /**
         * Ambil data tahun
         */
        $tahun = TahunAnggaran::find($tahunId);

        /**
         * Generate PDF
         */
        $pdf = Pdf::loadView('laporan.pdf', compact(
            'pendapatan',
            'totalTarget',
            'totalRealisasi',
            'tahun'
        ));

        /**
         * Download file PDF
         */
        return $pdf->download('laporan-pendapatan.pdf');
    }
}