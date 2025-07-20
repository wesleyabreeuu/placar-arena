@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modalidades</h1>
    <a href="{{ route('modalidades.create') }}" class="btn btn-primary mb-3">Nova Modalidade</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Sets por Partida</th>
                <th>Pontos por Set</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($modalidades as $modalidade)
                <tr>
                    <td>{{ $modalidade->nome }}</td>
                    <td>{{ $modalidade->sets_por_partida }}</td>
                    <td>{{ $modalidade->pontos_por_set }}</td>
                    <td>
                        <a href="{{ route('modalidades.edit', $modalidade) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('modalidades.destroy', $modalidade) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja remover?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
