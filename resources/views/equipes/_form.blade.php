@csrf
<div class="mb-3">
    <label for="nome" class="form-label">Nome da Equipe</label>
    <input type="text" name="nome" class="form-control" value="{{ old('nome', $equipe->nome ?? '') }}" required>
</div>
<button type="submit" class="btn btn-success">Salvar</button>
