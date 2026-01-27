<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('license_types')) {
            Schema::create('license_types', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique(); // Ej: "Licencia Empresa"
                $table->string('scope');          // Ej: "company" o "user"
                $table->text('description')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('license_types');
    }
};