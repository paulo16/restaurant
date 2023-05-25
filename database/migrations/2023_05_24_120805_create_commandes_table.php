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
        Schema::create('commandes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plat_id')->unsigned();
            $table->unsignedBigInteger('user_id');
            $table->integer('quantite')->nullable();
            // Autres colonnes spécifiques aux commandes
            $table->timestamps();

            $table->foreign('plat_id')->references('id')->on('plats');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};