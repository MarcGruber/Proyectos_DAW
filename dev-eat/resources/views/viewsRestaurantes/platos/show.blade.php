@extends('plantilla')
@section('content')
<br>
<h2>Fitxa Plato</h2>
  


<div>
	<strong>Name:</strong>
	{{ $plato->name }}<br>
	
	<strong>Preu:</strong>
	{{ $plato->precio }}<br>

	<strong>Restaurante id:</strong>
	{{ $plato->restaurante_id }}
</div>

@endsection