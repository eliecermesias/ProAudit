<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('licenses')) {
            Schema::create('licenses', function (Blueprint $table) {
                $table->id();
                $table->foreignId('company_id')->nullable()->constrained()->cascadeOnDelete();
                $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
                $table->foreignId('license_type_id')->constrained()->cascadeOnDelete();
                $table->foreignId('license_class_id')->constrained()->cascadeOnDelete();
                $table->date('starts_at')->nullable();
                $table->date('expires_at')->nullable();
                $table->integer('max_users')->nullable();
                $table->json('modules_enabled')->nullable();
                $table->boolean('is_active')->default(true);
                $table->string('license_key', 191)->unique(); // ajustado
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('licenses');
    }
};
