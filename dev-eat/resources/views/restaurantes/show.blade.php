@extends('plantilla')
@section('content')
<br>
<h2>Fitxa Restaurant</h2>
  
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

@endsection