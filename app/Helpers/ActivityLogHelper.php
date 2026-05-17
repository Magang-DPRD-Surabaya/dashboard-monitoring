<?php

namespace App\Helpers;

// Import model
use App\Models\ActivityLog;

class ActivityLogHelper
{
    /**
     * Fungsi menyimpan activity log
     */
    public static function log(
        $aksi,
        $tabel,
        $dataId,
        $deskripsi
    ) {

        ActivityLog::create([

            // User login
            'user_id' => auth()->id(),

            // Jenis aksi
            'aksi' => $aksi,

            // Nama tabel
            'tabel' => $tabel,

            // ID data terkait
            'data_id' => $dataId,

            // Deskripsi aktivitas
            'deskripsi' => $deskripsi,
        ]);
    }
}