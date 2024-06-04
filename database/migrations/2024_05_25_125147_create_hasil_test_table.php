<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_test', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_peserta');
            $table->uuid('id_test');
            $table->string('kode_soal');
            $table->json('listening');
            $table->json('structure');
            $table->json('reading');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_test');
    }
}
