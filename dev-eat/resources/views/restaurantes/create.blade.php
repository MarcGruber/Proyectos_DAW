@extends('plantilla')
@section('content')
<br>
<div>
	<a href="{{ route('restaurantes.index') }}"> Tornar</a>
</div>

<div>           
	<form action="{{ route('restaurantes.store') }}" method="POST">
	    @csrf
	       
	    <strong>Name:</strong>
	    <input type="text" name="name">
		<strong>Capacidad:</strong>
        <input type="text" name="capacidad">
	            
	    <input type="submit" value="desar">     
	   
	</form>
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

@endsection