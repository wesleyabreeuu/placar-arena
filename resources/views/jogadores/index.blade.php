@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Jogadores</h1>
    <a href="{{ route('jogadores.create') }}" class="btn btn-primary mb-3">Novo Jogador</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Equipe</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jogadores as $jogador)
                <tr>
                    <td>{{ $jogador->nome }}</td>
                    <td>{{ $jogador->equipe->nome ?? '-' }}</td>
                    <td>
                        <a href="{{ route('jogadores.edit', $jogador) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('jogadores.destroy', $jogador) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Deseja remover?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
