@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Equipes</h1>
    <a href="{{ route('equipes.create') }}" class="btn btn-primary mb-3">Nova Equipe</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipes as $equipe)
                <tr>
                    <td>{{ $equipe->nome }}</td>
                    <td>
                        <a href="{{ route('equipes.edit', $equipe) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('equipes.destroy', $equipe) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
