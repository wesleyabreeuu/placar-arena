<?php

namespace App\Http\Controllers;

use App\Models\ParticipantePartida;
use App\Models\Partida;
use App\Models\Equipe;
use Illuminate\Http\Request;

class ParticipantePartidaController extends Controller
{
    public function index()
    {
        $participantes = ParticipantePartida::with(['partida', 'equipe'])->get();
        return view('participantes.index', compact('participantes'));
    }

    public function create()
    {
        $partidas = Partida::all();
        $equipes = Equipe::all();
        return view('participantes.create', compact('partidas', 'equipes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'partida_id' => 'required|exists:partidas,id',
            'equipe_id' => 'required|exists:equipes,id',
        ]);

        ParticipantePartida::create($request->all());

        return redirect()->route('participantes.index')->with('success', 'Participante adicionado.');
    }

    public function edit(ParticipantePartida $participante)
    {
        $partidas = Partida::all();
        $equipes = Equipe::all();
        return view('participantes.edit', compact('participante', 'partidas', 'equipes'));
    }

    public function update(Request $request, ParticipantePartida $participante)
    {
        $request->validate([
            'partida_id' => 'required|exists:partidas,id',
            'equipe_id' => 'required|exists:equipes,id',
        ]);

        $participante->update($request->all());

        return redirect()->route('participantes.index')->with('success', 'Participante atualizado.');
    }

    public function destroy(ParticipantePartida $participante)
    {
        $participante->delete();
        return redirect()->route('participantes.index')->with('success', 'Participante excluído.');
    }
}
