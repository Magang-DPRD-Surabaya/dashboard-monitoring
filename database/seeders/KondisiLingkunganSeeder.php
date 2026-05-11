<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KondisiLingkungan;

class KondisiLingkunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_kondisi' => 'Stabil'],
            ['nama_kondisi' => 'Kurang Stabil'],
            ['nama_kondisi' => 'Tidak Stabil'],
        ];

        foreach ($data as $item) {
            KondisiLingkungan::create($item);
        }
    }
}
