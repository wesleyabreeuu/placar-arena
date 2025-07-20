@extends('layouts.app')

@section('content')
    <h1>Participantes da Partida</h1>
    <a href="{{ route('participantes.create') }}" class="btn btn-primary mb-3">Novo Participante</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Partida</th>
                <th>Equipe</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($participantes as $participante)
                <tr>
                    <td>{{ $participante->partida->id }} - {{ $participante->partida->status }}</td>
                    <td>{{ $participante->equipe->nome }}</td>
                    <td>
                        <a href="{{ route('participantes.edit', $participante) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('participantes.destroy', $participante) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
