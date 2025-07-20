<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competicao extends Model
{
    use HasFactory;

    protected $table = 'competicoes';
    
    protected $fillable = [
        'nome',
        'tipo',
        'data_inicio',
        'data_fim',
        'modalidade_id'
    ];

    public function modalidade()
    {
        return $this->belongsTo(Modalidade::class);
    }

    public function partidas()
    {
        return $this->hasMany(Partida::class);
    }
}
