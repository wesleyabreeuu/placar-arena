<?php

namespace App\Http\Controllers;

use App\Models\Set;
use App\Models\Partida;
use Illuminate\Http\Request;

class SetController extends Controller
{
    public function index()
    {
        $sets = Set::with('partida')->get();
        return view('sets.index', compact('sets'));
    }

    public function create()
    {
        $partidas = Partida::all();
        return view('sets.create', compact('partidas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'partida_id' => 'required|exists:partidas,id',
            'numero_set' => 'required|integer',
            'pontos_equipe_a' => 'required|integer',
            'pontos_equipe_b' => 'required|integer',
        ]);

        Set::create($request->all());
        return redirect()->route('sets.index')->with('success', 'Set adicionado.');
    }

    public function edit(Set $set)
    {
        $partidas = Partida::all();
        return view('sets.edit', compact('set', 'partidas'));
    }

    public function update(Request $request, Set $set)
    {
        $request->validate([
            'partida_id' => 'required|exists:partidas,id',
            'numero_set' => 'required|integer',
            'pontos_equipe_a' => 'required|integer',
            'pontos_equipe_b' => 'required|integer',
        ]);

        $set->update($request->all());
        return redirect()->route('sets.index')->with('success', 'Set atualizado.');
    }

    public function destroy(Set $set)
    {
        $set->delete();
        return redirect()->route('sets.index')->with('success', 'Set excluído.');
    }
}
