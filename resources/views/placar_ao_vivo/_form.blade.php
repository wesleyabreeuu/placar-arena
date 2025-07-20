<div class="mb-3">
    <label for="partida_id" class="form-label">Partida</label>
    <select name="partida_id" id="partida_id" class="form-select">
        @foreach($partidas as $partida)
        <option value="{{ $partida->id }}" {{ isset($placar) && $placar->partida_id == $partida->id ? 'selected' : '' }}>
            Partida {{ $partida->id }}
        </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="set_id" class="form-label">Set</label>
    <select name="set_id" id="set_id" class="form-select">
        @foreach($sets as $set)
        <option value="{{ $set->id }}" {{ isset($placar) && $placar->set_id == $set->id ? 'selected' : '' }}>
            Set {{ $set->numero }} da Partida {{ $set->partida_id }}
        </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="pontos_equipe_a" class="form-label">Pontos Equipe A</label>
    <input type="number" name="pontos_equipe_a" id="pontos_equipe_a" class="form-control"
        value="{{ old('pontos_equipe_a', $placar->pontos_equipe_a ?? 0) }}">
</div>

<div class="mb-3">
    <label for="pontos_equipe_b" class="form-label">Pontos Equipe B</label>
    <input type="number" name="pontos_equipe_b" id="pontos_equipe_b" class="form-control"
        value="{{ old('pontos_equipe_b', $placar->pontos_equipe_b ?? 0) }}">
</div>
