@extends('plantilla')
@section('content')


<h1>CREAR PEDIDO ({{$restaurante->name}})</h1>

<div>           
	<form action="{{ route('ClientePedidos.store',2) }}" method="POST">
	    @csrf
	       
	    <strong>Name:</strong>
	    <input type="text" name="name"><br>
		<strong>Direccion:</strong>
		<input type="text" name="direccion"><br>
		<strong>restaurante id:</strong>
		<input type="text" name="restaurante_id" value="{{$restaurante->id}}"  readonly><br>
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