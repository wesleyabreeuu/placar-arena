<?php

namespace App\Http\Controllers;

use App\Models\Chave;
use App\Models\Partida;
use Illuminate\Http\Request;

class ChaveController extends Controller
{
    public function index()
    {
        $chaves = Chave::all();
        return view('chaves.index', compact('chaves'));
    }

    public function create()
    {
        $partidas = Partida::all();
        return view('chaves.create', compact('partidas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'partida_id' => 'required|exists:partidas,id',
            'ordem' => 'required|integer|min:1'
        ]);

        Chave::create($request->all());

        return redirect()->route('chaves.index')->with('success', 'Chave criada com sucesso.');
    }

    public function edit(Chave $chave)
    {
        $partidas = Partida::all();
        return view('chaves.edit', compact('chave', 'partidas'));
    }

    public function update(Request $request, Chave $chave)
    {
        $request->validate([
            'partida_id' => 'required|exists:partidas,id',
            'ordem' => 'required|integer|min:1'
        ]);

        $chave->update($request->all());

        return redirect()->route('chaves.index')->with('success', 'Chave atualizada com sucesso.');
    }

    public function destroy(Chave $chave)
    {
        $chave->delete();
        return redirect()->route('chaves.index')->with('success', 'Chave excluída com sucesso.');
    }
}
