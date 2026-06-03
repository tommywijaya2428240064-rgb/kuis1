<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    
    public function run(): void
    {
   $prodis= [    
        [
        'nama_prodi' => 'Sistem Informasi',
        'nama_kaprodi'=> 'Ir Akiong S.H',
        'alias_prodi'=> 'SI',
        
    ],
     [
        'nama_prodi' => 'Sistem Informasi',
        'nama_kaprodi'=> 'Ir Angok S.H',
        'alias_prodi'=> 'SI',
    
    ],
     [
        'nama_prodi' => 'Teknik Informatika',
        'nama_kaprodi'=> 'Dr.Ir Asiong S.H',
        'alias_prodi'=> 'TI',
        
    ],
      [
        'nama_prodi' => 'Teknik Informatika',
        'nama_kaprodi'=> 'Dr.Ir Asui S.H',
        'alias_prodi'=> 'TI',
        
    ],
    ];
    foreach ($prodis as $prodi){
            $prodi['fakultas_id']=Fakultas::inRandomOrder()->first()->id;
            Prodi::create($prodi);
    }
}
}