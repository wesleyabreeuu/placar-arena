@extends('layouts.app')

@section('title', 'Placar Ao Vivo')

@section('content')
<style>
    .scoreboard {
        background: linear-gradient(145deg, #f0f0f0, #ffffff);
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        padding: 40px 30px;
        margin-top: 40px;
    }
    .team-name {
        font-size: 1.8rem;
        font-weight: 600;
        margin-bottom: 10px;
    }
    .score {
        font-size: 5rem;
        font-weight: bold;
    }
    .versus {
        font-size: 1.5rem;
        font-weight: 600;
        margin: 0 20px;
        color: #999;
    }
    .set-info {
        font-size: 1.3rem;
        margin-top: 30px;
    }
    .updated-time {
        margin-top: 10px;
        font-size: 0.9rem;
        color: #888;
    }
</style>

<div class="container text-center">
    <div class="scoreboard">

        <h2 class="mb-1">🏆 {{ $partida->competicao->nome ?? 'Competição' }}</h2>
        <div class="text-muted mb-4">
            {{ $partida->modalidade->nome ?? '' }} — {{ \Carbon\Carbon::parse($partida->data_hora)->format('d/m/Y H:i') }}
        </div>

        <div class="row align-items-center justify-content-center mb-4">
            <div class="col-md-4">
                <div class="team-name text-primary">{{ $partida->equipes[0]->nome ?? 'Equipe A' }}</div>
                <div class="score text-primary" id="pontosEquipeA">{{ $placar?->pontos_equipe_a ?? 0 }}</div>
            </div>
            <div class="versus col-md-1">X</div>
            <div class="col-md-4">
                <div class="team-name text-danger">{{ $partida->equipes[1]->nome ?? 'Equipe B' }}</div>
                <div class="score text-danger" id="pontosEquipeB">{{ $placar?->pontos_equipe_b ?? 0 }}</div>
            </div>
        </div>

        <div class="set-info">
            Set Atual: <strong id="setAtual">{{ $placar?->set_numero ?? '-' }}</strong>
        </div>

        <div class="updated-time">
            Última atualização: <span id="ultimaAtualizacao">{{ now()->format('H:i:s') }}</span>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function atualizarPlacar() {
        $.getJSON("/placar-publico/{{ $partida->id }}/dados", function(data) {
            $('#pontosEquipeA').text(data.pontosEquipeA);
            $('#pontosEquipeB').text(data.pontosEquipeB);
            $('#setAtual').text(data.setAtual);
            $('#ultimaAtualizacao').text(data.updated_at);
        });
    }

    setInterval(atualizarPlacar, 2000); // Atualiza a cada 2 segundos
</script>
@endsection
