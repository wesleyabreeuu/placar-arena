@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Novo Evento</h1>
        <form action="{{ route('eventos.store') }}" method="POST">
            @include('eventos._form')
        </form>
    </div>
@endsection
