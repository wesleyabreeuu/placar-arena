<?php

namespace App\Http\Controllers;

use App\Models\Modalidade;
use Illuminate\Http\Request;

class ModalidadeController extends Controller
{
    public function index()
    {
        $modalidades = Modalidade::all();
        return view('modalidades.index', compact('modalidades'));
    }

    public function create()
    {
        return view('modalidades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'sets_por_partida' => 'required|integer|min:1',
            'pontos_por_set' => 'required|integer|min:1',
        ]);

        Modalidade::create($request->all());

        return redirect()->route('modalidades.index')->with('success', 'Modalidade cadastrada com sucesso!');
    }

    public function edit(Modalidade $modalidade)
    {
        return view('modalidades.edit', compact('modalidade'));
    }

    public function update(Request $request, Modalidade $modalidade)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'sets_por_partida' => 'required|integer|min:1',
            'pontos_por_set' => 'required|integer|min:1',
        ]);

        $modalidade->update($request->all());

        return redirect()->route('modalidades.index')->with('success', 'Modalidade atualizada com sucesso!');
    }

    public function destroy(Modalidade $modalidade)
    {
        $modalidade->delete();
        return redirect()->route('modalidades.index')->with('success', 'Modalidade removida com sucesso!');
    }
} 
