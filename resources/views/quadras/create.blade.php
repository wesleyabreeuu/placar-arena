@extends('layouts.app')

@section('content')
    <h1>Nova Quadra</h1>
    <form action="{{ route('quadras.store') }}" method="POST">
        @csrf
        @include('quadras._form')
        <button type="submit">Salvar</button>
    </form>
@endsection
