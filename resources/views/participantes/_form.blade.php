<div class="mb-3">
    <label for="partida_id" class="form-label">Partida</label>
    <select name="partida_id" class="form-select" required>
        <option value="">Selecione</option>
        @foreach($partidas as $partida)
            <option value="{{ $partida->id }}" @selected(old('partida_id', $participante->partida_id ?? '') == $partida->id)>
                Partida #{{ $partida->id }} - {{ $partida->status }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="equipe_id" class="form-label">Equipe</label>
    <select name="equipe_id" class="form-select" required>
        <option value="">Selecione</option>
        @foreach($equipes as $equipe)
            <option value="{{ $equipe->id }}" @selected(old('equipe_id', $participante->equipe_id ?? '') == $equipe->id)>
                {{ $equipe->nome }}
            </option>
        @endforeach
    </select>
</div>
