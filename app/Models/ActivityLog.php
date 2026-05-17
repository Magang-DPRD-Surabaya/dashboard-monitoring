<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    /**
     * Nama tabel
     */
    protected $table = 'activity_logs';

    /**
     * Field yang boleh diisi
     */
    protected $fillable = [

        'user_id',

        'aksi',

        'tabel',

        'data_id',

        'deskripsi'
    ];

    /**
     * Relasi ke user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}