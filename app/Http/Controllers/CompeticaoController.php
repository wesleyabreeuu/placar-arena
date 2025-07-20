<?php

namespace App\Http\Controllers;

use App\Models\Competicao;
use App\Models\Modalidade;
use Illuminate\Http\Request;

class CompeticaoController extends Controller
{
    public function index()
    {
        $competicoes = Competicao::with('modalidade')->get();
        return view('competicoes.index', compact('competicoes'));
    }

    public function create()
    {
        $modalidades = Modalidade::all();
        return view('competicoes.create', compact('modalidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'tipo' => 'required|in:amistoso,mata-mata,grupo',
            'data_inicio' => 'nullable|date',
            'data_fim' => 'nullable|date|after_or_equal:data_inicio',
            'modalidade_id' => 'required|exists:modalidades,id',
        ]);

        Competicao::create($request->all());

        return redirect()->route('competicoes.index')->with('success', 'Competição cadastrada com sucesso!');
    }

    public function edit(Competicao $competicao)
    {
        $modalidades = Modalidade::all();
        return view('competicoes.edit', compact('competicao', 'modalidades'));
    }

    public function update(Request $request, Competicao $competicao)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'tipo' => 'required|in:amistoso,mata-mata,grupo',
            'data_inicio' => 'nullable|date',
            'data_fim' => 'nullable|date|after_or_equal:data_inicio',
            'modalidade_id' => 'required|exists:modalidades,id',
        ]);

        $competicao->update($request->all());

        return redirect()->route('competicoes.index')->with('success', 'Competição atualizada com sucesso!');
    }

    public function destroy(Competicao $competicao)
    {
        $competicao->delete();
        return redirect()->route('competicoes.index')->with('success', 'Competição removida com sucesso!');
    }
}
