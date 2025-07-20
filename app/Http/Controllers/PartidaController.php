<?php

namespace App\Http\Controllers;

use App\Models\Partida;
use App\Models\Competicao;
use App\Models\Modalidade;
use Illuminate\Http\Request;

class PartidaController extends Controller
{
    public function index()
    {
        $partidas = Partida::with(['competicao', 'modalidade'])->orderByDesc('data_hora')->get();
        return view('partidas.index', compact('partidas'));
    }

    public function create()
    {
        $competicoes = Competicao::all();
        $modalidades = Modalidade::all();
        return view('partidas.create', compact('competicoes', 'modalidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'competicao_id' => 'required|exists:competicoes,id',
            'modalidade_id' => 'required|exists:modalidades,id',
            'data_hora' => 'nullable|date',
            'status' => 'required|in:agendada,em_andamento,finalizada',
        ]);

        Partida::create($request->all());

        return redirect()->route('partidas.index')->with('success', 'Partida criada com sucesso!');
    }

    public function edit(Partida $partida)
    {
        $competicoes = Competicao::all();
        $modalidades = Modalidade::all();
        return view('partidas.edit', compact('partida', 'competicoes', 'modalidades'));
    }

    public function update(Request $request, Partida $partida)
    {
        $request->validate([
            'competicao_id' => 'required|exists:competicoes,id',
            'modalidade_id' => 'required|exists:modalidades,id',
            'data_hora' => 'nullable|date',
            'status' => 'required|in:agendada,em_andamento,finalizada',
        ]);

        $partida->update($request->all());

        return redirect()->route('partidas.index')->with('success', 'Partida atualizada com sucesso!');
    }

    public function destroy(Partida $partida)
    {
        $partida->delete();
        return redirect()->route('partidas.index')->with('success', 'Partida excluída com sucesso!');
    }
}
