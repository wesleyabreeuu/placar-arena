@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Partidas</h1>
    <a href="{{ route('partidas.create') }}" class="btn btn-success mb-3">Nova Partida</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Competição</th>
                <th>Modalidade</th>
                <th>Data/Hora</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($partidas as $partida)
                <tr>
                    <td>{{ $partida->id }}</td>
                    <td>{{ $partida->competicao->nome ?? '-' }}</td>
                    <td>{{ $partida->modalidade->nome ?? '-' }}</td>
                    <td>{{ $partida->data_hora }}</td>
                    <td>{{ ucfirst($partida->status) }}</td>
                    <td>
                        <a href="{{ route('partidas.edit', $partida->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('partidas.destroy', $partida->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
