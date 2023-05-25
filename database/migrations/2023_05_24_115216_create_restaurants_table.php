<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('restaurants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('adresse')->nullable();
            $table->string('telephone')->nullable();
            // Autres colonnes spécifiques aux restaurants
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};