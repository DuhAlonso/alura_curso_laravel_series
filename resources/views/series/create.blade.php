<x-layout title="Criar">

    <form action="{{ route('series.store') }}" method="post">
        <!-- Laravel obriga tratar por questões de segurança -->
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <label class="form-label" for="nome">Nome:</label>
                <input autofocus type="text" class="form-control" name="nome" id="nome" value="{{ old('nome') }}">

            </div>
            <div class="col-2">

                <label class="form-label" for="seasonsQty">Nº Temporadas:</label>
                <input type="text" class="form-control" name="seasonsQty" id="seasonsQty" value="{{ old('seasonsQty') }}">
            </div>

            <div class="col-2">

                <label class="form-label" for="episodesPerSeason">Eps / Temporadas:</label>
                <input type="text" class="form-control" name="episodesPerSeason" id="episodesPerSeason" value="{{ old('episodesPerSeason') }}">

            </div>

        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

</x-layout>