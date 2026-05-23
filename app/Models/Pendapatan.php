<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendapatan extends Model
{
    protected $table = 'pendapatan';

    protected $fillable = [
        'mitra_id',
        'tahun_id',
        'created_by',
        'pemodalan',
        'target',
        'realisasi',
        'persentase',
        'dividen',
        'status_id',
        'kondisi_id',
        'catatan'
    ];

    public function mitra()
    {
        return $this->belongsTo(MitraKerja::class, 'mitra_id');
    }

    public function tahun()
    {
        return $this->belongsTo(TahunAnggaran::class, 'tahun_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function status()
    {
        return $this->belongsTo(StatusCapaian::class, 'status_id');
    }

    public function kondisi()
    {
        return $this->belongsTo(KondisiLingkungan::class, 'kondisi_id');
    }
}
