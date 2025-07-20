@extends('layouts.app')

@section('content')
    <h1>Sets</h1>
    <a href="{{ route('sets.create') }}" class="btn btn-primary mb-3">Novo Set</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Partida</th>
                <th>Número do Set</th>
                <th>Pontos Equipe A</th>
                <th>Pontos Equipe B</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sets as $set)
                <tr>
                    <td>#{{ $set->partida->id }}</td>
                    <td>{{ $set->numero_set }}</td>
                    <td>{{ $set->pontos_equipe_a }}</td>
                    <td>{{ $set->pontos_equipe_b }}</td>
                    <td>
                        <a href="{{ route('sets.edit', $set) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('sets.destroy', $set) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
