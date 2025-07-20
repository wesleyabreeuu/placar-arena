@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Eventos</h1>
        <a href="{{ route('eventos.create') }}" class="btn btn-primary mb-3">Novo Evento</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Partida</th>
                    <th>Equipe</th>
                    <th>Jogador</th>
                    <th>Tipo</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventos as $evento)
                    <tr>
                        <td>{{ $evento->id }}</td>
                        <td>{{ $evento->partida->id }}</td>
                        <td>{{ $evento->equipe->nome }}</td>
                        <td>{{ $evento->jogador?->nome ?? '-' }}</td>
                        <td>{{ ucfirst($evento->tipo) }}</td>
                        <td>{{ $evento->descricao }}</td>
                        <td>
                            <a href="{{ route('eventos.edit', $evento) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('eventos.destroy', $evento) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
