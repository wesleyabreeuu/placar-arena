<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Jogador;
use App\Models\Partida;
use App\Models\Competicao;
use App\Models\Modalidade;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
public function index()
{
    $modalidades = Modalidade::withCount('partidas')->get()->filter(function ($modalidade) {
        return $modalidade->partidas_count > 0;
    });

    $graficoLabels = $modalidades->pluck('nome');
    $graficoData = $modalidades->pluck('partidas_count');

    return view('home', [
        'totalCompeticoes' => Competicao::count(),
        'totalEquipes' => Equipe::count(),
        'totalJogadores' => Jogador::count(),
        'totalPartidas' => Partida::count(),
        'ultimasPartidas' => Partida::with(['competicao', 'equipes'])->latest()->take(5)->get(),
        'graficoLabels' => $graficoLabels,
        'graficoData' => $graficoData,
    ]);
}



}
