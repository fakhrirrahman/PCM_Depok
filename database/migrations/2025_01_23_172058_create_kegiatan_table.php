<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('nama_kegiatan');
            $table->text('deskripsi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('lokasi');
            $table->enum('status_kegiatan', ['berjalan', 'selesai', 'dibatalkan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};
