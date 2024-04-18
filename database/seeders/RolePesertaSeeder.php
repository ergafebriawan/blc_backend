<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RolePeserta;

class RolePesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RolePeserta::create([
            'nama_role' => 'koordinator'
        ]);

        RolePeserta::create([
            'nama_role' => 'anggota'
        ]);
    }
}
