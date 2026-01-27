<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('menus')) {
            Schema::create('menus', function (Blueprint $table) {
                $table->id();
                $table->foreignId('menu_id')->nullable()->constrained('menus'); // 👈 referencia a sí misma
                $table->string('name');
                $table->string('icon');
                $table->string('url')->default('#');
                $table->string('slug')->default('#');
                $table->string('current')->default('#');
                $table->integer('priority')->nullable();
                $table->json('roles')->nullable()->default('[]'); // roles permitidos
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};