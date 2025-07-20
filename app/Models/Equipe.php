<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome'
    ];

    public function jogadores()
    {
        return $this->hasMany(Jogador::class);
    }

    public function partidas()
    {
        return $this->belongsToMany(Partida::class, 'participantes_partida')
                    ->withPivot('ordem')
                    ->withTimestamps();
    }
}
