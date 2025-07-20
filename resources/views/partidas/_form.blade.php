<div class="mb-3">
    <label for="competicao_id" class="form-label">Competição</label>
    <select name="competicao_id" id="competicao_id" class="form-control" required>
        <option value="">Selecione</option>
        @foreach ($competicoes as $competicao)
            <option value="{{ $competicao->id }}" {{ (old('competicao_id', $partida->competicao_id ?? '') == $competicao->id) ? 'selected' : '' }}>
                {{ $competicao->nome }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="modalidade_id" class="form-label">Modalidade</label>
    <select name="modalidade_id" id="modalidade_id" class="form-control" required>
        <option value="">Selecione</option>
        @foreach ($modalidades as $modalidade)
            <option value="{{ $modalidade->id }}" {{ (old('modalidade_id', $partida->modalidade_id ?? '') == $modalidade->id) ? 'selected' : '' }}>
                {{ $modalidade->nome }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="data_hora" class="form-label">Data e Hora</label>
    <input type="datetime-local" name="data_hora" id="data_hora" class="form-control"
        value="{{ old('data_hora', isset($partida->data_hora) ? date('Y-m-d\TH:i', strtotime($partida->data_hora)) : '') }}">
</div>

<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" id="status" class="form-control" required>
        <option value="agendada" {{ old('status', $partida->status ?? '') == 'agendada' ? 'selected' : '' }}>Agendada</option>
        <option value="em_andamento" {{ old('status', $partida->status ?? '') == 'em_andamento' ? 'selected' : '' }}>Em andamento</option>
        <option value="finalizada" {{ old('status', $partida->status ?? '') == 'finalizada' ? 'selected' : '' }}>Finalizada</option>
    </select>
</div>
