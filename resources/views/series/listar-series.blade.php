<x-layout title="Séries">
@auth<a  class="btn btn-dark mb-2" href="{{ route('series.create')}}">Adicionar</a>@endauth

    <ul class="list-group">
        @foreach($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="{{ asset('storage/' . $serie->cover) }}" class="me-3" width="100" alt="">
           @auth <a href="{{ route('seasons.index', $serie->id) }}"> @endauth
                {{$serie->nome}}
                @auth</a> @endauth
            </div>
            <span class="d-flex ">

            @auth
            <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm">E</a>



            <form class="ms-2" action="{{ route('series.destroy', $serie->id) }}" method="post">
                @csrf
                @method('DELETE')

            <button type="submit" class="btn btn-danger btn-sm">X</button>
            </form>

            @endauth


        </span>
        </li>

        @endforeach
    </ul>


</x-layout>
