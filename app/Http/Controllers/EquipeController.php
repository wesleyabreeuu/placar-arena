<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    public function index()
    {
        $equipes = Equipe::all();
        return view('equipes.index', compact('equipes'));
    }

    public function create()
    {
        return view('equipes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
        ]);

        Equipe::create($request->all());

        return redirect()->route('equipes.index')->with('success', 'Equipe cadastrada com sucesso!');
    }

    public function edit(Equipe $equipe)
    {
        return view('equipes.edit', compact('equipe'));
    }

    public function update(Request $request, Equipe $equipe)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
        ]);

        $equipe->update($request->all());

        return redirect()->route('equipes.index')->with('success', 'Equipe atualizada com sucesso!');
    }

    public function destroy(Equipe $equipe)
    {
        $equipe->delete();
        return redirect()->route('equipes.index')->with('success', 'Equipe removida com sucesso!');
    }
}
