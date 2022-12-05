@extends('plantilla')
@section('content')
<h2>Fitxa Pedido</h2>
  
<div>          
	<a href="{{ route('pedidos.index') }}"> 
		Tornar
	</a>
</div>

<div>
	<strong>Fecha actualizacion: {{ $pedido->updated_at }}</strong>
	
	<table  class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>           
                <th scope="col">Precio</th>
                <th scope="col">Restaurante</th>
                <th scope="col">Operacions</th>
                </tr>
        </thead>

            <tbody>
			@foreach ($platos as $plato)

@if ($plato->restaurante_id == $pedido->restaurante_id)
		
       
                
       
            <tr>
                <td>{{ $plato->id }}</td>
                <td>{{ $plato->name }}</td>
                <td>{{$plato->precio}}€</td>
                <td>{{$plato->restaurante_id}}</td>
               
                <td>                
					<a href="{{ route('AgregarPedidos.agregar',[$pedido->restaurante_id, $pedido->id, $plato->id]) }}"><button type="button" class="btn btn-success">Agregar</button></a> 
					
                    <a href="{{ route('platos.show',$plato->id) }}"><button type="button" class="btn btn-secondary">Mostrar</button></a> 
                             
                    <a href="{{ route('platos.edit',$plato->id) }}"><button type="button" class="btn btn-secondary">Actualizar</button></a> 
                    
                    
                </td>
				@endif
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection