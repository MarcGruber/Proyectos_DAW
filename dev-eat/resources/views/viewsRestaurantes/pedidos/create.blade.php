@extends('plantilla')
@section('content')
<div>
	<a href="{{ route('pedidos.index') }}"> Tornar</a>
</div>

<div>           
	<form action="{{ route('pedidos.store') }}" method="POST">
	    @csrf
	       
	    <strong>Name:</strong>
	    <input type="text" name="name"><br>
		<strong>Direccion:</strong>
		<input type="text" name="direccion"><br>
		<strong>Precio Total:</strong>
		<input type="text" name="precioTotal"><br>
		<strong>restaurante id:</strong>
		<input type="text" name="restaurante_id"><br>
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