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
        Schema::create('document_requirements', function (Blueprint $table) {
            $table->id('id_document_requirements');
            $table->string('document_number', 20);
            $table->date('valid_until')->nullable();
            $table->enum('status', ['fill', 'unfill']);
            $table->string('file_path');
            $table->foreignId('requirement_id')->constrained('requirement', 'id_requirement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_requirements');
    }
};
