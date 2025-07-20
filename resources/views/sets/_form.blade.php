<div class="mb-3">
    <label for="partida_id" class="form-label">Partida</label>
    <select name="partida_id" class="form-select" required>
        <option value="">Selecione</option>
        @foreach($partidas as $partida)
            <option value="{{ $partida->id }}" @selected(old('partida_id', $set->partida_id ?? '') == $partida->id)>
                Partida #{{ $partida->id }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="numero_set" class="form-label">Número do Set</label>
    <input type="number" name="numero_set" class="form-control" value="{{ old('numero_set', $set->numero_set ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="pontos_equipe_a" class="form-label">Pontos Equipe A</label>
    <input type="number" name="pontos_equipe_a" class="form-control" value="{{ old('pontos_equipe_a', $set->pontos_equipe_a ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="pontos_equipe_b" class="form-label">Pontos Equipe B</label>
    <input type="number" name="pontos_equipe_b" class="form-control" value="{{ old('pontos_equipe_b', $set->pontos_equipe_b ?? '') }}" required>
</div>
