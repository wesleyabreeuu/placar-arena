@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nova Modalidade</h1>
    <form action="{{ route('modalidades.store') }}" method="POST">
        @include('modalidades._form')
    </form>
</div>
@endsection
