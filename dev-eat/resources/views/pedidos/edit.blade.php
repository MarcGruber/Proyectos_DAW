@extends('plantilla')
@section('content')
<div>
	<a href="{{ route('pedidos.index') }}"> Tornar</a>
</div>          
<div> 
	@if ($errors->any())
	<ul>
	    @foreach ($errors->all() as $error)
	    	<li>{{ $error }}</li>
	    @endforeach
	</ul>        
        @endif
</div>
<div>
	<form action="{{ route('pedidos.update',$pedido->id) }}" method="POST">
	    @csrf
	    <strong>Name:</strong>
	    <input type="text" name="name" value="{{ $pedido->name }}">
	            
	    <input type="submit" value="Actualitzar">            
	   
	</form>
</div>
@endsection