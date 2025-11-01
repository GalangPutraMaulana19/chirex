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
        Schema::create('hasil_diagnosa', function (Blueprint $table) {
            $table->integer('kode_diagnosa')->autoIncrement();
            $table->integer('kode_penyakit');
            $table->text('gejala_dipilih');
            $table->double('hasil_nilai', 11, 2);
            $table->string('nama_user', 50);
            $table->timestamp('tanggal')->useCurrent();
            
            $table->foreign('kode_penyakit')->references('kode_penyakit')->on('penyakit')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_diagnosa');
    }
};
