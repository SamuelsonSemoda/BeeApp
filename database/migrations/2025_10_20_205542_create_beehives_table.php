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
        Schema::dropIfExists('locations');

        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('nazev');
            $table->string('lokace')->nullable();
            $table->text('poznamky')->nullable();
            $table->timestamps();
        });

        Schema::create('beehives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->constrained()->cascadeOnDelete();
            $table->string('nazev');
            $table->integer('cislo')->nullable();
            $table->integer('pocet_nastavku')->nullable();
            $table->text('poznamky')->nullable();
            $table->timestamps();
        });

        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beehive_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('locations');
    }
};
