<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantesPartida extends Model
{
    use HasFactory;

    protected $table = 'participantes_partida';

    protected $fillable = [
        'partida_id',
        'equipe_id',
        'ordem'
    ];

    public function partida()
    {
        return $this->belongsTo(Partida::class);
    }

    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }
}
