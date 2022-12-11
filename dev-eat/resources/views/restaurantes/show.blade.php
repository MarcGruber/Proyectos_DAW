@extends('plantilla')
@section('content')
<br>
<h2 style="text-transform: uppercase;">{{ $restaurante->name }}</h2>
  
<div>          
	<a href="{{ route('restaurantes.index') }}"> 
		Tornar
	</a>
</div>

<div>
	<strong>Name:</strong>
	{{ $restaurante->name }} <br>
	<strong>Capacidad:</strong>
	{{ $restaurante->capacidad }} <br>
	<strong>PROPIETARIO:</strong>
	{{ $user->name }}
</div>
<br><hr>
<strong>Platos:</strong>
<ul style="display: flex; max-width: 70%">
     @foreach($restaurante->platos as $plato)
          <li class="listaPlatosRestaurante" style="list-style:none; background-color: rgb(212, 212, 212); padding:1em; margin:1em; border-radius: 0.5em; width: 25%;"><br>
			<a style="" href="{{ route('platos.show',$plato->id) }}">{{ $plato->name }}</a>
			<b>precio: {{$plato->precio}}€</b>
		 </li>
		  
     @endforeach
</ul>

@endsection