<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MitraKerja extends Model
{
    protected $table = 'mitra_kerja';

    protected $fillable = [
        'nama_mitra',
        'jenis',
        'deskripsi'
    ];

    public function pendapatan()
    {
        return $this->hasMany(Pendapatan::class, 'mitra_id');
    }
}
