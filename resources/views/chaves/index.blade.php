@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chaves</h1>
    <a href="{{ route('chaves.create') }}" class="btn btn-primary mb-3">Nova Chave</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Partida</th>
                <th>Ordem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chaves as $chave)
                <tr>
                    <td>{{ $chave->partida_id }}</td>
                    <td>{{ $chave->ordem }}</td>
                    <td>
                        <a href="{{ route('chaves.edit', $chave) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('chaves.destroy', $chave) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
