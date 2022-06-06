@component('mail::message')
# {{$nomeSerie}} - Série foi criada
A série {{$nomeSerie}} com {{$qtdTemporadas}} temporadas e {{$episodios}} episódios por temporada, acaba de ser adicionada.
@component('mail::button', ['url' => route('seasons.index', $idSerie)])
    Ver Série
@endcomponent
@endcomponent
