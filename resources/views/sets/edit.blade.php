@extends('layouts.app')

@section('content')
    <h1>Editar Set</h1>
    <form action="{{ route('sets.update', $set) }}" method="POST">
        @csrf
        @method('PUT')
        @include('sets._form')
        <button type="submit" class="btn btn-success">Atualizar</button>
    </form>
@endsection
