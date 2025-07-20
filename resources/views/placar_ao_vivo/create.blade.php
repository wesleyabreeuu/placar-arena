@extends('layouts.app')

@section('title', 'Novo Placar Ao Vivo')

@section('content')
<div class="container">
    <h1>Novo Placar Ao Vivo</h1>

    <form action="{{ route('placar-ao-vivo.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="partida_id">Partida</label>
            <select name="partida_id" id="partida_id" class="form-control" required>
                <option value="">Selecione uma partida</option>
                @foreach($partidas as $partida)
                    <option value="{{ $partida->id }}">
                                                {{ $partida->id }} -
                        {{ optional($partida->equipes->get(0))->nome ?? 'Equipe A' }}
                        x
                        {{ optional($partida->equipes->get(1))->nome ?? 'Equipe B' }}

                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="set_numero">Número do Set</label>
            <input type="number" name="set_numero" id="set_numero" class="form-control" required min="1">
        </div>

        <div class="form-group mt-3">
            <label for="pontos_equipe_a">Pontos Equipe A (opcional)</label>
            <input type="number" name="pontos_equipe_a" id="pontos_equipe_a" class="form-control" value="0">
        </div>

        <div class="form-group mt-3">
            <label for="pontos_equipe_b">Pontos Equipe B (opcional)</label>
            <input type="number" name="pontos_equipe_b" id="pontos_equipe_b" class="form-control" value="0">
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('placar-ao-vivo.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
