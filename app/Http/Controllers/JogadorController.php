<?php

namespace App\Http\Controllers;

use App\Models\Jogador;
use App\Models\Equipe;
use Illuminate\Http\Request;

class JogadorController extends Controller
{
    public function index()
    {
        $jogadores = Jogador::with('equipe')->get();
        return view('jogadores.index', compact('jogadores'));
    }

    public function create()
    {
        $equipes = Equipe::all();
        return view('jogadores.create', compact('equipes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'equipe_id' => 'required|exists:equipes,id',
        ]);

        Jogador::create($request->all());

        return redirect()->route('jogadores.index')->with('success', 'Jogador cadastrado com sucesso!');
    }

    public function edit(Jogador $jogador)
    {
        $equipes = Equipe::all();
        return view('jogadores.edit', compact('jogador', 'equipes'));
    }

    public function update(Request $request, Jogador $jogador)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'equipe_id' => 'required|exists:equipes,id',
        ]);

        $jogador->update($request->all());

        return redirect()->route('jogadores.index')->with('success', 'Jogador atualizado com sucesso!');
    }

    public function destroy(Jogador $jogador)
    {
        $jogador->delete();
        return redirect()->route('jogadores.index')->with('success', 'Jogador removido com sucesso!');
    }
}
