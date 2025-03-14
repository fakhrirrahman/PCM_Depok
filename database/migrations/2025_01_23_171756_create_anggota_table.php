<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('tahun_pembuatan')->nullable();
            $table->string('nbm')->unique()->nullable();
            $table->string('cabang')->nullable();
            $table->string('pdm')->nullable();
            $table->string('pwm')->nullable();
            $table->text('alamat')->nullable();
            $table->string('kabupaten_tinggal')->nullable();
            $table->string('provinsi_tinggal')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('profesi')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->unique()->nullable();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota');
    }
};
