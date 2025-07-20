<?php

namespace App\Http\Controllers;

use App\Models\PlacarAoVivo;
use App\Models\Partida;
use Illuminate\Http\Request;

class PlacarAoVivoController extends Controller
{
    public function index()
    {
        $placares = PlacarAoVivo::with('partida')->get();
        return view('placar_ao_vivo.index', compact('placares'));
    }

    public function create()
    {
        $partidas = Partida::all();
        return view('placar_ao_vivo.create', compact('partidas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'partida_id' => 'required',
            'set_numero' => 'required|integer|min:1',
            'pontos_equipe_a' => 'nullable|integer|min:0',
            'pontos_equipe_b' => 'nullable|integer|min:0',
        ]);

        PlacarAoVivo::create($request->all());

        return redirect()->route('placar-ao-vivo.index');
    }

    // Corrigido para usar o mesmo nome de parâmetro da rota: placar_ao_vivo
    public function edit(PlacarAoVivo $placar_ao_vivo)
    {
        $partidas = Partida::with('equipes')->get();
        return view('placar_ao_vivo.edit', [
            'placar' => $placar_ao_vivo,
            'partidas' => $partidas
        ]);
    }

    public function update(Request $request, PlacarAoVivo $placar_ao_vivo)
    {
        $placar_ao_vivo->update($request->all());
        return redirect()->route('placar-ao-vivo.index');
    }

    public function destroy(PlacarAoVivo $placar_ao_vivo)
    {
        $placar_ao_vivo->delete();
        return redirect()->route('placar-ao-vivo.index');
    }

    // Método extra usado para atualizar a tabela de forma dinâmica
    public function atualizar()
    {
        $placares = PlacarAoVivo::with('partida')->get();
        return view('placar_ao_vivo.partials.tabela', compact('placares'));
    }
}
