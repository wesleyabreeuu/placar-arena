<?php

namespace App\Http\Controllers;

use App\Models\Partida;
use App\Models\PlacarAoVivo;
use Illuminate\Http\Request;

class PlacarPublicoController extends Controller
{
    /**
     * Exibe o placar público da partida.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function exibir($id)
    {
        $partida = Partida::with(['competicao', 'modalidade', 'equipes'])->findOrFail($id);
        $placar = PlacarAoVivo::where('partida_id', $id)->latest('set_numero')->first();

        return view('placar_publico.show', compact('partida', 'placar'));
    }

    /**
     * Retorna os dados atualizados da partida para atualização dinâmica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function dados($id)
    {
        $placar = PlacarAoVivo::where('partida_id', $id)->latest('set_numero')->first();

        return response()->json([
            'pontosEquipeA' => $placar->pontos_equipe_a ?? 0,
            'pontosEquipeB' => $placar->pontos_equipe_b ?? 0,
            'setAtual' => $placar->set_numero ?? '-',
            'updated_at' => now()->format('H:i:s'),
        ]);
    }
}
