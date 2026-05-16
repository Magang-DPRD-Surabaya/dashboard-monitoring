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
         * Total target
         */
        $totalTarget = (clone $query)->sum('target');

        /**
         * Total realisasi
         */
        $totalRealisasi = (clone $query)->sum('realisasi');

        /**
         * Ranking mitra
         */
        $rankingMitra = (clone $query)
            ->with('mitra')
            ->orderByDesc('realisasi')
            ->take(5)
            ->get();

        /**
         * Data chart
         */
        $chartData = (clone $query)
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
                'totalTarget',
                'totalRealisasi',
                'rankingMitra',
                'chartData'
            ));
        }

        /**
         * Dashboard viewer
         */
        return view('dashboard.viewer', compact(
            'tahunList',
            'tahunId',
            'totalMitra',
            'totalTarget',
            'totalRealisasi',
            'rankingMitra',
            'chartData'
        ));
    }
}
