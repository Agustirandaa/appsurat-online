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
        Schema::create('surat_pemberitahuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_keluar_id')->constrained('surat_keluars')->onDelete('cascade');
            $table->string('nama')->nullable();
            $table->string('hari_tanggal')->nullable();
            $table->string('pukul')->nullable();
            $table->string('tempat')->nullable();
            $table->string('acara')->nullable();
            $table->string('peserta')->nullable();
            $table->text('body_surat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_pemberitahuans');
    }
};
