<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('companies')) {
            Schema::create('companies', function (Blueprint $table) {
                $table->id();
                $table->string('name', 191)->unique();       // ajustado
                $table->string('nit', 100)->unique();        // ajustado
                $table->string('email', 191)->nullable();    // ajustado
                $table->string('phone', 50)->nullable();     // ajustado
                $table->string('address', 191)->nullable();  // ajustado
                $table->text('logo')->nullable();
                $table->text('description')->nullable();
                $table->string('contact_name', 191)->nullable(); // ajustado
                $table->timestamps();
            });
        } else {
            // Ajuste incremental: si falta la columna contact_name, se agrega
            if (! Schema::hasColumn('companies', 'contact_name')) {
                Schema::table('companies', function (Blueprint $table) {
                    $table->string('contact_name', 191)->nullable();
                });
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
