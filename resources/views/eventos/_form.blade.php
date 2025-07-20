@csrf

<div class="mb-3">
    <label>Partida</label>
    <select name="partida_id" class="form-control">
        @foreach($partidas as $partida)
            <option value="{{ $partida->id }}" {{ old('partida_id', $evento->partida_id ?? '') == $partida->id ? 'selected' : '' }}>
                Partida #{{ $partida->id }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Equipe</label>
    <select name="equipe_id" class="form-control">
        @foreach($equipes as $equipe)
            <option value="{{ $equipe->id }}" {{ old('equipe_id', $evento->equipe_id ?? '') == $equipe->id ? 'selected' : '' }}>
                {{ $equipe->nome }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Jogador (opcional)</label>
    <select name="jogador_id" class="form-control">
        <option value="">-- Nenhum --</option>
        @foreach($jogadores as $jogador)
            <option value="{{ $jogador->id }}" {{ old('jogador_id', $evento->jogador_id ?? '') == $jogador->id ? 'selected' : '' }}>
                {{ $jogador->nome }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Tipo</label>
    <select name="tipo" class="form-control">
        @foreach(['ponto', 'falta', 'cartao_amarelo', 'cartao_vermelho', 'tempo_tecnico', 'substituicao'] as $tipo)
            <option value="{{ $tipo }}" {{ old('tipo', $evento->tipo ?? '') == $tipo ? 'selected' : '' }}>
                {{ ucfirst(str_replace('_', ' ', $tipo)) }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Descrição</label>
    <textarea name="descricao" class="form-control">{{ old('descricao', $evento->descricao ?? '') }}</textarea>
</div>

<button class="btn btn-success">Salvar</button>
