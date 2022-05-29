<x-layout title="Séries">
  <a  class="btn btn-dark mb-2" href="{{ route('series.create')}}">Adicionar</a>

    @isset($mensagemSucesso)
    <div class="alert alert-primary" role="alert">
        <strong>{{$mensagemSucesso}}</strong>
    </div>
    @endisset
    <ul class="list-group">
        @foreach($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center"> 
            
            {{$serie->nome}}
            <span class="d-flex ">
          
       
            <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm">E</a>    
            
            
        
            <form class="ms-2" action="{{ route('series.destroy', $serie->id) }}" method="post">
                @csrf
                @method('DELETE')
       
            <button type="submit" class="btn btn-danger btn-sm">X</button>    
            </form>
  
            
           
        </span>
        </li>
        
        @endforeach
    </ul>
  

</x-layout>