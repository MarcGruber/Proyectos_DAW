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
            <tr>
                <th>Id</th>
                <th>Name</th>           
                <th>Operacions</th>
                </tr>
        </thead>

            <tbody>
            @foreach ($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->id }}</td>
                <td>{{ $pedido->name }}</td>
               
                <td>                
                   <a href="{{ route('pedidos.show',$pedido->id) }}">Mostrar</a> 
                
                            
                   <a href="{{ route('pedidos.destroy',$pedido->id) }}">Esborrar</a> 
                
                            
                   <a href="{{ route('pedidos.edit',$pedido->id) }}">Actualitzar</a> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>