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
            'status' => false
        ]);

        Test::create([
            'jenis_test' => 'post test 1',
            'status' => false
        ]);

        Test::create([
            'jenis_test' => 'post test 2',
            'status' => false
        ]);

        Test::create([
            'jenis_test' => 'equivalent',
            'status' => false
        ]);
    }
}
