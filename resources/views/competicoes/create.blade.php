@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nova Competição</h1>
    <form action="{{ route('competicoes.store') }}" method="POST">
        @include('competicoes._form')
    </form>
</div>
@endsection
