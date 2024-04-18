<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('no_reg', 100);
            $table->uuid('role_kelas');
            $table->uuid('jenis_peserta');
            $table->string('nama_peserta', 255);
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('gender')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('instansi')->nullable();
            $table->text('alamat')->nullable();
            $table->uuid('profile_picture')->nullable();
            $table->json('active_test')->nullable();
            $table->timestamps();

            $table->foreign('role_kelas')
                ->references('id')
                ->on('jenis_kelas')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('jenis_peserta')
                ->references('id')
                ->on('role_peserta')
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
        Schema::dropIfExists('peserta');
    }
}
