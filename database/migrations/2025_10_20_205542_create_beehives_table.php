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
        Schema::create('beehives', function (Blueprint $table) {
            $table->id(); // auto-increment ID
            $table->integer('cislo');
            $table->string('nazev', 100); // název úlu
            $table->text('poznamky')->nullable(); // poznámky
            $table->timestamps(); // created_at a updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beehives');
    }
};
