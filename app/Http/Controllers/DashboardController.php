<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MitraKerja;
use App\Models\Pendapatan;

class DashboardController extends Controller
{
    public function index()
    {
        /**
         * Total mitra kerja
         */
        $totalMitra = MitraKerja::count();

        /**
         * Total target pendapatan
         */
        $totalTarget = Pendapatan::sum('target');

        /**
         * Total realisasi pendapatan
         */
        $totalRealisasi = Pendapatan::sum('realisasi');

        /**
         * Ranking mitra berdasarkan realisasi terbesar
         */
        $rankingMitra = Pendapatan::with('mitra')
            ->orderByDesc('realisasi')
            ->take(5)
            ->get();

        /**
         * Data grafik chart
         */
        $chartData = Pendapatan::with('mitra')->get();

        /**
         * Dashboard admin
         */
        if (auth()->user()->role == 'admin') {

            return view('dashboard.admin', compact(
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
            'totalMitra',
            'totalTarget',
            'totalRealisasi',
            'rankingMitra',
            'chartData'
        ));
    }
}
