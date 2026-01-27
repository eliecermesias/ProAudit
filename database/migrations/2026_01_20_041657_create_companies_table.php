<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('companies')) {
            Schema::create('companies', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->string('nit')->unique();
                $table->string('email')->nullable();
                $table->string('phone')->nullable();
                $table->string('address')->nullable();
                $table->text('logo')->nullable();
                $table->text('description')->nullable();
                $table->string('contact_name')->nullable(); // 👈 corregido
                $table->timestamps();
            });
        } else {
            // Ejemplo de ajuste incremental: si falta la columna contact_name, se agrega
            if (!Schema::hasColumn('companies', 'contact_name')) {
                Schema::table('companies', function (Blueprint $table) {
                    $table->string('contact_name')->nullable();
                });
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};