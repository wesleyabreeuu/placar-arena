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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partida_id')->constrained('partidas')->onDelete('cascade');
            $table->foreignId('equipe_id')->constrained('equipes')->onDelete('cascade');
            $table->foreignId('jogador_id')->nullable()->constrained('jogadores')->onDelete('set null');
            $table->enum('tipo', ['ponto', 'falta', 'cartao_amarelo', 'cartao_vermelho', 'tempo_tecnico', 'substituicao']);
            $table->text('descricao')->nullable();
            $table->integer('minuto')->nullable(); // Se quiser registrar o tempo do evento
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
