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
        Schema::create('project', function (Blueprint $table) {
            $table->id('id_project');
            $table->enum('project_type', ['PMA', 'PMDN', 'Non Fasilitas']);
            $table->decimal('investment_value', 20, 0);
            $table->decimal('target_pad', 20, 0);
            $table->integer('total_employee');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project');
    }
};
