<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modalidade extends Model
{
    use HasFactory;

    protected $table = 'modalidades';

    protected $fillable = [
        'nome',
        'sets_por_partida',
        'pontos_por_set'
    ];

    public function competicoes()
    {
        return $this->hasMany(Competicao::class);
    }

        public function partidas()
    {
        return $this->hasMany(Partida::class, 'modalidade_id');
    }
}
