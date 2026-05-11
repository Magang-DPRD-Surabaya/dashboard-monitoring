<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KondisiLingkungan extends Model
{
    protected $table = 'kondisi_lingkungan';

    protected $fillable = [
        'nama_kondisi'
    ];

    public function pendapatan()
    {
        return $this->hasMany(Pendapatan::class, 'kondisi_id');
    }
}
