<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $msgSucesso = session('mensagem.sucesso');
        //destruir a seção
        // $request->session()->forget('mensagem.sucesso');
        return view('series.listar-series')->with('series' ,$series)->with('mensagemSucesso', $msgSucesso);
    }

    public function create()
    {
        return view('series.create');
    }
    public function store(Request $request)
    {
        // $nomeSerie = $request->input('nome');
        // $serie = new Serie();
        // $serie->nome = $nomeSerie;
        // $serie->save();

        $request->validate([
            'nome' => ['required', 'min:3']
        ]);
        
        $serie = Serie::create($request->all());
        session()->flash('mensagem.sucesso',"Série {$serie->nome}, adicionada com sucesso!");
        return to_route('series.index');
       
    }

    public function destroy(Serie $series)
    {   
        $series->delete();
        // Serie::destroy($request->series);
        return to_route('series.index')->with('mensagem.sucesso', "Série {$series->nome}, removida com sucesso");

    }

    public function edit(Serie $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Serie $series, Request $request)
    {
        $series->fill($request->all());
        $series->save();
        return to_route('series.index')->with('mensagem.sucesso', "Série {$series->nome}, atualizada com sucesso");

    }
}
