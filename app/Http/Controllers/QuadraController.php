<?php

namespace App\Http\Controllers;

use App\Models\Quadra;
use Illuminate\Http\Request;

class QuadraController extends Controller
{
    public function index()
    {
        $quadras = Quadra::all();
        return view('quadras.index', compact('quadras'));
    }

    public function create()
    {
        return view('quadras.create');
    }

    public function store(Request $request)
    {
        Quadra::create($request->only('nome', 'localizacao'));
        return redirect()->route('quadras.index');
    }

    public function edit(Quadra $quadra)
    {
        return view('quadras.edit', compact('quadra'));
    }

    public function update(Request $request, Quadra $quadra)
    {
        $quadra->update($request->only('nome', 'localizacao'));
        return redirect()->route('quadras.index');
    }

    public function destroy(Quadra $quadra)
    {
        $quadra->delete();
        return redirect()->route('quadras.index');
    }
}
