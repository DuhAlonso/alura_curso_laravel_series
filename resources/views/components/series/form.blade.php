<form action="{{ $action }}" method="post">
   <!-- Laravel obriga tratar por questões de segurança -->
    @csrf
    @if($update)  
    @method('PUT')
    @endif
  <div class="form-group mb-2">
    <label class="form-label" for="nome">Nome:</label>
    <input type="text" class="form-control" name="nome" id="nome" 
    @isset($nome) value="{{$nome}}" @endisset >
  </div>
  
  <button type="submit" class="btn btn-primary">Salvar</button>
</form>