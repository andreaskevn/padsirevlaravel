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
        Schema::create('transaksi_penjualans', function (Blueprint $table) {
            $table->id(); // ID transaksi penjualan
            $table->unsignedBigInteger('id_user'); // Foreign key ke tabel users
            $table->unsignedBigInteger('id_pelanggan'); // Foreign key ke tabel pelanggan
            $table->float('total_harga'); // Total harga dari transaksi
            $table->timestamp('tanggal_transaksi')->useCurrent(); // Tanggal transaksi
            $table->timestamps();

            // Set foreign key constraints
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_pelanggan')->references('id')->on('pelanggans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_penjualans');
    }
};
