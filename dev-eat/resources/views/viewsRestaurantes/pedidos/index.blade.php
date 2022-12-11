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
    <table class="table">
        <thead class="thead-dark">
            <tr style="background-color: black; color : white;">
                <th scope="col">Fecha</th>
                <th scope="col">Direccion</th>           
                <th scope="col">Precio Total</th>           
                <th scope="col">Estado</th>           
                <th scope="col">Operacions </th>
            </tr>
        </thead>

            <tbody > 
            @php($haypedidos = false)
            @foreach ($pedidos as $pedido)
                
                @php($haypedidos = true)
                        <td style="text-align: center;" >{{ $pedido->updated_at }}</td>
                        <td style="text-align: center;" >{{ $pedido->direccion }}</td>
                        <td style="text-align: center;" >{{ $pedido->precioTotal }}€</td>
                        @if ( $pedido->estado == 0 )
                        <td><strong><u> NO PAGADO</u></strong></td>
                        @else
                        <td style="background-color: rgb(4, 141, 4); color : rgb(0, 0, 0);text-align: center;"><strong><u>PAGADO</u></strong></td>
                        @endif
                        
                    
                        <td>   
                            
                          
                        <a href="{{ route('RestaurantePedidos.showPlatos',[$pedido->restaurante_id,$pedido->id]) }}"><button type="button" class="btn btn-secondary">Mostrar</button></a> 
                        
                       

                        
                       
                                    
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