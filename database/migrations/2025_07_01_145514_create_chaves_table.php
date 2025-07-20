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
    Schema::create('chaves', function (Blueprint $table) {
        $table->id();
        $table->foreignId('competicao_id')->constrained('competicoes')->onDelete('cascade');
        $table->foreignId('partida_id')->constrained('partidas')->onDelete('cascade');
        $table->integer('fase')->comment('ex: 1 = oitavas, 2 = quartas...');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chaves');
    }
};
