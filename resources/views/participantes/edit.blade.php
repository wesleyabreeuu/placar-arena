@extends('layouts.app')

@section('content')
    <h1>Editar Participante</h1>
    <form action="{{ route('participantes.update', $participante) }}" method="POST">
        @csrf
        @method('PUT')
        @include('participantes._form')
        <button type="submit" class="btn btn-success">Atualizar</button>
    </form>
@endsection
