@extends('layouts.app')

@section('content')
    <h1>Adicionar Participante</h1>
    <form action="{{ route('participantes.store') }}" method="POST">
        @csrf
        @include('participantes._form')
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
@endsection
