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
    Schema::create('placar_ao_vivos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('partida_id')->constrained('partidas')->onDelete('cascade');
        $table->unsignedTinyInteger('set_numero');
        $table->unsignedInteger('pontos_equipe_a')->default(0);
        $table->unsignedInteger('pontos_equipe_b')->default(0);
        $table->timestamps();
    });
    }   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('placar_ao_vivos');
    }
};
