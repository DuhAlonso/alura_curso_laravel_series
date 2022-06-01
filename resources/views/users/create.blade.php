
<x-layout title="Criar conta" >
   
   <form method="post" action="{{ route('users.store') }}">
       @csrf
       <div class="form-group">
           <label for="name">Nome:</label>
           <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelpId" placeholder="">
           <small id="nameHelpId" class="form-text text-muted">Preencha com seu nome</small>
       </div>
       <div class="form-group">
           <label for="email">Email:</label>
           <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="">
           <small id="emailHelpId" class="form-text text-muted">Preencha com seu email</small>
       </div>
       <div class="form-group">
         <label for="password">Senha:</label>
         <input type="password" class="form-control" name="password" id="password" aria-describedby="passwordHelpId" placeholder="">
         <small id="passwordHelpId" class="form-text text-muted">Preencha com sua senha</small>
       </div>
       <button type="submit" class="btn btn-primary mt-3">Salvar</button>
   </form>
   
    
   </x-layout>