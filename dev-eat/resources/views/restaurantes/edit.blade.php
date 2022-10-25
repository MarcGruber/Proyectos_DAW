@extends('plantilla')
@section('content')
<br>
<div>
	<a href="{{ route('restaurantes.index') }}"> Tornar</a>
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
	<form action="{{ route('restaurantes.update',$restaurante->id) }}" method="POST">
	    @csrf
	    <p>Name:</p><br>
	    <input type="text" name="name" value="{{ $restaurante->name }}"><br>
		<p>Capacidad:</p><br>
		<input type="text" name="capacidad" value="{{ $restaurante->capacidad }}">

	            <br>
	    <input type="submit" value="Actualitzar">            
	   
	</form>
</div>

@endsection