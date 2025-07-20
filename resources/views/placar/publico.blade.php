<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Placar ao Vivo - {{ $partida->competicao->nome }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #111;
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        .placar-container {
            max-width: 800px;
            margin: auto;
            background-color: #222;
            padding: 30px;
            border-radius: 10px;
        }
        .equipes {
            display: flex;
            justify-content: space-around;
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .sets {
            font-size: 24px;
            margin-top: 20px;
        }
        .refresh {
            margin-top: 30px;
            color: #aaa;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="placar-container">
        <h1>{{ $partida->competicao->nome }}</h1>
        <h3>{{ $partida->modalidade->nome }}</h3>

        <div class="equipes" id="equipes">
            <div id="equipeA">Equipe A</div>
            <div>X</div>
            <div id="equipeB">Equipe B</div>
        </div>

        <div class="sets" id="sets">
            <!-- Dados dos sets serão carregados via AJAX -->
            Carregando sets...
        </div>

        <div class="refresh">
            Atualizando a cada 5 segundos...
        </div>
    </div>

    <script>
        const partidaId = {{ $partida->id }};

        async function carregarPlacar() {
            const response = await fetch(`/placar-publico/dados/${partidaId}`);
            const data = await response.json();

            const equipes = data.partida.equipes;
            const sets = data.partida.sets;

            document.getElementById('equipeA').innerText = equipes[0] ?? 'Equipe A';
            document.getElementById('equipeB').innerText = equipes[1] ?? 'Equipe B';

            let setsHtml = '';
            sets.forEach((set, index) => {
                setsHtml += `<p>Set ${index + 1}: ${set.pontos_equipe_a} x ${set.pontos_equipe_b}</p>`;
            });

            document.getElementById('sets').innerHTML = setsHtml;
        }

        // Carrega inicialmente
        carregarPlacar();

        // Atualiza a cada 5 segundos
        setInterval(carregarPlacar, 5000);
    </script>
</body>
</html>

