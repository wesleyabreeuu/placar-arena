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
    Schema::create('partidas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('competicao_id')->constrained('competicoes')->onDelete('cascade');
        $table->foreignId('modalidade_id')->constrained('modalidades')->onDelete('cascade');
        $table->timestamp('data_hora')->nullable();
        $table->enum('status', ['agendada', 'em_andamento', 'finalizada'])->default('agendada');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidas');
    }
};
