@csrf
<div class="mb-3">
    <label for="nome" class="form-label">Nome do Jogador</label>
    <input type="text" name="nome" class="form-control" value="{{ old('nome', $jogador->nome ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="equipe_id" class="form-label">Equipe</label>
    <select name="equipe_id" class="form-control" required>
        <option value="">Selecione a equipe</option>
        @foreach($equipes as $equipe)
            <option value="{{ $equipe->id }}"
                {{ (old('equipe_id', $jogador->equipe_id ?? '') == $equipe->id) ? 'selected' : '' }}>
                {{ $equipe->nome }}
            </option>
        @endforeach
    </select>
</div>

<button type="submit" class="btn btn-success">Salvar</button>
