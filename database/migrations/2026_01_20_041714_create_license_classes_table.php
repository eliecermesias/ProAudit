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
        Schema::create('license_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            // Ejemplo: Basic, Standard, Premium

            $table->text('description')->nullable();
            $table->integer('default_max_users')->nullable();
            $table->json('default_modules')->nullable();
            $table->integer('default_duration_months')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('license_classes');
    }
};
