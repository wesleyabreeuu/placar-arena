@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center">🏟️ Painel Administrativo - Placar Arena</h2>

    {{-- KPIs de resumo --}}
    <div class="row mb-4 text-center">
        <div class="col-md-3 mb-3">
            <div class="card shadow border-primary">
                <div class="card-body">
                    <i class="bi bi-trophy-fill display-6 text-primary"></i>
                    <h5 class="card-title mt-2">Competições</h5>
                    <h3 class="fw-bold">{{ $totalCompeticoes ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card shadow border-success">
                <div class="card-body">
                    <i class="bi bi-people-fill display-6 text-success"></i>
                    <h5 class="card-title mt-2">Equipes</h5>
                    <h3 class="fw-bold">{{ $totalEquipes ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card shadow border-info">
                <div class="card-body">
                    <i class="bi bi-person-fill display-6 text-info"></i>
                    <h5 class="card-title mt-2">Jogadores</h5>
                    <h3 class="fw-bold">{{ $totalJogadores ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card shadow border-danger">
                <div class="card-body">
                    <i class="bi bi-play-circle-fill display-6 text-danger"></i>
                    <h5 class="card-title mt-2">Partidas</h5>
                    <h3 class="fw-bold">{{ $totalPartidas ?? 0 }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Gráfico --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-white">
            <strong>Distribuição de Partidas por Modalidade</strong>
        </div>
            <div class="card-body" style="height: 300px;">
                <canvas id="graficoModalidades"></canvas>
            </div>

    </div>

    {{-- Navegação rápida --}}
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
        @php
            $cards = [
                ['title' => 'Modalidades', 'icon' => 'flag-fill', 'route' => 'modalidades.index', 'color' => 'primary'],
                ['title' => 'Competições', 'icon' => 'trophy-fill', 'route' => 'competicoes.index', 'color' => 'success'],
                ['title' => 'Equipes', 'icon' => 'people-fill', 'route' => 'equipes.index', 'color' => 'warning'],
                ['title' => 'Jogadores', 'icon' => 'person-fill', 'route' => 'jogadores.index', 'color' => 'info'],
                ['title' => 'Partidas', 'icon' => 'play-circle-fill', 'route' => 'partidas.index', 'color' => 'danger'],
                ['title' => 'Placar Ao Vivo', 'icon' => 'tv-fill', 'route' => 'placar-ao-vivo.index', 'color' => 'dark'],
            ];
        @endphp

        @foreach ($cards as $card)
        <div class="col">
            <div class="card h-100 border-{{ $card['color'] }} shadow">
                <div class="card-body text-center">
                    <i class="bi bi-{{ $card['icon'] }} display-4 text-{{ $card['color'] }}"></i>
                    <h5 class="card-title mt-3">{{ $card['title'] }}</h5>
                    <a href="{{ route($card['route']) }}" class="btn btn-outline-{{ $card['color'] }} w-100">Acessar</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Tabela de partidas recentes --}}
    <div class="card shadow-sm mb-5">
        <div class="card-header bg-white">
            <strong>Últimas Partidas</strong>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Data</th>
                            <th>Competição</th>
                            <th>Equipes</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ultimasPartidas ?? [] as $partida)
                        <tr>
                            <td>{{ optional(\Carbon\Carbon::parse($partida->data_hora))->format('d/m/Y H:i') }}</td>
                            <td>{{ $partida->competicao->nome ?? '-' }}</td>
                            <td>
                                {{ optional($partida->equipes->get(0))->nome ?? 'Equipe A' }}
                                x
                                {{ optional($partida->equipes->get(1))->nome ?? 'Equipe B' }}
                            </td>
                            <td><span class="badge bg-secondary">{{ ucfirst($partida->status) }}</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Nenhuma partida recente.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Rodapé --}}
    <div class="text-center text-muted small">
        <hr>
        Sistema Placar Arena © {{ date('Y') }} — v1.0.0
    </div>
</div>
@endsection

@section('scripts')
<script>
    const ctx = document.getElementById('graficoModalidades');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($graficoLabels ?? []) !!},
            datasets: [{
                label: 'Partidas',
                data: {!! json_encode($graficoData ?? []) !!},
                backgroundColor: ['#0d6efd', '#198754', '#ffc107', '#dc3545', '#20c997', '#6c757d']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,  // Adicione isso!
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });
</script>
@endsection
