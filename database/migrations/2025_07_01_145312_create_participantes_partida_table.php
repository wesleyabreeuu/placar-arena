<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('participantes_partida', function (Blueprint $table) {
        $table->id();
        $table->foreignId('partida_id')->constrained('partidas')->onDelete('cascade');
        $table->foreignId('equipe_id')->constrained('equipes')->onDelete('cascade');
        $table->tinyInteger('ordem')->comment('1 = equipe 1, 2 = equipe 2');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participantes_partida');
    }
};
