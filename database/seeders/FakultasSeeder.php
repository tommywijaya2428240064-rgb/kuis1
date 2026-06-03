<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fakultas = [
            [
                'nama_fakultas' => "fakultas Ekonomi",
                'nama_dekan' => "Dr. Ir. H. M. aliong M.T.",
            ],
            [
                "nama_fakultas" => "fakultas Hukum",
                "nama_dekan" => "Dr. Ir. H. M. djohan, M.T.",
            ],
            [
                "nama_fakultas" => "fakultas Ilmu Sosial dan Politik",
                "nama_dekan" => "Dr. Ir. H. M. ahong, M.T.",
            ],
            [
                "nama_fakultas" => "fakultas Keguruan dan Ilmu Pendidikan",
                "nama_dekan" => "Dr. Ir. H. M. ahok, M.T.",
            ],
            [
                "nama_fakultas" => "fakultas Pertanian",
                "nama_dekan" => "Dr. Ir. H. M. ahuang, M.T.",
            ],
            [
                "nama_fakultas" => "fakultas Kedokteran",
                "nama_dekan" => "Dr. Ir. H. M. abeng, M.T.",
            ],
            [
                "nama_fakultas" => "fakultas Ilmu Komputer",
                "nama_dekan" => "Dr. Ir. H. M. akiong, M.T.",
            ],
        ];
        foreach ($fakultas as $data) {
            Fakultas::create($data);
        }
    }
}
