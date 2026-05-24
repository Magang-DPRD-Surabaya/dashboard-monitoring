<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MitraKerja;
use App\Models\Pendapatan;
use App\Models\TahunAnggaran;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        /**
         * Ambil semua tahun
         * untuk dropdown filter
         */
        $tahunList = TahunAnggaran::all();

        /**
         * Ambil tahun yang dipilih
         * dari URL
         */
        $tahunId = $request->tahun_id;

        /**
         * Query dasar pendapatan
         */
        $query = Pendapatan::query();

        /**
         * Jika tahun dipilih
         * maka filter berdasarkan tahun
         */
        if ($tahunId) {

            $query->where('tahun_id', $tahunId);
        }

        /**
         * Total mitra
         */
        $totalMitra = MitraKerja::count();

        /**
         * Total pemodalan
         */
        $totalPemodalan = (clone $query)->sum('pemodalan');

        /**
         * Total realisasi
         */
        $totalRealisasi = (clone $query)->sum('realisasi');

        /**
         * Total dividen
         */
        $totalDividen = (clone $query)->sum('dividen');

        /**
         * Data chart
         */
        $chartData = (clone $query)
            ->with('mitra')
            ->get();

        /**
         * Chart dividen khusus BUMD
         */
        $chartDividen = (clone $query)
            ->whereHas('mitra', function ($q) {
                $q->where('jenis', 'BUMD');
            })

            ->with('mitra')

            ->get();

        /**
         * Dashboard admin
         */
        if (auth()->user()->role == 'admin') {

            return view('dashboard.admin', compact(
                'tahunList',
                'tahunId',
                'totalMitra',
                'totalPemodalan',
                'totalRealisasi',
                'totalDividen',
                'chartData',
                'chartDividen'
            ));
        }

        /**
         * Dashboard viewer
         */
        return view('dashboard.viewer', compact(
            'tahunList',
            'tahunId',
            'totalMitra',
            'totalPemodalan',
            'totalRealisasi',
            'totalDividen',
            'chartData',
            'chartDividen'
        ));
    }
}
