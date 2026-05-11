<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TahunAnggaran extends Model
{
    protected $table = 'tahun_anggaran';

    protected $fillable = [
        'tahun'
    ];

    public function pendapatan()
    {
        return $this->hasMany(Pendapatan::class, 'tahun_id');
    }
}
