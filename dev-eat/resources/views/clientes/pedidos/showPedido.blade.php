@extends('plantilla')
@section('content')
<h2>Fitxa Pedido</h2>
  <h4>Estado : {{$pedido->id}}</h4>
<div>          
		Tornar
	</a>
</div>

<div>
	
	<table  class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>           
                <th scope="col">Precio</th>
                <th scope="col">Operacions</th>

                </tr>
        </thead>

        <tbody>                
        @foreach ($platosPedido as $platoPedido)
            <tr>
                <td>{{ $platoPedido->name }}</td>
                <td>{{ $platoPedido->precio }}€</td>
               
                <td>                
					
                             
                    
                    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


</div>
@endsection