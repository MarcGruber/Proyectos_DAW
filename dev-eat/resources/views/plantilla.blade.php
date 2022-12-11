<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
    

<!-- Scripts -->
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
<style>
  
</style>
    <title>DEV-EAT</title>
  </head>
  <body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  @if(auth()->user()->role == "cliente")
  <a class="navbar-brand" href="{{ url('/client') }}">DEV-EAT</a>
  @else 
  <a class="navbar-brand" href="{{ url('/') }}">DEV-EAT</a>
  @endif
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  @if(auth()->user()->role == "cliente")
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/client') }}">Restaurantes</a>
      </li>     

    @endif

    @if(auth()->user()->role == "restaurante")


  

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
@endif


    @if(auth()->user()->role == "admin")
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
  
  
        <li class="nav-item">
          <a class="nav-link" href="{{route('restaurantes.index')}}">Restaurantes</a>
        </li>     
        <li class="nav-item">
          <a class="nav-link" href="{{route('users.index')}}">Usuarios</a>
        </li> 
   
    
</div> 
      @endif

      

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


    <ul class="navbar-nav mr-auto">
      
  
  
    </ul>
  </div>

 
</nav>


<div class="container"> 
     @yield('content')
</div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<footer>
  <p style="text-align: center">Made by Marc Gruber López ❤️👨‍💻 </p>
</footer>
  </body>
</html>