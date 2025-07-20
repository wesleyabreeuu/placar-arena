@extends('layouts.app')

@section('content')
    <h1>Adicionar Set</h1>
    <form action="{{ route('sets.store') }}" method="POST">
        @csrf
        @include('sets._form')
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
@endsection
