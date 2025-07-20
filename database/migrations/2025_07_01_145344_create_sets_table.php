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
    Schema::create('sets', function (Blueprint $table) {
        $table->id();
        $table->foreignId('partida_id')->constrained('partidas')->onDelete('cascade');
        $table->integer('numero'); // set 1, set 2, etc.
        $table->integer('pontos_equipe_1')->default(0);
        $table->integer('pontos_equipe_2')->default(0);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sets');
    }
};
