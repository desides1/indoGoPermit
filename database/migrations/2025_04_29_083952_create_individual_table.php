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
        Schema::create('individual', function (Blueprint $table) {
            $table->id('id_individual');
            $table->enum('identity_type', ['KTP', 'SIM', 'Passport']);
            $table->string('number_identity', 50);
            $table->string('name', 100);
            $table->enum('gender', ['Perempuan', 'Laki-laki']);
            $table->string('birthplace', 50);
            $table->string('telephone_hp', 13);
            $table->string('email', 50);
            $table->string('job', 25);
            $table->string('npwp_number', 50);
            $table->string('village', 50);
            $table->string('postal_code', 10);
            $table->string('detail_address')->nullable();
            $table->date('date_of_bird');
            $table->foreignId('province_id')->constrained('province', 'id_province');
            $table->foreignId('city_id')->constrained('city', 'id_city');
            $table->foreignId('subdistrict_id')->constrained('subdistrict', 'id_subdistrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('individual');
    }
};
