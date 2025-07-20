@extends('layouts.app')

@section('content')
    <h1>Editar Quadra</h1>
    <form action="{{ route('quadras.update', $quadra->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('quadras._form')
        <button type="submit">Atualizar</button>
    </form>
@endsection
