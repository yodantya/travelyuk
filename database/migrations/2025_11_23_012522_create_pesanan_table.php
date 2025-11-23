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
        Schema::create('pesanans', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('rute_id');
        $table->integer('jumlah_penumpang');
        $table->string('nama_penumpang');
        $table->string('no_hp');
        $table->integer('total_harga');
        $table->string('status_pembayaran')->default('pending');
        $table->string('bukti_pembayaran')->nullable();
        $table->string('kode_invoice')->nullable();
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('rute_id')->references('id')->on('manajemen_rutes')->onDelete('cascade');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
