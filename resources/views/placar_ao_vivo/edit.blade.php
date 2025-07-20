@extends('layouts.app')

@section('title', 'Editar Placar Ao Vivo')

@section('content')
<div class="container">
    <h1>Editar Placar Ao Vivo</h1>

    <form action="{{ route('placar-ao-vivo.update', ['placar_ao_vivo' => $placar->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="partida_id">Partida</label>
            <select name="partida_id" id="partida_id" class="form-control" disabled>
                @foreach($partidas as $partida)
                    <option value="{{ $partida->id }}" {{ $placar->partida_id == $partida->id ? 'selected' : '' }}>
                        {{ $partida->id }} - {{ $partida->equipeA->nome ?? 'Equipe A' }} x {{ $partida->equipeB->nome ?? 'Equipe B' }}
                    </option>
                @endforeach
            </select>
            <small class="text-muted">A partida não pode ser alterada</small>
        </div>

        <div class="form-group mt-3">
            <label for="set_numero">Número do Set</label>
            <input type="number" name="set_numero" id="set_numero" class="form-control" required min="1" value="{{ $placar->set_numero }}">
        </div>

        <div class="form-group mt-3">
            <label for="pontos_equipe_a">Pontos Equipe A</label>
            <input type="number" name="pontos_equipe_a" id="pontos_equipe_a" class="form-control" required value="{{ $placar->pontos_equipe_a }}">
        </div>

        <div class="form-group mt-3">
            <label for="pontos_equipe_b">Pontos Equipe B</label>
            <input type="number" name="pontos_equipe_b" id="pontos_equipe_b" class="form-control" required value="{{ $placar->pontos_equipe_b }}">
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success">Atualizar</button>
            <a href="{{ route('placar-ao-vivo.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
