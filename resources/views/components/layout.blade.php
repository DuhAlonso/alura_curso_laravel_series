<!doctype html>
<html lang="pt-br">
  <head>
    <title>{{$title}}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
  </head>
  <body>
  <nav class="navbar navbar-dark bg-dark">
    <a class="nav-link" href="{{ route('series.index') }}">HOME</a>
    @auth
    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
    @endauth
    @guest
    <a class="nav-link" href="{{ route('login') }}">Login</a>
    @endguest
  </nav>


      <div class="container">
      
  <h1>{{$title}}</h1>

  @isset($mensagemSucesso)
    <div class="alert alert-primary" role="alert">
        <strong>{{$mensagemSucesso}}</strong>
    </div>
    @endisset

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
    {{$slot}}

    </div>
  </body>
</html>