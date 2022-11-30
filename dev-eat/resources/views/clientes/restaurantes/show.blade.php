@extends('plantilla')
@section('content')
<br>
<h2 style="text-transform: uppercase;">{{ $restaurante->name }}</h2>
  
<div class="d-flex flex-row">          
	<h3><a href="{{ route('restaurantes.index') }}"> 
		Tornar
	</a></h3>
	<h3 style="margin-left: 30px;"><a href="{{ route('ClientePedidos.create',$restaurante->id) }}">Pedidos</a></h3>
</div>
<hr>
<div class="d-flex flex-row">
	<strong>Name: {{ $restaurante->name }}</strong>
	 <br>
	<strong style="margin-left: 30px;">Capacidad: {{ $restaurante->capacidad }}</strong>
	
</div>

<strong>Platos:</strong>
<ul style="display: flex; max-width: 70%">
     @foreach($restaurante->platos as $plato)
		  <div class="card  hover-overlay" style="width: 18rem; margin: 1em;">
 {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
 <a href="{{ route('ClientePlatos.show',$plato->id) }}" style="text-decoration:none;"> 
 	<div class="card-body" style="min-width: 25%">
    <h5 class="card-title">{{ $plato->name }}</h5>
    <p class="card-text" style="color:black;">precio: {{$plato->precio}}€</p>
 	</div>
</a>

</div>
     @endforeach
</ul>

@endsection