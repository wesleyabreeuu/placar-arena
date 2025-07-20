@extends('layouts.app')

@section('content')
    <h1>Quadras</h1>
    <a href="{{ route('quadras.create') }}">Nova Quadra</a>
    <ul>
        @foreach ($quadras as $quadra)
            <li>
                {{ $quadra->nome }} - {{ $quadra->localizacao }}
                <a href="{{ route('quadras.edit', $quadra->id) }}">Editar</a>
            </li>
        @endforeach
    </ul>
@endsection
