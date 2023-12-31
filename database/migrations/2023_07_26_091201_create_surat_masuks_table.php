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
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('pengirim');
            $table->string('nomor_surat');
            $table->string('slug')->unique();
            $table->string('sifat_surat');
            $table->string('perihal_surat');
            $table->string('tanggal_surat');
            $table->string('tanggal_diterima');
            $table->string('semester');
            $table->string('jenis_surat');
            $table->string('image')->nullable();
            $table->string('status')->default('Belum didisposisi');
            $table->string('disposisi')->nullable();
            $table->string('catatan_disposisi')->nullable();
            $table->timestamp('insert_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuks');
    }
};
