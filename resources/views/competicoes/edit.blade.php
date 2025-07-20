@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Competição</h1>
    <form action="{{ route('competicoes.update', $competicao) }}" method="POST">
        @method('PUT')
        @include('competicoes._form')
    </form>
</div>
@endsection
