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
        Schema::create('request', function (Blueprint $table) {
            $table->id('id_request');
            $table->enum('request_type', ['Baru', 'Perpanjangan', 'Perubahan', 'Pencabutan']);
            $table->foreignId('request_type_id')
                ->constrained('permit_type', 'id_permit_type');
            $table->foreignId('request_number_id')
                ->constrained('request_number', 'id_request_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request');
    }
};
