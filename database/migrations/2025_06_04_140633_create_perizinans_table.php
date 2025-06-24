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
        Schema::create('perizinan', function (Blueprint $table) {
            $table->id('id_perizinan');

            $table->foreignId('user_id')
                ->constrained('users', 'id')
                ->onDelete('cascade');

            $table->foreignId('permission_type_id')
                ->constrained('permission_type', 'id_permission_type')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('location_id')
                ->constrained('location', 'id_location')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('request_id')
                ->constrained('request', 'id_request')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('individual_id')
                ->nullable()
                ->constrained('individual', 'id_individual')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('bussiness_entity_id')
                ->nullable()
                ->constrained('bussiness_entity', 'id_bussiness_entity')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('document_requirements_id')
                ->constrained('document_requirements', 'id_document_requirements')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('project_id')
                ->constrained('project', 'id_project')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->enum('status', ['draft', 'disetujui', 'ditolak'])->default('draft');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perizinans');
    }
};
