@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Chave</h1>
    <form action="{{ route('chaves.update', $chave) }}" method="POST">
        @csrf
        @method('PUT')
        @include('chaves._form')
        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('chaves.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
