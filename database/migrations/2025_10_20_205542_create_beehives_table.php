<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('records');
        Schema::dropIfExists('beehives');

        Schema::create('beehives', function (Blueprint $table) {
            $table->id();
            $table->string('nazev', 100);
            $table->integer('cislo')->nullable();
            $table->integer('pocet_nastavku')->nullable();
            $table->string('stanoviste');
            $table->text('poznamky')->nullable();
            $table->timestamps();
        });

        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beehive_id')->constrained()->onDelete('cascade');
            $table->date('datum');
            $table->string('typ_akce');
            $table->text('popis')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('records');
        Schema::dropIfExists('beehives');
    }
};
