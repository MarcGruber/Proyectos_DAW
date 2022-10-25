@extends('plantilla')
@section('content')
<br>

<div>
	<a href="{{ route('platos.index') }}"> Tornar</a>
</div>

<div>           
	<form action="{{ route('platos.store') }}" method="POST">
	    @csrf
	       
	    Name: <input type="text" name="name">
		Precio: <input type="text" name="precio">
		Restaurante_id: <input type="text" name="restaurante_id">
	            
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