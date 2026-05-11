<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StatusCapaian;

class StatusCapaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_status' => 'Baik'],
            ['nama_status' => 'Perlu Perhatian'],
            ['nama_status' => 'Perlu Evaluasi'],
        ];

        foreach ($data as $item) {
            StatusCapaian::create($item);
        }
    }
}
