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
        Schema::create('bussiness_entity', function (Blueprint $table) {
            $table->id('id_bussiness_entity');
            $table->string('name_bussiness');
            $table->string('registration_number', 20);
            $table->string('npwp_number', 20);
            $table->string('bussiness_type', 50);
            $table->string('company_type', 50);
            $table->integer('total_employee');
            $table->decimal('investment_value', 20, 0);
            $table->string('telephone_hp', 13);
            $table->string('email', 50);
            $table->string('fax', 20);
            $table->string('village', 50);
            $table->string('postal_code', 10);
            $table->string('detail_address')->nullable();
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
        Schema::dropIfExists('bussiness_entity');
    }
};
