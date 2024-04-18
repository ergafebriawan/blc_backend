<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisSoal;

class JenisSoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisSoal::create([
            'type_soal' => 'blank'
        ]);

        JenisSoal::create([
            'type_soal' => 'card'
        ]);

        JenisSoal::create([
            'type_soal' => 'example'
        ]);

        JenisSoal::create([
            'type_soal' => 'test'
        ]);

        JenisSoal::create([
            'type_soal' => 'question'
        ]);

        JenisSoal::create([
            'type_soal' => 'test1'
        ]);
        JenisSoal::create([
            'type_soal' => 'paragraph'
        ]);
    }
}
