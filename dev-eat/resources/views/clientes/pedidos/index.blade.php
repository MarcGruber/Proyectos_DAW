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
    <table class="table">
        <thead class="thead-dark">
            <tr style="background-color: black; color : white;">
                <th scope="col">Fecha</th>
                <th scope="col">Direccion</th>           
                <th scope="col">Precio Total</th>           
                <th scope="col">Estado</th>           
                <th scope="col">Operacions</th>
            </tr>
        </thead>

            <tbody> 
            @php($haypedidos = false)
            @foreach ($pedidos as $pedido)
                
                @php($haypedidos = true)
                    <tr>
                        <td>{{ $pedido->updated_at }}</td>
                        <td>{{ $pedido->direccion }}</td>
                        <td>{{ $pedido->precioTotal }}€</td>
                        @if ( $pedido->estado == 0 )
                        <td><strong><u> NO PAGADO</u></strong></td>
                        @else
                        <td><strong><u>PAGADO</u></strong></td>
                        @endif
                        
                    
                        <td>   
                        <a href="{{ route('ClientePedidos.show',[$pedido->restaurante_id,$pedido->id]) }}"><button type="button" class="btn btn-info">Agregar Platos</button></a>     
                        
                        <a href="{{ route('ClientePedidos.show',[$pedido->restaurante_id,$pedido->id]) }}"><button type="button" class="btn btn-secondary">Mostrar</button></a> 
                        
                        @if ( $pedido->estado == 0 )
                        <a href="{{ route('ClientePedidos.pagar', [$pedido->restaurante_id,$pedido->id]) }}"><button type="button" class="btn btn-success">Pagar</button></a> 
                        @endif
                       
                                    
                        </td>
                    </tr>

            @endforeach

            @if ($haypedidos == false)
            <h4  style="text-align:center;">No tienes pedidos creados en este restaurante</h4> 
            @endif
        </tbody>
    </table>
    
</div>
@endsection