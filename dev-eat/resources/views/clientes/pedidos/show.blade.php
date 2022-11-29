@extends('plantilla')
@section('content')
<h2>Fitxa Pedido</h2>
  
<div>          
	<a href="{{ route('pedidos.index') }}"> 
		Tornar
	</a>
</div>

<div>
	<strong>Name:</strong>
	{{ $pedido->name }}
</div>
@endsection