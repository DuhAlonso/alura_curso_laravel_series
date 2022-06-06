<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Autenticador;
use App\Http\Requests\SeriesFormRequest;
use App\Mail\SeriesCreated;
use App\Models\Series;
use App\Models\User;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SeriesController extends Controller
{

    public function __construct(private SeriesRepository $repository)
    {
        $this->middleware(Autenticador::class)->except('index');
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

        $coverPath = $request->hasFile('cover')
            ?  $coverPath = $request->file('cover')->store('series_cover', 'public')
            : null;
        $request->coverPath = $coverPath;
        $serie = $this->repository->add($request);

        session()->flash('mensagem.sucesso', "Série {$serie->nome}, adicionada com sucesso!");
        return to_route('series.index');
    }

    public function destroy(Series $series)
    {
        $series->delete();
        \App\Jobs\DeleteSeriesCover::dispatch($series->cover);
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
