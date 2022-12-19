@extends('plantilla')
@section('content')
<div>
    @if (session('success'))
        {{ session('success') }}
            
    @endif

    @if (session('error'))           
        {{ session('error') }}            
    @endif
</div>

<div>
    <a href="{{ route('pedidos.create') }}">Nova comanda</a>
</div>

<div>
    <table>
        <thead>
            <tr style="padding:5em;">
                <th>Id</th>
                <th>Direccion</th>           
                <th>Precio Total</th>           
                <th>Operacions</th>
                </tr>
        </thead>

            <tbody>
            @foreach ($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->id }}</td>
                <td>{{ $pedido->direccion }}</td>
                <td>{{ $pedido->precioTotal }}€</td>
               
                <td>   
                    <a href="{{ route('ClientePedidos.show',$pedido->id) }}"><button type="button" class="btn btn-secondary">Agregar Platos</button></a>     
                
                   <a href="{{ route('pedidos.show',$pedido->id) }}"><button type="button" class="btn btn-secondary">Mostrar</button></a> 
                
                   <a href="{{ route('pedidos.edit',$pedido->id) }}"><button type="button" class="btn btn-secondary">Actualizar</button></a> 
                            
                   <a href="{{ route('pedidos.destroy',$pedido->id) }}"><button type="button" class="btn btn-danger">Borrar</button></a> 
                
                            
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection