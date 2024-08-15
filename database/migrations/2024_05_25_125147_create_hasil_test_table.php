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
            $table->date('tgl_daftar');
            $table->date('tgl_test')->nullable();
            $table->string('kode_soal', 255);
            $table->string('token', 255)->nullable();
            $table->boolean('status_test')->default(false);
            $table->integer('listening')->nullable();
            $table->integer('k_listening')->nullable();
            $table->integer('structure')->nullable();
            $table->integer('k_structure')->nullable();
            $table->integer('reading')->nullable();
            $table->integer('k_reading')->nullable();
            $table->integer('total')->nullable();
            $table->timestamps();

            $table->foreign('id_peserta')
                ->references('id')
                ->on('peserta')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->foreign('id_test')
                ->references('id')
                ->on('test')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
