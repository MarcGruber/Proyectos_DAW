@extends('plantilla')
@section('content')
<br>
<h2>Fitxa Plato</h2>
  
<div>          
	<a href="{{ route('Clientrestaurantes.show',$plato->restaurante_id) }}"> 
		Tornar
	</a>
</div>

<div>
	<strong>Name:</strong>
	{{ $plato->name }}<br>
	
	<strong>Preu:</strong>
	{{ $plato->precio }}<br>

	<strong>Restaurante id:</strong>
	{{ $plato->restaurante_id }}
</div>

@endsection