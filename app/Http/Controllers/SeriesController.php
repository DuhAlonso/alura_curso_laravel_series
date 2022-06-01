<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;

class SeriesController extends Controller
{

    public function __construct(private SeriesRepository $repository)
    {
        
    }

    public function index(Request $request)
    {

        $series = Series::query()->orderBy('nome')->get();
        $msgSucesso = session('mensagem.sucesso');
        //destruir a seção
        // $request->session()->forget('mensagem.sucesso');
        return view('series.listar-series')->with('series', $series)->with('mensagemSucesso', $msgSucesso);
    }

    public function create()
    {
        return view('series.create');
    }
    public function store(SeriesFormRequest $request)
    {
        // $nomeSerie = $request->input('nome');
        // $serie = new Serie();
        // $serie->nome = $nomeSerie;
        // $serie->save();

        $serie = $this->repository->add($request);


        session()->flash('mensagem.sucesso', "Série {$serie->nome}, adicionada com sucesso!");
        return to_route('series.index');
    }

    public function destroy(Series $series)
    {
        $series->delete();
        // Serie::destroy($request->series);
        return to_route('series.index')->with('mensagem.sucesso', "Série {$series->nome}, removida com sucesso");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();
        return to_route('series.index')->with('mensagem.sucesso', "Série {$series->nome}, atualizada com sucesso");
    }
}
