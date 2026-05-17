<?php

namespace App\Http\Controllers;

// Import model
use App\Models\ActivityLog;

class ActivityLogController extends Controller
{
    /**
     * Menampilkan semua activity log
     */
    public function index()
    {
        // Ambil log terbaru
        $logs = ActivityLog::with('user')
            ->latest()
            ->get();

        return view('activity-log.index', compact('logs'));
    }
}