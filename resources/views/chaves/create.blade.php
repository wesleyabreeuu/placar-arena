@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nova Chave</h1>
    <form action="{{ route('chaves.store') }}" method="POST">
        @csrf
        @include('chaves._form')
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('chaves.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
