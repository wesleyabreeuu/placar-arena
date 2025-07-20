<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    use HasFactory;

    protected $fillable = [
        'partida_id',
        'numero',
        'pontos_equipe_1',
        'pontos_equipe_2'
    ];

    public function partida()
    {
        return $this->belongsTo(Partida::class);
    }
}
