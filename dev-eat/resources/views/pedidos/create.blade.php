<div>
	<a href="{{ route('pedidos.index') }}"> Tornar</a>
</div>

<div>           
	<form action="{{ route('pedidos.store') }}" method="POST">
	    @csrf
	       
	    <strong>Name:</strong>
	    <input type="text" name="name">
		<input type="text" name="direccion">  ç
		<input type="text" name="precioTotal">
		<input type="text" name="restaurante_id">      
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