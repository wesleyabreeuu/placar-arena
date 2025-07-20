<div>
    <label>Nome:</label>
    <input type="text" name="nome" value="{{ old('nome', $quadra->nome ?? '') }}" required>
</div>
<div>
    <label>Localização:</label>
    <input type="text" name="localizacao" value="{{ old('localizacao', $quadra->localizacao ?? '') }}">
</div>
