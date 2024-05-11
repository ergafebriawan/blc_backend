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
            $table->integer('index');
            $table->uuid('type_test');
            $table->uuid('type_soal');
            $table->string('test', 255);
            $table->string('page_title', 255)->nullable();
            $table->string('page_subtitle', 255)->nullable();
            $table->string('title', 255)->nullable();
            $table->string('subtitle', 255)->nullable();
            $table->text('content')->nullable();
            $table->text('paragraph_title')->nullable();
            $table->text('paragraph')->nullable();
            $table->integer('no')->nullable();
            $table->text('a')->nullable();
            $table->text('b')->nullable();
            $table->text('c')->nullable();
            $table->text('d')->nullable();
            $table->string('key', 10)->nullable();
            $table->integer('timer')->default(0);
            $table->uuid('audio')->nullable();
            $table->timestamps();

            $table->foreign('type_test')
                    ->references('id')
                    ->on('test')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreign('type_soal')
                    ->references('id')
                    ->on('jenis_soal')
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
        Schema::dropIfExists('soal');
    }
}
