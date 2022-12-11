@extends('plantilla')
@section('content')
<br>
<h2 style="text-transform: uppercase;">{{ $restaurante->name }}</h2>
  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
 
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="#configurar"><button type="button" class="btn btn-info">Configurar</button></a>
      <a class="nav-item nav-link" href="{{ route('platos.index', $restaurante->id) }}"><button type="button" class="btn btn-info">Platos</button></a>
      <a class="nav-item nav-link" href="{{ route('pedidos.index', $restaurante->id) }}"><button type="button" class="btn btn-info">Pedidos</button></a>
    </div>
  </div>
</nav>

<div>
	<strong>Name:</strong>
	{{ $restaurante->name }} <br>
	<strong>Capacidad:</strong>
	{{ $restaurante->capacidad }}
</div>

<strong>Platos:</strong>
<ul style="display: flex; max-width: 70%">
     @foreach($restaurante->platos as $plato)
          <li class="listaPlatosRestaurante" style="list-style:none; background-color: rgb(212, 212, 212); padding:1em; margin:1em; border-radius: 0.5em; width: 25%;"><br>
			<a style="" href="{{ route('platos.show',$plato->id) }}">{{ $plato->name }}</a>
			<b>precio: {{$plato->precio}}€</b>
		 </li>
		  
     @endforeach
</ul>
  <h3>Configuracion Restaurante:</h3>
    <div class="navbar-nav" id='configurar'>
      <a class="nav-item nav-link" href="{{ route('restaurantes.destroy', $restaurante->id) }}"><button type="button" class="btn btn-danger">Eliminar</button></a>
      <a class="nav-item nav-link" href="{{ route('restaurantes.edit', $restaurante->id) }}"><button type="button" class="btn btn-primary">Editar</button></a>
    </div>
  
@endsection