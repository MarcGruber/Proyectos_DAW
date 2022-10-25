@extends('plantilla')
@section('content')
<br>
<h2>Fitxa {{ $restaurante->name }}</h2>
  
<div>          
	<a href="{{ route('restaurantes.index') }}"> 
		Tornar
	</a>
</div>

<div>
	<strong>Name:</strong>
	{{ $restaurante->name }} <br>
	<strong>Capacidad:</strong>
	{{ $restaurante->capacidad }}
</div>

<strong>Platos:</strong>
<ul>
     @foreach($restaurante->platos as $plato)
          <li><a href="{{ route('platos.show',$plato->id) }}">{{ $plato->name }}</a> </li>
     @endforeach
</ul>

@endsection