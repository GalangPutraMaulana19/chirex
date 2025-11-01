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
        Schema::create('tmp_analisa', function (Blueprint $table) {
            $table->integer('kode_pengetahuan');
            $table->integer('kode_gejala');
            $table->integer('kode_penyakit');
            $table->string('session', 100);
            $table->double('nilai_cf', 11, 2);
            
            $table->primary(['kode_pengetahuan', 'kode_gejala', 'session']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tmp_analisa');
    }
};
