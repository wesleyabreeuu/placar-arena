@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Placar ao Vivo</h1>

    <a href="{{ route('placar-ao-vivo.create') }}" class="btn btn-primary mb-3">➕ Novo Placar</a>

    <!-- Tabela será carregada aqui -->
    <div id="tabela-placar">
        @include('placar_ao_vivo.partials.tabela', ['placares' => $placares])
    </div>

    <div class="text-center mt-3">
        <button class="btn btn-outline-secondary" id="btn-atualizar">🔄 Atualizar Placar</button>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('btn-atualizar').addEventListener('click', function () {
        fetch('{{ route('placar-ao-vivo.atualizar') }}')
            .then(response => {
                if (!response.ok) {
                    throw new Error("Erro ao buscar os dados.");
                }
                return response.text();
            })
            .then(html => {
                document.getElementById('tabela-placar').innerHTML = html;
            })
            .catch(error => {
                alert("Erro ao atualizar o placar.");
                console.error(error);
            });
    });
</script>
@endsection
