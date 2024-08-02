<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Test;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Test::create([
            'jenis_test' => 'pre test',
            'kode' => 'PRT',
            'status' => false
        ]);

        Test::create([
            'jenis_test' => 'post test 1',
            'kode' => 'PT1',
            'status' => false
        ]);

        Test::create([
            'jenis_test' => 'post test 2',
            'kode' => 'PT2',
            'status' => false
        ]);

        Test::create([
            'jenis_test' => 'equivalent',
            'kode' => 'EQV',
            'status' => false
        ]);
    }
}
