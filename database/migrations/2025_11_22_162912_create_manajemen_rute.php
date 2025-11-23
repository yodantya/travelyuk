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
        Schema::create('manajemen_rutes', function (Blueprint $table) {
            $table->id();
            $table->string('kota_asal');
            $table->string('kota_tujuan');
            $table->date('tanggal_berangkat');
            $table->time('jam_berangkat');
            $table->integer('harga');
            $table->integer('jumlah_kursi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manajemen_rutes');
    }
};
