<table class="table table-bordered">
    <thead>
        <tr>
            <th>Partida</th>
            <th>Set</th>
            <th>Pontos Equipe A</th>
            <th>Pontos Equipe B</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($placares as $placar)
        <tr>
            <td>{{ $placar->partida->id ?? 'N/A' }}</td>
            <td>{{ $placar->set_numero ?? 'N/A' }}</td>
            <td>{{ $placar->pontos_equipe_a }}</td>
            <td>{{ $placar->pontos_equipe_b }}</td>
            <td>
                <a href="{{ route('placar-ao-vivo.edit', $placar->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('placar-ao-vivo.destroy', $placar->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

