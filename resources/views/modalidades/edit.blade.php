@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Modalidade</h1>
    <form action="{{ route('modalidades.update', $modalidade) }}" method="POST">
        @method('PUT')
        @include('modalidades._form')
    </form>
</div>
@endsection
