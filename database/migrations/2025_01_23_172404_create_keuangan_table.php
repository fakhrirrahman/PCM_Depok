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
        Schema::create('keuangan', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->date('tanggal_transaksi');
            $table->enum('tipe', ['saldo', 'pemasukan', 'pengeluaran']);
            $table->string('kategori');
            $table->bigInteger('jumlah');
            $table->bigInteger('saldo_awal')->nullable();
            $table->bigInteger('saldo_akhir')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keuangan');
    }
};
