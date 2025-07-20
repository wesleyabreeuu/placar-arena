@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Jogador</h1>
    <form action="{{ route('jogadores.update', $jogador) }}" method="POST">
        @method('PUT')
        @include('jogadores._form')
    </form>
</div>
@endsection
