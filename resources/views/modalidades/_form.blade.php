@csrf
<div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" name="nome" class="form-control" value="{{ old('nome', $modalidade->nome ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="sets_por_partida" class="form-label">Sets por Partida</label>
    <input type="number" name="sets_por_partida" class="form-control" value="{{ old('sets_por_partida', $modalidade->sets_por_partida ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="pontos_por_set" class="form-label">Pontos por Set</label>
    <input type="number" name="pontos_por_set" class="form-control" value="{{ old('pontos_por_set', $modalidade->pontos_por_set ?? '') }}" required>
</div>
<button type="submit" class="btn btn-success">Salvar</button>
