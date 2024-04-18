<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('jenis_test');
            $table->uuid('type');
            $table->string('page_title', 255)->nullable();
            $table->string('page_subtitle', 255)->nullable();
            $table->string('title', 255)->nullable();
            $table->string('subtitle', 255)->nullable();
            $table->integer('no');
            $table->text('a');
            $table->text('b');
            $table->text('c');
            $table->text('d');
            $table->string('key');
            $table->integer('timer');
            $table->uuid('audio')->nullable();
            $table->timestamps();

            $table->foreign('jenis_test')->references('id')->on('test')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('type')->references('id')->on('jenis_soal')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soal');
    }
}
