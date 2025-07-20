<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlacarAoVivo extends Model
{
    protected $fillable = [
    'partida_id',
    'set_numero',
    'pontos_equipe_a',
    'pontos_equipe_b',
];

public function partida()
{
    return $this->belongsTo(Partida::class);
}

}


