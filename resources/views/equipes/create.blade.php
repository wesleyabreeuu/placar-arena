@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nova Equipe</h1>
    <form action="{{ route('equipes.store') }}" method="POST">
        @include('equipes._form')
    </form>
</div>
@endsection
