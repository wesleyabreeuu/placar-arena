@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Partida</h1>
    <form action="{{ route('partidas.update', $partida->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('partidas._form')
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('partidas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
