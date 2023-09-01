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
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('jenis_surat');
            $table->string('nomor_surat')->unique();
            $table->string('tujuan_surat');
            $table->string('sifat_surat');
            $table->string('perihal_surat');
            $table->string('tanggal_surat');
            $table->string('status');
            $table->string('semester');
            $table->string('name_check')->nullable();
            $table->string('status_check')->default('Belum Dicek');
            $table->string('catatan')->nullable();
            $table->string('tanggal_check')->nullable();
            $table->string('lampiran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keluars');
    }
};
