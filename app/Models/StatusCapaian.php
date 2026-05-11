<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusCapaian extends Model
{
    protected $table = 'status_capaian';

    protected $fillable = [
        'nama_status'
    ];

    public function pendapatan()
    {
        return $this->hasMany(Pendapatan::class, 'status_id');
    }
}
