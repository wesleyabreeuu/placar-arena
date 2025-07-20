@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Equipe</h1>
    <form action="{{ route('equipes.update', $equipe) }}" method="POST">
        @method('PUT')
        @include('equipes._form')
    </form>
</div>
@endsection
