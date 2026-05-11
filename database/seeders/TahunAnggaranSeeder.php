<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TahunAnggaran;

class TahunAnggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tahun = [
            ['tahun' => 2026],
            ['tahun' => 2027],
            ['tahun' => 2028],
        ];

        foreach ($tahun as $item) {
            TahunAnggaran::create($item);
        }
    }
}
