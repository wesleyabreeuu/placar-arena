@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Evento</h1>
        <form action="{{ route('eventos.update', $evento) }}" method="POST">
            @method('PUT')
            @include('eventos._form')
        </form>
    </div>
@endsection
