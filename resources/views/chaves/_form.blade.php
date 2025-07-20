<div class="mb-3">
    <label for="partida_id" class="form-label">Partida</label>
    <select name="partida_id" id="partida_id" class="form-control" required>
        <option value="">Selecione</option>
        @foreach($partidas as $partida)
            <option value="{{ $partida->id }}" {{ old('partida_id', $chave->partida_id ?? '') == $partida->id ? 'selected' : '' }}>
                {{ $partida->id }} - {{ $partida->status }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="ordem" class="form-label">Ordem</label>
    <input type="number" name="ordem" id="ordem" class="form-control" value="{{ old('ordem', $chave->ordem ?? '') }}" required>
</div>
