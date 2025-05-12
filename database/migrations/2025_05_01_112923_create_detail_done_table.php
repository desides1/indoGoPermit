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
        Schema::create('detail_done', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemohon'); // Charlie Kristen (dari profil)
            $table->string('status')->default('New');
            $table->string('jenis_perizinan');
            $table->date('tanggal_pengajuan');
            $table->date('tanggal_selesai');
            $table->text('catatan')->nullable();

            // Dokumen
            $table->string('surat_keputusan')->nullable();
            $table->string('sertifikat_izin')->nullable();
            $table->string('berita_acara')->nullable();
            $table->string('dokumen_pendukung')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_done');
    }
};
