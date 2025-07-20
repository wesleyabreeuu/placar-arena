<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    use HasFactory;

    protected $fillable = [
        'competicao_id',
        'modalidade_id',
        'data_hora',
        'status'
    ];

    // Relacionamento com a Modalidade
    public function modalidade()
    {
        return $this->belongsTo(Modalidade::class);
    }

    // Relacionamento com a Competição
    public function competicao()
    {
        return $this->belongsTo(Competicao::class);
    }

    // Participantes da partida (pivot)
    public function participantes()
    {
        return $this->hasMany(ParticipantesPartida::class);
    }

    // Todas as equipes da partida (relacionamento completo)
    public function equipes()
    {
        return $this->belongsToMany(Equipe::class, 'participantes_partida')
                    ->withPivot('ordem')
                    ->withTimestamps();
    }

    // Relacionamento com os sets da partida
    public function sets()
    {
        return $this->hasMany(Set::class);
    }

    // Acessor para equipe A (ordem 1)
    public function getEquipeAAttribute()
    {
        return $this->equipes()->wherePivot('ordem', 1)->first();
    }

    // Acessor para equipe B (ordem 2)
    public function getEquipeBAttribute()
    {
        return $this->equipes()->wherePivot('ordem', 2)->first();
    }
}
