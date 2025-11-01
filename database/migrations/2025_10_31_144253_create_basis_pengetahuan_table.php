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
        Schema::create('basis_pengetahuan', function (Blueprint $table) {
            $table->integer('kode_pengetahuan')->autoIncrement();
            $table->integer('kode_penyakit');
            $table->integer('kode_gejala');
            $table->double('mb', 11, 1);
            $table->double('md', 11, 1);
            
            $table->foreign('kode_penyakit')->references('kode_penyakit')->on('penyakit')->onDelete('cascade');
            $table->foreign('kode_gejala')->references('kode_gejala')->on('gejala')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basis_pengetahuan');
    }
};
