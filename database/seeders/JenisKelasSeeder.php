<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisKelas;

class JenisKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisKelas::create([
            'nama_kelas' => 'private'
        ]);

        JenisKelas::create([
            'nama_kelas' => 'reguler'
        ]);
    }
}
