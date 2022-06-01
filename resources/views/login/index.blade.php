
<x-layout title="LOGIN" >
   
<form method="post" action="{{ route('sigin') }}">
    @csrf
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="">
        <small id="emailHelpId" class="form-text text-muted">Preencha com seu email</small>
    </div>
    <div class="form-group">
      <label for="password">Senha</label>
      <input type="password" class="form-control" name="password" id="password" aria-describedby="passwordHelpId" placeholder="">
      <small id="passwordHelpId" class="form-text text-muted">Preencha com sua senha</small>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Logar</button>
    <a href="{{ route('users.create') }}" class=" btn btn-secondary mt-3">Criar Conta</a>
</form>

 
</x-layout>