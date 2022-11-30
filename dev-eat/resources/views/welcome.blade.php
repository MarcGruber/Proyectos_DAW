<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


    <title>DEV-EAT</title>
  </head>
  <body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ url('/') }}">DEV-EAT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('platos.index')}}">Platos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('restaurantes.index')}}">Restaurantes</a>
      </li>     
      <li class="nav-item">
        <a class="nav-link" href="{{route('pedidos.index')}}">Pedidos</a>
      </li> 
      
      @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest    
    </ul>
   
   
  </div>
</nav>


<div class="container"> 
     @yield('content')
</div>

<div id="menu" style="display: flex; margin: 2em 8% 2em 8%;flex-flow: row wrap;">
@foreach ($restaurantes as $restaurante)

                            

<div class="card" style="width: 18rem; margin: 1em ">
 {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
 <div class="card-body" style="min-width: 25%">
   <h5 class="card-title">{{ $restaurante->name }}</h5>
   <p class="card-text">{{ $restaurante->capacidad }}</p>
   <a class="btn btn-primary" href="{{ route('Clientrestaurantes.show',$restaurante->id) }}">Seleccionar</a> 
 </div>
</div>


@endforeach

</div>
<footer>
  <p style="text-align: center">Made by Marc Gruber Lopéz ❤️👨‍💻 and Bryan Couto Ruiz</p>
</footer>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


  </body>
</html>