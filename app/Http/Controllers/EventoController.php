<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Partida;
use App\Models\Equipe;
use App\Models\Jogador;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::with(['partida', 'equipe', 'jogador'])->get();
        return view('eventos.index', compact('eventos'));
    }

    public function create()
    {
        $partidas = Partida::all();
        $equipes = Equipe::all();
        $jogadores = Jogador::all();
        return view('eventos.create', compact('partidas', 'equipes', 'jogadores'));
    }

    public function store(Request $request)
    {
        Evento::create($request->all());
        return redirect()->route('eventos.index')->with('success', 'Evento criado com sucesso.');
    }

    public function edit(Evento $evento)
    {
        $partidas = Partida::all();
        $equipes = Equipe::all();
        $jogadores = Jogador::all();
        return view('eventos.edit', compact('evento', 'partidas', 'equipes', 'jogadores'));
    }

    public function update(Request $request, Evento $evento)
    {
        $evento->update($request->all());
        return redirect()->route('eventos.index')->with('success', 'Evento atualizado com sucesso.');
    }

    public function destroy(Evento $evento)
    {
        $evento->delete();
        return redirect()->route('eventos.index')->with('success', 'Evento excluído com sucesso.');
    }
}
