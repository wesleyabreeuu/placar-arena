@csrf
<div class="mb-3">
    <label for="nome" class="form-label">Nome da Competição</label>
    <input type="text" name="nome" class="form-control" value="{{ old('nome', $competicao->nome ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="tipo" class="form-label">Tipo</label>
    <select name="tipo" class="form-control" required>
        <option value="">Selecione...</option>
        <option value="amistoso" {{ (old('tipo', $competicao->tipo ?? '') == 'amistoso') ? 'selected' : '' }}>Amistoso</option>
        <option value="mata-mata" {{ (old('tipo', $competicao->tipo ?? '') == 'mata-mata') ? 'selected' : '' }}>Mata-mata</option>
        <option value="grupo" {{ (old('tipo', $competicao->tipo ?? '') == 'grupo') ? 'selected' : '' }}>Fase de Grupos</option>
    </select>
</div>

<div class="mb-3">
    <label for="modalidade_id" class="form-label">Modalidade</label>
    <select name="modalidade_id" class="form-control" required>
        <option value="">Selecione...</option>
        @foreach($modalidades as $modalidade)
            <option value="{{ $modalidade->id }}"
                {{ (old('modalidade_id', $competicao->modalidade_id ?? '') == $modalidade->id) ? 'selected' : '' }}>
                {{ $modalidade->nome }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="data_inicio" class="form-label">Data de Início</label>
    <input type="date" name="data_inicio" class="form-control" value="{{ old('data_inicio', $competicao->data_inicio ?? '') }}">
</div>

<div class="mb-3">
    <label for="data_fim" class="form-label">Data de Término</label>
    <input type="date" name="data_fim" class="form-control" value="{{ old('data_fim', $competicao->data_fim ?? '') }}">
</div>

<button type="submit" class="btn btn-success">Salvar</button>
