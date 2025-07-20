@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Competições</h1>
    <a href="{{ route('competicoes.create') }}" class="btn btn-primary mb-3">Nova Competição</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Modalidade</th>
                <th>Início</th>
                <th>Fim</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($competicoes as $competicao)
                <tr>
                    <td>{{ $competicao->nome }}</td>
                    <td>{{ ucfirst($competicao->tipo) }}</td>
                    <td>{{ $competicao->modalidade->nome ?? '-' }}</td>
                    <td>{{ $competicao->data_inicio }}</td>
                    <td>{{ $competicao->data_fim }}</td>
                    <td>
                        <a href="{{ route('competicoes.edit', $competicao) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('competicoes.destroy', $competicao) }}" method="POST" style="display:inline;">
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
