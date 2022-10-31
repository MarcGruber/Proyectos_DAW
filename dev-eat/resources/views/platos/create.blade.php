@extends('plantilla')
@section('content')
<br>

<div>
	<a href="{{ route('platos.index') }}"> Tornar</a>
</div>

<div>           
	<form action="{{ route('platos.store') }}" method="POST" id="formPlatos">
	    @csrf
	       
	    Name: <input type="text" name="name" value="{{old("name")}}">

		Precio: <input type="text" name="precio" value="{{old("precio")}}">

		<select name="restaurante_id" id="restaurante_id" form="formPlatos">
			@foreach ($restaurantes as $restaurante)
	 			<option value="{{ $restaurante->id }}">{{ $restaurante->name }}</option>
			@endforeach
		  </select>
	            
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