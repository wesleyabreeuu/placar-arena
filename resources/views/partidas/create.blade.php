@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nova Partida</h1>
    <form action="{{ route('partidas.store') }}" method="POST">
        @csrf
        @include('partidas._form')
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('partidas.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
