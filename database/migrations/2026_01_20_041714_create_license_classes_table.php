<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('license_classes')) {
            Schema::create('license_classes', function (Blueprint $table) {
                $table->id();
                $table->string('name', 191)->unique(); // ajustado para evitar error de índice largo
                $table->text('description')->nullable();
                $table->integer('default_max_users')->nullable();
                $table->json('default_modules')->nullable();
                $table->integer('default_duration_months')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('license_classes');
    }
};
