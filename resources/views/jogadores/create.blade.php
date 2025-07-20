@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Novo Jogador</h1>
    <form action="{{ route('jogadores.store') }}" method="POST">
        @include('jogadores._form')
    </form>
</div>
@endsection
