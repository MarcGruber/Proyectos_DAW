@extends('plantilla')
@section('content')
<h2>Fitxa Pedido</h2>
  <h4>Estado : {{$pedido->id}}</h4>


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

                @if(auth()->user()->role == 'cliente')
				<a href="{{ route('ClientePedidos.deletePlato',[$pedido->restaurante_id, $pedido->id, $platoPedido->id]) }}"><button type="button" class="btn btn-danger">Quitar del pedido</button></a> 	
                @endif  
                      
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


</div>
@endsection