<div>
	<a href="{{ route('platos.index') }}"> Tornar</a>
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
	<form action="{{ route('platos.update',$plato->id) }}" method="POST">
	    @csrf

		Name: <input type="text" name="nom" value="{{ $plato->name }}">
	    Precio: <input type="text" name="precio" value="{{ $plato->precio }}">
	    <input type="submit" value="Actualitzar">            
	   
	</form>
</div>