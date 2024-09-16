<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            JenisKelasSeeder::class,
            JenisSoalSeeder::class,
            RolePesertaSeeder::class,
            TestSeeder::class,
            PesertaSeeder::class,
            konvListeningSeeder::class,
            konvStructureSeeder::class,
            konvReadingSeeder::class,
            TestingSoalSeeder::class
        ]);
    }
}
